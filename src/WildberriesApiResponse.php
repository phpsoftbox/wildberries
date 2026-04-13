<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries;

use PhpSoftBox\Collection\Collection;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoHydrator;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use RuntimeException;

/**
 * @template TKey of array-key
 * @template TValue
 *
 * @extends Collection<TKey, TValue>
 */
final class WildberriesApiResponse extends Collection
{
    /**
     * @param array<TKey, TValue> $items
     * @param class-string<WildberriesDtoInterface>|null $defaultDtoClass
     */
    public function __construct(
        array $items = [],
        private readonly ?string $defaultDtoClass = null,
    ) {
        parent::__construct($items);
    }

    /**
     * @template T of WildberriesDtoInterface
     *
     * @param class-string<T>|null $dtoClass
     *
     * @return T
     */
    public function makeDto(?string $dtoClass = null): WildberriesDtoInterface
    {
        $dtoClass ??= $this->defaultDtoClass;
        if ($dtoClass === null) {
            throw new RuntimeException('Wildberries DTO class is not specified for this response.');
        }

        return WildberriesDtoHydrator::make($dtoClass, $this->all());
    }
}
