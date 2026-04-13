<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\Api;

use PhpSoftBox\Wildberries\WildberriesApiResponse;

final class AnalyticsApi extends WildberriesApiSection
{
    /**
     * Статистика карточек товаров за период
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function analyticsSalesFunnelProducts(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('sellerAnalytics')->post('/api/analytics/v3/sales-funnel/products', $payload, $query);
    }

    /**
     * Статистика карточек товаров по дням
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function analyticsSalesFunnelProductsHistory(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('sellerAnalytics')->post('/api/analytics/v3/sales-funnel/products/history', $payload, $query);
    }

    /**
     * Статистика групп карточек товаров по дням
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function analyticsSalesFunnelGroupedHistory(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('sellerAnalytics')->post('/api/analytics/v3/sales-funnel/grouped/history', $payload, $query);
    }

    /**
     * Создать отчёт
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function nmReportDownloadsPost(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('sellerAnalytics')->post('/api/v2/nm-report/downloads', $payload, $query);
    }

    /**
     * Получить список отчётов
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function nmReportDownloadsGet(array $query = []): WildberriesApiResponse
    {

        return $this->host('sellerAnalytics')->get('/api/v2/nm-report/downloads', $query);
    }

    /**
     * Сгенерировать отчёт повторно
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function nmReportDownloadsRetry(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('sellerAnalytics')->post('/api/v2/nm-report/downloads/retry', $payload, $query);
    }

    /**
     * Получить отчёт
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function nmReportDownloadsFileByDownloadId(string|int $downloadId, array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v2/nm-report/downloads/file/{downloadId}', [
            'downloadId' => $downloadId,
        ]);

        return $this->host('sellerAnalytics')->get($path, $query);
    }

    /**
     * Основная страница
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function searchReportReport(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('sellerAnalytics')->post('/api/v2/search-report/report', $payload, $query);
    }

    /**
     * Пагинация по группам
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function searchReportTableGroups(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('sellerAnalytics')->post('/api/v2/search-report/table/groups', $payload, $query);
    }

    /**
     * Пагинация по товарам в группе
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function searchReportTableDetails(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('sellerAnalytics')->post('/api/v2/search-report/table/details', $payload, $query);
    }

    /**
     * Поисковые запросы по товару
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function searchReportProductSearchTexts(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('sellerAnalytics')->post('/api/v2/search-report/product/search-texts', $payload, $query);
    }

    /**
     * Заказы и позиции по поисковым запросам товара
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function searchReportProductOrders(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('sellerAnalytics')->post('/api/v2/search-report/product/orders', $payload, $query);
    }

    /**
     * Остатки на складах WB
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function analyticsStocksReportWbWarehouses(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('sellerAnalytics')->post('/api/analytics/v1/stocks-report/wb-warehouses', $payload, $query);
    }

    /**
     * Данные по группам
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function stocksReportProductsGroups(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('sellerAnalytics')->post('/api/v2/stocks-report/products/groups', $payload, $query);
    }

    /**
     * Данные по товарам
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function stocksReportProductsProducts(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('sellerAnalytics')->post('/api/v2/stocks-report/products/products', $payload, $query);
    }

    /**
     * Данные по размерам
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function stocksReportProductsSizes(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('sellerAnalytics')->post('/api/v2/stocks-report/products/sizes', $payload, $query);
    }

    /**
     * Данные по складам
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function stocksReportOffices(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('sellerAnalytics')->post('/api/v2/stocks-report/offices', $payload, $query);
    }

}
