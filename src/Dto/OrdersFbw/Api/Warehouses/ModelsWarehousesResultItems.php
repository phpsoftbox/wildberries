<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersFbw\Api\Warehouses;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ModelsWarehousesResultItems implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $iD,
        public ?string $name,
        public ?string $address,
        public ?string $workTime,
        public ?bool $isActive,
        public ?bool $isTransitActive,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            iD: WildberriesDtoValue::int($payload['ID'] ?? null),
            name: WildberriesDtoValue::string($payload['name'] ?? null),
            address: WildberriesDtoValue::string($payload['address'] ?? null),
            workTime: WildberriesDtoValue::string($payload['workTime'] ?? null),
            isActive: WildberriesDtoValue::bool($payload['isActive'] ?? null),
            isTransitActive: WildberriesDtoValue::bool($payload['isTransitActive'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['ID', 'name', 'address', 'workTime', 'isActive', 'isTransitActive']),
        );
    }
}
