<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\Dto;

use InvalidArgumentException;

use function is_subclass_of;
use function sprintf;

final class WildberriesDtoHydrator
{
    /**
     * @template T of WildberriesDtoInterface
     *
     * @param class-string<T> $dtoClass
     * @param array<string, mixed> $payload
     *
     * @return T
     */
    public static function make(string $dtoClass, array $payload): WildberriesDtoInterface
    {
        if (!is_subclass_of($dtoClass, WildberriesDtoInterface::class)) {
            throw new InvalidArgumentException(sprintf(
                'Wildberries DTO class "%s" must implement %s.',
                $dtoClass,
                WildberriesDtoInterface::class,
            ));
        }

        return $dtoClass::fromArray($payload);
    }
}
