<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersFbw\Api\Supplies;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ModelsGoodInSupply implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $barcode,
        public ?string $vendorCode,
        public ?int $nmID,
        public ?bool $needKiz,
        public ?string $tnved,
        public ?string $techSize,
        public ?string $color,
        public ?int $supplierBoxAmount,
        public ?int $quantity,
        public ?int $readyForSaleQuantity,
        public ?int $acceptedQuantity,
        public ?int $unloadingQuantity,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            barcode: WildberriesDtoValue::string($payload['barcode'] ?? null),
            vendorCode: WildberriesDtoValue::string($payload['vendorCode'] ?? null),
            nmID: WildberriesDtoValue::int($payload['nmID'] ?? null),
            needKiz: WildberriesDtoValue::bool($payload['needKiz'] ?? null),
            tnved: WildberriesDtoValue::string($payload['tnved'] ?? null),
            techSize: WildberriesDtoValue::string($payload['techSize'] ?? null),
            color: WildberriesDtoValue::string($payload['color'] ?? null),
            supplierBoxAmount: WildberriesDtoValue::int($payload['supplierBoxAmount'] ?? null),
            quantity: WildberriesDtoValue::int($payload['quantity'] ?? null),
            readyForSaleQuantity: WildberriesDtoValue::int($payload['readyForSaleQuantity'] ?? null),
            acceptedQuantity: WildberriesDtoValue::int($payload['acceptedQuantity'] ?? null),
            unloadingQuantity: WildberriesDtoValue::int($payload['unloadingQuantity'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['barcode', 'vendorCode', 'nmID', 'needKiz', 'tnved', 'techSize', 'color', 'supplierBoxAmount', 'quantity', 'readyForSaleQuantity', 'acceptedQuantity', 'unloadingQuantity']),
        );
    }
}
