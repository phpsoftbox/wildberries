<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\Api;

use PhpSoftBox\Wildberries\WildberriesApiResponse;

final class TariffsApi extends WildberriesApiSection
{
    /**
     * Комиссия по категориям товаров
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function tariffsCommission(array $query = []): WildberriesApiResponse
    {

        return $this->host('common')->get('/api/v1/tariffs/commission', $query);
    }

    /**
     * Тарифы для коробов
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function tariffsBox(array $query = []): WildberriesApiResponse
    {

        return $this->host('common')->get('/api/v1/tariffs/box', $query);
    }

    /**
     * Тарифы для монопаллет
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function tariffsPallet(array $query = []): WildberriesApiResponse
    {

        return $this->host('common')->get('/api/v1/tariffs/pallet', $query);
    }

    /**
     * Тарифы на поставку
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function tariffsAcceptanceCoefficients(array $query = []): WildberriesApiResponse
    {

        return $this->host('common')->get('/api/tariffs/v1/acceptance/coefficients', $query);
    }

    /**
     * Тарифы на возврат
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function tariffsReturn(array $query = []): WildberriesApiResponse
    {

        return $this->host('common')->get('/api/v1/tariffs/return', $query);
    }

}
