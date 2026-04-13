<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\Tests;

use PhpSoftBox\Http\Message\Response;
use PhpSoftBox\Wildberries\Tests\Support\CreatesWildberriesClient;
use PhpSoftBox\Wildberries\WildberriesException;
use PHPUnit\Framework\TestCase;

final class WildberriesApiHostTest extends TestCase
{
    use CreatesWildberriesClient;

    /**
     * Проверяет, что host-scope использует корректный домен.
     */
    public function testHostScopeUsesRequestedDomain(): void
    {
        [$client, $httpClient] = $this->createClient(new Response(200, [], '{"result":[]}'));

        $client->marketplace()->get('/api/v3/orders/new');

        $request = $httpClient->lastRequest();
        self::assertNotNull($request);
        self::assertStringStartsWith('https://marketplace-api.wildberries.ru', (string) $request->getUri());
    }

    /**
     * Проверяет, что section() корректно префиксует путь.
     */
    public function testHostSectionBuildsPathPrefix(): void
    {
        [$client, $httpClient] = $this->createClient(new Response(200, [], '{"result":[]}'));

        $client->marketplace()->section('api/v3/orders')->post('/status', [
            'orders' => [1, 2],
        ]);

        $request = $httpClient->lastRequest();
        self::assertNotNull($request);
        self::assertStringContainsString('/api/v3/orders/status', (string) $request->getUri());
        self::assertStringContainsString('"orders":[1,2]', (string) $request->getBody());
    }

    /**
     * Проверяет, что неизвестный host даёт ожидаемое исключение.
     */
    public function testUnknownHostThrowsException(): void
    {
        [$client] = $this->createClient(new Response(200, [], '{"result":[]}'));

        $this->expectException(WildberriesException::class);
        $this->expectExceptionMessage('Unknown Wildberries API host');

        $client->host('unknown')->get('/api/v1/ping');
    }
}
