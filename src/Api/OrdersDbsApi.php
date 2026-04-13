<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\Api;

use PhpSoftBox\Wildberries\WildberriesApiResponse;

final class OrdersDbsApi extends WildberriesApiSection
{
    /**
     * Получить список новых сборочных заданий
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbsOrdersNew(array $query = []): WildberriesApiResponse
    {

        return $this->host('marketplace')->get('/api/v3/dbs/orders/new', $query);
    }

    /**
     * Получить информацию о завершенных сборочных заданиях
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbsOrders(array $query = []): WildberriesApiResponse
    {

        return $this->host('marketplace')->get('/api/v3/dbs/orders', $query);
    }

    /**
     * Получить информацию о платной доставке
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbsGroupsInfo(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('marketplace')->post('/api/v3/dbs/groups/info', $payload, $query);
    }

    /**
     * Информация о покупателе
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbsOrdersClient(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('marketplace')->post('/api/v3/dbs/orders/client', $payload, $query);
    }

    /**
     * Информация о покупателе B2B
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbsOrdersB2bInfo(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('marketplace')->post('/api/marketplace/v3/dbs/orders/b2b/info', $payload, $query);
    }

    /**
     * Дата и время доставки
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbsOrdersDeliveryDate(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('marketplace')->post('/api/v3/dbs/orders/delivery-date', $payload, $query);
    }

    /**
     * Получить статусы сборочных заданий
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbsOrdersStatusInfo(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('marketplace')->post('/api/marketplace/v3/dbs/orders/status/info', $payload, $query);
    }

    /**
     * Отменить сборочные задания
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbsOrdersStatusCancel(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('marketplace')->post('/api/marketplace/v3/dbs/orders/status/cancel', $payload, $query);
    }

    /**
     * Перевести сборочные задания на сборку
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbsOrdersStatusConfirm(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('marketplace')->post('/api/marketplace/v3/dbs/orders/status/confirm', $payload, $query);
    }

    /**
     * Получить стикеры для сборочных заданий с доставкой в ПВЗ
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbsOrdersStickers(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('marketplace')->post('/api/marketplace/v3/dbs/orders/stickers', $payload, $query);
    }

    /**
     * Перевести сборочные задания в доставку
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbsOrdersStatusDeliver(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('marketplace')->post('/api/marketplace/v3/dbs/orders/status/deliver', $payload, $query);
    }

    /**
     * Сообщить о получении заказов
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbsOrdersStatusReceive(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('marketplace')->post('/api/marketplace/v3/dbs/orders/status/receive', $payload, $query);
    }

    /**
     * Сообщить об отказе от заказов
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbsOrdersStatusReject(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('marketplace')->post('/api/marketplace/v3/dbs/orders/status/reject', $payload, $query);
    }

    /**
     * Получить статусы сборочных заданий
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbsOrdersStatus(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('marketplace')->post('/api/v3/dbs/orders/status', $payload, $query);
    }

    /**
     * Отменить сборочное задание
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbsOrdersByOrderIdCancel(string|int $orderId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/dbs/orders/{orderId}/cancel', [
            'orderId' => $orderId,
        ]);

        return $this->host('marketplace')->patch($path, $payload, $query);
    }

    /**
     * Перевести на сборку
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbsOrdersByOrderIdConfirm(string|int $orderId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/dbs/orders/{orderId}/confirm', [
            'orderId' => $orderId,
        ]);

        return $this->host('marketplace')->patch($path, $payload, $query);
    }

    /**
     * Перевести в доставку
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbsOrdersByOrderIdDeliver(string|int $orderId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/dbs/orders/{orderId}/deliver', [
            'orderId' => $orderId,
        ]);

        return $this->host('marketplace')->patch($path, $payload, $query);
    }

    /**
     * Сообщить, что заказ принят покупателем
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbsOrdersByOrderIdReceive(string|int $orderId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/dbs/orders/{orderId}/receive', [
            'orderId' => $orderId,
        ]);

        return $this->host('marketplace')->patch($path, $payload, $query);
    }

    /**
     * Сообщить, что покупатель отказался от заказа
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbsOrdersByOrderIdReject(string|int $orderId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/dbs/orders/{orderId}/reject', [
            'orderId' => $orderId,
        ]);

        return $this->host('marketplace')->patch($path, $payload, $query);
    }

    /**
     * Получить метаданные сборочных заданий
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbsOrdersMetaInfo(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('marketplace')->post('/api/marketplace/v3/dbs/orders/meta/info', $payload, $query);
    }

    /**
     * Удалить метаданные сборочных заданий
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbsOrdersMetaDelete(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('marketplace')->post('/api/marketplace/v3/dbs/orders/meta/delete', $payload, $query);
    }

    /**
     * Закрепить коды маркировки за сборочными заданиями
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbsOrdersMetaSgtin(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('marketplace')->post('/api/marketplace/v3/dbs/orders/meta/sgtin', $payload, $query);
    }

    /**
     * Закрепить УИН за сборочными заданиями
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbsOrdersMetaUin(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('marketplace')->post('/api/marketplace/v3/dbs/orders/meta/uin', $payload, $query);
    }

    /**
     * Закрепить IMEI за сборочными заданиями
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbsOrdersMetaImei(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('marketplace')->post('/api/marketplace/v3/dbs/orders/meta/imei', $payload, $query);
    }

    /**
     * Закрепить GTIN за сборочными заданиями
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbsOrdersMetaGtin(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('marketplace')->post('/api/marketplace/v3/dbs/orders/meta/gtin', $payload, $query);
    }

    /**
     * Закрепить за сборочными заданиями номер ГТД
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbsOrdersMetaCustomsDeclaration(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('marketplace')->post('/api/marketplace/v3/dbs/orders/meta/customs-declaration', $payload, $query);
    }

    /**
     * Получить метаданные сборочного задания
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbsOrdersByOrderIdMetaGet(string|int $orderId, array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/dbs/orders/{orderId}/meta', [
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
    public function dbsOrdersByOrderIdMetaDelete(string|int $orderId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/dbs/orders/{orderId}/meta', [
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
    public function dbsOrdersByOrderIdMetaSgtin(string|int $orderId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/dbs/orders/{orderId}/meta/sgtin', [
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
    public function dbsOrdersByOrderIdMetaUin(string|int $orderId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/dbs/orders/{orderId}/meta/uin', [
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
    public function dbsOrdersByOrderIdMetaImei(string|int $orderId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/dbs/orders/{orderId}/meta/imei', [
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
    public function dbsOrdersByOrderIdMetaGtin(string|int $orderId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/dbs/orders/{orderId}/meta/gtin', [
            'orderId' => $orderId,
        ]);

        return $this->host('marketplace')->put($path, $payload, $query);
    }

}
