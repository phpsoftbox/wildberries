<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\General\Api\Common;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class PlanBuilderOptionShort implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $id,
        public ?string $slug,
        public ?string $name,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            id: WildberriesDtoValue::string($payload['id'] ?? null),
            slug: WildberriesDtoValue::string($payload['slug'] ?? null),
            name: WildberriesDtoValue::string($payload['name'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['id', 'slug', 'name']),
        );
    }
}
