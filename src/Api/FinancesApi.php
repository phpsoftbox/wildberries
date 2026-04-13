<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\Api;

use PhpSoftBox\Wildberries\WildberriesApiBasesEnum;
use PhpSoftBox\Wildberries\WildberriesApiResponse;

final class FinancesApi extends WildberriesApiSection
{
    /**
     * Получить баланс продавца
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function accountBalance(array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Finance)->get('/api/v1/account/balance', $query);
    }

    /**
     * Отчёт о продажах по реализации
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     *
     * @deprecated Операция отсутствует в срезе OpenAPI 2026-09-07; см. docs/upgrade-openapi-2026-09.md.
     */
    public function supplierReportDetailByPeriod(array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Statistics)->get('/api/v5/supplier/reportDetailByPeriod', $query);
    }

    /**
     * Категории документов
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function documentsCategories(array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Documents)->get('/api/v1/documents/categories', $query);
    }

    /**
     * Список документов
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function documentsList(array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Documents)->get('/api/v1/documents/list', $query);
    }

    /**
     * Получить документ
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function documentsDownload(array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Documents)->get('/api/v1/documents/download', $query);
    }

    /**
     * Получить документы
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function documentsDownloadAll(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Documents)->post('/api/v1/documents/download/all', $payload, $query);
    }

    /**
     * Список отчётов реализации.
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function salesReportsList(array $payload = [], array $query = []): WildberriesApiResponse
    {
        return $this->host(WildberriesApiBasesEnum::Finance)->post('/api/finance/v1/sales-reports/list', $payload, $query);
    }

    /**
     * Детализации к отчётам реализации по ID отчётов.
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function salesReportsDetailedByReportId(string|int $reportId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/finance/v1/sales-reports/detailed/{reportId}', [
            'reportId' => $reportId,
        ]);

        return $this->host(WildberriesApiBasesEnum::Finance)->post($path, $payload, $query);
    }

    /**
     * Детализации к отчётам реализации за период.
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function salesReportsDetailed(array $payload = [], array $query = []): WildberriesApiResponse
    {
        return $this->host(WildberriesApiBasesEnum::Finance)->post('/api/finance/v1/sales-reports/detailed', $payload, $query);
    }

    /**
     * Список отчётов об издержках на приём платежей.
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function acquiringList(array $payload = [], array $query = []): WildberriesApiResponse
    {
        return $this->host(WildberriesApiBasesEnum::Finance)->post('/api/finance/v1/acquiring/list', $payload, $query);
    }

    /**
     * Детализации к отчётам об издержках на приём платежей по ID отчётов.
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function acquiringDetailedByReportId(string|int $reportId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/finance/v1/acquiring/detailed/{reportId}', [
            'reportId' => $reportId,
        ]);

        return $this->host(WildberriesApiBasesEnum::Finance)->post($path, $payload, $query);
    }

    /**
     * Детализации к отчётам об издержках на приём платежей за период.
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function acquiringDetailed(array $payload = [], array $query = []): WildberriesApiResponse
    {
        return $this->host(WildberriesApiBasesEnum::Finance)->post('/api/finance/v1/acquiring/detailed', $payload, $query);
    }
}
