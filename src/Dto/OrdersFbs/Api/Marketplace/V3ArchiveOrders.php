<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Marketplace;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class V3ArchiveOrders implements WildberriesDtoInterface
{
    /**
     * @param list<V3ArchiveOrder> $orders
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $next,
        public array $orders,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            next: WildberriesDtoValue::int($payload['next'] ?? null),
            orders: WildberriesDtoValue::objectList($payload['orders'] ?? null, V3ArchiveOrder::class),
            extra: WildberriesDtoValue::extra($payload, ['next', 'orders']),
        );
    }
}
