<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Marketplace;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class V3ArchiveOrder implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $crossBorder
     * @param array<array-key, mixed> $options
     * @param array<array-key, mixed> $priceInfo
     * @param array<array-key, mixed> $product
     * @param array<array-key, mixed> $status
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $cargoType,
        public ?string $colorCode,
        public ?string $createdAt,
        public array $crossBorder,
        public ?string $crossBorderType,
        public ?int $id,
        public ?bool $isZeroOrder,
        public ?MetaDetails $metaDetails,
        public array $options,
        public ?string $orderUid,
        public array $priceInfo,
        public array $product,
        public ?string $rid,
        public ?int $scanPrice,
        public array $status,
        public ?int $stickerId,
        public ?string $supplyId,
        public ?int $warehouseId,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            cargoType: WildberriesDtoValue::string($payload['cargoType'] ?? null),
            colorCode: WildberriesDtoValue::string($payload['colorCode'] ?? null),
            createdAt: WildberriesDtoValue::string($payload['createdAt'] ?? null),
            crossBorder: WildberriesDtoValue::array($payload['crossBorder'] ?? null),
            crossBorderType: WildberriesDtoValue::string($payload['crossBorderType'] ?? null),
            id: WildberriesDtoValue::int($payload['id'] ?? null),
            isZeroOrder: WildberriesDtoValue::bool($payload['isZeroOrder'] ?? null),
            metaDetails: WildberriesDtoValue::object($payload['metaDetails'] ?? null, MetaDetails::class),
            options: WildberriesDtoValue::array($payload['options'] ?? null),
            orderUid: WildberriesDtoValue::string($payload['orderUid'] ?? null),
            priceInfo: WildberriesDtoValue::array($payload['priceInfo'] ?? null),
            product: WildberriesDtoValue::array($payload['product'] ?? null),
            rid: WildberriesDtoValue::string($payload['rid'] ?? null),
            scanPrice: WildberriesDtoValue::int($payload['scanPrice'] ?? null),
            status: WildberriesDtoValue::array($payload['status'] ?? null),
            stickerId: WildberriesDtoValue::int($payload['stickerId'] ?? null),
            supplyId: WildberriesDtoValue::string($payload['supplyId'] ?? null),
            warehouseId: WildberriesDtoValue::int($payload['warehouseId'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['cargoType', 'colorCode', 'createdAt', 'crossBorder', 'crossBorderType', 'id', 'isZeroOrder', 'metaDetails', 'options', 'orderUid', 'priceInfo', 'product', 'rid', 'scanPrice', 'status', 'stickerId', 'supplyId', 'warehouseId']),
        );
    }
}
