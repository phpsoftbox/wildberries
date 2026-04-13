<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Promotion\Adv\Normquery;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class V0GetNormQueryStatsResponse implements WildberriesDtoInterface
{
    /**
     * @param list<V0GetNormQueryStatsItem> $stats
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $stats,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            stats: WildberriesDtoValue::objectList($payload['stats'] ?? null, V0GetNormQueryStatsItem::class),
            extra: WildberriesDtoValue::extra($payload, ['stats']),
        );
    }
}
