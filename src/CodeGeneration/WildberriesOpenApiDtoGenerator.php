<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\CodeGeneration;

use PhpSoftBox\CodeGenerator\OpenApi\OpenApiDtoGenerator;
use PhpSoftBox\CodeGenerator\OpenApi\OpenApiDtoGeneratorDocument;
use PhpSoftBox\CodeGenerator\OpenApi\OpenApiDtoGeneratorOptions;
use PhpSoftBox\CodeGenerator\OpenApi\OpenApiDtoGeneratorResult;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;
use RuntimeException;
use Symfony\Component\Yaml\Yaml;

use function basename;
use function file_get_contents;
use function glob;
use function is_array;
use function is_string;
use function pathinfo;
use function preg_replace;
use function trim;

use const PATHINFO_FILENAME;

final readonly class WildberriesOpenApiDtoGenerator
{
    public function __construct(
        private OpenApiDtoGenerator $generator = new OpenApiDtoGenerator(),
    ) {
    }

    public function generate(WildberriesOpenApiDtoGeneratorOptions $options): OpenApiDtoGeneratorResult
    {
        return $this->generator->generate(new OpenApiDtoGeneratorOptions(
            documents: $this->documents($options->specPattern),
            dtoDirectory: $options->dtoDirectory,
            dtoNamespace: 'PhpSoftBox\\Wildberries\\Dto',
            dtoInterface: WildberriesDtoInterface::class,
            dtoValueClass: WildberriesDtoValue::class,
            responseMapPath: $options->responseMapPath,
            responseMapNamespace: 'PhpSoftBox\\Wildberries\\Dto',
            responseMapClassName: 'WildberriesResponseDtoMap',
            normalizePathFunctionName: 'normalizeWildberriesPath',
            normalizePatternFunctionName: 'normalizeWildberriesPathPattern',
            generatedComment: 'Wildberries OpenAPI DTO',
            cleanDtoDirectory: $options->cleanDtoDirectory,
        ));
    }

    /**
     * @return non-empty-list<OpenApiDtoGeneratorDocument>
     */
    private function documents(string $specPattern): array
    {
        $documents = [];
        foreach (glob($specPattern) ?: [] as $file) {
            $data = Yaml::parse((string) file_get_contents($file));
            if (!is_array($data)) {
                continue;
            }

            $documents[] = new OpenApiDtoGeneratorDocument($this->documentName($file, $data), $data);
        }

        if ($documents === []) {
            throw new RuntimeException('Wildberries OpenAPI YAML files are not found.');
        }

        return $documents;
    }

    /**
     * @param array<string, mixed> $openApi
     */
    private function documentName(string $file, array $openApi): string
    {
        $name = $openApi['info']['x-file-name'] ?? $openApi['info']['version'] ?? pathinfo($file, PATHINFO_FILENAME);
        $name = is_string($name) ? trim($name) : basename($file);

        return preg_replace('/^[0-9]+-/', '', $name) ?? $name;
    }
}
