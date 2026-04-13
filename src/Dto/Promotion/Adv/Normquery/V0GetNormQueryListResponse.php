<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Promotion\Adv\Normquery;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class V0GetNormQueryListResponse implements WildberriesDtoInterface
{
    /**
     * @param list<V0GetNormQueryListResponseItem> $items
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
            items: WildberriesDtoValue::objectList($payload['items'] ?? null, V0GetNormQueryListResponseItem::class),
            extra: WildberriesDtoValue::extra($payload, ['items']),
        );
    }
}
