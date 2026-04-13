<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\Api;

use PhpSoftBox\Wildberries\WildberriesApiBasesEnum;
use PhpSoftBox\Wildberries\WildberriesApiResponse;

final class SandboxApi extends WildberriesApiSection
{
    /**
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function fbsOrdersMake(array $payload = [], array $query = []): WildberriesApiResponse
    {
        return $this->host(WildberriesApiBasesEnum::Marketplace)
            ->post('/api/v3/test/fbs/orders/make', $payload, $query);
    }

    /**
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function fbsOrdersByOrderIdDecline(string|int $orderId, array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/test/fbs/orders/{orderId}/decline', [
            'orderId' => $orderId,
        ]);

        return $this->host(WildberriesApiBasesEnum::Marketplace)
            ->request($path, payload: null, method: 'PATCH', query: $query);
    }

    /**
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function fbsSuppliesBySupplyIdClose(
        string $supplyId,
        array $payload = [],
        array $query = [],
    ): WildberriesApiResponse {
        $path = $this->resolvePath('/api/v3/test/fbs/supplies/{supplyId}/close', [
            'supplyId' => $supplyId,
        ]);

        return $this->host(WildberriesApiBasesEnum::Marketplace)->patch($path, $payload, $query);
    }

    /**
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function fbsOrdersByOrderIdDeliver(string|int $orderId, array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/test/fbs/orders/{orderId}/deliver', [
            'orderId' => $orderId,
        ]);

        return $this->host(WildberriesApiBasesEnum::Marketplace)
            ->request($path, payload: null, method: 'PATCH', query: $query);
    }

    /**
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function fbsOrdersByOrderIdReceive(
        string|int $orderId,
        array $payload = [],
        array $query = [],
    ): WildberriesApiResponse {
        $path = $this->resolvePath('/api/v3/test/fbs/orders/{orderId}/receive', [
            'orderId' => $orderId,
        ]);

        return $this->host(WildberriesApiBasesEnum::Marketplace)->patch($path, $payload, $query);
    }

    /**
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function fbsOrdersByOrderIdReject(
        string|int $orderId,
        array $payload = [],
        array $query = [],
    ): WildberriesApiResponse {
        $path = $this->resolvePath('/api/v3/test/fbs/orders/{orderId}/reject', [
            'orderId' => $orderId,
        ]);

        return $this->host(WildberriesApiBasesEnum::Marketplace)->patch($path, $payload, $query);
    }

    /**
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function fbsOrdersByOrderIdDefect(string|int $orderId, array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/test/fbs/orders/{orderId}/defect', [
            'orderId' => $orderId,
        ]);

        return $this->host(WildberriesApiBasesEnum::Marketplace)
            ->request($path, payload: null, method: 'PATCH', query: $query);
    }
}
