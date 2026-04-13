<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\Dto;

final readonly class WildberriesEmptyDto implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self($payload);
    }
}
