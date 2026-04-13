<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Tariffs\Api;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ModelsAcceptanceCoefficient implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $date,
        public ?float $coefficient,
        public ?int $warehouseID,
        public ?string $warehouseName,
        public ?bool $allowUnload,
        public ?int $boxTypeID,
        public ?string $storageCoef,
        public ?string $deliveryCoef,
        public ?string $deliveryBaseLiter,
        public ?string $deliveryAdditionalLiter,
        public ?string $storageBaseLiter,
        public ?string $storageAdditionalLiter,
        public ?bool $isSortingCenter,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            date: WildberriesDtoValue::string($payload['date'] ?? null),
            coefficient: WildberriesDtoValue::float($payload['coefficient'] ?? null),
            warehouseID: WildberriesDtoValue::int($payload['warehouseID'] ?? null),
            warehouseName: WildberriesDtoValue::string($payload['warehouseName'] ?? null),
            allowUnload: WildberriesDtoValue::bool($payload['allowUnload'] ?? null),
            boxTypeID: WildberriesDtoValue::int($payload['boxTypeID'] ?? null),
            storageCoef: WildberriesDtoValue::string($payload['storageCoef'] ?? null),
            deliveryCoef: WildberriesDtoValue::string($payload['deliveryCoef'] ?? null),
            deliveryBaseLiter: WildberriesDtoValue::string($payload['deliveryBaseLiter'] ?? null),
            deliveryAdditionalLiter: WildberriesDtoValue::string($payload['deliveryAdditionalLiter'] ?? null),
            storageBaseLiter: WildberriesDtoValue::string($payload['storageBaseLiter'] ?? null),
            storageAdditionalLiter: WildberriesDtoValue::string($payload['storageAdditionalLiter'] ?? null),
            isSortingCenter: WildberriesDtoValue::bool($payload['isSortingCenter'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['date', 'coefficient', 'warehouseID', 'warehouseName', 'allowUnload', 'boxTypeID', 'storageCoef', 'deliveryCoef', 'deliveryBaseLiter', 'deliveryAdditionalLiter', 'storageBaseLiter', 'storageAdditionalLiter', 'isSortingCenter']),
        );
    }
}
