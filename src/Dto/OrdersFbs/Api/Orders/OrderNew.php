<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Orders;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class OrderNew implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $address
     * @param list<string> $requiredMeta
     * @param list<string> $optionalMeta
     * @param list<string> $offices
     * @param list<string> $skus
     * @param array<array-key, mixed> $options
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $address,
        public ?string $ddate,
        public ?string $sellerDate,
        public ?int $salePrice,
        public array $requiredMeta,
        public array $optionalMeta,
        public ?string $deliveryType,
        public ?string $comment,
        public ?float $scanPrice,
        public ?string $orderUid,
        public ?string $article,
        public ?string $colorCode,
        public ?string $rid,
        public ?string $createdAt,
        public array $offices,
        public array $skus,
        public ?int $id,
        public ?int $warehouseId,
        public ?int $officeId,
        public ?int $nmId,
        public ?int $chrtId,
        public ?int $price,
        public ?int $finalPrice,
        public ?int $convertedPrice,
        public ?int $convertedFinalPrice,
        public ?int $currencyCode,
        public ?int $convertedCurrencyCode,
        public ?int $cargoType,
        public ?int $crossBorderType,
        public ?bool $isZeroOrder,
        public array $options,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            address: WildberriesDtoValue::array($payload['address'] ?? null),
            ddate: WildberriesDtoValue::string($payload['ddate'] ?? null),
            sellerDate: WildberriesDtoValue::string($payload['sellerDate'] ?? null),
            salePrice: WildberriesDtoValue::int($payload['salePrice'] ?? null),
            requiredMeta: WildberriesDtoValue::array($payload['requiredMeta'] ?? null),
            optionalMeta: WildberriesDtoValue::array($payload['optionalMeta'] ?? null),
            deliveryType: WildberriesDtoValue::string($payload['deliveryType'] ?? null),
            comment: WildberriesDtoValue::string($payload['comment'] ?? null),
            scanPrice: WildberriesDtoValue::float($payload['scanPrice'] ?? null),
            orderUid: WildberriesDtoValue::string($payload['orderUid'] ?? null),
            article: WildberriesDtoValue::string($payload['article'] ?? null),
            colorCode: WildberriesDtoValue::string($payload['colorCode'] ?? null),
            rid: WildberriesDtoValue::string($payload['rid'] ?? null),
            createdAt: WildberriesDtoValue::string($payload['createdAt'] ?? null),
            offices: WildberriesDtoValue::array($payload['offices'] ?? null),
            skus: WildberriesDtoValue::array($payload['skus'] ?? null),
            id: WildberriesDtoValue::int($payload['id'] ?? null),
            warehouseId: WildberriesDtoValue::int($payload['warehouseId'] ?? null),
            officeId: WildberriesDtoValue::int($payload['officeId'] ?? null),
            nmId: WildberriesDtoValue::int($payload['nmId'] ?? null),
            chrtId: WildberriesDtoValue::int($payload['chrtId'] ?? null),
            price: WildberriesDtoValue::int($payload['price'] ?? null),
            finalPrice: WildberriesDtoValue::int($payload['finalPrice'] ?? null),
            convertedPrice: WildberriesDtoValue::int($payload['convertedPrice'] ?? null),
            convertedFinalPrice: WildberriesDtoValue::int($payload['convertedFinalPrice'] ?? null),
            currencyCode: WildberriesDtoValue::int($payload['currencyCode'] ?? null),
            convertedCurrencyCode: WildberriesDtoValue::int($payload['convertedCurrencyCode'] ?? null),
            cargoType: WildberriesDtoValue::int($payload['cargoType'] ?? null),
            crossBorderType: WildberriesDtoValue::int($payload['crossBorderType'] ?? null),
            isZeroOrder: WildberriesDtoValue::bool($payload['isZeroOrder'] ?? null),
            options: WildberriesDtoValue::array($payload['options'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['address', 'ddate', 'sellerDate', 'salePrice', 'requiredMeta', 'optionalMeta', 'deliveryType', 'comment', 'scanPrice', 'orderUid', 'article', 'colorCode', 'rid', 'createdAt', 'offices', 'skus', 'id', 'warehouseId', 'officeId', 'nmId', 'chrtId', 'price', 'finalPrice', 'convertedPrice', 'convertedFinalPrice', 'currencyCode', 'convertedCurrencyCode', 'cargoType', 'crossBorderType', 'isZeroOrder', 'options']),
        );
    }
}
