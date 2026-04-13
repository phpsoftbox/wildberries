<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Promotion\Adv\Stats;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class StatDate implements WildberriesDtoInterface
{
    /**
     * @param list<string> $dates
     * @param list<StatsBlok2> $stats
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $dates,
        public array $stats,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            dates: WildberriesDtoValue::array($payload['dates'] ?? null),
            stats: WildberriesDtoValue::objectList($payload['stats'] ?? null, StatsBlok2::class),
            extra: WildberriesDtoValue::extra($payload, ['dates', 'stats']),
        );
    }
}
