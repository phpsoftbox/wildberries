<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersDbw\Api\Dbw;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class OrderCourierInfoResp implements WildberriesDtoInterface
{
    /**
     * @param list<OrderCourierInfo> $orders
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
            orders: WildberriesDtoValue::objectList($payload['orders'] ?? null, OrderCourierInfo::class),
            extra: WildberriesDtoValue::extra($payload, ['orders']),
        );
    }
}
