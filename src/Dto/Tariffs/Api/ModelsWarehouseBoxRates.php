<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Tariffs\Api;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ModelsWarehouseBoxRates implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $boxDeliveryBase,
        public ?string $boxDeliveryCoefExpr,
        public ?string $boxDeliveryLiter,
        public ?string $boxDeliveryMarketplaceBase,
        public ?string $boxDeliveryMarketplaceCoefExpr,
        public ?string $boxDeliveryMarketplaceLiter,
        public ?string $boxStorageBase,
        public ?string $boxStorageCoefExpr,
        public ?string $boxStorageLiter,
        public ?string $geoName,
        public ?string $warehouseName,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            boxDeliveryBase: WildberriesDtoValue::string($payload['boxDeliveryBase'] ?? null),
            boxDeliveryCoefExpr: WildberriesDtoValue::string($payload['boxDeliveryCoefExpr'] ?? null),
            boxDeliveryLiter: WildberriesDtoValue::string($payload['boxDeliveryLiter'] ?? null),
            boxDeliveryMarketplaceBase: WildberriesDtoValue::string($payload['boxDeliveryMarketplaceBase'] ?? null),
            boxDeliveryMarketplaceCoefExpr: WildberriesDtoValue::string($payload['boxDeliveryMarketplaceCoefExpr'] ?? null),
            boxDeliveryMarketplaceLiter: WildberriesDtoValue::string($payload['boxDeliveryMarketplaceLiter'] ?? null),
            boxStorageBase: WildberriesDtoValue::string($payload['boxStorageBase'] ?? null),
            boxStorageCoefExpr: WildberriesDtoValue::string($payload['boxStorageCoefExpr'] ?? null),
            boxStorageLiter: WildberriesDtoValue::string($payload['boxStorageLiter'] ?? null),
            geoName: WildberriesDtoValue::string($payload['geoName'] ?? null),
            warehouseName: WildberriesDtoValue::string($payload['warehouseName'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['boxDeliveryBase', 'boxDeliveryCoefExpr', 'boxDeliveryLiter', 'boxDeliveryMarketplaceBase', 'boxDeliveryMarketplaceCoefExpr', 'boxDeliveryMarketplaceLiter', 'boxStorageBase', 'boxStorageCoefExpr', 'boxStorageLiter', 'geoName', 'warehouseName']),
        );
    }
}
