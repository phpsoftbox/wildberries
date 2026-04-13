<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\Tests;

use PhpSoftBox\Http\Message\Response;
use PhpSoftBox\Wildberries\Api\SandboxApi;
use PhpSoftBox\Wildberries\Tests\Support\CreatesWildberriesClient;
use PhpSoftBox\Wildberries\WildberriesApiBasesEnum;
use PhpSoftBox\Wildberries\WildberriesApiResponse;
use PhpSoftBox\Wildberries\WildberriesException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\CoversMethod;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(SandboxApi::class)]
#[CoversClass(WildberriesApiBasesEnum::class)]
#[CoversMethod(WildberriesApiBasesEnum::class, 'sandbox')]
final class WildberriesSandboxApiTest extends TestCase
{
    use CreatesWildberriesClient;

    /**
     * Возвращает отдельную секцию служебных методов песочницы.
     *
     * @see SandboxApi::fbsOrdersMake()
     * @see WildberriesApiBasesEnum::sandbox()
     */
    #[Test]
    public function testSandboxReturnsSandboxApi(): void
    {
        [$client] = $this->createClient(new Response(204));

        self::assertInstanceOf(SandboxApi::class, $client->sandbox());
    }

    /**
     * Содержит семь sandbox-хостов, опубликованных в спецификациях.
     *
     * @see SandboxApi::fbsOrdersMake()
     * @see WildberriesApiBasesEnum::sandbox()
     */
    #[Test]
    public function testSandboxApiBasesContainOfficialHosts(): void
    {
        self::assertSame([
            'marketplace'     => 'https://marketplace-api-sandbox.wildberries.ru',
            'content'         => 'https://content-api-sandbox.wildberries.ru',
            'discountsPrices' => 'https://discounts-prices-api-sandbox.wildberries.ru',
            'feedbacks'       => 'https://feedbacks-api-sandbox.wildberries.ru',
            'supplies'        => 'https://supplies-api-sandbox.wildberries.ru',
            'advert'          => 'https://advert-api-sandbox.wildberries.ru',
            'statistics'      => 'https://statistics-api-sandbox.wildberries.ru',
        ], WildberriesApiBasesEnum::sandbox());
    }

    /**
     * Передаёт список тестовых заказов без изменения JSON.
     *
     * @see SandboxApi::fbsOrdersMake()
     * @see WildberriesApiBasesEnum::sandbox()
     */
    #[Test]
    public function testFbsOrdersMakeSendsOrdersPayload(): void
    {
        [$client, $httpClient] = $this->createClient(new Response(204));

        $client->sandbox()->fbsOrdersMake([
            'orders' => [
                ['sku' => 'BarcodeTest123', 'amount' => 1],
            ],
        ]);

        $request = $httpClient->lastRequest();
        self::assertNotNull($request);
        self::assertSame('POST', $request->getMethod());
        self::assertSame('/api/v3/test/fbs/orders/make', $request->getUri()->getPath());
        self::assertSame('{"orders":[{"sku":"BarcodeTest123","amount":1}]}', (string) $request->getBody());
    }

    /**
     * Экранирует ID отменяемого заказа и не отправляет тело.
     *
     * @see SandboxApi::fbsOrdersMake()
     * @see WildberriesApiBasesEnum::sandbox()
     */
    #[Test]
    public function testFbsOrdersDeclineEncodesOrderIdAndOmitsBody(): void
    {
        [$client, $httpClient] = $this->createClient(new Response(204));

        $client->sandbox()->fbsOrdersByOrderIdDecline('order/id');

        $request = $httpClient->lastRequest();
        self::assertNotNull($request);
        self::assertSame('PATCH', $request->getMethod());
        self::assertSame('/api/v3/test/fbs/orders/order%2Fid/decline', $request->getUri()->getPath());
        self::assertSame('', (string) $request->getBody());
    }

    /**
     * Экранирует ID поставки и передаёт все ID заказов.
     *
     * @see SandboxApi::fbsOrdersMake()
     * @see WildberriesApiBasesEnum::sandbox()
     */
    #[Test]
    public function testFbsSuppliesCloseEncodesSupplyIdAndSendsOrderIds(): void
    {
        [$client, $httpClient] = $this->createClient(new Response(204));

        $client->sandbox()->fbsSuppliesBySupplyIdClose('WB-GI-SAND/42', [
            'orderIds' => [123, 456],
        ]);

        $request = $httpClient->lastRequest();
        self::assertNotNull($request);
        self::assertSame('PATCH', $request->getMethod());
        self::assertSame('/api/v3/test/fbs/supplies/WB-GI-SAND%2F42/close', $request->getUri()->getPath());
        self::assertSame('{"orderIds":[123,456]}', (string) $request->getBody());
    }

    /**
     * Переводит тестовый заказ в доставку без тела запроса.
     *
     * @see SandboxApi::fbsOrdersMake()
     * @see WildberriesApiBasesEnum::sandbox()
     */
    #[Test]
    public function testFbsOrdersDeliverOmitsBody(): void
    {
        [$client, $httpClient] = $this->createClient(new Response(204));

        $client->sandbox()->fbsOrdersByOrderIdDeliver(123);

        $request = $httpClient->lastRequest();
        self::assertNotNull($request);
        self::assertSame('PATCH', $request->getMethod());
        self::assertSame('/api/v3/test/fbs/orders/123/deliver', $request->getUri()->getPath());
        self::assertSame('', (string) $request->getBody());
    }

    /**
     * Передаёт код получения тестового заказа.
     *
     * @see SandboxApi::fbsOrdersMake()
     * @see WildberriesApiBasesEnum::sandbox()
     */
    #[Test]
    public function testFbsOrdersReceiveSendsCode(): void
    {
        [$client, $httpClient] = $this->createClient(new Response(204));

        $client->sandbox()->fbsOrdersByOrderIdReceive(123, ['code' => 'test-code']);

        $request = $httpClient->lastRequest();
        self::assertNotNull($request);
        self::assertSame('PATCH', $request->getMethod());
        self::assertSame('/api/v3/test/fbs/orders/123/receive', $request->getUri()->getPath());
        self::assertSame('{"code":"test-code"}', (string) $request->getBody());
    }

    /**
     * Передаёт код отказа от тестового заказа.
     *
     * @see SandboxApi::fbsOrdersMake()
     * @see WildberriesApiBasesEnum::sandbox()
     */
    #[Test]
    public function testFbsOrdersRejectSendsCode(): void
    {
        [$client, $httpClient] = $this->createClient(new Response(204));

        $client->sandbox()->fbsOrdersByOrderIdReject(123, ['code' => 'test-code']);

        $request = $httpClient->lastRequest();
        self::assertNotNull($request);
        self::assertSame('PATCH', $request->getMethod());
        self::assertSame('/api/v3/test/fbs/orders/123/reject', $request->getUri()->getPath());
        self::assertSame('{"code":"test-code"}', (string) $request->getBody());
    }

    /**
     * Сообщает о дефекте тестового заказа без тела запроса.
     *
     * @see SandboxApi::fbsOrdersMake()
     * @see WildberriesApiBasesEnum::sandbox()
     */
    #[Test]
    public function testFbsOrdersDefectOmitsBody(): void
    {
        [$client, $httpClient] = $this->createClient(new Response(204));

        $client->sandbox()->fbsOrdersByOrderIdDefect(123);

        $request = $httpClient->lastRequest();
        self::assertNotNull($request);
        self::assertSame('PATCH', $request->getMethod());
        self::assertSame('/api/v3/test/fbs/orders/123/defect', $request->getUri()->getPath());
        self::assertSame('', (string) $request->getBody());
    }

    /**
     * Сохраняет настроенный заголовок авторизации для sandbox-запроса.
     *
     * @see SandboxApi::fbsOrdersMake()
     * @see WildberriesApiBasesEnum::sandbox()
     */
    #[Test]
    public function testSandboxRequestUsesConfiguredAuthorization(): void
    {
        [$client, $httpClient] = $this->createClient(new Response(204));

        $client->sandbox()->fbsOrdersByOrderIdDeliver(123);

        self::assertSame('Bearer wb-token', $httpClient->lastRequest()?->getHeaderLine('Authorization'));
    }

    /**
     * Использует sandbox-host после переопределения базовых адресов.
     *
     * @see SandboxApi::fbsOrdersMake()
     * @see WildberriesApiBasesEnum::sandbox()
     */
    #[Test]
    public function testSandboxUsesOverriddenMarketplaceBase(): void
    {
        [$client, $httpClient] = $this->createClient(
            new Response(204),
            WildberriesApiBasesEnum::sandbox(),
        );

        $client->sandbox()->fbsOrdersByOrderIdDeliver(123);

        $request = $httpClient->lastRequest();
        self::assertNotNull($request);
        self::assertSame('marketplace-api-sandbox.wildberries.ru', $request->getUri()->getHost());
    }

    /**
     * Возвращает пустую коллекцию для ответа 204 без тела.
     *
     * @see SandboxApi::fbsOrdersMake()
     * @see WildberriesApiBasesEnum::sandbox()
     */
    #[Test]
    public function testNoContentReturnsEmptyApiResponse(): void
    {
        [$client] = $this->createClient(new Response(204));

        $response = $client->sandbox()->fbsOrdersByOrderIdDeliver(123);

        self::assertInstanceOf(WildberriesApiResponse::class, $response);
        self::assertSame([], $response->all());
    }

    /**
     * Сохраняет статус 409 и исходный payload ошибки.
     *
     * @see SandboxApi::fbsOrdersMake()
     * @see WildberriesApiBasesEnum::sandbox()
     */
    #[Test]
    public function testConflictPreservesStatusAndPayload(): void
    {
        [$client] = $this->createClient(new Response(
            409,
            [],
            '{"code":"NotFound","message":"Not found","data":[{"sku":"missing"}]}',
        ));

        try {
            $client->sandbox()->fbsOrdersMake([
                'orders' => [['sku' => 'missing', 'amount' => 1]],
            ]);
            self::fail('Expected WildberriesException was not thrown.');
        } catch (WildberriesException $exception) {
            self::assertSame(409, $exception->statusCode());
            self::assertSame([
                'code'    => 'NotFound',
                'message' => 'Not found',
                'data'    => [['sku' => 'missing']],
            ], $exception->payload());
        }
    }

    /**
     * Отсутствующий payload не превращает PATCH в запрос с JSON-телом.
     *
     * @see SandboxApi::fbsOrdersMake()
     * @see WildberriesApiBasesEnum::sandbox()
     */
    #[Test]
    public function testLowLevelNullPayloadOmitsPatchBody(): void
    {
        [$client, $httpClient] = $this->createClient(new Response(204));

        $client->request('/api/v3/test', payload: null, method: 'PATCH');

        self::assertSame('', (string) $httpClient->lastRequest()?->getBody());
    }

    /**
     * Явный пустой массив отправляет JSON-массив в PATCH.
     *
     * @see SandboxApi::fbsOrdersMake()
     * @see WildberriesApiBasesEnum::sandbox()
     */
    #[Test]
    public function testLowLevelEmptyArrayPayloadKeepsPatchJsonBody(): void
    {
        [$client, $httpClient] = $this->createClient(new Response(204));

        $client->request('/api/v3/test', payload: [], method: 'PATCH');

        self::assertSame('[]', (string) $httpClient->lastRequest()?->getBody());
    }
}
