<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\Api;

use PhpSoftBox\Wildberries\WildberriesApiBasesEnum;
use PhpSoftBox\Wildberries\WildberriesApiResponse;

final class GeneralApi extends WildberriesApiSection
{
    /**
     * Проверка подключения
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function ping(array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Common)->get('/ping', $query);
    }

    /**
     * Получение новостей портала продавцов
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function communicationsNews(array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Common)->get('/api/communications/v2/news', $query);
    }

    /**
     * Получить информацию о продавце
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function sellerInfo(array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Common)->get('/api/v1/seller-info', $query);
    }

    /**
     * Получить рейтинг продавца
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function commonRating(array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Feedbacks)->get('/api/common/v1/rating', $query);
    }

    /**
     * Получить информацию о подписке Джем
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function commonSubscriptions(array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::Common)->get('/api/common/v1/subscriptions', $query);
    }

    /**
     * Создать приглашение для нового пользователя
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function invite(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::UserManagement)->post('/api/v1/invite', $payload, $query);
    }

    /**
     * Получить список активных или приглашённых пользователей продавца
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function users(array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::UserManagement)->get('/api/v1/users', $query);
    }

    /**
     * Изменить права доступа пользователей
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function usersAccess(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::UserManagement)->put('/api/v1/users/access', $payload, $query);
    }

    /**
     * Удалить пользователя
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function user(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host(WildberriesApiBasesEnum::UserManagement)->delete('/api/v1/user', $payload, $query);
    }

    /**
     * Получить информацию об опциях Конструктора тарифов.
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function tariffConstructorOptions(array $query = []): WildberriesApiResponse
    {
        return $this->host(WildberriesApiBasesEnum::Common)->get('/api/common/v1/tariff-constructor/options', $query);
    }
}
