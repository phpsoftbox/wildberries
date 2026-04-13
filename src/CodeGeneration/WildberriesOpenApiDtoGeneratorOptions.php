<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\CodeGeneration;

final readonly class WildberriesOpenApiDtoGeneratorOptions
{
    public function __construct(
        public string $specPattern,
        public string $dtoDirectory,
        public string $responseMapPath,
        public bool $cleanDtoDirectory = true,
    ) {
    }
}
