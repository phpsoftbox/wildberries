<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\InStorePickup\Api\ClickCollect;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ApiNewOrder implements WildberriesDtoInterface
{
    /**
     * @param list<string> $requiredMeta
     * @param list<string> $skus
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $ddate,
        public ?int $salePrice,
        public array $requiredMeta,
        public ?string $article,
        public ?string $rid,
        public ?string $createdAt,
        public ?string $warehouseAddress,
        public ?string $orderCode,
        public ?string $payMode,
        public array $skus,
        public ?int $id,
        public ?int $warehouseId,
        public ?int $nmId,
        public ?int $chrtId,
        public ?int $price,
        public ?int $finalPrice,
        public ?int $convertedPrice,
        public ?int $convertedFinalPrice,
        public ?int $currencyCode,
        public ?int $convertedCurrencyCode,
        public ?int $cargoType,
        public ?bool $isZeroOrder,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            ddate: WildberriesDtoValue::string($payload['ddate'] ?? null),
            salePrice: WildberriesDtoValue::int($payload['salePrice'] ?? null),
            requiredMeta: WildberriesDtoValue::array($payload['requiredMeta'] ?? null),
            article: WildberriesDtoValue::string($payload['article'] ?? null),
            rid: WildberriesDtoValue::string($payload['rid'] ?? null),
            createdAt: WildberriesDtoValue::string($payload['createdAt'] ?? null),
            warehouseAddress: WildberriesDtoValue::string($payload['warehouseAddress'] ?? null),
            orderCode: WildberriesDtoValue::string($payload['orderCode'] ?? null),
            payMode: WildberriesDtoValue::string($payload['payMode'] ?? null),
            skus: WildberriesDtoValue::array($payload['skus'] ?? null),
            id: WildberriesDtoValue::int($payload['id'] ?? null),
            warehouseId: WildberriesDtoValue::int($payload['warehouseId'] ?? null),
            nmId: WildberriesDtoValue::int($payload['nmId'] ?? null),
            chrtId: WildberriesDtoValue::int($payload['chrtId'] ?? null),
            price: WildberriesDtoValue::int($payload['price'] ?? null),
            finalPrice: WildberriesDtoValue::int($payload['finalPrice'] ?? null),
            convertedPrice: WildberriesDtoValue::int($payload['convertedPrice'] ?? null),
            convertedFinalPrice: WildberriesDtoValue::int($payload['convertedFinalPrice'] ?? null),
            currencyCode: WildberriesDtoValue::int($payload['currencyCode'] ?? null),
            convertedCurrencyCode: WildberriesDtoValue::int($payload['convertedCurrencyCode'] ?? null),
            cargoType: WildberriesDtoValue::int($payload['cargoType'] ?? null),
            isZeroOrder: WildberriesDtoValue::bool($payload['isZeroOrder'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['ddate', 'salePrice', 'requiredMeta', 'article', 'rid', 'createdAt', 'warehouseAddress', 'orderCode', 'payMode', 'skus', 'id', 'warehouseId', 'nmId', 'chrtId', 'price', 'finalPrice', 'convertedPrice', 'convertedFinalPrice', 'currencyCode', 'convertedCurrencyCode', 'cargoType', 'isZeroOrder']),
        );
    }
}
