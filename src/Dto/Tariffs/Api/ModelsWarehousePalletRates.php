<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Tariffs\Api;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ModelsWarehousePalletRates implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $palletDeliveryExpr,
        public ?string $palletDeliveryValueBase,
        public ?string $palletDeliveryValueLiter,
        public ?string $palletStorageExpr,
        public ?string $palletStorageValueExpr,
        public ?string $warehouseName,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            palletDeliveryExpr: WildberriesDtoValue::string($payload['palletDeliveryExpr'] ?? null),
            palletDeliveryValueBase: WildberriesDtoValue::string($payload['palletDeliveryValueBase'] ?? null),
            palletDeliveryValueLiter: WildberriesDtoValue::string($payload['palletDeliveryValueLiter'] ?? null),
            palletStorageExpr: WildberriesDtoValue::string($payload['palletStorageExpr'] ?? null),
            palletStorageValueExpr: WildberriesDtoValue::string($payload['palletStorageValueExpr'] ?? null),
            warehouseName: WildberriesDtoValue::string($payload['warehouseName'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['palletDeliveryExpr', 'palletDeliveryValueBase', 'palletDeliveryValueLiter', 'palletStorageExpr', 'palletStorageValueExpr', 'warehouseName']),
        );
    }
}
