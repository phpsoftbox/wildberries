<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Promotion\Adv\Normquery;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class V1GetNormQueryStatsResponse implements WildberriesDtoInterface
{
    /**
     * @param list<V1GetNormQueryStatsResponseItem> $items
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $items,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            items: WildberriesDtoValue::objectList($payload['items'] ?? null, V1GetNormQueryStatsResponseItem::class),
            extra: WildberriesDtoValue::extra($payload, ['items']),
        );
    }
}
