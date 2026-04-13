<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\Tests;

use PhpSoftBox\Http\Message\Response;
use PhpSoftBox\Wildberries\Retry\CallbackRetryableRequestPolicy;
use PhpSoftBox\Wildberries\Retry\RateLimitRetryOptions;
use PhpSoftBox\Wildberries\Retry\WildberriesRetryEvent;
use PhpSoftBox\Wildberries\Tests\Support\CreatesWildberriesClient;
use PhpSoftBox\Wildberries\Tests\Support\RecordingSleeper;
use PhpSoftBox\Wildberries\WildberriesException;
use PhpSoftBox\Wildberries\WildberriesRateLimitException;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;

final class WildberriesApiClientRateLimitRetryTest extends TestCase
{
    use CreatesWildberriesClient;

    public function testRetriesGetUsingRateLimitHeader(): void
    {
        $sleeper = new RecordingSleeper();

        [$client, $httpClient] = $this->createClient(
            [
                new Response(429, ['X-RateLimit-Retry' => '2'], '{"message":"retry later"}'),
                new Response(200, [], '{"data":[1]}'),
            ],
            rateLimitRetry: new RateLimitRetryOptions(sleeper: $sleeper),
        );

        $response = $client->get('/api/v1/items');

        self::assertSame([1], $response->get('data'));
        self::assertCount(2, $httpClient->requests());
        self::assertSame([2.0], $sleeper->delays());
    }

    public function testUsesFallbackBackoffAndThrowsLastResponseAfterAttemptsExhausted(): void
    {
        $sleeper = new RecordingSleeper();

        [$client, $httpClient] = $this->createClient(
            [
                new Response(429, [], '{"message":"first"}'),
                new Response(429, ['X-RateLimit-Retry' => ''], '{"message":"second"}'),
                new Response(429, ['X-RateLimit-Retry' => 'invalid'], '{"message":"third"}'),
                new Response(429, [], '{"message":"last","requestId":"final"}'),
            ],
            rateLimitRetry: new RateLimitRetryOptions(sleeper: $sleeper),
        );

        try {
            $client->get('/api/v1/items');
            self::fail('A final 429 response must throw WildberriesException.');
        } catch (WildberriesRateLimitException $exception) {
            self::assertSame(429, $exception->statusCode());
            self::assertSame('last', $exception->getMessage());
            self::assertSame('final', $exception->payload()['requestId'] ?? null);
            self::assertSame(8.0, $exception->retryAfterSeconds());
        }

        self::assertCount(4, $httpClient->requests());
        self::assertSame([1.0, 2.0, 4.0], $sleeper->delays());
    }

    public function testUsesNewHeaderAndNeverWaitsLessThanFallback(): void
    {
        $sleeper = new RecordingSleeper();

        [$client] = $this->createClient(
            [
                new Response(429, ['X-RateLimit-Retry' => '0.5'], '{"message":"first"}'),
                new Response(429, ['X-RateLimit-Retry' => '5'], '{"message":"second"}'),
                new Response(200, [], '{"ok":true}'),
            ],
            rateLimitRetry: new RateLimitRetryOptions(sleeper: $sleeper),
        );

        $client->get('/api/v1/items');

        self::assertSame([1.0, 5.0], $sleeper->delays());
    }

    public function testRetriesReadOnlyPostAndReplaysConsumedBody(): void
    {
        $sleeper = new RecordingSleeper();

        [$client, $httpClient] = $this->createClient(
            [
                new Response(429, ['X-RateLimit-Retry' => '1'], '{"message":"retry"}'),
                new Response(200, [], '{"data":[]}'),
            ],
            rateLimitRetry: new RateLimitRetryOptions(sleeper: $sleeper),
            consumeRequestBodies: true,
        );

        $client->products()->listGoodsFilterPost([
            'filter' => ['nmID' => 123],
        ]);

        self::assertCount(2, $httpClient->requests());
        self::assertSame(
            ['{"filter":{"nmID":123}}', '{"filter":{"nmID":123}}'],
            $httpClient->requestBodies(),
        );
    }

    public function testRetriesMutatingPostAfterExplicit429AndReplaysBody(): void
    {
        $sleeper = new RecordingSleeper();

        [$client, $httpClient] = $this->createClient(
            [
                new Response(429, ['X-RateLimit-Retry' => '1'], '{"message":"rate limited"}'),
                new Response(200, [], '{"data":[]}'),
            ],
            rateLimitRetry: new RateLimitRetryOptions(sleeper: $sleeper),
            consumeRequestBodies: true,
        );

        $client->products()->uploadTask(['data' => [['nmID' => 123]]]);

        self::assertCount(2, $httpClient->requests());
        self::assertSame(
            ['{"data":[{"nmID":123}]}', '{"data":[{"nmID":123}]}'],
            $httpClient->requestBodies(),
        );
        self::assertSame([1.0], $sleeper->delays());
    }

    public function testCustomPolicyCanExcludeRequest(): void
    {
        $sleeper = new RecordingSleeper();

        [$client, $httpClient] = $this->createClient(
            [
                new Response(429, [], '{"message":"retry"}'),
                new Response(200, [], '{"data":[]}'),
            ],
            rateLimitRetry: new RateLimitRetryOptions(
                requestPolicy: new CallbackRetryableRequestPolicy(
                    static fn (RequestInterface $request): bool => $request->getUri()->getPath() !== '/api/v2/upload/task',
                ),
                sleeper: $sleeper,
            ),
        );

        try {
            $client->products()->uploadTask(['data' => [['nmID' => 123]]]);
            self::fail('The custom policy must be able to disable retry for a request.');
        } catch (WildberriesRateLimitException $exception) {
            self::assertSame(429, $exception->statusCode());
            self::assertSame(1.0, $exception->retryAfterSeconds());
        }

        self::assertCount(1, $httpClient->requests());
        self::assertSame([], $sleeper->delays());
    }

    public function testDoesNotRetryStatusesOtherThan429(): void
    {
        foreach ([400, 401, 403, 409, 500] as $status) {
            $sleeper = new RecordingSleeper();

            [$client, $httpClient] = $this->createClient(
                [
                    new Response($status, [], '{"message":"failed"}'),
                    new Response(200, [], '{"data":[]}'),
                ],
                rateLimitRetry: new RateLimitRetryOptions(sleeper: $sleeper),
            );

            try {
                $client->get('/api/v1/items');
                self::fail('HTTP ' . $status . ' must retain the existing exception behavior.');
            } catch (WildberriesException $exception) {
                self::assertSame($status, $exception->statusCode());
            }

            self::assertCount(1, $httpClient->requests());
            self::assertSame([], $sleeper->delays());
        }
    }

    public function testDoesNotBlockWhenSingleDelayExceedsDefaultLimit(): void
    {
        $sleeper = new RecordingSleeper();

        [$client, $httpClient] = $this->createClient(
            new Response(
                429,
                ['X-RateLimit-Retry' => '1200'],
                '{"message":"long cooldown","requestId":"rate-limit-response"}',
            ),
            rateLimitRetry: new RateLimitRetryOptions(sleeper: $sleeper),
        );

        try {
            $client->get('/api/v1/tags');
            self::fail('A delay above the configured limit must not block the worker.');
        } catch (WildberriesRateLimitException $exception) {
            self::assertSame(429, $exception->statusCode());
            self::assertSame(1200.0, $exception->retryAfterSeconds());
            self::assertSame('long cooldown', $exception->getMessage());
            self::assertSame('rate-limit-response', $exception->payload()['requestId'] ?? null);
        }

        self::assertCount(1, $httpClient->requests());
        self::assertSame([], $sleeper->delays());
    }

    public function testDoesNotSleepWhenNextDelayExceedsTotalBudget(): void
    {
        $sleeper = new RecordingSleeper();

        [$client, $httpClient] = $this->createClient(
            [
                new Response(429, [], '{"message":"first"}'),
                new Response(429, [], '{"message":"total budget exceeded"}'),
                new Response(200, [], '{"data":[]}'),
            ],
            rateLimitRetry: new RateLimitRetryOptions(
                sleeper: $sleeper,
                maxDelaySeconds: 10,
                maxTotalDelaySeconds: 2,
            ),
        );

        try {
            $client->get('/api/v1/items');
            self::fail('A retry outside the total delay budget must not be attempted.');
        } catch (WildberriesRateLimitException $exception) {
            self::assertSame(2.0, $exception->retryAfterSeconds());
            self::assertSame('total budget exceeded', $exception->getMessage());
        }

        self::assertCount(2, $httpClient->requests());
        self::assertSame([1.0], $sleeper->delays());
    }

    public function testRetryCallbackReceivesAttemptAndRequestContext(): void
    {
        $sleeper  = new RecordingSleeper();
        $events   = [];
        [$client] = $this->createClient(
            [
                new Response(429, ['X-RateLimit-Retry' => '3'], '{"message":"retry"}'),
                new Response(200, [], '{"data":[]}'),
            ],
            rateLimitRetry: new RateLimitRetryOptions(
                sleeper: $sleeper,
                onRetry: static function (WildberriesRetryEvent $event) use (&$events): void {
                    $events[] = $event;
                },
            ),
        );

        $client->get('/api/v1/items');

        self::assertCount(1, $events);
        self::assertSame(2, $events[0]->attempt);
        self::assertSame(3.0, $events[0]->delaySeconds);
        self::assertSame('GET', $events[0]->method);
        self::assertSame('/api/v1/items', $events[0]->endpoint);
        self::assertSame(429, $events[0]->statusCode);
    }

    public function testMaxAttemptsIncludesInitialRequest(): void
    {
        $sleeper = new RecordingSleeper();

        [$client, $httpClient] = $this->createClient(
            [
                new Response(429, [], '{"message":"first"}'),
                new Response(429, [], '{"message":"last"}'),
                new Response(200, [], '{"data":[]}'),
            ],
            rateLimitRetry: new RateLimitRetryOptions(maxAttempts: 2, sleeper: $sleeper),
        );

        try {
            $client->get('/api/v1/items');
            self::fail('The configured attempt limit must be enforced.');
        } catch (WildberriesRateLimitException $exception) {
            self::assertSame('last', $exception->getMessage());
            self::assertSame(2.0, $exception->retryAfterSeconds());
        }

        self::assertCount(2, $httpClient->requests());
        self::assertSame([1.0], $sleeper->delays());
    }
}
