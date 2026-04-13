<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersFbw\Api\Supplies;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ModelsSupplyDetails implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $phone,
        public ?int $statusID,
        public ?int $virtualTypeID,
        public ?int $boxTypeID,
        public ?string $createDate,
        public ?string $supplyDate,
        public ?string $factDate,
        public ?string $updatedDate,
        public ?int $warehouseID,
        public ?string $warehouseName,
        public ?int $actualWarehouseID,
        public ?string $actualWarehouseName,
        public ?int $transitWarehouseID,
        public ?string $transitWarehouseName,
        public ?float $acceptanceCost,
        public ?float $paidAcceptanceCoefficient,
        public ?string $rejectReason,
        public ?string $supplierAssignName,
        public ?string $storageCoef,
        public ?string $deliveryCoef,
        public ?int $quantity,
        public ?int $readyForSaleQuantity,
        public ?int $acceptedQuantity,
        public ?int $unloadingQuantity,
        public ?int $depersonalizedQuantity,
        public ?bool $isBoxOnPallet,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            phone: WildberriesDtoValue::string($payload['phone'] ?? null),
            statusID: WildberriesDtoValue::int($payload['statusID'] ?? null),
            virtualTypeID: WildberriesDtoValue::int($payload['virtualTypeID'] ?? null),
            boxTypeID: WildberriesDtoValue::int($payload['boxTypeID'] ?? null),
            createDate: WildberriesDtoValue::string($payload['createDate'] ?? null),
            supplyDate: WildberriesDtoValue::string($payload['supplyDate'] ?? null),
            factDate: WildberriesDtoValue::string($payload['factDate'] ?? null),
            updatedDate: WildberriesDtoValue::string($payload['updatedDate'] ?? null),
            warehouseID: WildberriesDtoValue::int($payload['warehouseID'] ?? null),
            warehouseName: WildberriesDtoValue::string($payload['warehouseName'] ?? null),
            actualWarehouseID: WildberriesDtoValue::int($payload['actualWarehouseID'] ?? null),
            actualWarehouseName: WildberriesDtoValue::string($payload['actualWarehouseName'] ?? null),
            transitWarehouseID: WildberriesDtoValue::int($payload['transitWarehouseID'] ?? null),
            transitWarehouseName: WildberriesDtoValue::string($payload['transitWarehouseName'] ?? null),
            acceptanceCost: WildberriesDtoValue::float($payload['acceptanceCost'] ?? null),
            paidAcceptanceCoefficient: WildberriesDtoValue::float($payload['paidAcceptanceCoefficient'] ?? null),
            rejectReason: WildberriesDtoValue::string($payload['rejectReason'] ?? null),
            supplierAssignName: WildberriesDtoValue::string($payload['supplierAssignName'] ?? null),
            storageCoef: WildberriesDtoValue::string($payload['storageCoef'] ?? null),
            deliveryCoef: WildberriesDtoValue::string($payload['deliveryCoef'] ?? null),
            quantity: WildberriesDtoValue::int($payload['quantity'] ?? null),
            readyForSaleQuantity: WildberriesDtoValue::int($payload['readyForSaleQuantity'] ?? null),
            acceptedQuantity: WildberriesDtoValue::int($payload['acceptedQuantity'] ?? null),
            unloadingQuantity: WildberriesDtoValue::int($payload['unloadingQuantity'] ?? null),
            depersonalizedQuantity: WildberriesDtoValue::int($payload['depersonalizedQuantity'] ?? null),
            isBoxOnPallet: WildberriesDtoValue::bool($payload['isBoxOnPallet'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['phone', 'statusID', 'virtualTypeID', 'boxTypeID', 'createDate', 'supplyDate', 'factDate', 'updatedDate', 'warehouseID', 'warehouseName', 'actualWarehouseID', 'actualWarehouseName', 'transitWarehouseID', 'transitWarehouseName', 'acceptanceCost', 'paidAcceptanceCoefficient', 'rejectReason', 'supplierAssignName', 'storageCoef', 'deliveryCoef', 'quantity', 'readyForSaleQuantity', 'acceptedQuantity', 'unloadingQuantity', 'depersonalizedQuantity', 'isBoxOnPallet']),
        );
    }
}
