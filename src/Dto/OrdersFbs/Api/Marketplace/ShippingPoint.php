<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Marketplace;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ShippingPoint implements WildberriesDtoInterface
{
    /**
     * @param list<int> $cargoTypes
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $id,
        public ?string $name,
        public ?string $address,
        public ?string $city,
        public ?string $officeType,
        public array $cargoTypes,
        public ?float $latitude,
        public ?float $longitude,
        public ?bool $fulfillment,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            id: WildberriesDtoValue::int($payload['id'] ?? null),
            name: WildberriesDtoValue::string($payload['name'] ?? null),
            address: WildberriesDtoValue::string($payload['address'] ?? null),
            city: WildberriesDtoValue::string($payload['city'] ?? null),
            officeType: WildberriesDtoValue::string($payload['officeType'] ?? null),
            cargoTypes: WildberriesDtoValue::array($payload['cargoTypes'] ?? null),
            latitude: WildberriesDtoValue::float($payload['latitude'] ?? null),
            longitude: WildberriesDtoValue::float($payload['longitude'] ?? null),
            fulfillment: WildberriesDtoValue::bool($payload['fulfillment'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['id', 'name', 'address', 'city', 'officeType', 'cargoTypes', 'latitude', 'longitude', 'fulfillment']),
        );
    }
}
