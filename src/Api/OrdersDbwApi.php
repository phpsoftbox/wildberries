<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\Api;

use PhpSoftBox\Wildberries\WildberriesApiResponse;

final class OrdersDbwApi extends WildberriesApiSection
{
    /**
     * Получить список новых сборочных заданий
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbwOrdersNew(array $query = []): WildberriesApiResponse
    {

        return $this->host('marketplace')->get('/api/v3/dbw/orders/new', $query);
    }

    /**
     * Получить информацию о завершенных сборочных заданиях
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbwOrders(array $query = []): WildberriesApiResponse
    {

        return $this->host('marketplace')->get('/api/v3/dbw/orders', $query);
    }

    /**
     * Дата и время доставки
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbwOrdersDeliveryDate(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('marketplace')->post('/api/v3/dbw/orders/delivery-date', $payload, $query);
    }

    /**
     * Информация о покупателе
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbwOrdersClient(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('marketplace')->post('/api/marketplace/v3/dbw/orders/client', $payload, $query);
    }

    /**
     * Получить статусы сборочных заданий
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbwOrdersStatus(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('marketplace')->post('/api/v3/dbw/orders/status', $payload, $query);
    }

    /**
     * Перевести на сборку
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbwOrdersByOrderIdConfirm(string|int $orderId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/dbw/orders/{orderId}/confirm', [
            'orderId' => $orderId,
        ]);

        return $this->host('marketplace')->patch($path, $payload, $query);
    }

    /**
     * Получить стикеры сборочных заданий
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbwOrdersStickers(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('marketplace')->post('/api/v3/dbw/orders/stickers', $payload, $query);
    }

    /**
     * Перевести в доставку
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbwOrdersByOrderIdAssemble(string|int $orderId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/dbw/orders/{orderId}/assemble', [
            'orderId' => $orderId,
        ]);

        return $this->host('marketplace')->patch($path, $payload, $query);
    }

    /**
     * Информация о курьере
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbwOrdersCourier(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('marketplace')->post('/api/v3/dbw/orders/courier', $payload, $query);
    }

    /**
     * Отменить сборочное задание
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbwOrdersByOrderIdCancel(string|int $orderId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/dbw/orders/{orderId}/cancel', [
            'orderId' => $orderId,
        ]);

        return $this->host('marketplace')->patch($path, $payload, $query);
    }

    /**
     * Получить метаданные сборочного задания
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbwOrdersByOrderIdMetaGet(string|int $orderId, array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/dbw/orders/{orderId}/meta', [
            'orderId' => $orderId,
        ]);

        return $this->host('marketplace')->get($path, $query);
    }

    /**
     * Удалить метаданные сборочного задания
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbwOrdersByOrderIdMetaDelete(string|int $orderId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/dbw/orders/{orderId}/meta', [
            'orderId' => $orderId,
        ]);

        return $this->host('marketplace')->delete($path, $payload, $query);
    }

    /**
     * Закрепить за сборочным заданием код маркировки товара
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbwOrdersByOrderIdMetaSgtin(string|int $orderId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/dbw/orders/{orderId}/meta/sgtin', [
            'orderId' => $orderId,
        ]);

        return $this->host('marketplace')->put($path, $payload, $query);
    }

    /**
     * Закрепить за сборочным заданием УИН (уникальный идентификационный номер)
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbwOrdersByOrderIdMetaUin(string|int $orderId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/dbw/orders/{orderId}/meta/uin', [
            'orderId' => $orderId,
        ]);

        return $this->host('marketplace')->put($path, $payload, $query);
    }

    /**
     * Закрепить за сборочным заданием IMEI
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbwOrdersByOrderIdMetaImei(string|int $orderId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/dbw/orders/{orderId}/meta/imei', [
            'orderId' => $orderId,
        ]);

        return $this->host('marketplace')->put($path, $payload, $query);
    }

    /**
     * Закрепить за сборочным заданием GTIN
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbwOrdersByOrderIdMetaGtin(string|int $orderId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/dbw/orders/{orderId}/meta/gtin', [
            'orderId' => $orderId,
        ]);

        return $this->host('marketplace')->put($path, $payload, $query);
    }

}
