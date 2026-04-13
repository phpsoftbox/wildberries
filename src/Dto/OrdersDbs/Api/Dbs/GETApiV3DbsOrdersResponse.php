<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Dbs;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class GETApiV3DbsOrdersResponse implements WildberriesDtoInterface
{
    /**
     * @param list<OrderDBS> $orders
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
            orders: WildberriesDtoValue::objectList($payload['orders'] ?? null, OrderDBS::class),
            extra: WildberriesDtoValue::extra($payload, ['next', 'orders']),
        );
    }
}
