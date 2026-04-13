<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\Tests;

use PhpSoftBox\Wildberries\CodeGeneration\WildberriesOpenApiDtoGenerator;
use PhpSoftBox\Wildberries\CodeGeneration\WildberriesOpenApiDtoGeneratorOptions;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesResponseDtoMap;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\CoversMethod;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Symfony\Component\Yaml\Yaml;

use function bin2hex;
use function dirname;
use function file_get_contents;
use function file_put_contents;
use function is_a;
use function json_decode;
use function json_encode;
use function mkdir;
use function random_bytes;
use function rmdir;
use function sys_get_temp_dir;
use function unlink;

use const JSON_THROW_ON_ERROR;

#[CoversClass(WildberriesOpenApiDtoGenerator::class)]
#[CoversClass(WildberriesResponseDtoMap::class)]
#[CoversMethod(WildberriesOpenApiDtoGenerator::class, 'generate')]
final class WildberriesOpenApiGenerationTest extends TestCase
{
    private string $directory;

    protected function setUp(): void
    {
        $this->directory = sys_get_temp_dir() . '/wb-openapi-' . bin2hex(random_bytes(8));
        mkdir($this->directory);
    }

    protected function tearDown(): void
    {
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($this->directory, RecursiveDirectoryIterator::SKIP_DOTS), RecursiveIteratorIterator::CHILD_FIRST);

        foreach ($files as $file) {
            $file->isDir() ? rmdir($file->getPathname()) : unlink($file->getPathname());
        }
        rmdir($this->directory);
    }

    /**
     * Изменение upstream x-file-name не переименовывает публичный namespace раздела DTO.
     *
     * @see WildberriesOpenApiDtoGenerator::generate()
     */
    #[Test]
    #[DataProvider('documentNames')]
    public function preservesSectionNamespace(string $upstream, string $namespace): void
    {
        $document = ['info' => ['x-file-name' => $upstream], 'paths' => ['/items' => ['get' => ['operationId' => 'read', 'responses' => ['200' => ['content' => ['application/json' => ['schema' => ['type' => 'object']]]]]]]]];
        file_put_contents($this->directory . '/upstream.yaml', json_encode($document, JSON_THROW_ON_ERROR));

        new WildberriesOpenApiDtoGenerator()->generate($this->options());

        self::assertFileExists($this->directory . '/Dto/' . $namespace . '/Items/ReadResponse.php');
    }

    /** @return iterable<string, array{string, string}> */
    public static function documentNames(): iterable
    {
        yield 'items' => ['02-items', 'Products'];
        yield 'dbs' => ['dbs', 'OrdersDbs'];
        yield 'rates' => ['rates', 'Tariffs'];
    }

    /**
     * Compatibility-схема сохраняет старую операцию, но не перекрывает текущую операцию и схему.
     *
     * @see WildberriesOpenApiDtoGenerator::generate()
     */
    #[Test]
    public function currentDocumentWinsOverLegacy(): void
    {
        $operation = ['responses' => ['200' => ['content' => ['application/json' => ['schema' => ['$ref' => '#/components/schemas/Item']]]]]];
        $legacy    = ['info' => ['x-file-name' => 'items'], 'paths' => ['/items' => ['get' => $operation], '/legacy' => ['get' => $operation]], 'components' => ['schemas' => ['Item' => ['type' => 'object', 'properties' => ['obsolete' => ['type' => 'boolean']]]]]];
        $current   = $legacy;
        unset($current['paths']['/legacy']);
        $current['components']['schemas']['Item']['properties'] = ['current' => ['type' => 'string']];
        mkdir($this->directory . '/legacy');
        file_put_contents($this->directory . '/upstream.yaml', json_encode($current, JSON_THROW_ON_ERROR));
        file_put_contents($this->directory . '/legacy/upstream.yaml', json_encode($legacy, JSON_THROW_ON_ERROR));

        $result = new WildberriesOpenApiDtoGenerator()->generate($this->options());

        self::assertSame(2, $result->responseMappings);
        $dto = file_get_contents($this->directory . '/Dto/Products/Items/Item.php');
        self::assertStringContainsString('public ?string $current', $dto);
        self::assertStringNotContainsString('$obsolete', $dto);
        self::assertStringContainsString('GET /legacy', file_get_contents($this->directory . '/Map.php'));
    }

    /**
     * Каждая операция обновлённых production-секций и каждый сохранённый legacy endpoint имеет загружаемый DTO.
     *
     * @see WildberriesResponseDtoMap::resolve()
     */
    #[Test]
    public function mapsEveryCurrentAndLegacyOperation(): void
    {
        $audit = json_decode(file_get_contents(dirname(__DIR__) . '/docs/upstream/2026-09-07/audit.json'), true, flags: JSON_THROW_ON_ERROR);
        $count = 0;
        foreach ($audit['sections'] as $section => $entry) {
            if ($section === 'Digital') {
                continue;
            }
            $document = Yaml::parseFile(dirname(__DIR__) . '/docs/' . $entry['oldFile']);
            foreach ($document['paths'] as $path => $methods) {
                foreach (['get', 'post', 'put', 'patch', 'delete'] as $method) {
                    if (!isset($methods[$method])) {
                        continue;
                    }
                    $class = WildberriesResponseDtoMap::resolve($method, $path);
                    self::assertNotNull($class, $method . ' ' . $path);
                    self::assertTrue(is_a($class, WildberriesDtoInterface::class, true), $class);
                    ++$count;
                }
            }
            foreach ($entry['removed'] as $operation) {
                $class = WildberriesResponseDtoMap::resolve($operation['method'], $operation['path']);
                self::assertNotNull($class, $operation['path']);
                self::assertTrue(is_a($class, WildberriesDtoInterface::class, true), $class);
            }
        }
        self::assertSame(294, $count);
    }

    private function options(): WildberriesOpenApiDtoGeneratorOptions
    {
        return new WildberriesOpenApiDtoGeneratorOptions($this->directory . '/*.yaml', $this->directory . '/Dto', $this->directory . '/Map.php');
    }
}
