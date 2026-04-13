<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Orders;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class GETApiV3OrdersNewResponse implements WildberriesDtoInterface
{
    /**
     * @param list<OrderNew> $orders
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $orders,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            orders: WildberriesDtoValue::objectList($payload['orders'] ?? null, OrderNew::class),
            extra: WildberriesDtoValue::extra($payload, ['orders']),
        );
    }
}
