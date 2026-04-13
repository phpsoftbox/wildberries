<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Tariffs\Api;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ModelsWarehousesBoxRates implements WildberriesDtoInterface
{
    /**
     * @param list<ModelsWarehouseBoxRates> $warehouseList
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $currency,
        public ?string $dtNextBox,
        public ?string $dtTillMax,
        public array $warehouseList,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            currency: WildberriesDtoValue::string($payload['currency'] ?? null),
            dtNextBox: WildberriesDtoValue::string($payload['dtNextBox'] ?? null),
            dtTillMax: WildberriesDtoValue::string($payload['dtTillMax'] ?? null),
            warehouseList: WildberriesDtoValue::objectList($payload['warehouseList'] ?? null, ModelsWarehouseBoxRates::class),
            extra: WildberriesDtoValue::extra($payload, ['currency', 'dtNextBox', 'dtTillMax', 'warehouseList']),
        );
    }
}
