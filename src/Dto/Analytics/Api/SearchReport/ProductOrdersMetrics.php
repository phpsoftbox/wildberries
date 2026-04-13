<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api\SearchReport;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ProductOrdersMetrics implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $dt,
        public ?int $avgPosition,
        public ?int $orders,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            dt: WildberriesDtoValue::string($payload['dt'] ?? null),
            avgPosition: WildberriesDtoValue::int($payload['avgPosition'] ?? null),
            orders: WildberriesDtoValue::int($payload['orders'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['dt', 'avgPosition', 'orders']),
        );
    }
}
