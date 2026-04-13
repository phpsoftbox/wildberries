<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Products\Api\Warehouses;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class Warehouse implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $name,
        public ?int $officeId,
        public ?int $id,
        public ?int $cargoType,
        public ?int $deliveryType,
        public ?bool $isDeleting,
        public ?bool $isProcessing,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            name: WildberriesDtoValue::string($payload['name'] ?? null),
            officeId: WildberriesDtoValue::int($payload['officeId'] ?? null),
            id: WildberriesDtoValue::int($payload['id'] ?? null),
            cargoType: WildberriesDtoValue::int($payload['cargoType'] ?? null),
            deliveryType: WildberriesDtoValue::int($payload['deliveryType'] ?? null),
            isDeleting: WildberriesDtoValue::bool($payload['isDeleting'] ?? null),
            isProcessing: WildberriesDtoValue::bool($payload['isProcessing'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['name', 'officeId', 'id', 'cargoType', 'deliveryType', 'isDeleting', 'isProcessing']),
        );
    }
}
