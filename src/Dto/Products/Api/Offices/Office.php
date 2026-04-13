<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Products\Api\Offices;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class Office implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $address,
        public ?string $name,
        public ?string $city,
        public ?int $id,
        public ?float $longitude,
        public ?float $latitude,
        public ?int $cargoType,
        public ?int $deliveryType,
        public ?string $federalDistrict,
        public ?bool $selected,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            address: WildberriesDtoValue::string($payload['address'] ?? null),
            name: WildberriesDtoValue::string($payload['name'] ?? null),
            city: WildberriesDtoValue::string($payload['city'] ?? null),
            id: WildberriesDtoValue::int($payload['id'] ?? null),
            longitude: WildberriesDtoValue::float($payload['longitude'] ?? null),
            latitude: WildberriesDtoValue::float($payload['latitude'] ?? null),
            cargoType: WildberriesDtoValue::int($payload['cargoType'] ?? null),
            deliveryType: WildberriesDtoValue::int($payload['deliveryType'] ?? null),
            federalDistrict: WildberriesDtoValue::string($payload['federalDistrict'] ?? null),
            selected: WildberriesDtoValue::bool($payload['selected'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['address', 'name', 'city', 'id', 'longitude', 'latitude', 'cargoType', 'deliveryType', 'federalDistrict', 'selected']),
        );
    }
}
