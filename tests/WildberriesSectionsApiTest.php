<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\Tests;

use PhpSoftBox\Http\Message\Response;
use PhpSoftBox\Wildberries\Tests\Support\CreatesWildberriesClient;
use PHPUnit\Framework\TestCase;

final class WildberriesSectionsApiTest extends TestCase
{
    use CreatesWildberriesClient;

    /**
     * Проверяет products API: content host и GET с query.
     */
    public function testProductsMethodUsesContentHost(): void
    {
        [$client, $httpClient] = $this->createClient(new Response(200, [], '{"data":[]}'));

        $client->products()->objectParentAll([
            'locale' => 'ru',
        ]);

        $request = $httpClient->lastRequest();
        self::assertNotNull($request);
        self::assertStringStartsWith('https://content-api.wildberries.ru', (string) $request->getUri());
        self::assertStringContainsString('/content/v2/object/parent/all', (string) $request->getUri());
        self::assertStringContainsString('locale=ru', (string) $request->getUri());
    }

    /**
     * Проверяет orders FBS API: path-параметр и PATCH метод.
     */
    public function testOrdersFbsMethodResolvesPathParameter(): void
    {
        [$client, $httpClient] = $this->createClient(new Response(200, [], '{"result":{"ok":true}}'));

        $client->ordersFbs()->ordersByOrderIdCancel(123456, [
            'reason' => 'test',
        ]);

        $request = $httpClient->lastRequest();
        self::assertNotNull($request);
        self::assertSame('PATCH', $request->getMethod());
        self::assertStringContainsString('/api/v3/orders/123456/cancel', (string) $request->getUri());
        self::assertStringContainsString('"reason":"test"', (string) $request->getBody());
    }

    /**
     * Проверяет in-store pickup API.
     */
    public function testInStorePickupMethodBuildsExpectedUrl(): void
    {
        [$client, $httpClient] = $this->createClient(new Response(200, [], '{"orders":[]}'));

        $client->inStorePickup()->clickCollectOrdersNew();

        $request = $httpClient->lastRequest();
        self::assertNotNull($request);
        self::assertStringStartsWith('https://marketplace-api.wildberries.ru', (string) $request->getUri());
        self::assertStringContainsString('/api/v3/click-collect/orders/new', (string) $request->getUri());
    }

    /**
     * Проверяет reports API: seller-analytics host.
     */
    public function testReportsMethodUsesSellerAnalyticsHost(): void
    {
        [$client, $httpClient] = $this->createClient(new Response(200, [], '{"data":[]}'));

        $client->reports()->analyticsMeasurementPenalties([
            'dateFrom' => '2026-01-01',
            'dateTo'   => '2026-01-31',
        ]);

        $request = $httpClient->lastRequest();
        self::assertNotNull($request);
        self::assertStringStartsWith('https://seller-analytics-api.wildberries.ru', (string) $request->getUri());
        self::assertStringContainsString('/api/analytics/v1/measurement-penalties', (string) $request->getUri());
    }

    /**
     * Проверяет finances API: documents host.
     */
    public function testFinancesMethodUsesDocumentsHost(): void
    {
        [$client, $httpClient] = $this->createClient(new Response(200, [], '{"documents":[]}'));

        $client->finances()->documentsList([
            'dateFrom' => '2026-01-01',
            'dateTo'   => '2026-01-31',
        ]);

        $request = $httpClient->lastRequest();
        self::assertNotNull($request);
        self::assertStringStartsWith('https://documents-api.wildberries.ru', (string) $request->getUri());
        self::assertStringContainsString('/api/v1/documents/list', (string) $request->getUri());
    }
}
