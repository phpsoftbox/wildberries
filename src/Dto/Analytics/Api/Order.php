<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class Order implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $nmId,
        public ?int $chrtId,
        public ?string $srid,
        public ?string $createdAt,
        public ?string $updatedAt,
        public ?string $status,
        public ?string $cancelType,
        public ?string $warehouseName,
        public ?string $warehouseRegion,
        public ?bool $isMp,
        public ?string $destinationCity,
        public ?string $destinationDistrict,
        public ?float $sellerPrice,
        public ?bool $isB2b,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            nmId: WildberriesDtoValue::int($payload['nmId'] ?? null),
            chrtId: WildberriesDtoValue::int($payload['chrtId'] ?? null),
            srid: WildberriesDtoValue::string($payload['srid'] ?? null),
            createdAt: WildberriesDtoValue::string($payload['createdAt'] ?? null),
            updatedAt: WildberriesDtoValue::string($payload['updatedAt'] ?? null),
            status: WildberriesDtoValue::string($payload['status'] ?? null),
            cancelType: WildberriesDtoValue::string($payload['cancelType'] ?? null),
            warehouseName: WildberriesDtoValue::string($payload['warehouseName'] ?? null),
            warehouseRegion: WildberriesDtoValue::string($payload['warehouseRegion'] ?? null),
            isMp: WildberriesDtoValue::bool($payload['isMp'] ?? null),
            destinationCity: WildberriesDtoValue::string($payload['destinationCity'] ?? null),
            destinationDistrict: WildberriesDtoValue::string($payload['destinationDistrict'] ?? null),
            sellerPrice: WildberriesDtoValue::float($payload['sellerPrice'] ?? null),
            isB2b: WildberriesDtoValue::bool($payload['isB2b'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['nmId', 'chrtId', 'srid', 'createdAt', 'updatedAt', 'status', 'cancelType', 'warehouseName', 'warehouseRegion', 'isMp', 'destinationCity', 'destinationDistrict', 'sellerPrice', 'isB2b']),
        );
    }
}
