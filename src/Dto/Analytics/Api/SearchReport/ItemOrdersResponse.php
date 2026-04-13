<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api\SearchReport;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ItemOrdersResponse implements WildberriesDtoInterface
{
    /**
     * @param list<ItemOrdersMetrics> $total
     * @param list<ItemOrdersTextItem> $items
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $total,
        public array $items,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            total: WildberriesDtoValue::objectList($payload['total'] ?? null, ItemOrdersMetrics::class),
            items: WildberriesDtoValue::objectList($payload['items'] ?? null, ItemOrdersTextItem::class),
            extra: WildberriesDtoValue::extra($payload, ['total', 'items']),
        );
    }
}
