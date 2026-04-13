<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\Tests;

use PhpSoftBox\Collection\Collection;
use PhpSoftBox\Http\Message\Response;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Passes\Error as OrdersFbsErrorDto;
use PhpSoftBox\Wildberries\Dto\Products\Content\Object\GETContentV2ObjectParentAllResponse;
use PhpSoftBox\Wildberries\Tests\Support\CreatesWildberriesClient;
use PhpSoftBox\Wildberries\WildberriesApiResponse;
use PhpSoftBox\Wildberries\WildberriesException;
use PHPUnit\Framework\TestCase;

final class WildberriesApiClientHttpTest extends TestCase
{
    use CreatesWildberriesClient;

    /**
     * Проверяет базовый POST: Authorization + JSON body + Collection в ответе.
     */
    public function testPostSendsAuthorizationAndPayload(): void
    {
        [$client, $httpClient] = $this->createClient(new Response(200, [], '{"data":{"items":[]}}'));

        $result = $client->post('/api/v1/orders', [
            'limit' => 10,
        ]);

        self::assertInstanceOf(Collection::class, $result);
        self::assertSame(['items' => []], $result->get('data'));

        $request = $httpClient->lastRequest();
        self::assertNotNull($request);
        self::assertSame('Bearer wb-token', $request->getHeaderLine('Authorization'));
        self::assertStringContainsString('/api/v1/orders', (string) $request->getUri());
        self::assertStringContainsString('"limit":10', (string) $request->getBody());
    }

    /**
     * Проверяет, что response остается Collection-совместимым и может явно создать DTO через карту.
     */
    public function testResponseCanMakeDtoFromMappedEndpoint(): void
    {
        [$client] = $this->createClient(new Response(200, [], '{"data":[{"id":1,"name":"Обувь"}],"error":false,"errorText":"","additionalErrors":""}'));

        $response = $client->products()->objectParentAll();

        self::assertInstanceOf(Collection::class, $response);
        self::assertInstanceOf(WildberriesApiResponse::class, $response);

        $dto = $response->makeDto();

        self::assertInstanceOf(GETContentV2ObjectParentAllResponse::class, $dto);
        self::assertSame([['id' => 1, 'name' => 'Обувь']], $dto->data);
        self::assertFalse($dto->error);
        self::assertSame('', $dto->errorText);
    }

    /**
     * Проверяет, что makeDto() находит DTO для runtime path с path-параметром.
     */
    public function testResponseCanMakeDtoForRuntimePathParameter(): void
    {
        [$client] = $this->createClient(new Response(200, [], '{"code":"ok","message":"done","data":{"order":123}}'));

        $response = $client->ordersFbs()->ordersByOrderIdMetaGtin(123, [
            'gtin' => '04601234567890',
        ]);
        self::assertInstanceOf(WildberriesApiResponse::class, $response);

        $dto = $response->makeDto();

        self::assertInstanceOf(OrdersFbsErrorDto::class, $dto);
        self::assertSame('ok', $dto->code);
        self::assertSame('done', $dto->message);
        self::assertSame(['order' => 123], $dto->data);
    }

    /**
     * Проверяет сборку query-string у GET и отсутствие тела запроса.
     */
    public function testGetBuildsQueryString(): void
    {
        [$client, $httpClient] = $this->createClient(new Response(200, [], '{"data":[]}'));

        $client->get('/api/v1/stocks', [
            'dateFrom' => '2026-01-01',
            'limit'    => 100,
        ]);

        $request = $httpClient->lastRequest();
        self::assertNotNull($request);
        self::assertSame('GET', $request->getMethod());
        self::assertStringContainsString('dateFrom=2026-01-01', (string) $request->getUri());
        self::assertStringContainsString('limit=100', (string) $request->getUri());
        self::assertSame('', (string) $request->getBody());
    }

    /**
     * Проверяет PUT/PATCH/DELETE и корректную сериализацию payload.
     */
    public function testPutPatchDeleteUseExpectedHttpMethods(): void
    {
        [$client, $httpClient] = $this->createClient([
            new Response(200, [], '{"ok":true}'),
            new Response(200, [], '{"ok":true}'),
            new Response(200, [], '{"ok":true}'),
        ]);

        $client->put('/api/v3/orders/1/meta', ['foo' => 'bar']);
        self::assertSame('PUT', $httpClient->lastRequest()?->getMethod());
        self::assertStringContainsString('"foo":"bar"', (string) $httpClient->lastRequest()?->getBody());

        $client->patch('/api/v3/orders/1/cancel', ['reason' => 'out-of-stock']);
        self::assertSame('PATCH', $httpClient->lastRequest()?->getMethod());
        self::assertStringContainsString('"reason":"out-of-stock"', (string) $httpClient->lastRequest()?->getBody());

        $client->delete('/api/v3/passes/1', query: ['force' => 1]);
        self::assertSame('DELETE', $httpClient->lastRequest()?->getMethod());
        self::assertStringContainsString('force=1', (string) $httpClient->lastRequest()?->getUri());
        self::assertSame('', (string) $httpClient->lastRequest()?->getBody());
    }

    /**
     * Проверяет получение текстов ошибок из ответа.
     */
    public function testErrorResponseThrowsException(): void
    {
        [$client] = $this->createClient(new Response(401, [], '{"message":"Unauthorized"}'));

        $this->expectException(WildberriesException::class);
        $this->expectExceptionMessage('Unauthorized');

        $client->post('/api/v1/orders');
    }
}
