<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\Api;

use PhpSoftBox\Wildberries\WildberriesApiResponse;

final class ReportsApi extends WildberriesApiSection
{
    /**
     * Склады
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function supplierStocks(array $query = []): WildberriesApiResponse
    {

        return $this->host('statistics')->get('/api/v1/supplier/stocks', $query);
    }

    /**
     * Заказы
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function supplierOrders(array $query = []): WildberriesApiResponse
    {

        return $this->host('statistics')->get('/api/v1/supplier/orders', $query);
    }

    /**
     * Продажи
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function supplierSales(array $query = []): WildberriesApiResponse
    {

        return $this->host('statistics')->get('/api/v1/supplier/sales', $query);
    }

    /**
     * Получить отчёт
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function analyticsExciseReport(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('sellerAnalytics')->post('/api/v1/analytics/excise-report', $payload, $query);
    }

    /**
     * Создать отчёт
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function warehouseRemains(array $query = []): WildberriesApiResponse
    {

        return $this->host('sellerAnalytics')->get('/api/v1/warehouse_remains', $query);
    }

    /**
     * Проверить статус
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function warehouseRemainsTasksByTaskIdStatus(string|int $taskId, array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v1/warehouse_remains/tasks/{task_id}/status', [
            'task_id' => $taskId,
        ]);

        return $this->host('sellerAnalytics')->get($path, $query);
    }

    /**
     * Получить отчёт
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function warehouseRemainsTasksByTaskIdDownload(string|int $taskId, array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v1/warehouse_remains/tasks/{task_id}/download', [
            'task_id' => $taskId,
        ]);

        return $this->host('sellerAnalytics')->get($path, $query);
    }

    /**
     * Удержания за занижение габаритов упаковки
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function analyticsMeasurementPenalties(array $query = []): WildberriesApiResponse
    {

        return $this->host('sellerAnalytics')->get('/api/analytics/v1/measurement-penalties', $query);
    }

    /**
     * Замеры склада
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function analyticsWarehouseMeasurements(array $query = []): WildberriesApiResponse
    {

        return $this->host('sellerAnalytics')->get('/api/analytics/v1/warehouse-measurements', $query);
    }

    /**
     * Подмены и неверные вложения
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function analyticsDeductions(array $query = []): WildberriesApiResponse
    {

        return $this->host('sellerAnalytics')->get('/api/analytics/v1/deductions', $query);
    }

    /**
     * Самовыкупы
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function analyticsAntifraudDetails(array $query = []): WildberriesApiResponse
    {

        return $this->host('sellerAnalytics')->get('/api/v1/analytics/antifraud-details', $query);
    }

    /**
     * Маркировка товара
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function analyticsGoodsLabeling(array $query = []): WildberriesApiResponse
    {

        return $this->host('sellerAnalytics')->get('/api/v1/analytics/goods-labeling', $query);
    }

    /**
     * Создать отчёт
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function acceptanceReport(array $query = []): WildberriesApiResponse
    {

        return $this->host('sellerAnalytics')->get('/api/v1/acceptance_report', $query);
    }

    /**
     * Проверить статус
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function acceptanceReportTasksByTaskIdStatus(string|int $taskId, array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v1/acceptance_report/tasks/{task_id}/status', [
            'task_id' => $taskId,
        ]);

        return $this->host('sellerAnalytics')->get($path, $query);
    }

    /**
     * Получить отчёт
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function acceptanceReportTasksByTaskIdDownload(string|int $taskId, array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v1/acceptance_report/tasks/{task_id}/download', [
            'task_id' => $taskId,
        ]);

        return $this->host('sellerAnalytics')->get($path, $query);
    }

    /**
     * Создать отчёт
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function paidStorage(array $query = []): WildberriesApiResponse
    {

        return $this->host('sellerAnalytics')->get('/api/v1/paid_storage', $query);
    }

    /**
     * Проверить статус
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function paidStorageTasksByTaskIdStatus(string|int $taskId, array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v1/paid_storage/tasks/{task_id}/status', [
            'task_id' => $taskId,
        ]);

        return $this->host('sellerAnalytics')->get($path, $query);
    }

    /**
     * Получить отчёт
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function paidStorageTasksByTaskIdDownload(string|int $taskId, array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v1/paid_storage/tasks/{task_id}/download', [
            'task_id' => $taskId,
        ]);

        return $this->host('sellerAnalytics')->get($path, $query);
    }

    /**
     * Получить отчёт
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function analyticsRegionSale(array $query = []): WildberriesApiResponse
    {

        return $this->host('sellerAnalytics')->get('/api/v1/analytics/region-sale', $query);
    }

    /**
     * Бренды продавца
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function analyticsBrandShareBrands(array $query = []): WildberriesApiResponse
    {

        return $this->host('sellerAnalytics')->get('/api/v1/analytics/brand-share/brands', $query);
    }

    /**
     * Родительские категории бренда
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function analyticsBrandShareParentSubjects(array $query = []): WildberriesApiResponse
    {

        return $this->host('sellerAnalytics')->get('/api/v1/analytics/brand-share/parent-subjects', $query);
    }

    /**
     * Получить отчёт
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function analyticsBrandShare(array $query = []): WildberriesApiResponse
    {

        return $this->host('sellerAnalytics')->get('/api/v1/analytics/brand-share', $query);
    }

    /**
     * Заблокированные карточки
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function analyticsBannedProductsBlocked(array $query = []): WildberriesApiResponse
    {

        return $this->host('sellerAnalytics')->get('/api/v1/analytics/banned-products/blocked', $query);
    }

    /**
     * Скрытые из каталога
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function analyticsBannedProductsShadowed(array $query = []): WildberriesApiResponse
    {

        return $this->host('sellerAnalytics')->get('/api/v1/analytics/banned-products/shadowed', $query);
    }

    /**
     * Получить отчёт
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function analyticsGoodsReturn(array $query = []): WildberriesApiResponse
    {

        return $this->host('sellerAnalytics')->get('/api/v1/analytics/goods-return', $query);
    }

}
