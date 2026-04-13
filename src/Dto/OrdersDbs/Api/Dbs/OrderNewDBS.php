<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Dbs;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class OrderNewDBS implements WildberriesDtoInterface
{
    /**
     * @param list<string> $requiredMeta
     * @param array<array-key, mixed> $options
     * @param array<array-key, mixed> $address
     * @param list<string> $skus
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $salePrice,
        public array $requiredMeta,
        public ?string $comment,
        public array $options,
        public array $address,
        public ?string $orderUid,
        public ?string $groupId,
        public ?string $article,
        public ?string $colorCode,
        public ?string $rid,
        public ?string $createdAt,
        public ?string $deliveryType,
        public array $skus,
        public ?int $id,
        public ?int $warehouseId,
        public ?int $nmId,
        public ?int $chrtId,
        public ?int $price,
        public ?int $finalPrice,
        public ?int $convertedFinalPrice,
        public ?int $convertedPrice,
        public ?int $currencyCode,
        public ?int $convertedCurrencyCode,
        public ?int $cargoType,
        public ?bool $isZeroOrder,
        public ?int $wbStickerId,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            salePrice: WildberriesDtoValue::int($payload['salePrice'] ?? null),
            requiredMeta: WildberriesDtoValue::array($payload['requiredMeta'] ?? null),
            comment: WildberriesDtoValue::string($payload['comment'] ?? null),
            options: WildberriesDtoValue::array($payload['options'] ?? null),
            address: WildberriesDtoValue::array($payload['address'] ?? null),
            orderUid: WildberriesDtoValue::string($payload['orderUid'] ?? null),
            groupId: WildberriesDtoValue::string($payload['groupId'] ?? null),
            article: WildberriesDtoValue::string($payload['article'] ?? null),
            colorCode: WildberriesDtoValue::string($payload['colorCode'] ?? null),
            rid: WildberriesDtoValue::string($payload['rid'] ?? null),
            createdAt: WildberriesDtoValue::string($payload['createdAt'] ?? null),
            deliveryType: WildberriesDtoValue::string($payload['deliveryType'] ?? null),
            skus: WildberriesDtoValue::array($payload['skus'] ?? null),
            id: WildberriesDtoValue::int($payload['id'] ?? null),
            warehouseId: WildberriesDtoValue::int($payload['warehouseId'] ?? null),
            nmId: WildberriesDtoValue::int($payload['nmId'] ?? null),
            chrtId: WildberriesDtoValue::int($payload['chrtId'] ?? null),
            price: WildberriesDtoValue::int($payload['price'] ?? null),
            finalPrice: WildberriesDtoValue::int($payload['finalPrice'] ?? null),
            convertedFinalPrice: WildberriesDtoValue::int($payload['convertedFinalPrice'] ?? null),
            convertedPrice: WildberriesDtoValue::int($payload['convertedPrice'] ?? null),
            currencyCode: WildberriesDtoValue::int($payload['currencyCode'] ?? null),
            convertedCurrencyCode: WildberriesDtoValue::int($payload['convertedCurrencyCode'] ?? null),
            cargoType: WildberriesDtoValue::int($payload['cargoType'] ?? null),
            isZeroOrder: WildberriesDtoValue::bool($payload['isZeroOrder'] ?? null),
            wbStickerId: WildberriesDtoValue::int($payload['wbStickerId'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['salePrice', 'requiredMeta', 'comment', 'options', 'address', 'orderUid', 'groupId', 'article', 'colorCode', 'rid', 'createdAt', 'deliveryType', 'skus', 'id', 'warehouseId', 'nmId', 'chrtId', 'price', 'finalPrice', 'convertedFinalPrice', 'convertedPrice', 'currencyCode', 'convertedCurrencyCode', 'cargoType', 'isZeroOrder', 'wbStickerId']),
        );
    }
}
