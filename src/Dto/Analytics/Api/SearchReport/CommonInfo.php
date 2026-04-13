<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api\SearchReport;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class CommonInfo implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $supplierRating
     * @param array<array-key, mixed> $advertisedProducts
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $supplierRating,
        public array $advertisedProducts,
        public ?int $totalProducts,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            supplierRating: WildberriesDtoValue::array($payload['supplierRating'] ?? null),
            advertisedProducts: WildberriesDtoValue::array($payload['advertisedProducts'] ?? null),
            totalProducts: WildberriesDtoValue::int($payload['totalProducts'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['supplierRating', 'advertisedProducts', 'totalProducts']),
        );
    }
}
