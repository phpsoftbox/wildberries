<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\Api;

use PhpSoftBox\Wildberries\WildberriesApiResponse;

final class OrdersFbwApi extends WildberriesApiSection
{
    /**
     * Опции приёмки
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function acceptanceOptions(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('supplies')->post('/api/v1/acceptance/options', $payload, $query);
    }

    /**
     * Список складов
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function warehouses(array $query = []): WildberriesApiResponse
    {

        return $this->host('supplies')->get('/api/v1/warehouses', $query);
    }

    /**
     * Транзитные направления
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function transitTariffs(array $query = []): WildberriesApiResponse
    {

        return $this->host('supplies')->get('/api/v1/transit-tariffs', $query);
    }

    /**
     * Список поставок
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function supplies(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('supplies')->post('/api/v1/supplies', $payload, $query);
    }

    /**
     * Детали поставки
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function suppliesByID(string|int $id, array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v1/supplies/{ID}', [
            'ID' => $id,
        ]);

        return $this->host('supplies')->get($path, $query);
    }

    /**
     * Товары поставки
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function suppliesByIDGoods(string|int $id, array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v1/supplies/{ID}/goods', [
            'ID' => $id,
        ]);

        return $this->host('supplies')->get($path, $query);
    }

    /**
     * Упаковка поставки
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function suppliesByIDPackage(string|int $id, array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v1/supplies/{ID}/package', [
            'ID' => $id,
        ]);

        return $this->host('supplies')->get($path, $query);
    }

}
