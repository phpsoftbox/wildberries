<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Orders;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class Order implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $address
     * @param list<string> $offices
     * @param list<string> $skus
     * @param array<array-key, mixed> $options
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $address,
        public ?float $scanPrice,
        public ?string $deliveryType,
        public ?string $supplyId,
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
        public ?int $convertedPrice,
        public ?int $currencyCode,
        public ?int $convertedCurrencyCode,
        public ?int $cargoType,
        public ?int $crossBorderType,
        public ?string $comment,
        public ?bool $isZeroOrder,
        public array $options,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            address: WildberriesDtoValue::array($payload['address'] ?? null),
            scanPrice: WildberriesDtoValue::float($payload['scanPrice'] ?? null),
            deliveryType: WildberriesDtoValue::string($payload['deliveryType'] ?? null),
            supplyId: WildberriesDtoValue::string($payload['supplyId'] ?? null),
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
            convertedPrice: WildberriesDtoValue::int($payload['convertedPrice'] ?? null),
            currencyCode: WildberriesDtoValue::int($payload['currencyCode'] ?? null),
            convertedCurrencyCode: WildberriesDtoValue::int($payload['convertedCurrencyCode'] ?? null),
            cargoType: WildberriesDtoValue::int($payload['cargoType'] ?? null),
            crossBorderType: WildberriesDtoValue::int($payload['crossBorderType'] ?? null),
            comment: WildberriesDtoValue::string($payload['comment'] ?? null),
            isZeroOrder: WildberriesDtoValue::bool($payload['isZeroOrder'] ?? null),
            options: WildberriesDtoValue::array($payload['options'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['address', 'scanPrice', 'deliveryType', 'supplyId', 'orderUid', 'article', 'colorCode', 'rid', 'createdAt', 'offices', 'skus', 'id', 'warehouseId', 'officeId', 'nmId', 'chrtId', 'price', 'convertedPrice', 'currencyCode', 'convertedCurrencyCode', 'cargoType', 'crossBorderType', 'comment', 'isZeroOrder', 'options']),
        );
    }
}
