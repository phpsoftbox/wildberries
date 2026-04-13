<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Passes;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class PassOffice implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $name,
        public ?string $address,
        public ?int $id,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            name: WildberriesDtoValue::string($payload['name'] ?? null),
            address: WildberriesDtoValue::string($payload['address'] ?? null),
            id: WildberriesDtoValue::int($payload['id'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['name', 'address', 'id']),
        );
    }
}
