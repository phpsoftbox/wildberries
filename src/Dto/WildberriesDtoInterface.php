<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\Dto;

interface WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $payload
     */
    public static function fromArray(array $payload): static;
}
