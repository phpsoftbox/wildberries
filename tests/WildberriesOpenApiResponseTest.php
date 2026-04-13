<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\Tests;

use PhpSoftBox\Http\Message\Response;
use PhpSoftBox\Wildberries\Api\FinancesApi;
use PhpSoftBox\Wildberries\Api\OrdersFbsApi;
use PhpSoftBox\Wildberries\Dto\Finances\Api\Finance\PostV1SalesReportsListResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Marketplace\UpdateSuppliesResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Supplies\Supply;
use PhpSoftBox\Wildberries\Retry\RateLimitRetryOptions;
use PhpSoftBox\Wildberries\Tests\Support\CreatesWildberriesClient;
use PhpSoftBox\Wildberries\Tests\Support\RecordingSleeper;
use PhpSoftBox\Wildberries\WildberriesApiResponse;
use PhpSoftBox\Wildberries\WildberriesException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\CoversMethod;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

use function json_encode;

use const JSON_THROW_ON_ERROR;

#[CoversClass(OrdersFbsApi::class)]
#[CoversClass(FinancesApi::class)]
#[CoversClass(UpdateSuppliesResponse::class)]
#[CoversClass(Supply::class)]
#[CoversMethod(WildberriesApiResponse::class, 'makeDto')]
final class WildberriesOpenApiResponseTest extends TestCase
{
    use CreatesWildberriesClient;

    /**
     * Сохраняет частичный успех batch-запроса и код с описанием ошибки другой поставки.
     *
     * @see OrdersFbsApi::updateSuppliesShippingMethod()
     * @see OrdersFbsApi::updateSuppliesWaybill()
     * @see WildberriesApiResponse::makeDto()
     */
    #[Test]
    #[DataProvider('batchMethods')]
    public function hydratesPartialBatchResult(string $method): void
    {
        [$client] = $this->createClient(new Response(200, [], '{"results":[{"supplyId":"WB-1","success":true},{"supplyId":"WB-2","error":{"code":1001,"detail":"Supply not found"}}],"futureField":true}'));

        $dto = $client->ordersFbs()->{$method}(['data' => []])->makeDto();

        self::assertInstanceOf(UpdateSuppliesResponse::class, $dto);
        self::assertCount(2, $dto->results);
        self::assertSame('WB-1', $dto->results[0]->supplyId);
        self::assertTrue($dto->results[0]->success);
        self::assertNull($dto->results[0]->error);
        self::assertSame('WB-2', $dto->results[1]->supplyId);
        self::assertNull($dto->results[1]->success);
        self::assertSame(1001, $dto->results[1]->error?->code);
        self::assertSame('Supply not found', $dto->results[1]->error?->detail);
        self::assertSame(['futureField' => true], $dto->extra);
    }

    /** @return iterable<string, array{string}> */
    public static function batchMethods(): iterable
    {
        yield 'shipping method' => ['updateSuppliesShippingMethod'];
        yield 'waybill' => ['updateSuppliesWaybill'];
    }

    /**
     * Повторяет PATCH после 429 с полным исходным телом даже после чтения stream транспортом.
     *
     * @see OrdersFbsApi::updateSuppliesShippingMethod()
     */
    #[Test]
    public function retriesShippingMethodWithCompleteBody(): void
    {
        $sleeper = new RecordingSleeper();

        [$client, $httpClient] = $this->createClient(
            [new Response(429, ['X-RateLimit-Retry' => '2'], '{"message":"Limit"}'), new Response(200, [], '{"results":[]}')],
            rateLimitRetry: new RateLimitRetryOptions(sleeper: $sleeper),
            consumeRequestBodies: true,
        );
        $payload = ['data' => [['supplyId' => 'WB-1', 'shippingDt' => '2026-09-08', 'shippingPointId' => 42, 'shippingType' => 'selfShipping']]];

        $client->ordersFbs()->updateSuppliesShippingMethod($payload, ['locale' => 'ru']);

        $body = json_encode($payload, JSON_THROW_ON_ERROR);
        self::assertSame([$body, $body], $httpClient->requestBodies());
        self::assertSame([2.0], $sleeper->delays());
        self::assertCount(2, $httpClient->requests());
        [$first, $second] = $httpClient->requests();
        self::assertSame('PATCH', $second->getMethod());
        self::assertSame((string) $first->getUri(), (string) $second->getUri());
        self::assertSame($first->getHeaders(), $second->getHeaders());
    }

    /**
     * Новые параметры поставки доступны в типизированных свойствах, включая false и nullable ЭТрН.
     *
     * @see OrdersFbsApi::suppliesBySupplyIdGet()
     * @see Supply::fromArray()
     */
    #[Test]
    public function hydratesSupplyShippingFields(): void
    {
        [$client] = $this->createClient(new Response(200, [], '{"id":"WB-1","shippingDt":"2026-09-08","shippingPointId":42,"shippingType":"selfShipping","waybillUuid":null,"spotAvailable":false,"isPickupPointShipmentAllowed":true,"recommendedWhId":11}'));

        $dto = $client->ordersFbs()->suppliesBySupplyIdGet('WB-1')->makeDto();

        self::assertInstanceOf(Supply::class, $dto);
        self::assertSame('2026-09-08', $dto->shippingDt);
        self::assertSame(42, $dto->shippingPointId);
        self::assertSame('selfShipping', $dto->shippingType);
        self::assertNull($dto->waybillUuid);
        self::assertFalse($dto->spotAvailable);
        self::assertTrue($dto->isPickupPointShipmentAllowed);
        self::assertSame(11, $dto->recommendedWhId);
        self::assertSame([], $dto->extra);
    }

    /**
     * Ответ 204 установки СПОТ остаётся пустым и не гидратируется в DTO ошибки.
     *
     * @see OrdersFbsApi::setSupplySpot()
     */
    #[Test]
    public function acceptsSpotNoContentResponse(): void
    {
        [$client] = $this->createClient(new Response(204));

        $response = $client->ordersFbs()->setSupplySpot('WB-1', ['carrierCountryCode' => '643']);

        self::assertSame([], $response->all());
        self::assertSame(['extra' => []], (array) $response->makeDto());
    }

    /**
     * Не повторяет 409 SupplyShippingRequired и сохраняет причину отказа при отправке поставки.
     *
     * @see OrdersFbsApi::suppliesBySupplyIdDeliver()
     */
    #[Test]
    public function preservesShippingRequiredConflict(): void
    {
        [$client, $httpClient] = $this->createClient(new Response(409, [], '{"code":"SupplyShippingRequired","message":"Shipping parameters required"}'));

        try {
            $client->ordersFbs()->suppliesBySupplyIdDeliver('WB-1');
            self::fail('Expected a shipping parameters conflict.');
        } catch (WildberriesException $exception) {
            self::assertSame(409, $exception->statusCode());
            self::assertSame('SupplyShippingRequired', $exception->payload()['code']);
        }
        self::assertCount(1, $httpClient->requests());
    }

    /**
     * Гидратирует корневой список финансовых отчётов без искусственного поля value в JSON WB.
     *
     * @see FinancesApi::salesReportsList()
     * @see WildberriesApiResponse::makeDto()
     */
    #[Test]
    public function hydratesTopLevelFinanceList(): void
    {
        [$client] = $this->createClient(new Response(200, [], '[{"reportId":42,"retailAmountSum":"100.25"},{"reportId":43,"currency":"RUB"}]'));

        $dto = $client->finances()->salesReportsList()->makeDto();

        self::assertInstanceOf(PostV1SalesReportsListResponse::class, $dto);
        self::assertCount(2, $dto->value);
        self::assertSame(42, $dto->value[0]->reportId);
        self::assertSame('100.25', $dto->value[0]->retailAmountSum);
        self::assertSame(43, $dto->value[1]->reportId);
        self::assertSame([], $dto->extra);
    }
}
