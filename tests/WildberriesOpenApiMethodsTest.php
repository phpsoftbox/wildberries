<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\Tests;

use PhpSoftBox\Http\Message\Response;
use PhpSoftBox\Wildberries\Api\AnalyticsApi;
use PhpSoftBox\Wildberries\Api\FinancesApi;
use PhpSoftBox\Wildberries\Api\GeneralApi;
use PhpSoftBox\Wildberries\Api\InStorePickupApi;
use PhpSoftBox\Wildberries\Api\OrdersDbsApi;
use PhpSoftBox\Wildberries\Api\OrdersDbwApi;
use PhpSoftBox\Wildberries\Api\OrdersFbsApi;
use PhpSoftBox\Wildberries\Api\ProductsApi;
use PhpSoftBox\Wildberries\Api\PromotionApi;
use PhpSoftBox\Wildberries\Api\ReportsApi;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Tests\Support\CreatesWildberriesClient;
use PhpSoftBox\Wildberries\WildberriesApiClient;
use PhpSoftBox\Wildberries\WildberriesApiResponse;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\CoversMethod;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use ReflectionMethod;

use function dirname;
use function file_get_contents;
use function json_decode;
use function lcfirst;
use function parse_str;
use function preg_replace;
use function strlen;
use function substr;

use const JSON_THROW_ON_ERROR;

#[CoversClass(GeneralApi::class)]
#[CoversClass(ProductsApi::class)]
#[CoversClass(OrdersFbsApi::class)]
#[CoversClass(OrdersDbwApi::class)]
#[CoversClass(OrdersDbsApi::class)]
#[CoversClass(InStorePickupApi::class)]
#[CoversClass(PromotionApi::class)]
#[CoversClass(ReportsApi::class)]
#[CoversClass(AnalyticsApi::class)]
#[CoversClass(FinancesApi::class)]
#[CoversMethod(WildberriesApiClient::class, 'request')]
final class WildberriesOpenApiMethodsTest extends TestCase
{
    use CreatesWildberriesClient;

    /**
     * Проверяет host, метод, экранирование ID, query, полное тело и доступность DTO нового endpoint.
     *
     * @see GeneralApi::tariffConstructorOptions()
     * @see ProductsApi::recommendationsList()
     * @see OrdersFbsApi::shippingPoints()
     * @see OrdersDbwApi::dbwOrdersStatusDeliver()
     * @see OrdersDbsApi::dbsOrdersFinalPrice()
     * @see InStorePickupApi::clickCollectOrdersFinalPrice()
     * @see PromotionApi::config()
     * @see AnalyticsApi::stocksReportSellerWarehouses()
     * @see FinancesApi::salesReportsList()
     * @see WildberriesApiResponse::makeDto()
     */
    #[Test]
    #[DataProvider('newOperations')]
    public function newOperationPreservesRequest(
        string $section,
        string $method,
        string $httpMethod,
        string $host,
        string $path,
        bool $hasPathParameter,
    ): void {
        [$client, $httpClient] = $this->createClient(new Response(200, [], '{}'));
        $query                 = ['city' => 'Москва', 'cargoType' => 2];
        $payload               = ['data' => [['supplyId' => 'WB-42', 'shippingType' => 'transportCompany']]];
        $arguments             = $hasPathParameter ? ['ID /42'] : [];
        if ($httpMethod !== 'GET') {
            $arguments[] = $payload;
        }
        $arguments[] = $query;

        $response = $client->{$section}()->{$method}(...$arguments);

        $request = $httpClient->lastRequest();
        self::assertNotNull($request);
        self::assertSame($httpMethod, $request->getMethod());
        self::assertSame('https', $request->getUri()->getScheme());
        self::assertSame($host, $request->getUri()->getHost());
        self::assertSame($path, $request->getUri()->getPath());
        parse_str($request->getUri()->getQuery(), $actualQuery);
        self::assertSame(['city' => 'Москва', 'cargoType' => '2'], $actualQuery);
        self::assertSame('Bearer wb-token', $request->getHeaderLine('Authorization'));
        if ($httpMethod === 'GET') {
            self::assertSame('', (string) $request->getBody());
        } else {
            self::assertSame($payload, json_decode((string) $request->getBody(), true, flags: JSON_THROW_ON_ERROR));
        }
        self::assertInstanceOf(WildberriesDtoInterface::class, $response->makeDto());
    }

    /**
     * @return iterable<string, array{string, string, string, string, string, bool}>
     */
    public static function newOperations(): iterable
    {
        yield 'General::tariffConstructorOptions' => ['general', 'tariffConstructorOptions', 'GET', 'common-api.wildberries.ru', '/api/common/v1/tariff-constructor/options', false];
        yield 'Products::recommendationsList' => ['products', 'recommendationsList', 'POST', 'content-api.wildberries.ru', '/api/content/v1/recommendations/list', false];
        yield 'Products::recommendationsSet' => ['products', 'recommendationsSet', 'POST', 'content-api.wildberries.ru', '/api/content/v1/recommendations/set', false];
        yield 'Products::uploadTaskB2bWholesale' => ['products', 'uploadTaskB2bWholesale', 'POST', 'discounts-prices-api.wildberries.ru', '/api/discounts-prices/v1/upload/task/b2b/wholesale', false];
        yield 'OrdersFbs::shippingPoints' => ['ordersFbs', 'shippingPoints', 'GET', 'marketplace-api.wildberries.ru', '/api/marketplace/v3/fbs/shipping-points', false];
        yield 'OrdersFbs::updateSuppliesShippingMethod' => ['ordersFbs', 'updateSuppliesShippingMethod', 'PATCH', 'marketplace-api.wildberries.ru', '/api/marketplace/v3/fbs/supplies/shipping-method', false];
        yield 'OrdersFbs::updateSuppliesWaybill' => ['ordersFbs', 'updateSuppliesWaybill', 'PATCH', 'marketplace-api.wildberries.ru', '/api/marketplace/v3/fbs/supplies/waybill', false];
        yield 'OrdersFbs::countriesOksm' => ['ordersFbs', 'countriesOksm', 'GET', 'marketplace-api.wildberries.ru', '/api/marketplace/v3/fbs/dictionaries/countries/oksm', false];
        yield 'OrdersFbs::setSupplySpot' => ['ordersFbs', 'setSupplySpot', 'PUT', 'marketplace-api.wildberries.ru', '/api/marketplace/v3/fbs/supplies/ID%20%2F42/spot', true];
        yield 'OrdersFbs::suppliesSpot' => ['ordersFbs', 'suppliesSpot', 'POST', 'marketplace-api.wildberries.ru', '/api/marketplace/v3/fbs/supplies/spot/list', false];
        yield 'OrdersFbs::supplySpotSticker' => ['ordersFbs', 'supplySpotSticker', 'GET', 'marketplace-api.wildberries.ru', '/api/marketplace/v3/fbs/supplies/ID%20%2F42/stickers/spot', true];
        yield 'OrdersFbs::ordersArchive' => ['ordersFbs', 'ordersArchive', 'GET', 'marketplace-api.wildberries.ru', '/api/marketplace/v3/fbs/orders/archive', false];
        yield 'OrdersFbs::autoreturnSettings' => ['ordersFbs', 'autoreturnSettings', 'GET', 'marketplace-api.wildberries.ru', '/api/marketplace/v3/fbs/settings/autoreturns', false];
        yield 'OrdersFbs::updateAutoreturnSettings' => ['ordersFbs', 'updateAutoreturnSettings', 'PATCH', 'marketplace-api.wildberries.ru', '/api/marketplace/v3/fbs/settings/autoreturns', false];
        yield 'OrdersFbs::autoreturnItems' => ['ordersFbs', 'autoreturnItems', 'POST', 'marketplace-api.wildberries.ru', '/api/marketplace/v3/fbs/settings/autoreturns/items', false];
        yield 'OrdersFbs::updateAutoreturnItems' => ['ordersFbs', 'updateAutoreturnItems', 'PATCH', 'marketplace-api.wildberries.ru', '/api/marketplace/v3/fbs/settings/autoreturns/items', false];
        yield 'OrdersFbs::autoreturnRestrictedSubcategories' => ['ordersFbs', 'autoreturnRestrictedSubcategories', 'GET', 'marketplace-api.wildberries.ru', '/api/marketplace/v3/fbs/settings/autoreturns/subcategories/restricted', false];
        yield 'OrdersDbw::dbwOrdersStatusDeliver' => ['ordersDbw', 'dbwOrdersStatusDeliver', 'POST', 'marketplace-api.wildberries.ru', '/api/marketplace/v3/dbw/orders/status/deliver', false];
        yield 'OrdersDbw::dbwOrdersMetaDetails' => ['ordersDbw', 'dbwOrdersMetaDetails', 'POST', 'marketplace-api.wildberries.ru', '/api/marketplace/v3/dbw/orders/meta/details', false];
        yield 'OrdersDbw::dbwOrdersMetaDelete' => ['ordersDbw', 'dbwOrdersMetaDelete', 'POST', 'marketplace-api.wildberries.ru', '/api/marketplace/v3/dbw/orders/meta/delete', false];
        yield 'OrdersDbw::dbwOrdersMetaSgtin' => ['ordersDbw', 'dbwOrdersMetaSgtin', 'POST', 'marketplace-api.wildberries.ru', '/api/marketplace/v3/dbw/orders/meta/sgtin', false];
        yield 'OrdersDbs::dbsOrdersFinalPrice' => ['ordersDbs', 'dbsOrdersFinalPrice', 'POST', 'marketplace-api.wildberries.ru', '/api/marketplace/v3/dbs/orders/final-price', false];
        yield 'OrdersDbs::dbsOrdersMetaDetails' => ['ordersDbs', 'dbsOrdersMetaDetails', 'POST', 'marketplace-api.wildberries.ru', '/api/marketplace/v3/dbs/orders/meta/details', false];
        yield 'InStorePickup::clickCollectOrdersFinalPrice' => ['inStorePickup', 'clickCollectOrdersFinalPrice', 'POST', 'marketplace-api.wildberries.ru', '/api/marketplace/v3/click-collect/orders/final-price', false];
        yield 'InStorePickup::clickCollectOrdersMetaDetails' => ['inStorePickup', 'clickCollectOrdersMetaDetails', 'POST', 'marketplace-api.wildberries.ru', '/api/marketplace/v3/click-collect/orders/meta/details', false];
        yield 'InStorePickup::clickCollectOrdersMetaCustomsDeclaration' => ['inStorePickup', 'clickCollectOrdersMetaCustomsDeclaration', 'POST', 'marketplace-api.wildberries.ru', '/api/marketplace/v3/click-collect/orders/meta/customs-declaration', false];
        yield 'Promotion::config' => ['promotion', 'config', 'GET', 'advert-api.wildberries.ru', '/api/advert/v1/config', false];
        yield 'Promotion::normqueryBids' => ['promotion', 'normqueryBids', 'POST', 'advert-api.wildberries.ru', '/api/advert/v1/normquery/bids', false];
        yield 'Analytics::stocksReportSellerWarehouses' => ['analytics', 'stocksReportSellerWarehouses', 'POST', 'seller-analytics-api.wildberries.ru', '/api/analytics/v1/stocks-report/seller-warehouses', false];
        yield 'Analytics::itemRating' => ['analytics', 'itemRating', 'POST', 'seller-analytics-api.wildberries.ru', '/api/analytics/v2/item-rating', false];
        yield 'Analytics::orderFeed' => ['analytics', 'orderFeed', 'POST', 'seller-analytics-api.wildberries.ru', '/api/analytics/v1/order-feed', false];
        yield 'Finances::salesReportsList' => ['finances', 'salesReportsList', 'POST', 'finance-api.wildberries.ru', '/api/finance/v1/sales-reports/list', false];
        yield 'Finances::salesReportsDetailedByReportId' => ['finances', 'salesReportsDetailedByReportId', 'POST', 'finance-api.wildberries.ru', '/api/finance/v1/sales-reports/detailed/ID%20%2F42', true];
        yield 'Finances::salesReportsDetailed' => ['finances', 'salesReportsDetailed', 'POST', 'finance-api.wildberries.ru', '/api/finance/v1/sales-reports/detailed', false];
        yield 'Finances::acquiringList' => ['finances', 'acquiringList', 'POST', 'finance-api.wildberries.ru', '/api/finance/v1/acquiring/list', false];
        yield 'Finances::acquiringDetailedByReportId' => ['finances', 'acquiringDetailedByReportId', 'POST', 'finance-api.wildberries.ru', '/api/finance/v1/acquiring/detailed/ID%20%2F42', true];
        yield 'Finances::acquiringDetailed' => ['finances', 'acquiringDetailed', 'POST', 'finance-api.wildberries.ru', '/api/finance/v1/acquiring/detailed', false];
    }

    /**
     * Устаревший wrapper остаётся на прежнем host и URL, сохраняет аргументы и явно помечен deprecated.
     *
     * @see OrdersDbwApi::dbwOrdersByOrderIdAssemble()
     * @see ReportsApi::supplierStocks()
     * @see WildberriesApiResponse::makeDto()
     */
    #[Test]
    #[DataProvider('legacyOperations')]
    public function legacyOperationDoesNotRedirect(string $section, string $method, string $verb, string $host, string $path): void
    {
        [$client, $httpClient] = $this->createClient(new Response(200, [], '{}'));
        $api                   = $client->{$section}();
        $reflection            = new ReflectionMethod($api, $method);
        $arguments             = [];
        $query                 = ['locale' => 'ru'];
        $payload               = ['orders' => [42]];
        foreach ($reflection->getParameters() as $parameter) {
            $arguments[] = match ($parameter->getName()) {
                'payload' => $payload,
                'query'   => $query,
                default   => '42',
            };
        }

        $response = $api->{$method}(...$arguments);

        $request = $httpClient->lastRequest();
        self::assertNotNull($request);
        self::assertSame($verb, $request->getMethod());
        self::assertSame($host, $request->getUri()->getHost());
        self::assertSame(preg_replace('/\{[^}]+\}/', '42', $path), $request->getUri()->getPath());
        self::assertSame('locale=ru', $request->getUri()->getQuery());
        if ($verb !== 'GET') {
            self::assertSame($payload, json_decode((string) $request->getBody(), true, flags: JSON_THROW_ON_ERROR));
        }
        self::assertStringContainsString('@deprecated', $reflection->getDocComment());
        self::assertInstanceOf(WildberriesDtoInterface::class, $response->makeDto());
    }

    /** @return iterable<string, array{string, string, string, string, string}> */
    public static function legacyOperations(): iterable
    {
        $audit = json_decode(file_get_contents(dirname(__DIR__) . '/docs/upstream/2026-09-07/audit.json'), true, flags: JSON_THROW_ON_ERROR);
        foreach ($audit['sections'] as $section => $entry) {
            foreach ($entry['removed'] as $operation) {
                foreach ($operation['wrappers'] as $wrapper) {
                    $method = substr($wrapper, strlen($section . 'Api::'));
                    yield $wrapper => [lcfirst($section), $method, $operation['method'], $operation['host'], $operation['path']];
                }
            }
        }
    }
}
