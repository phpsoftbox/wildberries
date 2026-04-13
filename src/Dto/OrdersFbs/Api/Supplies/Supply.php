<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Supplies;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class Supply implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $id,
        public ?bool $isB2b,
        public ?bool $done,
        public ?string $createdAt,
        public ?string $closedAt,
        public ?string $scanDt,
        public ?string $name,
        public ?int $cargoType,
        public ?int $crossBorderType,
        public ?int $destinationOfficeId,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            id: WildberriesDtoValue::string($payload['id'] ?? null),
            isB2b: WildberriesDtoValue::bool($payload['isB2b'] ?? null),
            done: WildberriesDtoValue::bool($payload['done'] ?? null),
            createdAt: WildberriesDtoValue::string($payload['createdAt'] ?? null),
            closedAt: WildberriesDtoValue::string($payload['closedAt'] ?? null),
            scanDt: WildberriesDtoValue::string($payload['scanDt'] ?? null),
            name: WildberriesDtoValue::string($payload['name'] ?? null),
            cargoType: WildberriesDtoValue::int($payload['cargoType'] ?? null),
            crossBorderType: WildberriesDtoValue::int($payload['crossBorderType'] ?? null),
            destinationOfficeId: WildberriesDtoValue::int($payload['destinationOfficeId'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['id', 'isB2b', 'done', 'createdAt', 'closedAt', 'scanDt', 'name', 'cargoType', 'crossBorderType', 'destinationOfficeId']),
        );
    }
}
