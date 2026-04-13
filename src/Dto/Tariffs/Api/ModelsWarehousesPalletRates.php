<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Tariffs\Api;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ModelsWarehousesPalletRates implements WildberriesDtoInterface
{
    /**
     * @param list<ModelsWarehousePalletRates> $warehouseList
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $dtNextPallet,
        public ?string $dtTillMax,
        public array $warehouseList,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            dtNextPallet: WildberriesDtoValue::string($payload['dtNextPallet'] ?? null),
            dtTillMax: WildberriesDtoValue::string($payload['dtTillMax'] ?? null),
            warehouseList: WildberriesDtoValue::objectList($payload['warehouseList'] ?? null, ModelsWarehousePalletRates::class),
            extra: WildberriesDtoValue::extra($payload, ['dtNextPallet', 'dtTillMax', 'warehouseList']),
        );
    }
}
