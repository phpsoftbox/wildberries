<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\Api;

use PhpSoftBox\Wildberries\WildberriesApiResponse;

final class PromotionApi extends WildberriesApiSection
{
    /**
     * Списки кампаний
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function advPromotionCount(array $query = []): WildberriesApiResponse
    {

        return $this->host('advert')->get('/adv/v1/promotion/count', $query);
    }

    /**
     * Информация о кампаниях
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function advertAdverts(array $query = []): WildberriesApiResponse
    {

        return $this->host('advert')->get('/api/advert/v2/adverts', $query);
    }

    /**
     * Минимальные ставки для карточек товаров
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function advertBidsMin(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('advert')->post('/api/advert/v1/bids/min', $payload, $query);
    }

    /**
     * Создать кампанию
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function advSeacatSaveAd(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('advert')->post('/adv/v2/seacat/save-ad', $payload, $query);
    }

    /**
     * Предметы для кампаний
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function advSupplierSubjects(array $query = []): WildberriesApiResponse
    {

        return $this->host('advert')->get('/adv/v1/supplier/subjects', $query);
    }

    /**
     * Карточки товаров для кампаний
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function advSupplierNms(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('advert')->post('/adv/v2/supplier/nms', $payload, $query);
    }

    /**
     * Удаление кампании
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function advDelete(array $query = []): WildberriesApiResponse
    {

        return $this->host('advert')->get('/adv/v0/delete', $query);
    }

    /**
     * Переименование кампании
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function advRename(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('advert')->post('/adv/v0/rename', $payload, $query);
    }

    /**
     * Запуск кампании
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function advStart(array $query = []): WildberriesApiResponse
    {

        return $this->host('advert')->get('/adv/v0/start', $query);
    }

    /**
     * Пауза кампании
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function advPause(array $query = []): WildberriesApiResponse
    {

        return $this->host('advert')->get('/adv/v0/pause', $query);
    }

    /**
     * Завершение кампании
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function advStop(array $query = []): WildberriesApiResponse
    {

        return $this->host('advert')->get('/adv/v0/stop', $query);
    }

    /**
     * Изменение мест размещения в кампаниях с ручной ставкой
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function advAuctionPlacements(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('advert')->put('/adv/v0/auction/placements', $payload, $query);
    }

    /**
     * Изменение ставок в кампаниях
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function advertBids(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('advert')->patch('/api/advert/v1/bids', $payload, $query);
    }

    /**
     * Баланс
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function advBalance(array $query = []): WildberriesApiResponse
    {

        return $this->host('advert')->get('/adv/v1/balance', $query);
    }

    /**
     * Бюджет кампании
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function advBudget(array $query = []): WildberriesApiResponse
    {

        return $this->host('advert')->get('/adv/v1/budget', $query);
    }

    /**
     * Пополнение бюджета кампании
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function advBudgetDeposit(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('advert')->post('/adv/v1/budget/deposit', $payload, $query);
    }

    /**
     * Получение истории затрат
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function advUpd(array $query = []): WildberriesApiResponse
    {

        return $this->host('advert')->get('/adv/v1/upd', $query);
    }

    /**
     * Получение истории пополнений счёта
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function advPayments(array $query = []): WildberriesApiResponse
    {

        return $this->host('advert')->get('/adv/v1/payments', $query);
    }

    /**
     * Изменение списка карточек товаров в кампаниях
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function advAuctionNms(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('advert')->patch('/adv/v0/auction/nms', $payload, $query);
    }

    /**
     * Рекомендуемые ставки для карточек товаров и поисковых кластеров
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function advertBidsRecommendations(array $query = []): WildberriesApiResponse
    {

        return $this->host('advert')->get('/api/advert/v0/bids/recommendations', $query);
    }

    /**
     * Статистика поисковых кластеров
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function advNormqueryStats(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('advert')->post('/adv/v0/normquery/stats', $payload, $query);
    }

    /**
     * Список ставок поисковых кластеров
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function advNormqueryGetBids(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('advert')->post('/adv/v0/normquery/get-bids', $payload, $query);
    }

    /**
     * Установить ставки для поисковых кластеров
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function advNormqueryBidsPost(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('advert')->post('/adv/v0/normquery/bids', $payload, $query);
    }

    /**
     * Удалить ставки поисковых кластеров
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function advNormqueryBidsDelete(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('advert')->delete('/adv/v0/normquery/bids', $payload, $query);
    }

    /**
     * Список минус-фраз кампаний
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function advNormqueryGetMinus(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('advert')->post('/adv/v0/normquery/get-minus', $payload, $query);
    }

    /**
     * Установка и удаление минус-фраз
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function advNormquerySetMinus(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('advert')->post('/adv/v0/normquery/set-minus', $payload, $query);
    }

    /**
     * Количество медиакампаний
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function advCount(array $query = []): WildberriesApiResponse
    {

        return $this->host('advertMedia')->get('/adv/v1/count', $query);
    }

    /**
     * Список медиакампаний
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function advAdverts(array $query = []): WildberriesApiResponse
    {

        return $this->host('advertMedia')->get('/adv/v1/adverts', $query);
    }

    /**
     * Информация о медиакампании
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function advAdvert(array $query = []): WildberriesApiResponse
    {

        return $this->host('advertMedia')->get('/adv/v1/advert', $query);
    }

    /**
     * Статистика кампаний
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function advFullstats(array $query = []): WildberriesApiResponse
    {

        return $this->host('advert')->get('/adv/v3/fullstats', $query);
    }

    /**
     * Статистика медиакампаний
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function advStats(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('advertMedia')->post('/adv/v1/stats', $payload, $query);
    }

    /**
     * Список акций
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function calendarPromotions(array $query = []): WildberriesApiResponse
    {

        return $this->host('dpCalendar')->get('/api/v1/calendar/promotions', $query);
    }

    /**
     * Детальная информация об акциях
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function calendarPromotionsDetails(array $query = []): WildberriesApiResponse
    {

        return $this->host('dpCalendar')->get('/api/v1/calendar/promotions/details', $query);
    }

    /**
     * Список товаров для участия в акции
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function calendarPromotionsNomenclatures(array $query = []): WildberriesApiResponse
    {

        return $this->host('dpCalendar')->get('/api/v1/calendar/promotions/nomenclatures', $query);
    }

    /**
     * Добавить товар в акцию
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function calendarPromotionsUpload(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('dpCalendar')->post('/api/v1/calendar/promotions/upload', $payload, $query);
    }

    /**
     * Списки активных и неактивных поисковых кластеров
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function advNormqueryList(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('advert')->post('/adv/v0/normquery/list', $payload, $query);
    }

    /**
     * Статистика по поисковым кластерам с детализацией по дням
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function advNormqueryStatsAlt2(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('advert')->post('/adv/v1/normquery/stats', $payload, $query);
    }

}
