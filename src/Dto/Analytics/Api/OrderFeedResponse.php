<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class OrderFeedResponse implements WildberriesDtoInterface
{
    /**
     * @param list<Order> $orders
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $snapshotTime,
        public ?Currency $currency,
        public array $orders,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            snapshotTime: WildberriesDtoValue::string($payload['snapshotTime'] ?? null),
            currency: WildberriesDtoValue::object($payload['currency'] ?? null, Currency::class),
            orders: WildberriesDtoValue::objectList($payload['orders'] ?? null, Order::class),
            extra: WildberriesDtoValue::extra($payload, ['snapshotTime', 'currency', 'orders']),
        );
    }
}
