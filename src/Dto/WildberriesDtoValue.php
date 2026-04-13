<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\Dto;

use InvalidArgumentException;

use function array_values;
use function is_array;
use function is_bool;
use function is_numeric;
use function is_scalar;
use function is_subclass_of;
use function sprintf;

final class WildberriesDtoValue
{
    public static function string(mixed $value): ?string
    {
        return is_scalar($value) ? (string) $value : null;
    }

    public static function int(mixed $value): ?int
    {
        return is_numeric($value) ? (int) $value : null;
    }

    public static function float(mixed $value): ?float
    {
        return is_numeric($value) ? (float) $value : null;
    }

    public static function bool(mixed $value): ?bool
    {
        return is_bool($value) ? $value : null;
    }

    /**
     * @return array<array-key, mixed>
     */
    public static function array(mixed $value): array
    {
        return is_array($value) ? $value : [];
    }

    /**
     * @template T of WildberriesDtoInterface
     *
     * @param class-string<T> $dtoClass
     *
     * @return T|null
     */
    public static function object(mixed $value, string $dtoClass): ?WildberriesDtoInterface
    {
        self::assertDtoClass($dtoClass);

        if (!is_array($value)) {
            return null;
        }

        return $dtoClass::fromArray($value);
    }

    /**
     * @template T of WildberriesDtoInterface
     *
     * @param class-string<T> $dtoClass
     *
     * @return list<T>
     */
    public static function objectList(mixed $value, string $dtoClass): array
    {
        self::assertDtoClass($dtoClass);

        if (!is_array($value)) {
            return [];
        }

        $items = [];
        foreach ($value as $item) {
            if (is_array($item)) {
                $items[] = $dtoClass::fromArray($item);
            }
        }

        return array_values($items);
    }

    /**
     * @param array<string, mixed> $payload
     * @param list<string> $knownKeys
     *
     * @return array<string, mixed>
     */
    public static function extra(array $payload, array $knownKeys): array
    {
        foreach ($knownKeys as $key) {
            unset($payload[$key]);
        }

        return $payload;
    }

    /**
     * @param class-string $dtoClass
     */
    private static function assertDtoClass(string $dtoClass): void
    {
        if (!is_subclass_of($dtoClass, WildberriesDtoInterface::class)) {
            throw new InvalidArgumentException(sprintf(
                'Wildberries DTO class "%s" must implement %s.',
                $dtoClass,
                WildberriesDtoInterface::class,
            ));
        }
    }
}
