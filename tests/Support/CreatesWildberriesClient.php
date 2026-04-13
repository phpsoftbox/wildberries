<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\Tests\Support;

use PhpSoftBox\Http\Message\RequestFactory;
use PhpSoftBox\Http\Message\StreamFactory;
use PhpSoftBox\Wildberries\Retry\RateLimitRetryOptions;
use PhpSoftBox\Wildberries\WildberriesApiClient;
use Psr\Http\Message\ResponseInterface;

trait CreatesWildberriesClient
{
    /**
     * @return array{0: WildberriesApiClient, 1: FakeHttpClient}
     */
    private function createClient(
        ResponseInterface|array $response,
        array $apiBases = [],
        ?RateLimitRetryOptions $rateLimitRetry = null,
        bool $consumeRequestBodies = false,
    ): array {
        $httpClient = new FakeHttpClient($response, $consumeRequestBodies);

        $client = new WildberriesApiClient(
            token: 'wb-token',
            httpClient: $httpClient,
            requestFactory: new RequestFactory(),
            streamFactory: new StreamFactory(),
            authorizationScheme: 'Bearer',
            apiBases: $apiBases,
            rateLimitRetry: $rateLimitRetry,
        );

        return [$client, $httpClient];
    }
}
