<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Promotion\Adv\Stats;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class StatInterval implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $interval
     * @param list<StatsBlok1> $stats
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $interval,
        public array $stats,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            interval: WildberriesDtoValue::array($payload['interval'] ?? null),
            stats: WildberriesDtoValue::objectList($payload['stats'] ?? null, StatsBlok1::class),
            extra: WildberriesDtoValue::extra($payload, ['interval', 'stats']),
        );
    }
}
