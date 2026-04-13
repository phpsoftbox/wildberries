<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries;

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
use PhpSoftBox\Wildberries\Api\TariffsApi;
use PhpSoftBox\Wildberries\Dto\WildberriesResponseDtoMap;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;

use function array_key_exists;
use function http_build_query;
use function in_array;
use function is_array;
use function is_string;
use function json_decode;
use function json_encode;
use function ltrim;
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
    /** @var array<string, string> */
    private const DEFAULT_API_BASES = [
        'suppliers'       => 'https://suppliers-api.wildberries.ru',
        'marketplace'     => 'https://marketplace-api.wildberries.ru',
        'content'         => 'https://content-api.wildberries.ru',
        'discountsPrices' => 'https://discounts-prices-api.wildberries.ru',
        'common'          => 'https://common-api.wildberries.ru',
        'feedbacks'       => 'https://feedbacks-api.wildberries.ru',
        'userManagement'  => 'https://user-management-api.wildberries.ru',
        'supplies'        => 'https://supplies-api.wildberries.ru',
        'advert'          => 'https://advert-api.wildberries.ru',
        'advertMedia'     => 'https://advert-media-api.wildberries.ru',
        'dpCalendar'      => 'https://dp-calendar-api.wildberries.ru',
        'buyerChat'       => 'https://buyer-chat-api.wildberries.ru',
        'returns'         => 'https://returns-api.wildberries.ru',
        'sellerAnalytics' => 'https://seller-analytics-api.wildberries.ru',
        'statistics'      => 'https://statistics-api.wildberries.ru',
        'documents'       => 'https://documents-api.wildberries.ru',
        'finance'         => 'https://finance-api.wildberries.ru',
    ];

    private const DEFAULT_HOST = 'suppliers';

    /** @var array<string, string> */
    private array $apiBases;

    /**
     * @param array<string, string> $apiBases
     */
    public function __construct(
        private readonly string $token,
        private readonly ClientInterface $httpClient,
        private readonly RequestFactoryInterface $requestFactory,
        private readonly StreamFactoryInterface $streamFactory,
        private readonly string $authorizationScheme = '',
        string $apiBase = self::DEFAULT_API_BASES[self::DEFAULT_HOST],
        array $apiBases = [],
    ) {
        $this->apiBases                     = self::DEFAULT_API_BASES;
        $this->apiBases[self::DEFAULT_HOST] = rtrim($apiBase, '/');

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

    /**
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function request(string $path, array $payload = [], string $method = 'POST', array $query = []): WildberriesApiResponse
    {
        return $this->requestToHost(self::DEFAULT_HOST, $path, $payload, $method, $query);
    }

    /**
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function requestToHost(string $host, string $path, array $payload = [], string $method = 'POST', array $query = []): WildberriesApiResponse
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

        $hasBody = $payload !== [] || !in_array($method, ['GET', 'HEAD', 'DELETE'], true);
        if ($hasBody) {
            $body = json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            if ($body === false) {
                throw new WildberriesException('Failed to encode Wildberries request.');
            }

            $request = $request->withBody($this->streamFactory->createStream($body));
        }

        $response = $this->httpClient->sendRequest($request);
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
