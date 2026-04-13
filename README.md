# PhpSoftBox Wildberries

## About
`phpsoftbox/wildberries` — API-клиент Wildberries на базе PSR-18.

Компонент включает:
- `WildberriesApiClient` с поддержкой нескольких API-хостов;
- универсальные HTTP-методы `get/post/put/patch/delete/request`;
- секции API, сгенерированные из OpenAPI (`general`, `products`, `ordersFbs`, `ordersDbw`, `ordersDbs`, `inStorePickup`, `ordersFbw`, `promotion`, `communications`, `tariffs`, `analytics`, `reports`, `finances`);
- ответы в `WildberriesApiResponse`, совместимом с `PhpSoftBox\Collection\Collection`;
- `WildberriesApiResponse::makeDto()` для явного преобразования ответа в DTO;
- `WildberriesException` со статусом и payload.

## Quick Start
```php
use PhpSoftBox\Http\Message\RequestFactory;
use PhpSoftBox\Http\Message\StreamFactory;
use PhpSoftBox\Wildberries\WildberriesApiClient;

$client = new WildberriesApiClient(
    token: $_ENV['WILDBERRIES_API_TOKEN'],
    httpClient: $psr18Client,
    requestFactory: new RequestFactory(),
    streamFactory: new StreamFactory(),
    authorizationScheme: 'Bearer',
);

// Низкоуровневый вызов
$stocks = $client->marketplace()->get('/api/v3/orders/new');

// Вызов через секцию API
$parents = $client->products()->objectParentAll();
```

## DTO ответы
Wrapper-методы остаются совместимыми с `Collection`. Если для endpoint-а есть сгенерированный DTO, его можно получить явно:

```php
$parents = $client->products()->objectParentAll()->makeDto();
```

Для низкоуровневых вызовов работает та же карта DTO:

```php
$response = $client->marketplace()
    ->put('/api/v3/orders/123/meta/gtin', ['gtin' => '04601234567890'])
    ->makeDto();
```

## Генерация DTO
DTO генерируются из локальных OpenAPI YAML файлов в `docs/`:

```bash
vendor/bin/psb wildberries:openapi:generate-dto
```

Команда обновляет `src/Dto` и `src/Dto/WildberriesResponseDtoMap.php`. Wrapper-классы не меняются: основной контракт остается `WildberriesApiResponse`/`Collection`, а DTO создаются явно через `makeDto()`.
