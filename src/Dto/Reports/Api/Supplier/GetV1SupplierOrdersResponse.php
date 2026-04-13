<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Reports\Api\Supplier;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class GetV1SupplierOrdersResponse implements WildberriesDtoInterface
{
    /**
     * @param list<OrdersItem> $value
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $value,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        $payload = ['value' => $payload];

        return new self(
            value: WildberriesDtoValue::objectList($payload['value'] ?? null, OrdersItem::class),
            extra: WildberriesDtoValue::extra($payload, ['value']),
        );
    }
}
