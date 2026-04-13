<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\InStorePickup\Api\Marketplace;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ApiOrderStatusesV2 implements WildberriesDtoInterface
{
    /**
     * @param list<ApiOrderStatusV2> $orders
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
            orders: WildberriesDtoValue::objectList($payload['orders'] ?? null, ApiOrderStatusV2::class),
            extra: WildberriesDtoValue::extra($payload, ['orders']),
        );
    }
}
