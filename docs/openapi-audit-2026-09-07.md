# Сверка OpenAPI Wildberries — 7 сентября 2026

Обновление реализовано: добавлены 37 методов текущих секций, обновлены DTO и
sandbox-хосты; 33 старых метода оставлены с `@deprecated` и compatibility-схемами.
См. [инструкцию перехода](upgrade-openapi-2026-09.md) и [изменения DTO](dto-upgrade-2026-09.md).
Ниже сохранён исходный отчёт о состоянии **до реализации**, относительно указанного
baseline commit. Оговорка о неподтверждённой свежести зеркала остаётся в силе.

## Результат и границы проверки

В текущих 13 production-секциях клиента отсутствуют **37 операций**, из них **13 в FBS**.
Ещё **33 wrapper-метода** присутствуют в клиенте, но отсутствуют в скачанном срезе OpenAPI.
Для отдельного API **WB Цифровой** найдено ещё **22 операции**; в число 37 они не входят.

Это сверка исходного кода и спецификации. Работоспособность удалённых endpoint-ов
не проверялась запросами к API. Отсутствие операции в YAML само по себе не доказывает,
что WB уже отключил её на сервере.

### Откуда получены файлы

Прямой доступ к [порталу WB](https://dev.wildberries.ru/openapi/orders-fbs) и
[официальному YAML FBS](https://dev.wildberries.ru/api/swagger/yaml/ru/03-orders-fbs.yaml?region=ru)
7 сентября возвращал **HTTP 498** с проверкой браузера. Подключить браузер в текущей среде
не удалось из-за ошибки запуска browser runtime.

Поэтому скачан **предварительный срез из стороннего зеркала**, а не подтверждённая
актуальная выгрузка портала:

- источник: [eslazarev/wildberries-sdk, каталог specs](https://github.com/eslazarev/wildberries-sdk/tree/73600ac34dd8fb6436e706fc5bd4a5db9b883aac/specs);
- зафиксированный commit: `73600ac34dd8fb6436e706fc5bd4a5db9b883aac` от **4 сентября 2026, 03:06:47 UTC**;
- скачано **14 YAML**: 13 production-разделов и WB Цифровой;
- [локальная копия и контрольные суммы](upstream/2026-09-07/manifest.json);
- [машиночитаемые результаты сравнения](upstream/2026-09-07/audit.json).

Совпадение этих файлов с официальным порталом на 7 сентября **не подтверждено**.
Перед реализацией следует перепроверить срез через доступный официальный портал.
YAML сохранены в `docs/upstream/2026-09-07/`: они не заменяют рабочие `docs/*.yaml`
и не попадают в стандартный glob генератора DTO.

Для sandbox свежая отдельная спецификация не получена. Имеющийся
`docs/14-sandbox.yaml` и специальные методы `SandboxApi` в сверку полноты не входят.

### Как считали

База сравнения — commit компонента `a5d424758f6efaccdfa969bd03106ba73dbe1309`.
Операции сравнивались по **production-host + HTTP-методу + шаблону пути**, а не по
`operationId` или имени PHP-метода. Sandbox-host того же endpoint-а не считается
ещё одним wrapper-методом. Параметры пути сопоставлялись независимо от их имени.

Проверены все **290 production-wrapper-методов** в `src/Api`.
В новом срезе соответствующих разделов — **294 операции**:
**257 покрыты + 37 отсутствуют**. Число 294 не включает WB Цифровой и sandbox.

| Раздел | Wrapper-ов сейчас | Операций в срезе | Добавить | Старых операций нет в срезе |
| --- | ---: | ---: | ---: | ---: |
| Общее | 9 | 10 | 1 | 0 |
| Товары | 49 | 52 | 3 | 0 |
| FBS | 34 | 47 | 13 | 0 |
| DBW | 16 | 16 | 4 | 4 |
| DBS | 32 | 21 | 2 | 13 |
| Самовывоз | 28 | 18 | 3 | 13 |
| FBW | 7 | 7 | 0 | 0 |
| Продвижение | 37 | 39 | 2 | 0 |
| Общение | 25 | 25 | 0 | 0 |
| Тарифы | 5 | 5 | 0 | 0 |
| Аналитика | 17 | 20 | 3 | 0 |
| Отчёты | 25 | 23 | 0 | 2 |
| Финансы | 6 | 11 | 6 | 1 |
| **Итого** | **290** | **294** | **37** | **33** |

## FBS: 13 отсутствующих методов

Все операции ниже используют `marketplace-api.wildberries.ru`.
Источник — [скачанный YAML FBS](upstream/2026-09-07/03-orders-fbs.yaml).
Имена PHP-методов в таблице — предложение для реализации, сейчас их в клиенте нет.

| HTTP | Путь | Назначение | Предлагаемый метод OrdersFbsApi |
| --- | --- | --- | --- |
| GET | `/api/marketplace/v3/fbs/shipping-points` | Получить список пунктов отгрузки поставок | `shippingPoints()` |
| PATCH | `/api/marketplace/v3/fbs/supplies/shipping-method` | Установить параметры отгрузки поставок | `updateSuppliesShippingMethod()` |
| PATCH | `/api/marketplace/v3/fbs/supplies/waybill` | Установить ID ЭТрН поставок | `updateSuppliesWaybill()` |
| GET | `/api/marketplace/v3/fbs/dictionaries/countries/oksm` | Получить список стран ОКСМ | `countriesOksm()` |
| PUT | `/api/marketplace/v3/fbs/supplies/{supplyId}/spot` | Добавить данные СПОТ в поставку | `setSupplySpot()` |
| POST | `/api/marketplace/v3/fbs/supplies/spot/list` | Получить данные СПОТ для списка поставок | `suppliesSpot()` |
| GET | `/api/marketplace/v3/fbs/supplies/{supplyId}/stickers/spot` | Получить QR-код СПОТ | `supplySpotSticker()` |
| GET | `/api/marketplace/v3/fbs/orders/archive` | Получить список архивных сборочных заданий | `ordersArchive()` |
| GET | `/api/marketplace/v3/fbs/settings/autoreturns` | Получить настройки автовозврата продавца | `autoreturnSettings()` |
| PATCH | `/api/marketplace/v3/fbs/settings/autoreturns` | Обновить настройки автовозврата продавца | `updateAutoreturnSettings()` |
| POST | `/api/marketplace/v3/fbs/settings/autoreturns/items` | Получить настройки автовозврата товаров | `autoreturnItems()` |
| PATCH | `/api/marketplace/v3/fbs/settings/autoreturns/items` | Обновить настройки автовозврата товаров | `updateAutoreturnItems()` |
| GET | `/api/marketplace/v3/fbs/settings/autoreturns/subcategories/restricted` | Получить предметы, которые не хранятся на складах WB | `autoreturnRestrictedSubcategories()` |

### Приоритет: отгрузка поставки

В первую очередь добавить связанный набор:

1. `GET /api/marketplace/v3/fbs/shipping-points` — определить пункт отгрузки.
2. `PATCH /api/marketplace/v3/fbs/supplies/shipping-method` — указать параметры отгрузки.
3. `PATCH /api/marketplace/v3/fbs/supplies/waybill` — передать ID ЭТрН для транспортной компании.
4. Обновить существующий DTO `OrdersFbs\Api\Supplies\Supply` и документацию
   `suppliesBySupplyIdDeliver()`.

Новая спецификация описывает следующие условия:

- `shipping-points` требует query-параметры `city` и `cargoType` (1, 2 или 3).
- `shipping-method` принимает JSON вида `{"data": [...]}`, от 1 до 100 поставок.
  Для каждой нужны `supplyId`, `shippingDt` (дата `YYYY-MM-DD`),
  `shippingPointId` и `shippingType` (`selfShipping` или `transportCompany`).
- `waybill` также принимает `{"data": [...]}`, от 1 до 100 элементов
  с `supplyId` и `waybillUuid`. Сначала у поставки должен быть установлен
  `shippingType: transportCompany`.
- Оба PATCH-метода возвращают `results[]` с результатом **по каждой поставке**:
  `supplyId`, `success` либо `error`. HTTP 200 не означает успех всех элементов.
  Нужен DTO, сохраняющий частичные ошибки.
- При переключении `transportCompany → selfShipping` WB сбрасывает ID ЭТрН.
  При обратном переключении его необходимо передать повторно.
- Параметры можно менять до сканирования поставки и коробов в пункте отгрузки.
- У существующего `PATCH /api/v3/supplies/{supplyId}/deliver` появилось условие:
  для поставок продавцов РФ в пункты отгрузки РФ параметры отгрузки обязательны;
  иначе возвращается 409, в примерах — `SupplyShippingRequired`.
- В схеме `Supply` появились `shippingDt`, `shippingPointId`, `shippingType`,
  `waybillUuid`, `spotAvailable`. Сейчас таких свойств у DTO нет; неизвестные
  поля попадают в `extra`.

После этих трёх операций — СПОТ и ОКСМ, архив сборочных заданий, настройки
автовозврата. Для СПОТ следует учитывать `spotAvailable` и статус готовности
данных перед получением QR-кода.

## Остальные отсутствующие операции

### Общее: 1

Источник: [01-general.yaml](upstream/2026-09-07/01-general.yaml).

| HTTP | Путь | Host | Назначение |
| --- | --- | --- | --- |
| GET | `/api/common/v1/tariff-constructor/options` | `common-api.wildberries.ru` | Получить информацию об опциях Конструктора тарифов |

### Товары: 3

Источник: [02-items.yaml](upstream/2026-09-07/02-items.yaml).

| HTTP | Путь | Host | Назначение |
| --- | --- | --- | --- |
| POST | `/api/content/v1/recommendations/list` | `content-api.wildberries.ru` | Список рекомендаций в карточках товаров |
| POST | `/api/content/v1/recommendations/set` | `content-api.wildberries.ru` | Установить рекомендации для товаров |
| POST | `/api/discounts-prices/v1/upload/task/b2b/wholesale` | `discounts-prices-api.wildberries.ru` | Установить оптовые скидки для B2B-продаж |

### DBW: 4

Источник: [04-orders-dbw.yaml](upstream/2026-09-07/04-orders-dbw.yaml).

| HTTP | Путь | Host | Назначение |
| --- | --- | --- | --- |
| POST | `/api/marketplace/v3/dbw/orders/status/deliver` | `marketplace-api.wildberries.ru` | Перевести сборочные задания в доставку |
| POST | `/api/marketplace/v3/dbw/orders/meta/details` | `marketplace-api.wildberries.ru` | Получить идентификаторы маркировки сборочных заданий |
| POST | `/api/marketplace/v3/dbw/orders/meta/delete` | `marketplace-api.wildberries.ru` | Удалить идентификаторы маркировки сборочных заданий |
| POST | `/api/marketplace/v3/dbw/orders/meta/sgtin` | `marketplace-api.wildberries.ru` | Закрепить коды маркировки Честного знака за сборочными заданиями |

### DBS: 2

Источник: [05-dbs.yaml](upstream/2026-09-07/05-dbs.yaml).

| HTTP | Путь | Host | Назначение |
| --- | --- | --- | --- |
| POST | `/api/marketplace/v3/dbs/orders/final-price` | `marketplace-api.wildberries.ru` | Получить цены продавца и суммы к оплате |
| POST | `/api/marketplace/v3/dbs/orders/meta/details` | `marketplace-api.wildberries.ru` | Получить идентификаторы маркировки сборочных заданий |

### Самовывоз: 3

Источник: [06-in-store-pickup.yaml](upstream/2026-09-07/06-in-store-pickup.yaml).

| HTTP | Путь | Host | Назначение |
| --- | --- | --- | --- |
| POST | `/api/marketplace/v3/click-collect/orders/final-price` | `marketplace-api.wildberries.ru` | Получить цены продавца и суммы к оплате |
| POST | `/api/marketplace/v3/click-collect/orders/meta/details` | `marketplace-api.wildberries.ru` | Получить идентификаторы маркировки сборочных заданий |
| POST | `/api/marketplace/v3/click-collect/orders/meta/customs-declaration` | `marketplace-api.wildberries.ru` | Закрепить номера ДТ за сборочными заданиями |

### Продвижение: 2

Источник: [08-promotion.yaml](upstream/2026-09-07/08-promotion.yaml).

| HTTP | Путь | Host | Назначение |
| --- | --- | --- | --- |
| GET | `/api/advert/v1/config` | `advert-api.wildberries.ru` | Конфигурационные значения продвижения |
| POST | `/api/advert/v1/normquery/bids` | `advert-api.wildberries.ru` | Установить ставки для поисковых кластеров в валюте аккаунта продавца |

### Аналитика: 3

Источник: [11-analytics.yaml](upstream/2026-09-07/11-analytics.yaml).

| HTTP | Путь | Host | Назначение |
| --- | --- | --- | --- |
| POST | `/api/analytics/v1/stocks-report/seller-warehouses` | `seller-analytics-api.wildberries.ru` | Остатки на складах продавца |
| POST | `/api/analytics/v2/item-rating` | `seller-analytics-api.wildberries.ru` | Получить отчёт |
| POST | `/api/analytics/v1/order-feed` | `seller-analytics-api.wildberries.ru` | Получить отчёт |

### Финансы: 6

Источник: [13-finances.yaml](upstream/2026-09-07/13-finances.yaml).

| HTTP | Путь | Host | Назначение |
| --- | --- | --- | --- |
| POST | `/api/finance/v1/sales-reports/list` | `finance-api.wildberries.ru` | Список отчётов реализации |
| POST | `/api/finance/v1/sales-reports/detailed/{reportId}` | `finance-api.wildberries.ru` | Детализации к отчётам реализации по ID отчётов |
| POST | `/api/finance/v1/sales-reports/detailed` | `finance-api.wildberries.ru` | Детализации к отчётам реализации за период |
| POST | `/api/finance/v1/acquiring/list` | `finance-api.wildberries.ru` | Список отчётов об издержках на приём платежей |
| POST | `/api/finance/v1/acquiring/detailed/{reportId}` | `finance-api.wildberries.ru` | Детализации к отчётам об издержках на приём платежей по ID отчётов |
| POST | `/api/finance/v1/acquiring/detailed` | `finance-api.wildberries.ru` | Детализации к отчётам об издержках на приём платежей за период |

## Операции, отсутствующие в новом срезе

Публичные методы автоматически не удаляем и не перенаправляем:
новые batch-методы часто принимают другое тело и возвращают другую структуру ответа.
Нужны явная миграция вызовов и решение по deprecated API.

| Секция | Старый PHP-метод | Операция |
| --- | --- | --- |
| DBW | `OrdersDbwApi::dbwOrdersByOrderIdAssemble()` | `PATCH /api/v3/dbw/orders/{orderId}/assemble` |
| DBW | `OrdersDbwApi::dbwOrdersByOrderIdMetaGet()` | `GET /api/v3/dbw/orders/{orderId}/meta` |
| DBW | `OrdersDbwApi::dbwOrdersByOrderIdMetaDelete()` | `DELETE /api/v3/dbw/orders/{orderId}/meta` |
| DBW | `OrdersDbwApi::dbwOrdersByOrderIdMetaSgtin()` | `PUT /api/v3/dbw/orders/{orderId}/meta/sgtin` |
| DBS | `OrdersDbsApi::dbsOrdersStatus()` | `POST /api/v3/dbs/orders/status` |
| DBS | `OrdersDbsApi::dbsOrdersByOrderIdCancel()` | `PATCH /api/v3/dbs/orders/{orderId}/cancel` |
| DBS | `OrdersDbsApi::dbsOrdersByOrderIdConfirm()` | `PATCH /api/v3/dbs/orders/{orderId}/confirm` |
| DBS | `OrdersDbsApi::dbsOrdersByOrderIdDeliver()` | `PATCH /api/v3/dbs/orders/{orderId}/deliver` |
| DBS | `OrdersDbsApi::dbsOrdersByOrderIdReceive()` | `PATCH /api/v3/dbs/orders/{orderId}/receive` |
| DBS | `OrdersDbsApi::dbsOrdersByOrderIdReject()` | `PATCH /api/v3/dbs/orders/{orderId}/reject` |
| DBS | `OrdersDbsApi::dbsOrdersMetaInfo()` | `POST /api/marketplace/v3/dbs/orders/meta/info` |
| DBS | `OrdersDbsApi::dbsOrdersByOrderIdMetaGet()` | `GET /api/v3/dbs/orders/{orderId}/meta` |
| DBS | `OrdersDbsApi::dbsOrdersByOrderIdMetaDelete()` | `DELETE /api/v3/dbs/orders/{orderId}/meta` |
| DBS | `OrdersDbsApi::dbsOrdersByOrderIdMetaSgtin()` | `PUT /api/v3/dbs/orders/{orderId}/meta/sgtin` |
| DBS | `OrdersDbsApi::dbsOrdersByOrderIdMetaUin()` | `PUT /api/v3/dbs/orders/{orderId}/meta/uin` |
| DBS | `OrdersDbsApi::dbsOrdersByOrderIdMetaImei()` | `PUT /api/v3/dbs/orders/{orderId}/meta/imei` |
| DBS | `OrdersDbsApi::dbsOrdersByOrderIdMetaGtin()` | `PUT /api/v3/dbs/orders/{orderId}/meta/gtin` |
| Самовывоз | `InStorePickupApi::clickCollectOrdersByOrderIdConfirm()` | `PATCH /api/v3/click-collect/orders/{orderId}/confirm` |
| Самовывоз | `InStorePickupApi::clickCollectOrdersByOrderIdPrepare()` | `PATCH /api/v3/click-collect/orders/{orderId}/prepare` |
| Самовывоз | `InStorePickupApi::clickCollectOrdersByOrderIdReceive()` | `PATCH /api/v3/click-collect/orders/{orderId}/receive` |
| Самовывоз | `InStorePickupApi::clickCollectOrdersByOrderIdReject()` | `PATCH /api/v3/click-collect/orders/{orderId}/reject` |
| Самовывоз | `InStorePickupApi::clickCollectOrdersStatus()` | `POST /api/v3/click-collect/orders/status` |
| Самовывоз | `InStorePickupApi::clickCollectOrdersByOrderIdCancel()` | `PATCH /api/v3/click-collect/orders/{orderId}/cancel` |
| Самовывоз | `InStorePickupApi::clickCollectOrdersMetaInfo()` | `POST /api/marketplace/v3/click-collect/orders/meta/info` |
| Самовывоз | `InStorePickupApi::clickCollectOrdersByOrderIdMetaGet()` | `GET /api/v3/click-collect/orders/{orderId}/meta` |
| Самовывоз | `InStorePickupApi::clickCollectOrdersByOrderIdMetaDelete()` | `DELETE /api/v3/click-collect/orders/{orderId}/meta` |
| Самовывоз | `InStorePickupApi::clickCollectOrdersByOrderIdMetaSgtin()` | `PUT /api/v3/click-collect/orders/{orderId}/meta/sgtin` |
| Самовывоз | `InStorePickupApi::clickCollectOrdersByOrderIdMetaUin()` | `PUT /api/v3/click-collect/orders/{orderId}/meta/uin` |
| Самовывоз | `InStorePickupApi::clickCollectOrdersByOrderIdMetaImei()` | `PUT /api/v3/click-collect/orders/{orderId}/meta/imei` |
| Самовывоз | `InStorePickupApi::clickCollectOrdersByOrderIdMetaGtin()` | `PUT /api/v3/click-collect/orders/{orderId}/meta/gtin` |
| Отчёты | `ReportsApi::supplierStocks()` | `GET /api/v1/supplier/stocks` |
| Отчёты | `ReportsApi::analyticsBannedProductsShadowed()` | `GET /api/v1/analytics/banned-products/shadowed` |
| Финансы | `FinancesApi::supplierReportDetailByPeriod()` | `GET /api/v5/supplier/reportDetailByPeriod` |

Основные направления миграции:

- DBW: одиночные `assemble`, получение/удаление meta и установка `sgtin`
  заменяются соответствующими batch-операциями из списка добавлений.
- DBS и Самовывоз: старые одиночные операции статусов и маркировки больше
  не описаны; большая часть batch-замен уже есть в клиенте.
  Для `meta/info` требуется новый `meta/details`, который возвращает и статусы проверки.
- Финансы: старый `GET /api/v5/supplier/reportDetailByPeriod` отсутствует;
  новые отчёты используют POST на `finance-api`. Это не простая подмена URL:
  требуется адаптация параметров, структуры ответа и пагинации.
- Отчёт `banned-products/shadowed`: проверить переход на item-rating v2
  с `onlyShadowedNms`. Для `supplier/stocks` подобрать замену из отчётов
  об остатках в соответствии с нужными данными.

## Что ещё потребуется при обновлении клиента

### DTO и изменившиеся контракты

Для всех 37 отсутствующих операций сейчас нет записи в
`WildberriesResponseDtoMap`. Response DTO нужен для операций с успешным
структурированным ответом; для 204 без тела отдельный DTO не требуется.

Помимо новых URL, автоматическая сверка обнаружила **90 существующих операций**
с различиями в параметрах, request body или 2xx-response schema. Сравнение раскрывает
локальные `$ref` и исключает описания/примеры. Это список кандидатов для ревью,
а не 90 доказанных breaking changes: часть различий может быть перестановкой
элементов или эквивалентной записью схемы. Перечень — в `sections.*.changed`
[JSON-отчёта](upstream/2026-09-07/audit.json).

Одного запуска DTO-генератора недостаточно: он не добавляет wrapper-методы.
Кроме того, upstream изменил `info.x-file-name`:

| Текущее значение | Новое значение |
| --- | --- |
| `products` | `items` |
| `orders-dbs` | `dbs` |
| `tariffs` | `rates` |

`WildberriesOpenApiDtoGenerator::documentName()` берёт имя из этого поля.
Перед генерацией нужно закрепить соответствие имени спецификации существующему
namespace секции, иначе `Dto\Products`, `Dto\OrdersDbs` и `Dto\Tariffs`
могут быть переименованы. Одного сохранения старого имени файла недостаточно.

### Sandbox и лимиты

В скачанных YAML дополнительно опубликованы sandbox-хосты:
`supplies-api-sandbox`, `advert-api-sandbox`, `feedbacks-api-sandbox`,
`statistics-api-sandbox` на домене `wildberries.ru`.
Сейчас `WildberriesApiBasesEnum::sandbox()` задаёт только marketplace,
content и discounts-prices. Новые адреса стоит добавить после подтверждения
официального среза; отдельные специальные sandbox-методы остаются непроверенными.

В описаниях FBS штрафное списание квоты теперь указано для **4XX**, а не только
для 409. Это важно учесть, если будет реализовываться обсуждавшийся proactive limiter.
Существующий retry отвечает на 429; расширять его на все 4XX из этой формулировки
не следует.

### WB Цифровой — отдельное расширение

В [14-wbd.yaml](upstream/2026-09-07/14-wbd.yaml) описаны **22 операции**:
предложения, цены и статусы, контент, категории и ключи активации.
Используется новый host `devapi-digital.wildberries.ru`, которого нет в enum клиента.
Кроме JSON есть загрузка файлов и скачивание контента, поэтому это отдельная работа
по transport, авторизации, секции API и DTO. Добавлять её в обязательный объём
обновления FBS не требуется.

Полный список операций:

| HTTP | Путь | Назначение |
| --- | --- | --- |
| POST | `/api/v1/keys-api/keys` | Добавить ключи активации |
| DELETE | `/api/v1/keys-api/keys` | Удалить ключи активации |
| GET | `/api/v1/keys-api/keys/redeemed` | Получить купленные ключи |
| GET | `/api/v1/offer/keys/{offer_id}` | Получить количество ключей для предложения |
| GET | `/api/v1/offer/keys/{offer_id}/list` | Получить список ключей |
| POST | `/api/v1/offers` | Создать новое предложение |
| POST | `/api/v1/offers/thumb` | Добавить или обновить обложку предложения |
| POST | `/api/v1/offers/{offer_id}` | Редактировать предложение |
| GET | `/api/v1/offers/{offer_id}` | Получить информацию о предложении |
| GET | `/api/v1/offers/author` | Получить список своих предложений |
| POST | `/api/v1/offer/price/{offer_id}` | Обновить цену |
| POST | `/api/v1/offer/{offer_id}` | Обновить статус |
| GET | `/api/v1/catalog` | Получить категории и их подкатегории |
| POST | `/api/v1/content/illustration` | Загрузить обложку контента |
| POST | `/api/v1/content/upload/init` | Инициализировать новый контент |
| POST | `/api/v1/content/upload/chunk` | Загрузить контент (файл) |
| POST | `/api/v1/content/author/{content_id}` | Редактировать контент |
| GET | `/api/v1/content/author/{content_id}` | Получить информацию о контенте |
| GET | `/api/v1/content/author` | Получить список своего контента |
| GET | `/api/v1/content/download/{uri}` | Скачать контент |
| POST | `/api/v1/content/delete` | Удалить контент |
| POST | `/api/v1/content/gallery` | Загрузить медиафайлы для предложения |

## Рекомендуемый порядок реализации

1. Подтвердить срез официальными YAML, заменить рабочие спецификации и
   закрепить стабильные имена DTO namespace.
2. Добавить три метода отгрузки FBS, обновить Supply DTO и покрыть batch-ответ
   с частичным успехом. Проверить передачу host, метода, query, полного тела и
   сохранение существующей обработки 429.
3. Добавить оставшиеся 10 операций FBS и остальные 24 операции текущих секций.
4. Сверить изменившиеся схемы, обновить DTO и подготовить upgrade notes
   для 33 старых wrapper-методов.
5. Отдельно решить поддержку WB Цифрового и расширить sandbox-конфигурацию.

В рамках этой сверки PHP-код, wrapper-ы и DTO не изменялись.
Проверены YAML-разбор всех 14 скачанных файлов и разрешимость их локальных `$ref`;
контрольные суммы зафиксированы в manifest. Проверки API в сети не выполнялись.
