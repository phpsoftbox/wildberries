<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\Api;

use PhpSoftBox\Wildberries\WildberriesApiBasesEnum;
use PhpSoftBox\Wildberries\WildberriesApiResponse;

final class OrdersFbsApi extends WildberriesApiSection
{
    /**
     * Получить список складов, для которых требуется пропуск
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function passesOffices(array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Marketplace)->get('/api/v3/passes/offices', $query);
    }

    /**
     * Получить список пропусков
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function passes(array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Marketplace)->get('/api/v3/passes', $query);
    }

    /**
     * Создать пропуск
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function createPass(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Marketplace)->post('/api/v3/passes', $payload, $query);
    }

    /**
     * Обновить пропуск
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function passesByPassIdPut(string|int $passId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/passes/{passId}', [
            'passId' => $passId,
        ]);

        return $this->host(WildberriesApiBasesEnum::Marketplace)->put($path, $payload, $query);
    }

    /**
     * Удалить пропуск
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function passesByPassIdDelete(string|int $passId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/passes/{passId}', [
            'passId' => $passId,
        ]);

        return $this->host(WildberriesApiBasesEnum::Marketplace)->delete($path, $payload, $query);
    }

    /**
     * Получить список новых сборочных заданий
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function ordersNew(array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Marketplace)->get('/api/v3/orders/new', $query);
    }

    /**
     * Получить информацию о сборочных заданиях
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function orders(array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Marketplace)->get('/api/v3/orders', $query);
    }

    /**
     * Получить статусы сборочных заданий
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function ordersStatus(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Marketplace)->post('/api/v3/orders/status', $payload, $query);
    }

    /**
     * Получить все сборочные задания для повторной отгрузки
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function suppliesOrdersReshipment(array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Marketplace)->get('/api/v3/supplies/orders/reshipment', $query);
    }

    /**
     * Отменить сборочное задание
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function ordersByOrderIdCancel(string|int $orderId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/orders/{orderId}/cancel', [
            'orderId' => $orderId,
        ]);

        return $this->host(WildberriesApiBasesEnum::Marketplace)->patch($path, $payload, $query);
    }

    /**
     * Получить стикеры сборочных заданий
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function ordersStickers(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Marketplace)->post('/api/v3/orders/stickers', $payload, $query);
    }

    /**
     * Получить метаданные сборочных заданий
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function ordersMeta(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Marketplace)->post('/api/marketplace/v3/orders/meta', $payload, $query);
    }

    /**
     * Удалить метаданные сборочного задания
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function ordersByOrderIdMeta(string|int $orderId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/orders/{orderId}/meta', [
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
     */
    public function ordersByOrderIdMetaSgtin(string|int $orderId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/orders/{orderId}/meta/sgtin', [
            'orderId' => $orderId,
        ]);

        return $this->host(WildberriesApiBasesEnum::Marketplace)->put($path, $payload, $query);
    }

    /**
     * Закрепить за сборочным заданием УИН
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function ordersByOrderIdMetaUin(string|int $orderId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/orders/{orderId}/meta/uin', [
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
     */
    public function ordersByOrderIdMetaImei(string|int $orderId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/orders/{orderId}/meta/imei', [
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
     */
    public function ordersByOrderIdMetaGtin(string|int $orderId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/orders/{orderId}/meta/gtin', [
            'orderId' => $orderId,
        ]);

        return $this->host(WildberriesApiBasesEnum::Marketplace)->put($path, $payload, $query);
    }

    /**
     * Закрепить за сборочным заданием срок годности товара
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function ordersByOrderIdMetaExpiration(string|int $orderId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/orders/{orderId}/meta/expiration', [
            'orderId' => $orderId,
        ]);

        return $this->host(WildberriesApiBasesEnum::Marketplace)->put($path, $payload, $query);
    }

    /**
     * Закрепить за сборочным заданием номер ГТД
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function ordersByOrderIdMetaCustomsDeclaration(string|int $orderId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/marketplace/v3/orders/{orderId}/meta/customs-declaration', [
            'orderId' => $orderId,
        ]);

        return $this->host(WildberriesApiBasesEnum::Marketplace)->put($path, $payload, $query);
    }

    /**
     * Получить стикеры сборочных заданий кроссбордера
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function ordersStickersCrossBorder(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Marketplace)->post('/api/v3/orders/stickers/cross-border', $payload, $query);
    }

    /**
     * История статусов для сборочных заданий кроссбордера
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function ordersStatusHistory(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Marketplace)->post('/api/v3/orders/status/history', $payload, $query);
    }

    /**
     * Заказы с информацией по клиенту
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function ordersClient(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Marketplace)->post('/api/v3/orders/client', $payload, $query);
    }

    /**
     * Создать новую поставку
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function suppliesPost(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Marketplace)->post('/api/v3/supplies', $payload, $query);
    }

    /**
     * Получить список поставок
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function suppliesGet(array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Marketplace)->get('/api/v3/supplies', $query);
    }

    /**
     * Добавить сборочные задания к поставке
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function suppliesBySupplyIdOrders(string|int $supplyId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/marketplace/v3/supplies/{supplyId}/orders', [
            'supplyId' => $supplyId,
        ]);

        return $this->host(WildberriesApiBasesEnum::Marketplace)->patch($path, $payload, $query);
    }

    /**
     * Получить информацию о поставке
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function suppliesBySupplyIdGet(string|int $supplyId, array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/supplies/{supplyId}', [
            'supplyId' => $supplyId,
        ]);

        return $this->host(WildberriesApiBasesEnum::Marketplace)->get($path, $query);
    }

    /**
     * Удалить поставку
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function suppliesBySupplyIdDelete(string|int $supplyId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/supplies/{supplyId}', [
            'supplyId' => $supplyId,
        ]);

        return $this->host(WildberriesApiBasesEnum::Marketplace)->delete($path, $payload, $query);
    }

    /**
     * Получить ID сборочных заданий поставки
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function suppliesBySupplyIdOrderIds(string|int $supplyId, array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/marketplace/v3/supplies/{supplyId}/order-ids', [
            'supplyId' => $supplyId,
        ]);

        return $this->host(WildberriesApiBasesEnum::Marketplace)->get($path, $query);
    }

    /**
     * Передать поставку в доставку
     *
     * Для поставок продавца РФ в пункт РФ сначала задайте параметры через
     * updateSuppliesShippingMethod(); иначе WB может вернуть 409 SupplyShippingRequired.
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function suppliesBySupplyIdDeliver(string|int $supplyId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/supplies/{supplyId}/deliver', [
            'supplyId' => $supplyId,
        ]);

        return $this->host(WildberriesApiBasesEnum::Marketplace)->patch($path, $payload, $query);
    }

    /**
     * Получить QR-код поставки
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function suppliesBySupplyIdBarcode(string|int $supplyId, array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/supplies/{supplyId}/barcode', [
            'supplyId' => $supplyId,
        ]);

        return $this->host(WildberriesApiBasesEnum::Marketplace)->get($path, $query);
    }

    /**
     * Получить список коробов поставки
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function suppliesBySupplyIdTrbxGet(string|int $supplyId, array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/supplies/{supplyId}/trbx', [
            'supplyId' => $supplyId,
        ]);

        return $this->host(WildberriesApiBasesEnum::Marketplace)->get($path, $query);
    }

    /**
     * Добавить короба к поставке
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function suppliesBySupplyIdTrbxPost(string|int $supplyId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/supplies/{supplyId}/trbx', [
            'supplyId' => $supplyId,
        ]);

        return $this->host(WildberriesApiBasesEnum::Marketplace)->post($path, $payload, $query);
    }

    /**
     * Удалить короба из поставки
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function suppliesBySupplyIdTrbxDelete(string|int $supplyId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/supplies/{supplyId}/trbx', [
            'supplyId' => $supplyId,
        ]);

        return $this->host(WildberriesApiBasesEnum::Marketplace)->delete($path, $payload, $query);
    }

    /**
     * Получить стикеры коробов поставки
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function suppliesBySupplyIdTrbxStickers(string|int $supplyId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/supplies/{supplyId}/trbx/stickers', [
            'supplyId' => $supplyId,
        ]);

        return $this->host(WildberriesApiBasesEnum::Marketplace)->post($path, $payload, $query);
    }

    /**
     * Получить список пунктов отгрузки поставок.
     *
     * В $query обязательны city и cargoType (1, 2 или 3).
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function shippingPoints(array $query = []): WildberriesApiResponse
    {
        return $this->host(WildberriesApiBasesEnum::Marketplace)->get('/api/marketplace/v3/fbs/shipping-points', $query);
    }

    /**
     * Установить параметры отгрузки поставок.
     *
     * $payload['data']: 1–100 поставок с supplyId, shippingDt, shippingPointId и shippingType.
     * Проверяйте results каждого элемента: HTTP 200 допускает частичные ошибки.
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function updateSuppliesShippingMethod(array $payload = [], array $query = []): WildberriesApiResponse
    {
        return $this->host(WildberriesApiBasesEnum::Marketplace)->patch('/api/marketplace/v3/fbs/supplies/shipping-method', $payload, $query);
    }

    /**
     * Установить ID ЭТрН поставок.
     *
     * $payload['data']: 1–100 пар supplyId и waybillUuid; требуется transportCompany.
     * Проверяйте results каждого элемента: HTTP 200 допускает частичные ошибки.
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function updateSuppliesWaybill(array $payload = [], array $query = []): WildberriesApiResponse
    {
        return $this->host(WildberriesApiBasesEnum::Marketplace)->patch('/api/marketplace/v3/fbs/supplies/waybill', $payload, $query);
    }

    /**
     * Получить список стран ОКСМ.
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function countriesOksm(array $query = []): WildberriesApiResponse
    {
        return $this->host(WildberriesApiBasesEnum::Marketplace)->get('/api/marketplace/v3/fbs/dictionaries/countries/oksm', $query);
    }

    /**
     * Добавить данные СПОТ в поставку.
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function setSupplySpot(string|int $supplyId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/marketplace/v3/fbs/supplies/{supplyId}/spot', [
            'supplyId' => $supplyId,
        ]);

        return $this->host(WildberriesApiBasesEnum::Marketplace)->put($path, $payload, $query);
    }

    /**
     * Получить данные СПОТ для списка поставок.
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function suppliesSpot(array $payload = [], array $query = []): WildberriesApiResponse
    {
        return $this->host(WildberriesApiBasesEnum::Marketplace)->post('/api/marketplace/v3/fbs/supplies/spot/list', $payload, $query);
    }

    /**
     * Получить QR-код СПОТ.
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function supplySpotSticker(string|int $supplyId, array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/marketplace/v3/fbs/supplies/{supplyId}/stickers/spot', [
            'supplyId' => $supplyId,
        ]);

        return $this->host(WildberriesApiBasesEnum::Marketplace)->get($path, $query);
    }

    /**
     * Получить список архивных сборочных заданий.
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function ordersArchive(array $query = []): WildberriesApiResponse
    {
        return $this->host(WildberriesApiBasesEnum::Marketplace)->get('/api/marketplace/v3/fbs/orders/archive', $query);
    }

    /**
     * Получить настройки автовозврата продавца.
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function autoreturnSettings(array $query = []): WildberriesApiResponse
    {
        return $this->host(WildberriesApiBasesEnum::Marketplace)->get('/api/marketplace/v3/fbs/settings/autoreturns', $query);
    }

    /**
     * Обновить настройки автовозврата продавца.
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function updateAutoreturnSettings(array $payload = [], array $query = []): WildberriesApiResponse
    {
        return $this->host(WildberriesApiBasesEnum::Marketplace)->patch('/api/marketplace/v3/fbs/settings/autoreturns', $payload, $query);
    }

    /**
     * Получить настройки автовозврата товаров.
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function autoreturnItems(array $payload = [], array $query = []): WildberriesApiResponse
    {
        return $this->host(WildberriesApiBasesEnum::Marketplace)->post('/api/marketplace/v3/fbs/settings/autoreturns/items', $payload, $query);
    }

    /**
     * Обновить настройки автовозврата товаров.
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function updateAutoreturnItems(array $payload = [], array $query = []): WildberriesApiResponse
    {
        return $this->host(WildberriesApiBasesEnum::Marketplace)->patch('/api/marketplace/v3/fbs/settings/autoreturns/items', $payload, $query);
    }

    /**
     * Получить предметы, которые не хранятся на складах WB.
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function autoreturnRestrictedSubcategories(array $query = []): WildberriesApiResponse
    {
        return $this->host(WildberriesApiBasesEnum::Marketplace)->get('/api/marketplace/v3/fbs/settings/autoreturns/subcategories/restricted', $query);
    }
}
