<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\Api;

use PhpSoftBox\Wildberries\WildberriesApiBasesEnum;
use PhpSoftBox\Wildberries\WildberriesApiResponse;

final class InStorePickupApi extends WildberriesApiSection
{
    /**
     * Получить список новых сборочных заданий
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function clickCollectOrdersNew(array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Marketplace)->get('/api/v3/click-collect/orders/new', $query);
    }

    /**
     * Перевести сборочные задания на сборку
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function clickCollectOrdersStatusConfirm(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Marketplace)->post('/api/marketplace/v3/click-collect/orders/status/confirm', $payload, $query);
    }

    /**
     * Сообщить, что сборочные задания готовы к выдаче
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function clickCollectOrdersStatusPrepare(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Marketplace)->post('/api/marketplace/v3/click-collect/orders/status/prepare', $payload, $query);
    }

    /**
     * Перевести на сборку
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     *
     * @deprecated Операция отсутствует в срезе OpenAPI 2026-09-07; см. docs/upgrade-openapi-2026-09.md.
     */
    public function clickCollectOrdersByOrderIdConfirm(string|int $orderId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/click-collect/orders/{orderId}/confirm', [
            'orderId' => $orderId,
        ]);

        return $this->host(WildberriesApiBasesEnum::Marketplace)->patch($path, $payload, $query);
    }

    /**
     * Сообщить, что сборочное задание готово к выдаче
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     *
     * @deprecated Операция отсутствует в срезе OpenAPI 2026-09-07; см. docs/upgrade-openapi-2026-09.md.
     */
    public function clickCollectOrdersByOrderIdPrepare(string|int $orderId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/click-collect/orders/{orderId}/prepare', [
            'orderId' => $orderId,
        ]);

        return $this->host(WildberriesApiBasesEnum::Marketplace)->patch($path, $payload, $query);
    }

    /**
     * Информация о покупателе
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function clickCollectOrdersClient(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Marketplace)->post('/api/v3/click-collect/orders/client', $payload, $query);
    }

    /**
     * Проверить, что заказ принадлежит покупателю
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function clickCollectOrdersClientIdentity(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Marketplace)->post('/api/v3/click-collect/orders/client/identity', $payload, $query);
    }

    /**
     * Сообщить, что заказы приняты покупателями
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function clickCollectOrdersStatusReceive(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Marketplace)->post('/api/marketplace/v3/click-collect/orders/status/receive', $payload, $query);
    }

    /**
     * Сообщить об отказе от заказов
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function clickCollectOrdersStatusReject(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Marketplace)->post('/api/marketplace/v3/click-collect/orders/status/reject', $payload, $query);
    }

    /**
     * Сообщить, что заказ принят покупателем
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     *
     * @deprecated Операция отсутствует в срезе OpenAPI 2026-09-07; см. docs/upgrade-openapi-2026-09.md.
     */
    public function clickCollectOrdersByOrderIdReceive(string|int $orderId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/click-collect/orders/{orderId}/receive', [
            'orderId' => $orderId,
        ]);

        return $this->host(WildberriesApiBasesEnum::Marketplace)->patch($path, $payload, $query);
    }

    /**
     * Сообщить, что покупатель отказался от заказа
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     *
     * @deprecated Операция отсутствует в срезе OpenAPI 2026-09-07; см. docs/upgrade-openapi-2026-09.md.
     */
    public function clickCollectOrdersByOrderIdReject(string|int $orderId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/click-collect/orders/{orderId}/reject', [
            'orderId' => $orderId,
        ]);

        return $this->host(WildberriesApiBasesEnum::Marketplace)->patch($path, $payload, $query);
    }

    /**
     * Получить статусы сборочных заданий
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function clickCollectOrdersStatusInfo(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Marketplace)->post('/api/marketplace/v3/click-collect/orders/status/info', $payload, $query);
    }

    /**
     * Получить статусы сборочных заданий
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     *
     * @deprecated Операция отсутствует в срезе OpenAPI 2026-09-07; см. docs/upgrade-openapi-2026-09.md.
     */
    public function clickCollectOrdersStatus(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Marketplace)->post('/api/v3/click-collect/orders/status', $payload, $query);
    }

    /**
     * Получить информацию о завершённых сборочных заданиях
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function clickCollectOrders(array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Marketplace)->get('/api/v3/click-collect/orders', $query);
    }

    /**
     * Отменить сборочные задания
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function clickCollectOrdersStatusCancel(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Marketplace)->post('/api/marketplace/v3/click-collect/orders/status/cancel', $payload, $query);
    }

    /**
     * Отменить сборочное задание
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     *
     * @deprecated Операция отсутствует в срезе OpenAPI 2026-09-07; см. docs/upgrade-openapi-2026-09.md.
     */
    public function clickCollectOrdersByOrderIdCancel(string|int $orderId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/click-collect/orders/{orderId}/cancel', [
            'orderId' => $orderId,
        ]);

        return $this->host(WildberriesApiBasesEnum::Marketplace)->patch($path, $payload, $query);
    }

    /**
     * Получить метаданные сборочных заданий
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     *
     * @deprecated Операция отсутствует в срезе OpenAPI 2026-09-07; см. docs/upgrade-openapi-2026-09.md.
     */
    public function clickCollectOrdersMetaInfo(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Marketplace)->post('/api/marketplace/v3/click-collect/orders/meta/info', $payload, $query);
    }

    /**
     * Удалить метаданные сборочных заданий
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function clickCollectOrdersMetaDelete(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Marketplace)->post('/api/marketplace/v3/click-collect/orders/meta/delete', $payload, $query);
    }

    /**
     * Закрепить коды маркировки товара за сборочными заданиями
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function clickCollectOrdersMetaSgtin(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Marketplace)->post('/api/marketplace/v3/click-collect/orders/meta/sgtin', $payload, $query);
    }

    /**
     * Закрепить УИН за сборочными заданиями
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function clickCollectOrdersMetaUin(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Marketplace)->post('/api/marketplace/v3/click-collect/orders/meta/uin', $payload, $query);
    }

    /**
     * Закрепить IMEI за сборочными заданиями
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function clickCollectOrdersMetaImei(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Marketplace)->post('/api/marketplace/v3/click-collect/orders/meta/imei', $payload, $query);
    }

    /**
     * Закрепить GTIN за сборочными заданиями
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function clickCollectOrdersMetaGtin(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Marketplace)->post('/api/marketplace/v3/click-collect/orders/meta/gtin', $payload, $query);
    }

    /**
     * Получить метаданные сборочного задания
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     *
     * @deprecated Операция отсутствует в срезе OpenAPI 2026-09-07; см. docs/upgrade-openapi-2026-09.md.
     */
    public function clickCollectOrdersByOrderIdMetaGet(string|int $orderId, array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/click-collect/orders/{orderId}/meta', [
            'orderId' => $orderId,
        ]);

        return $this->host(WildberriesApiBasesEnum::Marketplace)->get($path, $query);
    }

    /**
     * Удалить метаданные сборочного задания
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     *
     * @deprecated Операция отсутствует в срезе OpenAPI 2026-09-07; см. docs/upgrade-openapi-2026-09.md.
     */
    public function clickCollectOrdersByOrderIdMetaDelete(string|int $orderId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/click-collect/orders/{orderId}/meta', [
            'orderId' => $orderId,
        ]);

        return $this->host(WildberriesApiBasesEnum::Marketplace)->delete($path, $payload, $query);
    }

    /**
     * Закрепить за сборочным заданием код маркировки товара
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     *
     * @deprecated Операция отсутствует в срезе OpenAPI 2026-09-07; см. docs/upgrade-openapi-2026-09.md.
     */
    public function clickCollectOrdersByOrderIdMetaSgtin(string|int $orderId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/click-collect/orders/{orderId}/meta/sgtin', [
            'orderId' => $orderId,
        ]);

        return $this->host(WildberriesApiBasesEnum::Marketplace)->put($path, $payload, $query);
    }

    /**
     * Закрепить за сборочным заданием УИН (уникальный идентификационный номер)
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     *
     * @deprecated Операция отсутствует в срезе OpenAPI 2026-09-07; см. docs/upgrade-openapi-2026-09.md.
     */
    public function clickCollectOrdersByOrderIdMetaUin(string|int $orderId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/click-collect/orders/{orderId}/meta/uin', [
            'orderId' => $orderId,
        ]);

        return $this->host(WildberriesApiBasesEnum::Marketplace)->put($path, $payload, $query);
    }

    /**
     * Закрепить за сборочным заданием IMEI
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     *
     * @deprecated Операция отсутствует в срезе OpenAPI 2026-09-07; см. docs/upgrade-openapi-2026-09.md.
     */
    public function clickCollectOrdersByOrderIdMetaImei(string|int $orderId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/click-collect/orders/{orderId}/meta/imei', [
            'orderId' => $orderId,
        ]);

        return $this->host(WildberriesApiBasesEnum::Marketplace)->put($path, $payload, $query);
    }

    /**
     * Закрепить за сборочным заданием GTIN
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     *
     * @deprecated Операция отсутствует в срезе OpenAPI 2026-09-07; см. docs/upgrade-openapi-2026-09.md.
     */
    public function clickCollectOrdersByOrderIdMetaGtin(string|int $orderId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/click-collect/orders/{orderId}/meta/gtin', [
            'orderId' => $orderId,
        ]);

        return $this->host(WildberriesApiBasesEnum::Marketplace)->put($path, $payload, $query);
    }

    /**
     * Получить цены продавца и суммы к оплате.
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function clickCollectOrdersFinalPrice(array $payload = [], array $query = []): WildberriesApiResponse
    {
        return $this->host(WildberriesApiBasesEnum::Marketplace)->post('/api/marketplace/v3/click-collect/orders/final-price', $payload, $query);
    }

    /**
     * Получить идентификаторы маркировки сборочных заданий.
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function clickCollectOrdersMetaDetails(array $payload = [], array $query = []): WildberriesApiResponse
    {
        return $this->host(WildberriesApiBasesEnum::Marketplace)->post('/api/marketplace/v3/click-collect/orders/meta/details', $payload, $query);
    }

    /**
     * Закрепить номера ДТ за сборочными заданиями.
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function clickCollectOrdersMetaCustomsDeclaration(array $payload = [], array $query = []): WildberriesApiResponse
    {
        return $this->host(WildberriesApiBasesEnum::Marketplace)->post('/api/marketplace/v3/click-collect/orders/meta/customs-declaration', $payload, $query);
    }
}
