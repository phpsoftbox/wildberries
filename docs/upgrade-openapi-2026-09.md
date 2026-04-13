# Обновление OpenAPI Wildberries — сентябрь 2026

## Что изменилось

Добавлены 37 методов существующих секций клиента, включая 13 методов FBS.
Обновлены 13 рабочих YAML и response DTO. Полный перечень операций с HTTP-методами
и адресами — в [сверке](openapi-audit-2026-09-07.md).
WB Цифровой в это обновление не входит.

Клиент по-прежнему принимает payload и query как массивы и возвращает
`WildberriesApiResponse`, совместимый с Collection. Он не валидирует бизнес-правила
WB локально. `makeDto()` — явное преобразование ответа, а не обязательный этап запроса.

Источник обновления — зафиксированное стороннее зеркало YAML от 4 сентября 2026.
Прямая проверка через официальный портал недоступна; совпадение с live-документацией
WB на 7 сентября не подтверждено. [Исходные файлы и SHA-256](upstream/2026-09-07/manifest.json)
сохранены без изменений. В рабочих `docs/*.yaml` удалены только хвостовые пробелы.
Запросы к production API при разработке не выполнялись.

## Отгрузка FBS

Поставка — группа сборочных заданий. До передачи поставки в доставку теперь могут
потребоваться пункт, дата и способ отгрузки. По спецификации это обязательно
для поставок продавцов РФ в пункты отгрузки РФ: иначе существующий
`suppliesBySupplyIdDeliver()` может вернуть 409 с кодом `SupplyShippingRequired`.

### 1. Выбрать пункт отгрузки

```php
$points = $client->ordersFbs()->shippingPoints([
    'city' => 'Москва',
    'cargoType' => 1,
])->makeDto();

foreach ($points->shippingPoints as $point) {
    // Выберите подходящий пункт для поставки.
}
```

Оба query-параметра обязательны; `cargoType` принимает 1, 2 или 3.

### 2. Указать параметры поставок

```php
$result = $client->ordersFbs()->updateSuppliesShippingMethod([
    'data' => [
        [
            'supplyId' => $supplyId,
            'shippingDt' => '2026-09-08',
            'shippingPointId' => $shippingPointId,
            'shippingType' => 'transportCompany',
        ],
    ],
])->makeDto();

foreach ($result->results as $item) {
    if ($item->success !== true) {
        // Не продолжайте отгрузку этой поставки без обработки ошибки.
        // $item->supplyId; $item->error?->code; $item->error?->detail.
        continue;
    }

    // Параметры этой поставки приняты WB.
}
```

В `data` допускается 1–100 поставок. `shippingDt` — строка даты `YYYY-MM-DD`,
`shippingPointId` — целое число; `shippingType` — `selfShipping` или `transportCompany`.
HTTP 200 означает, что batch обработан, но не гарантирует успех каждого элемента.
Частичные ошибки не превращаются клиентом в общее исключение — проверьте `results`.

### 3. Передать ЭТрН для транспортной компании

```php
$result = $client->ordersFbs()->updateSuppliesWaybill([
    'data' => [
        ['supplyId' => $supplyId, 'waybillUuid' => $waybillUuid],
    ],
])->makeDto();
```

`waybillUuid` — UUID электронной транспортной накладной. Сначала должен быть установлен
способ `transportCompany`; batch также содержит 1–100 элементов, с отдельным результатом
для каждой поставки. При переключении на `selfShipping` WB сбрасывает ЭТрН;
если вернуться к транспортной компании, передайте UUID повторно.

Изменять параметры можно до сканирования поставки и коробов в пункте отгрузки.
После успешной настройки применяется прежний `suppliesBySupplyIdDeliver($supplyId)`.

### СПОТ, архив и автовозвраты

- `countriesOksm()` — справочник стран ОКСМ.
- `setSupplySpot($supplyId, $payload)` — данные перевозчика и транспорта.
  Обязательны `carrierTaxNumber`, `carrierName`, `carrierCountryCode` и
  `vehicleRegistrationNumber`; `trailerRegistrationNumber` необязателен.
  Код страны — строка из трёх цифр, например `'643'`. Успех — 204 без тела.
- `suppliesSpot($payload)` — получить данные и состояние СПОТ для нескольких поставок.
- `supplySpotSticker($supplyId)` — QR-код СПОТ. Учитывайте `spotAvailable` у поставки
  и готовность данных СПОТ перед запросом кода.
- `ordersArchive($query)` — архив сборочных заданий.
- `autoreturnSettings()` / `updateAutoreturnSettings($payload)` — настройки продавца.
- `autoreturnItems($payload)` / `updateAutoreturnItems($payload)` — настройки товаров.
- `autoreturnRestrictedSubcategories()` — предметы, которые не хранятся на складах WB.

Точные структуры payload/query для этих методов находятся в [рабочем YAML FBS](03-orders-fbs.yaml).

## Остальные новые методы

| Секция | Методы |
| --- | --- |
| `general()` | `tariffConstructorOptions()` |
| `products()` | `recommendationsList()`, `recommendationsSet()`, `uploadTaskB2bWholesale()` |
| `ordersDbw()` | `dbwOrdersStatusDeliver()`, `dbwOrdersMetaDetails()`, `dbwOrdersMetaDelete()`, `dbwOrdersMetaSgtin()` |
| `ordersDbs()` | `dbsOrdersFinalPrice()`, `dbsOrdersMetaDetails()` |
| `inStorePickup()` | `clickCollectOrdersFinalPrice()`, `clickCollectOrdersMetaDetails()`, `clickCollectOrdersMetaCustomsDeclaration()` |
| `promotion()` | `config()`, `normqueryBids()` |
| `analytics()` | `stocksReportSellerWarehouses()`, `itemRating()`, `orderFeed()` |
| `finances()` | `salesReportsList()`, `salesReportsDetailedByReportId()`, `salesReportsDetailed()`, `acquiringList()`, `acquiringDetailedByReportId()`, `acquiringDetailed()` |

GET-методы принимают `$query`; POST/PATCH/PUT — `$payload`, затем `$query`.
Если в URL есть ID, он идёт первым аргументом и имеет тип `string|int`.
Клиент экранирует ID как сегмент URL. Host выбирается секцией автоматически.

## Переход со старых методов

33 метода, отсутствующие в скачанном срезе, помечены PHPDoc `@deprecated`, но не удалены.
Они продолжают отправлять запрос на прежний URL. Отсутствие метода в YAML
не является доказательством отключения endpoint на сервере, но и не гарантирует его доступности.

| Старый метод / группа | Направление перехода |
| --- | --- |
| DBW `dbwOrdersByOrderIdAssemble()` | `dbwOrdersStatusDeliver()` |
| DBW `dbwOrdersByOrderIdMetaGet()` | `dbwOrdersMetaDetails()` |
| DBW `dbwOrdersByOrderIdMetaDelete()` | `dbwOrdersMetaDelete()` |
| DBW `dbwOrdersByOrderIdMetaSgtin()` | `dbwOrdersMetaSgtin()` |
| DBS `dbsOrdersStatus()` | `dbsOrdersStatusInfo()` |
| DBS `dbsOrdersByOrderId{Cancel,Confirm,Deliver,Receive,Reject}()` | Соответствующий `dbsOrdersStatus{Cancel,Confirm,Deliver,Receive,Reject}()` |
| DBS `dbsOrdersMetaInfo()` и `dbsOrdersByOrderIdMetaGet()` | `dbsOrdersMetaDetails()` |
| DBS `dbsOrdersByOrderIdMeta{Delete,Sgtin,Uin,Imei,Gtin}()` | Соответствующий `dbsOrdersMeta{Delete,Sgtin,Uin,Imei,Gtin}()` |
| Самовывоз `clickCollectOrdersStatus()` | `clickCollectOrdersStatusInfo()` |
| Самовывоз `clickCollectOrdersByOrderId{Confirm,Prepare,Receive,Reject,Cancel}()` | Соответствующий `clickCollectOrdersStatus{Confirm,Prepare,Receive,Reject,Cancel}()` |
| Самовывоз `clickCollectOrdersMetaInfo()` и `clickCollectOrdersByOrderIdMetaGet()` | `clickCollectOrdersMetaDetails()` |
| Самовывоз `clickCollectOrdersByOrderIdMeta{Delete,Sgtin,Uin,Imei,Gtin}()` | Соответствующий `clickCollectOrdersMeta{Delete,Sgtin,Uin,Imei,Gtin}()` |
| Финансы `supplierReportDetailByPeriod()` | Новые `salesReports*()` на finance-host |
| Отчёты `analyticsBannedProductsShadowed()` | Проверить `analytics()->itemRating()` с `onlyShadowedNms` |
| Отчёты `supplierStocks()` | Выбрать подходящий отчёт об остатках под необходимые данные; универсальной равноценной замены не заявляем |

Фигурные скобки в таблице сокращают перечисление имён, это не PHP-синтаксис вызова.
Для batch-замен нужно адаптировать тело, разбор результатов и ошибки отдельных элементов.
Нельзя просто заменить имя старого метода и оставить аргументы. Финансовые отчёты также
требуют проверки периода, структуры ответа и пагинации. `meta/details` возвращает
идентификаторы маркировки вместе со статусами их проверки.

Для воспроизводимой генерации legacy-операции и необходимые схемы сохранены в `docs/legacy/`.
Генератор автоматически подмешивает файл с тем же basename к рабочему YAML;
при совпадении метода/пути или имени схемы побеждает текущая спецификация.
Не удаляйте compatibility-файлы, пока остаются соответствующие публичные методы.

## Изменения DTO и генератора

- Namespace разделов `Dto\Products`, `Dto\OrdersDbs`, `Dto\Tariffs` сохранён,
  несмотря на upstream-имена `items`, `dbs`, `rates`.
- Имена отдельных DTO изменились вслед за схемами и operationId WB.
  [Таблица перехода](dto-upgrade-2026-09.md) содержит 157 изменений класса по операции.
  Проверьте явные импорты, type hints, `instanceof` и `makeDto(SomeDto::class)`.
- У `Supply` появились `shippingDt`, `shippingPointId`, `shippingType`, `waybillUuid`,
  `spotAvailable`, `isPickupPointShipmentAllowed` и `recommendedWhId`.
  `fromArray()` остаётся предпочтительным способом создания DTO: список аргументов
  сгенерированных конструкторов может меняться при обновлении схем.
- Корневой JSON-массив теперь правильно заполняет `$dto->value`. Передавайте его
  в `fromArray()` как есть, без искусственной обёртки `['value' => $items]`.
  Настоящее поле `value` внутри JSON-объекта не изменило смысл.
- Успешный ответ без JSON больше не получает DTO ошибки из 400/401/default.
  Для 204 достаточно `all() === []`; `makeDto()` создаёт пустой response DTO.
- Неизвестные поля объектов по-прежнему сохраняются в `extra`; вложенные inline-объекты
  без отдельных DTO остаются массивами согласно возможностям генератора.

Последние два исправления находятся в `phpsoftbox/code-generator`. При публикации
сначала выпустите обновлённый CodeGenerator, затем обновите dev-зависимость в среде,
где генерируются DTO Wildberries. Runtime-потребителю CodeGenerator не нужен:
готовые DTO входят в пакет. В этой работе vendor и Composer lock не изменялись.

## Sandbox и retry

`WildberriesApiBasesEnum::sandbox()` дополнен адресами Supplies, Advert, Feedbacks и
Statistics из скачанной спецификации. Всего настроено семь sandbox-хостов.
Это не гарантия поддержки каждого production-метода песочницей. Отдельный
`14-sandbox.yaml` оставлен прежним: новая версия специальной sandbox-спецификации не получена.

Retry-политика не менялась: только фактически полученный 429, с существующими
лимитами числа попыток и времени ожидания. Новые PATCH-методы используют тот же
транспорт и воспроизводят полное тело при повторе. Ответ 409, включая
`SupplyShippingRequired`, не повторяется автоматически.

## Что проверить в приложении после обновления

1. Настраивать отгрузку перед `suppliesBySupplyIdDeliver()` там, где это требует WB.
2. Обрабатывать результаты каждой поставки в batch, даже при HTTP 200.
3. Перевести используемые deprecated-методы на нужные новые контракты.
4. Проверить явные DTO-типы по таблице перехода и корневые JSON-массивы.
5. Запустить интеграционные тесты со своими правами токена, payload и лимитами.

Внешние приложения этим обновлением не изменялись.

## Проверка реализации

Проверки выполнены в контейнере с PHP 8.5.9, без доступа к сети:

- Wildberries: 122 теста, 1446 assertions; CodeGenerator: 11 тестов, 27 assertions.
- Все 37 новых методов проверены на host, HTTP-метод, query, payload и экранирование ID.
- Все 33 legacy wrapper-а проверены на сохранение прежнего запроса и наличие `@deprecated`.
- Проверены частичные batch-ошибки, новые поля Supply, повтор PATCH после 429,
  отсутствие повтора 409, 204 без DTO ошибки и корневой массив финансовых отчётов.
- Повторная сверка: 294 из 294 текущих production-операций покрыты wrapper-ами и DTO-map.
- Повторная генерация с локальным CodeGenerator и форматирование воспроизводят
  525 DTO и response-map (334 записи, включая legacy и специальный sandbox).
- CS-check Wildberries и затронутых PHP-файлов CodeGenerator проходит;
  контрольные суммы 14 исходных YAML совпадают с manifest.
