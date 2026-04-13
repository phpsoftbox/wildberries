<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\Api;

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

        return $this->host('finance')->get('/api/v1/account/balance', $query);
    }

    /**
     * Отчёт о продажах по реализации
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function supplierReportDetailByPeriod(array $query = []): WildberriesApiResponse
    {

        return $this->host('statistics')->get('/api/v5/supplier/reportDetailByPeriod', $query);
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

        return $this->host('documents')->get('/api/v1/documents/categories', $query);
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

        return $this->host('documents')->get('/api/v1/documents/list', $query);
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

        return $this->host('documents')->get('/api/v1/documents/download', $query);
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

        return $this->host('documents')->post('/api/v1/documents/download/all', $payload, $query);
    }

}
