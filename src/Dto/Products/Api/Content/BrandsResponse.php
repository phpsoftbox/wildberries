<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Products\Api\Content;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class BrandsResponse implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $brands
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $brands,
        public ?int $next,
        public ?int $total,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            brands: WildberriesDtoValue::array($payload['brands'] ?? null),
            next: WildberriesDtoValue::int($payload['next'] ?? null),
            total: WildberriesDtoValue::int($payload['total'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['brands', 'next', 'total']),
        );
    }
}
