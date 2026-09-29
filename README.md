# PhpSoftBox Wildberries

## About
`phpsoftbox/wildberries` — API-клиент Wildberries на базе PSR-18.

Компонент включает:
- `WildberriesApiClient` с поддержкой нескольких API-хостов;
- универсальные HTTP-методы `get/post/put/patch/delete/request`;
- секции API, сгенерированные из OpenAPI (`general`, `products`, `ordersFbs`, `ordersDbw`, `ordersDbs`, `inStorePickup`, `ordersFbw`, `promotion`, `communications`, `tariffs`, `analytics`, `reports`, `finances`);
- ответы в `WildberriesApiResponse`, совместимом с `PhpSoftBox\Collection\Collection`;
- `WildberriesApiResponse::makeDto()` для явного преобразования ответа в DTO;
- централизованные повторы безопасных запросов после HTTP 429;
- `WildberriesException` со статусом и payload.

Обновление сентября 2026: добавлены 37 методов, обновлены DTO и адреса sandbox.
Перед обновлением приложения прочитайте [инструкцию перехода](docs/upgrade-openapi-2026-09.md),
особенно про отгрузку FBS, batch-ошибки и переименования DTO.

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

## Повтор запросов после HTTP 429

Клиент автоматически обрабатывает `429 Too Many Requests` для всех HTTP-методов.
Это относится как к читающим `GET`, `HEAD` и `POST`, так и к изменяющим `POST`,
`PUT`, `PATCH` и `DELETE`. Повтор выполняется только после фактически полученного
ответа 429 от WB: сетевые ошибки, timeout и другие HTTP-статусы этот механизм не
перехватывает.

По умолчанию клиент делает не более четырёх попыток, включая первоначальный запрос.
Перед повтором он читает `X-RateLimit-Retry` как число секунд. Если заголовок
отсутствует или некорректен, используются задержки 1, 2 и 4 секунды. На каждом
следующем 429 фактическая задержка выбирается как максимальная из нового значения
заголовка и fallback-задержки текущей попытки.

Чтобы синхронный worker не блокировался на длительный cooldown, по умолчанию также
действуют два бюджета:

- одна задержка — не более 30 секунд;
- сумма задержек одного вызова клиента — не более 60 секунд.

Клиент не обрезает задержку до лимита: более ранний повтор противоречил бы значению
`X-RateLimit-Retry`. Вместо ожидания выбрасывается `WildberriesRateLimitException`,
содержащий требуемое время в `retryAfterSeconds()`, HTTP-статус 429 и payload ответа.
Это же исключение выбрасывается, если исчерпано число попыток или policy запретила
повтор. Оно наследует `WildberriesException`, поэтому существующий общий catch
продолжает работать.

Тело запроса сохраняется до первого вызова PSR-18 клиента. Для каждой попытки
создаётся новый stream, поэтому запрос повторяется с полным исходным JSON,
даже если предыдущий HTTP-вызов прочитал stream до конца.

### Настройка retry

Все параметры собраны в `RateLimitRetryOptions`:

```php
use PhpSoftBox\Wildberries\Retry\RateLimitRetryOptions;
use PhpSoftBox\Wildberries\Retry\WildberriesRetryEvent;
use PhpSoftBox\Wildberries\WildberriesApiClient;

$client = new WildberriesApiClient(
    token: $token,
    httpClient: $psr18Client,
    requestFactory: $requestFactory,
    streamFactory: $streamFactory,
    rateLimitRetry: new RateLimitRetryOptions(
        maxAttempts: 4,
        maxDelaySeconds: 30,
        maxTotalDelaySeconds: 60,
        onRetry: static function (WildberriesRetryEvent $event): void {
            // $event->attempt — номер предстоящей попытки: 2 для первого повтора.
            // Также доступны delaySeconds, method, endpoint и statusCode.
        },
    ),
);
```

`maxAttempts: 1` полностью отключает фактические повторы, сохраняя обычную обработку
ответа 429 через `WildberriesRateLimitException`. `null` вместо одного из бюджетов
отключает соответствующее ограничение. Отрицательные и бесконечные значения считаются
ошибкой конфигурации.

Длительный cooldown удобно передать планировщику без блокировки worker-а:

```php
use PhpSoftBox\Wildberries\WildberriesRateLimitException;

try {
    $result = $client->products()->tags();
} catch (WildberriesRateLimitException $exception) {
    $job->releaseAfter($exception->retryAfterSeconds());
}
```

Для тестов или интеграции с собственным механизмом ожидания можно передать реализацию
`SleeperInterface`. Она получает рассчитанную задержку в секундах, поэтому unit-тестам
не требуется ждать в реальном времени.

### Исключение запросов из retry

По умолчанию `DefaultRetryableRequestPolicy` разрешает повтор любого запроса после
429. Если отдельную операцию повторять нельзя, её можно исключить через callback:

```php
use PhpSoftBox\Wildberries\Retry\CallbackRetryableRequestPolicy;
use PhpSoftBox\Wildberries\Retry\RateLimitRetryOptions;
use Psr\Http\Message\RequestInterface;

$retry = new RateLimitRetryOptions(
    requestPolicy: new CallbackRetryableRequestPolicy(
        static fn (RequestInterface $request): bool => $request->getUri()->getPath() !== '/custom/non-retryable',
    ),
);
```

Для более сложных правил можно реализовать `RetryableRequestPolicyInterface`.
Метод `allows()` получает PSR-7 request целиком, поэтому решение может учитывать
HTTP-метод, host, path и другие признаки запроса. Policy определяет только допустимость
повтора: сам retry всё равно выполняется исключительно после HTTP 429.

## DTO ответы
Wrapper-методы остаются совместимыми с `Collection`. Если для endpoint-а есть сгенерированный DTO, его можно получить явно:

```php
$parents = $client->products()->objectParentAll()->makeDto();
```

Для низкоуровневых вызовов работает та же карта DTO:

```php
$response = $client->marketplace()
    ->get('/api/v3/supplies/WB-123')
    ->makeDto();
```

## Генерация DTO

Генератор — инструмент сопровождения пакета: ему нужны `phpsoftbox/cli-app`, `phpsoftbox/code-generator`, `symfony/yaml`
(в `suggest`, в `require` не входят). Клиенту API эти зависимости не нужны.
DTO генерируются из локальных OpenAPI YAML файлов в `docs/`:

```bash
vendor/bin/psb wildberries:openapi:generate-dto
```

Команда обновляет `src/Dto` и `src/Dto/WildberriesResponseDtoMap.php`. Wrapper-классы не меняются: основной контракт остается `WildberriesApiResponse`/`Collection`, а DTO создаются явно через `makeDto()`.

### Сверка с обновлённой OpenAPI

[Сверка от 7 сентября 2026](docs/openapi-audit-2026-09-07.md) содержит список
недостающих операций, изменений существующих контрактов и план обновления клиента.
Для сравнения скачан срез от 4 сентября из стороннего зеркала YAML WB:
прямая загрузка с официального портала возвращала HTTP 498. Источник, commit и
SHA-256 файлов зафиксированы в [manifest](docs/upstream/2026-09-07/manifest.json).

По этому срезу обновлены рабочие `docs/*.yaml`; неизменённые исходники хранятся
в `docs/upstream/2026-09-07/`. Генератор использует рабочие YAML и compatibility-схемы
из `docs/legacy/`, а не рекурсивный обход upstream. Полное совпадение с официальным
порталом на дату сверки пока не подтверждено. WB Цифровой пока не подключён.

Генерация требует обновлённого `phpsoftbox/code-generator` с исправлением корневых
JSON-массивов и выбора схемы успешного ответа; подробности — в инструкции перехода.

## Тестовый контур

Официальная песочница WB требует отдельный токен типа `Тестовый контур`.
Production-токен и sandbox-токен не взаимозаменяемы. Компонент не читает переменные
окружения и не переключает окружение автоматически: нужные адреса передаёт приложение.

```php
use PhpSoftBox\Wildberries\WildberriesApiBasesEnum;

$client = new WildberriesApiClient(
    token: $testToken,
    httpClient: $psr18Client,
    requestFactory: new RequestFactory(),
    streamFactory: new StreamFactory(),
    authorizationScheme: 'Bearer',
    apiBases: WildberriesApiBasesEnum::sandbox(),
);

$client->sandbox()->fbsOrdersMake([
    'orders' => [
        ['sku' => 'BarcodeTest123', 'amount' => 1],
    ],
]);
```

`WildberriesApiBasesEnum::sandbox()` содержит официальные адреса доступных sandbox-хостов.
При необходимости отдельные адреса по-прежнему можно переопределить через `apiBases`.

Секция `sandbox()` использует логический хост `marketplace`. Специальные FBS-методы
песочницы позволяют создать тестовые сборочные задания и эмулировать отмену, доставку,
получение, отказ, брак и закрытие поставки.

Актуальные ограничения и требования описаны в
[официальной документации тестового контура WB](https://dev.wildberries.ru/ru/openapi-other/sandbox-environment).
