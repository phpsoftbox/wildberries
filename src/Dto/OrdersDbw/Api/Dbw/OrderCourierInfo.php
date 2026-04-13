<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersDbw\Api\Dbw;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class OrderCourierInfo implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?CourierInfo $courierInfo,
        public ?int $orderID,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            courierInfo: WildberriesDtoValue::object($payload['courierInfo'] ?? null, CourierInfo::class),
            orderID: WildberriesDtoValue::int($payload['orderID'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['courierInfo', 'orderID']),
        );
    }
}
