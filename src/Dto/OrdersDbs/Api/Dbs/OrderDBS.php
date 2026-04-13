<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Dbs;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class OrderDBS implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $address
     * @param array<array-key, mixed> $options
     * @param list<string> $skus
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $address,
        public ?string $deliveryType,
        public array $options,
        public ?string $orderUid,
        public ?string $groupId,
        public ?string $article,
        public ?string $colorCode,
        public ?string $rid,
        public ?string $createdAt,
        public array $skus,
        public ?int $id,
        public ?int $warehouseId,
        public ?int $nmId,
        public ?int $chrtId,
        public ?int $scanPrice,
        public ?int $price,
        public ?int $convertedPrice,
        public ?int $currencyCode,
        public ?int $convertedCurrencyCode,
        public ?int $convertedFinalPrice,
        public ?int $finalPrice,
        public ?int $cargoType,
        public ?string $comment,
        public ?bool $isZeroOrder,
        public ?int $wbStickerId,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            address: WildberriesDtoValue::array($payload['address'] ?? null),
            deliveryType: WildberriesDtoValue::string($payload['deliveryType'] ?? null),
            options: WildberriesDtoValue::array($payload['options'] ?? null),
            orderUid: WildberriesDtoValue::string($payload['orderUid'] ?? null),
            groupId: WildberriesDtoValue::string($payload['groupId'] ?? null),
            article: WildberriesDtoValue::string($payload['article'] ?? null),
            colorCode: WildberriesDtoValue::string($payload['colorCode'] ?? null),
            rid: WildberriesDtoValue::string($payload['rid'] ?? null),
            createdAt: WildberriesDtoValue::string($payload['createdAt'] ?? null),
            skus: WildberriesDtoValue::array($payload['skus'] ?? null),
            id: WildberriesDtoValue::int($payload['id'] ?? null),
            warehouseId: WildberriesDtoValue::int($payload['warehouseId'] ?? null),
            nmId: WildberriesDtoValue::int($payload['nmId'] ?? null),
            chrtId: WildberriesDtoValue::int($payload['chrtId'] ?? null),
            scanPrice: WildberriesDtoValue::int($payload['scanPrice'] ?? null),
            price: WildberriesDtoValue::int($payload['price'] ?? null),
            convertedPrice: WildberriesDtoValue::int($payload['convertedPrice'] ?? null),
            currencyCode: WildberriesDtoValue::int($payload['currencyCode'] ?? null),
            convertedCurrencyCode: WildberriesDtoValue::int($payload['convertedCurrencyCode'] ?? null),
            convertedFinalPrice: WildberriesDtoValue::int($payload['convertedFinalPrice'] ?? null),
            finalPrice: WildberriesDtoValue::int($payload['finalPrice'] ?? null),
            cargoType: WildberriesDtoValue::int($payload['cargoType'] ?? null),
            comment: WildberriesDtoValue::string($payload['comment'] ?? null),
            isZeroOrder: WildberriesDtoValue::bool($payload['isZeroOrder'] ?? null),
            wbStickerId: WildberriesDtoValue::int($payload['wbStickerId'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['address', 'deliveryType', 'options', 'orderUid', 'groupId', 'article', 'colorCode', 'rid', 'createdAt', 'skus', 'id', 'warehouseId', 'nmId', 'chrtId', 'scanPrice', 'price', 'convertedPrice', 'currencyCode', 'convertedCurrencyCode', 'convertedFinalPrice', 'finalPrice', 'cargoType', 'comment', 'isZeroOrder', 'wbStickerId']),
        );
    }
}
