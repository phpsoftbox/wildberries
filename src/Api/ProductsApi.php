<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\Api;

use PhpSoftBox\Wildberries\WildberriesApiResponse;

final class ProductsApi extends WildberriesApiSection
{
    /**
     * Родительские категории товаров
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function objectParentAll(array $query = []): WildberriesApiResponse
    {

        return $this->host('content')->get('/content/v2/object/parent/all', $query);
    }

    /**
     * Список предметов
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function objectAll(array $query = []): WildberriesApiResponse
    {

        return $this->host('content')->get('/content/v2/object/all', $query);
    }

    /**
     * Характеристики предмета
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function objectCharcsBySubjectId(string|int $subjectId, array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/content/v2/object/charcs/{subjectId}', [
            'subjectId' => $subjectId,
        ]);

        return $this->host('content')->get($path, $query);
    }

    /**
     * Цвет
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function directoryColors(array $query = []): WildberriesApiResponse
    {

        return $this->host('content')->get('/content/v2/directory/colors', $query);
    }

    /**
     * Пол
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function directoryKinds(array $query = []): WildberriesApiResponse
    {

        return $this->host('content')->get('/content/v2/directory/kinds', $query);
    }

    /**
     * Страна производства
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function directoryCountries(array $query = []): WildberriesApiResponse
    {

        return $this->host('content')->get('/content/v2/directory/countries', $query);
    }

    /**
     * Сезон
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function directorySeasons(array $query = []): WildberriesApiResponse
    {

        return $this->host('content')->get('/content/v2/directory/seasons', $query);
    }

    /**
     * Ставка НДС
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function directoryVat(array $query = []): WildberriesApiResponse
    {

        return $this->host('content')->get('/content/v2/directory/vat', $query);
    }

    /**
     * ТНВЭД-код
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function directoryTnved(array $query = []): WildberriesApiResponse
    {

        return $this->host('content')->get('/content/v2/directory/tnved', $query);
    }

    /**
     * Бренды
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function brands(array $query = []): WildberriesApiResponse
    {

        return $this->host('content')->get('/api/content/v1/brands', $query);
    }

    /**
     * Список ярлыков
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function tags(array $query = []): WildberriesApiResponse
    {

        return $this->host('content')->get('/content/v2/tags', $query);
    }

    /**
     * Создание ярлыка
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function tag(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('content')->post('/content/v2/tag', $payload, $query);
    }

    /**
     * Изменение ярлыка
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function tagByIdPatch(string|int $id, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/content/v2/tag/{id}', [
            'id' => $id,
        ]);

        return $this->host('content')->patch($path, $payload, $query);
    }

    /**
     * Удаление ярлыка
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function tagByIdDelete(string|int $id, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/content/v2/tag/{id}', [
            'id' => $id,
        ]);

        return $this->host('content')->delete($path, $payload, $query);
    }

    /**
     * Управление ярлыками в карточке товара
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function tagNomenclatureLink(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('content')->post('/content/v2/tag/nomenclature/link', $payload, $query);
    }

    /**
     * Список карточек товаров
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function getCardsList(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('content')->post('/content/v2/get/cards/list', $payload, $query);
    }

    /**
     * Список несозданных карточек товаров с ошибками
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function cardsErrorList(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('content')->post('/content/v2/cards/error/list', $payload, $query);
    }

    /**
     * Редактирование карточек товаров
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function cardsUpdate(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('content')->post('/content/v2/cards/update', $payload, $query);
    }

    /**
     * Объединение и разъединение карточек товаров
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function cardsMoveNm(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('content')->post('/content/v2/cards/moveNm', $payload, $query);
    }

    /**
     * Перенос карточек товаров в корзину
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function cardsDeleteTrash(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('content')->post('/content/v2/cards/delete/trash', $payload, $query);
    }

    /**
     * Восстановление карточек товаров из корзины
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function cardsRecover(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('content')->post('/content/v2/cards/recover', $payload, $query);
    }

    /**
     * Список карточек товаров в корзине
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function getCardsTrash(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('content')->post('/content/v2/get/cards/trash', $payload, $query);
    }

    /**
     * Лимиты карточек товаров
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function cardsLimits(array $query = []): WildberriesApiResponse
    {

        return $this->host('content')->get('/content/v2/cards/limits', $query);
    }

    /**
     * Генерация баркодов
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function barcodes(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('content')->post('/content/v2/barcodes', $payload, $query);
    }

    /**
     * Создание карточек товаров
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function cardsUpload(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('content')->post('/content/v2/cards/upload', $payload, $query);
    }

    /**
     * Создание карточек товаров с присоединением
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function cardsUploadAdd(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('content')->post('/content/v2/cards/upload/add', $payload, $query);
    }

    /**
     * Загрузить медиафайл
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function mediaFile(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('content')->post('/content/v3/media/file', $payload, $query);
    }

    /**
     * Загрузить медиафайлы по ссылкам
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function mediaSave(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('content')->post('/content/v3/media/save', $payload, $query);
    }

    /**
     * Установить цены и скидки
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function uploadTask(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('discountsPrices')->post('/api/v2/upload/task', $payload, $query);
    }

    /**
     * Установить цены для размеров
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function uploadTaskSize(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('discountsPrices')->post('/api/v2/upload/task/size', $payload, $query);
    }

    /**
     * Установить скидки WB Клуба
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function uploadTaskClubDiscount(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('discountsPrices')->post('/api/v2/upload/task/club-discount', $payload, $query);
    }

    /**
     * Состояние обработанной загрузки
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function historyTasks(array $query = []): WildberriesApiResponse
    {

        return $this->host('discountsPrices')->get('/api/v2/history/tasks', $query);
    }

    /**
     * Детализация обработанной загрузки
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function historyGoodsTask(array $query = []): WildberriesApiResponse
    {

        return $this->host('discountsPrices')->get('/api/v2/history/goods/task', $query);
    }

    /**
     * Состояние необработанной загрузки
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function bufferTasks(array $query = []): WildberriesApiResponse
    {

        return $this->host('discountsPrices')->get('/api/v2/buffer/tasks', $query);
    }

    /**
     * Детализация необработанной загрузки
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function bufferGoodsTask(array $query = []): WildberriesApiResponse
    {

        return $this->host('discountsPrices')->get('/api/v2/buffer/goods/task', $query);
    }

    /**
     * Получить товары с ценами
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function listGoodsFilterGet(array $query = []): WildberriesApiResponse
    {

        return $this->host('discountsPrices')->get('/api/v2/list/goods/filter', $query);
    }

    /**
     * Получить товары с ценами по артикулам
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function listGoodsFilterPost(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('discountsPrices')->post('/api/v2/list/goods/filter', $payload, $query);
    }

    /**
     * Получить размеры товара с ценами
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function listGoodsSizeNm(array $query = []): WildberriesApiResponse
    {

        return $this->host('discountsPrices')->get('/api/v2/list/goods/size/nm', $query);
    }

    /**
     * Получить товары в карантине
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function quarantineGoods(array $query = []): WildberriesApiResponse
    {

        return $this->host('discountsPrices')->get('/api/v2/quarantine/goods', $query);
    }

    /**
     * Обновить остатки товаров
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function stocksByWarehouseIdPut(string|int $warehouseId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/stocks/{warehouseId}', [
            'warehouseId' => $warehouseId,
        ]);

        return $this->host('marketplace')->put($path, $payload, $query);
    }

    /**
     * Удалить остатки товаров
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function stocksByWarehouseIdDelete(string|int $warehouseId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/stocks/{warehouseId}', [
            'warehouseId' => $warehouseId,
        ]);

        return $this->host('marketplace')->delete($path, $payload, $query);
    }

    /**
     * Получить остатки товаров
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function stocksByWarehouseIdPost(string|int $warehouseId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/stocks/{warehouseId}', [
            'warehouseId' => $warehouseId,
        ]);

        return $this->host('marketplace')->post($path, $payload, $query);
    }

    /**
     * Получить список складов WB
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function offices(array $query = []): WildberriesApiResponse
    {

        return $this->host('marketplace')->get('/api/v3/offices', $query);
    }

    /**
     * Получить список складов продавца
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function warehousesGet(array $query = []): WildberriesApiResponse
    {

        return $this->host('marketplace')->get('/api/v3/warehouses', $query);
    }

    /**
     * Создать склад продавца
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function warehousesPost(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('marketplace')->post('/api/v3/warehouses', $payload, $query);
    }

    /**
     * Обновить склад продавца
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function warehousesByWarehouseIdPut(string|int $warehouseId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/warehouses/{warehouseId}', [
            'warehouseId' => $warehouseId,
        ]);

        return $this->host('marketplace')->put($path, $payload, $query);
    }

    /**
     * Удалить склад продавца
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function warehousesByWarehouseIdDelete(string|int $warehouseId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/warehouses/{warehouseId}', [
            'warehouseId' => $warehouseId,
        ]);

        return $this->host('marketplace')->delete($path, $payload, $query);
    }

    /**
     * Список контактов
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbwWarehousesByWarehouseIdContactsGet(string|int $warehouseId, array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/dbw/warehouses/{warehouseId}/contacts', [
            'warehouseId' => $warehouseId,
        ]);

        return $this->host('marketplace')->get($path, $query);
    }

    /**
     * Обновить список контактов
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function dbwWarehousesByWarehouseIdContactsPut(string|int $warehouseId, array $payload = [], array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v3/dbw/warehouses/{warehouseId}/contacts', [
            'warehouseId' => $warehouseId,
        ]);

        return $this->host('marketplace')->put($path, $payload, $query);
    }

}
