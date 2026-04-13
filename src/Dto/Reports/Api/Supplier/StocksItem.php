<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Reports\Api\Supplier;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class StocksItem implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $lastChangeDate,
        public ?string $warehouseName,
        public ?string $supplierArticle,
        public ?int $nmId,
        public ?string $barcode,
        public ?int $quantity,
        public ?int $inWayToClient,
        public ?int $inWayFromClient,
        public ?int $quantityFull,
        public ?string $category,
        public ?string $subject,
        public ?string $brand,
        public ?string $techSize,
        public ?float $price,
        public ?float $discount,
        public ?bool $isSupply,
        public ?bool $isRealization,
        public ?string $sCCode,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            lastChangeDate: WildberriesDtoValue::string($payload['lastChangeDate'] ?? null),
            warehouseName: WildberriesDtoValue::string($payload['warehouseName'] ?? null),
            supplierArticle: WildberriesDtoValue::string($payload['supplierArticle'] ?? null),
            nmId: WildberriesDtoValue::int($payload['nmId'] ?? null),
            barcode: WildberriesDtoValue::string($payload['barcode'] ?? null),
            quantity: WildberriesDtoValue::int($payload['quantity'] ?? null),
            inWayToClient: WildberriesDtoValue::int($payload['inWayToClient'] ?? null),
            inWayFromClient: WildberriesDtoValue::int($payload['inWayFromClient'] ?? null),
            quantityFull: WildberriesDtoValue::int($payload['quantityFull'] ?? null),
            category: WildberriesDtoValue::string($payload['category'] ?? null),
            subject: WildberriesDtoValue::string($payload['subject'] ?? null),
            brand: WildberriesDtoValue::string($payload['brand'] ?? null),
            techSize: WildberriesDtoValue::string($payload['techSize'] ?? null),
            price: WildberriesDtoValue::float($payload['Price'] ?? null),
            discount: WildberriesDtoValue::float($payload['Discount'] ?? null),
            isSupply: WildberriesDtoValue::bool($payload['isSupply'] ?? null),
            isRealization: WildberriesDtoValue::bool($payload['isRealization'] ?? null),
            sCCode: WildberriesDtoValue::string($payload['SCCode'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['lastChangeDate', 'warehouseName', 'supplierArticle', 'nmId', 'barcode', 'quantity', 'inWayToClient', 'inWayFromClient', 'quantityFull', 'category', 'subject', 'brand', 'techSize', 'Price', 'Discount', 'isSupply', 'isRealization', 'SCCode']),
        );
    }
}
