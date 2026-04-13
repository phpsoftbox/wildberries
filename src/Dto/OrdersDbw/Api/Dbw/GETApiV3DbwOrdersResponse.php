<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersDbw\Api\Dbw;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class GETApiV3DbwOrdersResponse implements WildberriesDtoInterface
{
    /**
     * @param list<Order> $orders
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?Next $next,
        public array $orders,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            next: WildberriesDtoValue::object($payload['next'] ?? null, Next::class),
            orders: WildberriesDtoValue::objectList($payload['orders'] ?? null, Order::class),
            extra: WildberriesDtoValue::extra($payload, ['next', 'orders']),
        );
    }
}
