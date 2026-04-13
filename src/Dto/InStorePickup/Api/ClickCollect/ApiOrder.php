<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\InStorePickup\Api\ClickCollect;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ApiOrder implements WildberriesDtoInterface
{
    /**
     * @param list<string> $skus
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $article,
        public ?int $cargoType,
        public ?int $chrtId,
        public ?string $createdAt,
        public ?int $price,
        public ?int $finalPrice,
        public ?int $convertedPrice,
        public ?int $convertedFinalPrice,
        public ?int $currencyCode,
        public ?int $convertedCurrencyCode,
        public ?int $id,
        public ?bool $isZeroOrder,
        public ?int $nmId,
        public ?string $orderCode,
        public ?string $payMode,
        public ?string $rid,
        public array $skus,
        public ?string $warehouseAddress,
        public ?int $warehouseId,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            article: WildberriesDtoValue::string($payload['article'] ?? null),
            cargoType: WildberriesDtoValue::int($payload['cargoType'] ?? null),
            chrtId: WildberriesDtoValue::int($payload['chrtId'] ?? null),
            createdAt: WildberriesDtoValue::string($payload['createdAt'] ?? null),
            price: WildberriesDtoValue::int($payload['price'] ?? null),
            finalPrice: WildberriesDtoValue::int($payload['finalPrice'] ?? null),
            convertedPrice: WildberriesDtoValue::int($payload['convertedPrice'] ?? null),
            convertedFinalPrice: WildberriesDtoValue::int($payload['convertedFinalPrice'] ?? null),
            currencyCode: WildberriesDtoValue::int($payload['currencyCode'] ?? null),
            convertedCurrencyCode: WildberriesDtoValue::int($payload['convertedCurrencyCode'] ?? null),
            id: WildberriesDtoValue::int($payload['id'] ?? null),
            isZeroOrder: WildberriesDtoValue::bool($payload['isZeroOrder'] ?? null),
            nmId: WildberriesDtoValue::int($payload['nmId'] ?? null),
            orderCode: WildberriesDtoValue::string($payload['orderCode'] ?? null),
            payMode: WildberriesDtoValue::string($payload['payMode'] ?? null),
            rid: WildberriesDtoValue::string($payload['rid'] ?? null),
            skus: WildberriesDtoValue::array($payload['skus'] ?? null),
            warehouseAddress: WildberriesDtoValue::string($payload['warehouseAddress'] ?? null),
            warehouseId: WildberriesDtoValue::int($payload['warehouseId'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['article', 'cargoType', 'chrtId', 'createdAt', 'price', 'finalPrice', 'convertedPrice', 'convertedFinalPrice', 'currencyCode', 'convertedCurrencyCode', 'id', 'isZeroOrder', 'nmId', 'orderCode', 'payMode', 'rid', 'skus', 'warehouseAddress', 'warehouseId']),
        );
    }
}
