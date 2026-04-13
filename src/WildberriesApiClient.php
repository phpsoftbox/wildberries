<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries;

use Closure;
use JsonException;
use PhpSoftBox\Wildberries\Api\AnalyticsApi;
use PhpSoftBox\Wildberries\Api\CommunicationsApi;
use PhpSoftBox\Wildberries\Api\FinancesApi;
use PhpSoftBox\Wildberries\Api\GeneralApi;
use PhpSoftBox\Wildberries\Api\InStorePickupApi;
use PhpSoftBox\Wildberries\Api\OrdersDbsApi;
use PhpSoftBox\Wildberries\Api\OrdersDbwApi;
use PhpSoftBox\Wildberries\Api\OrdersFbsApi;
use PhpSoftBox\Wildberries\Api\OrdersFbwApi;
use PhpSoftBox\Wildberries\Api\ProductsApi;
use PhpSoftBox\Wildberries\Api\PromotionApi;
use PhpSoftBox\Wildberries\Api\ReportsApi;
use PhpSoftBox\Wildberries\Api\SandboxApi;
use PhpSoftBox\Wildberries\Api\TariffsApi;
use PhpSoftBox\Wildberries\Dto\WildberriesResponseDtoMap;
use PhpSoftBox\Wildberries\Retry\DefaultRetryableRequestPolicy;
use PhpSoftBox\Wildberries\Retry\NativeSleeper;
use PhpSoftBox\Wildberries\Retry\RateLimitRetryOptions;
use PhpSoftBox\Wildberries\Retry\RetryableRequestPolicyInterface;
use PhpSoftBox\Wildberries\Retry\SleeperInterface;
use PhpSoftBox\Wildberries\Retry\WildberriesRetryEvent;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;

use function array_key_exists;
use function http_build_query;
use function in_array;
use function is_array;
use function is_finite;
use function is_numeric;
use function is_string;
use function json_decode;
use function json_encode;
use function ltrim;
use function max;
use function rtrim;
use function str_starts_with;
use function strtoupper;
use function trim;

use const JSON_THROW_ON_ERROR;
use const JSON_UNESCAPED_SLASHES;
use const JSON_UNESCAPED_UNICODE;
use const PHP_QUERY_RFC3986;

final class WildberriesApiClient
{
    private const string DEFAULT_HOST = 'suppliers';

    /** @var array<string, string> */
    private array $apiBases;
    private readonly int $rateLimitMaxAttempts;
    private readonly ?float $rateLimitMaxDelaySeconds;
    private readonly ?float $rateLimitMaxTotalDelaySeconds;
    private readonly RetryableRequestPolicyInterface $rateLimitRequestPolicy;
    private readonly SleeperInterface $rateLimitSleeper;

    /** @var (Closure(WildberriesRetryEvent): void)|null */
    private readonly ?Closure $onRateLimitRetry;

    /**
     * @param array<string, string> $apiBases
     */
    public function __construct(
        private readonly string $token,
        private readonly ClientInterface $httpClient,
        private readonly RequestFactoryInterface $requestFactory,
        private readonly StreamFactoryInterface $streamFactory,
        private readonly string $authorizationScheme = '',
        array $apiBases = [],
        ?RateLimitRetryOptions $rateLimitRetry = null,
    ) {
        $rateLimitRetry ??= new RateLimitRetryOptions();

        $this->rateLimitMaxAttempts          = $rateLimitRetry->maxAttempts;
        $this->rateLimitMaxDelaySeconds      = $rateLimitRetry->maxDelaySeconds;
        $this->rateLimitMaxTotalDelaySeconds = $rateLimitRetry->maxTotalDelaySeconds;
        $this->rateLimitRequestPolicy        = $rateLimitRetry->requestPolicy ?? new DefaultRetryableRequestPolicy();
        $this->rateLimitSleeper              = $rateLimitRetry->sleeper ?? new NativeSleeper();
        $this->onRateLimitRetry              = $rateLimitRetry->onRetry;
        $this->apiBases                      = WildberriesApiBasesEnum::production();

        foreach ($apiBases as $host => $baseUrl) {
            $normalizedHost = trim($host);
            if ($normalizedHost === '' || trim($baseUrl) === '') {
                continue;
            }

            $this->apiBases[$normalizedHost] = rtrim($baseUrl, '/');
        }
    }

    /**
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function get(string $path, array $query = []): WildberriesApiResponse
    {
        return $this->request($path, method: 'GET', query: $query);
    }

    /**
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function post(string $path, array $payload = [], array $query = []): WildberriesApiResponse
    {
        return $this->request($path, $payload, 'POST', $query);
    }

    /**
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function put(string $path, array $payload = [], array $query = []): WildberriesApiResponse
    {
        return $this->request($path, $payload, 'PUT', $query);
    }

    /**
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function patch(string $path, array $payload = [], array $query = []): WildberriesApiResponse
    {
        return $this->request($path, $payload, 'PATCH', $query);
    }

    /**
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function delete(string $path, array $payload = [], array $query = []): WildberriesApiResponse
    {
        return $this->request($path, $payload, 'DELETE', $query);
    }

    public function host(string $host): WildberriesApiHost
    {
        return new WildberriesApiHost($this, $host);
    }

    public function suppliers(): WildberriesApiHost
    {
        return $this->host('suppliers');
    }

    public function marketplace(): WildberriesApiHost
    {
        return $this->host('marketplace');
    }

    public function content(): WildberriesApiHost
    {
        return $this->host('content');
    }

    public function discountsPrices(): WildberriesApiHost
    {
        return $this->host('discountsPrices');
    }

    public function common(): WildberriesApiHost
    {
        return $this->host('common');
    }

    public function feedbacks(): WildberriesApiHost
    {
        return $this->host('feedbacks');
    }

    public function userManagement(): WildberriesApiHost
    {
        return $this->host('userManagement');
    }

    public function supplies(): WildberriesApiHost
    {
        return $this->host('supplies');
    }

    public function advert(): WildberriesApiHost
    {
        return $this->host('advert');
    }

    public function advertMedia(): WildberriesApiHost
    {
        return $this->host('advertMedia');
    }

    public function dpCalendar(): WildberriesApiHost
    {
        return $this->host('dpCalendar');
    }

    public function buyerChat(): WildberriesApiHost
    {
        return $this->host('buyerChat');
    }

    public function returns(): WildberriesApiHost
    {
        return $this->host('returns');
    }

    public function sellerAnalytics(): WildberriesApiHost
    {
        return $this->host('sellerAnalytics');
    }

    public function statistics(): WildberriesApiHost
    {
        return $this->host('statistics');
    }

    public function documents(): WildberriesApiHost
    {
        return $this->host('documents');
    }

    public function finance(): WildberriesApiHost
    {
        return $this->host('finance');
    }

    public function ordersFbs(): OrdersFbsApi
    {
        return new OrdersFbsApi($this);
    }

    public function general(): GeneralApi
    {
        return new GeneralApi($this);
    }

    public function products(): ProductsApi
    {
        return new ProductsApi($this);
    }

    public function ordersDbw(): OrdersDbwApi
    {
        return new OrdersDbwApi($this);
    }

    public function ordersDbs(): OrdersDbsApi
    {
        return new OrdersDbsApi($this);
    }

    public function inStorePickup(): InStorePickupApi
    {
        return new InStorePickupApi($this);
    }

    public function ordersFbw(): OrdersFbwApi
    {
        return new OrdersFbwApi($this);
    }

    public function promotion(): PromotionApi
    {
        return new PromotionApi($this);
    }

    public function communications(): CommunicationsApi
    {
        return new CommunicationsApi($this);
    }

    public function tariffs(): TariffsApi
    {
        return new TariffsApi($this);
    }

    public function analytics(): AnalyticsApi
    {
        return new AnalyticsApi($this);
    }

    public function reports(): ReportsApi
    {
        return new ReportsApi($this);
    }

    public function finances(): FinancesApi
    {
        return new FinancesApi($this);
    }

    public function sandbox(): SandboxApi
    {
        return new SandboxApi($this);
    }

    /**
     * @param array<string, mixed>|null $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function request(string $path, ?array $payload = [], string $method = 'POST', array $query = []): WildberriesApiResponse
    {
        return $this->requestToHost(self::DEFAULT_HOST, $path, $payload, $method, $query);
    }

    /**
     * @param array<string, mixed>|null $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function requestToHost(string $host, string $path, ?array $payload = [], string $method = 'POST', array $query = []): WildberriesApiResponse
    {
        $method   = strtoupper($method);
        $url      = $this->buildUrl($this->resolveBaseUrl($host), $path, $query);
        $dtoClass = WildberriesResponseDtoMap::resolve($method, $path);

        $authorization = $this->authorizationScheme !== ''
            ? $this->authorizationScheme . ' ' . $this->token
            : $this->token;

        $request = $this->requestFactory
            ->createRequest($method, $url)
            ->withHeader('Authorization', $authorization)
            ->withHeader('Accept', 'application/json')
            ->withHeader('Content-Type', 'application/json');

        $hasBody = $payload !== null
            && ($payload !== [] || !in_array($method, ['GET', 'HEAD', 'DELETE'], true));

        $requestBody = null;

        if ($hasBody) {
            $requestBody = json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            if ($requestBody === false) {
                throw new WildberriesException('Failed to encode Wildberries request.');
            }

            $request = $request->withBody($this->streamFactory->createStream($requestBody));
        }

        $response = $this->sendWithRateLimitRetry($request, $requestBody);
        $status   = $response->getStatusCode();
        $raw      = (string) $response->getBody();

        if ($raw === '') {
            if ($status >= 400) {
                throw new WildberriesException('Wildberries API error.', $status);
            }

            return new WildberriesApiResponse(defaultDtoClass: $dtoClass);
        }

        try {
            $decoded = json_decode($raw, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException) {
            throw new WildberriesException('Invalid Wildberries response.', $status, ['body' => $raw]);
        }

        if (!is_array($decoded)) {
            throw new WildberriesException('Invalid Wildberries response.', $status, ['body' => $raw]);
        }

        if ($status >= 400) {
            throw new WildberriesException($this->resolveErrorMessage($decoded), $status, $decoded);
        }

        return new WildberriesApiResponse($decoded, $dtoClass);
    }

    private function sendWithRateLimitRetry(RequestInterface $request, ?string $requestBody): ResponseInterface
    {
        $retryAllowed = $this->rateLimitRequestPolicy->allows($request);
        $totalDelay   = 0.0;

        for ($attempt = 1; $attempt <= $this->rateLimitMaxAttempts; $attempt++) {
            $attemptRequest = $requestBody === null
                ? $request
                : $request->withBody($this->streamFactory->createStream($requestBody));

            $response = $this->httpClient->sendRequest($attemptRequest);

            if ($response->getStatusCode() !== 429) {
                return $response;
            }

            $fallbackDelay = (float) (2 ** ($attempt - 1));
            $retryDelay    = $this->parseRetryDelay($response->getHeaderLine('X-RateLimit-Retry'));
            $delay         = $retryDelay === null ? $fallbackDelay : max($fallbackDelay, $retryDelay);

            if (
                !$retryAllowed
                || $attempt >= $this->rateLimitMaxAttempts
                || $this->exceedsDelayBudget($delay, $totalDelay)
            ) {
                throw $this->createRateLimitException($response, $delay);
            }

            $response->getBody()->close();

            if ($this->onRateLimitRetry !== null) {
                ($this->onRateLimitRetry)(new WildberriesRetryEvent(
                    attempt: $attempt + 1,
                    delaySeconds: $delay,
                    method: $request->getMethod(),
                    endpoint: $request->getUri()->getPath(),
                    statusCode: 429,
                ));
            }

            $this->rateLimitSleeper->sleep($delay);
            $totalDelay += $delay;
        }

        // The loop always returns a response. Kept for static analysers.
        throw new WildberriesException('Wildberries retry loop ended unexpectedly.');
    }

    private function exceedsDelayBudget(float $delay, float $totalDelay): bool
    {
        if ($this->rateLimitMaxDelaySeconds !== null && $delay > $this->rateLimitMaxDelaySeconds) {
            return true;
        }

        return $this->rateLimitMaxTotalDelaySeconds !== null
            && $totalDelay + $delay > $this->rateLimitMaxTotalDelaySeconds;
    }

    private function createRateLimitException(
        ResponseInterface $response,
        float $retryAfterSeconds,
    ): WildberriesRateLimitException {
        $body = $response->getBody();
        $raw  = (string) $body;
        $body->close();

        if ($raw === '') {
            return new WildberriesRateLimitException(
                'Wildberries API rate limit exceeded.',
                $retryAfterSeconds,
            );
        }

        try {
            $decoded = json_decode($raw, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException) {
            return new WildberriesRateLimitException(
                'Invalid Wildberries response.',
                $retryAfterSeconds,
                ['body' => $raw],
            );
        }

        if (!is_array($decoded)) {
            return new WildberriesRateLimitException(
                'Invalid Wildberries response.',
                $retryAfterSeconds,
                ['body' => $raw],
            );
        }

        return new WildberriesRateLimitException(
            $this->resolveErrorMessage($decoded),
            $retryAfterSeconds,
            $decoded,
        );
    }

    private function parseRetryDelay(string $value): ?float
    {
        $value = trim($value);
        if ($value === '' || !is_numeric($value)) {
            return null;
        }

        $delay = (float) $value;

        return $delay >= 0 && is_finite($delay) ? $delay : null;
    }

    public function resolveBaseUrl(string $host): string
    {
        if (str_starts_with($host, 'https://') || str_starts_with($host, 'http://')) {
            return rtrim($host, '/');
        }

        $normalized = trim($host);
        if ($normalized !== '' && array_key_exists($normalized, $this->apiBases)) {
            return $this->apiBases[$normalized];
        }

        throw new WildberriesException('Unknown Wildberries API host: ' . $host . '.');
    }

    /**
     * @param array<string, mixed> $payload
     */
    private function resolveErrorMessage(array $payload): string
    {
        $message = $payload['message'] ?? null;
        if (is_string($message) && trim($message) !== '') {
            return trim($message);
        }

        $detail = $payload['detail'] ?? null;
        if (is_string($detail) && trim($detail) !== '') {
            return trim($detail);
        }

        $error = $payload['error'] ?? null;
        if (is_array($error)) {
            $nested = $error['message'] ?? null;
            if (is_string($nested) && trim($nested) !== '') {
                return trim($nested);
            }
        }

        return 'Wildberries API error.';
    }

    /**
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     */
    private function buildUrl(string $baseUrl, string $path, array $query = []): string
    {
        $url = rtrim($baseUrl, '/') . '/' . ltrim($path, '/');
        if ($query === []) {
            return $url;
        }

        return $url . '?' . http_build_query($query, '', '&', PHP_QUERY_RFC3986);
    }
}
