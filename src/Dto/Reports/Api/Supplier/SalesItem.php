<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Reports\Api\Supplier;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class SalesItem implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $date,
        public ?string $lastChangeDate,
        public ?string $warehouseName,
        public ?string $warehouseType,
        public ?string $countryName,
        public ?string $oblastOkrugName,
        public ?string $regionName,
        public ?string $supplierArticle,
        public ?int $nmId,
        public ?string $barcode,
        public ?string $category,
        public ?string $subject,
        public ?string $brand,
        public ?string $techSize,
        public ?int $incomeID,
        public ?bool $isSupply,
        public ?bool $isRealization,
        public ?float $totalPrice,
        public ?int $discountPercent,
        public ?float $spp,
        public ?int $paymentSaleAmount,
        public ?float $forPay,
        public ?float $finishedPrice,
        public ?float $priceWithDisc,
        public ?string $saleID,
        public ?string $sticker,
        public ?string $gNumber,
        public ?string $srid,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            date: WildberriesDtoValue::string($payload['date'] ?? null),
            lastChangeDate: WildberriesDtoValue::string($payload['lastChangeDate'] ?? null),
            warehouseName: WildberriesDtoValue::string($payload['warehouseName'] ?? null),
            warehouseType: WildberriesDtoValue::string($payload['warehouseType'] ?? null),
            countryName: WildberriesDtoValue::string($payload['countryName'] ?? null),
            oblastOkrugName: WildberriesDtoValue::string($payload['oblastOkrugName'] ?? null),
            regionName: WildberriesDtoValue::string($payload['regionName'] ?? null),
            supplierArticle: WildberriesDtoValue::string($payload['supplierArticle'] ?? null),
            nmId: WildberriesDtoValue::int($payload['nmId'] ?? null),
            barcode: WildberriesDtoValue::string($payload['barcode'] ?? null),
            category: WildberriesDtoValue::string($payload['category'] ?? null),
            subject: WildberriesDtoValue::string($payload['subject'] ?? null),
            brand: WildberriesDtoValue::string($payload['brand'] ?? null),
            techSize: WildberriesDtoValue::string($payload['techSize'] ?? null),
            incomeID: WildberriesDtoValue::int($payload['incomeID'] ?? null),
            isSupply: WildberriesDtoValue::bool($payload['isSupply'] ?? null),
            isRealization: WildberriesDtoValue::bool($payload['isRealization'] ?? null),
            totalPrice: WildberriesDtoValue::float($payload['totalPrice'] ?? null),
            discountPercent: WildberriesDtoValue::int($payload['discountPercent'] ?? null),
            spp: WildberriesDtoValue::float($payload['spp'] ?? null),
            paymentSaleAmount: WildberriesDtoValue::int($payload['paymentSaleAmount'] ?? null),
            forPay: WildberriesDtoValue::float($payload['forPay'] ?? null),
            finishedPrice: WildberriesDtoValue::float($payload['finishedPrice'] ?? null),
            priceWithDisc: WildberriesDtoValue::float($payload['priceWithDisc'] ?? null),
            saleID: WildberriesDtoValue::string($payload['saleID'] ?? null),
            sticker: WildberriesDtoValue::string($payload['sticker'] ?? null),
            gNumber: WildberriesDtoValue::string($payload['gNumber'] ?? null),
            srid: WildberriesDtoValue::string($payload['srid'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['date', 'lastChangeDate', 'warehouseName', 'warehouseType', 'countryName', 'oblastOkrugName', 'regionName', 'supplierArticle', 'nmId', 'barcode', 'category', 'subject', 'brand', 'techSize', 'incomeID', 'isSupply', 'isRealization', 'totalPrice', 'discountPercent', 'spp', 'paymentSaleAmount', 'forPay', 'finishedPrice', 'priceWithDisc', 'saleID', 'sticker', 'gNumber', 'srid']),
        );
    }
}
