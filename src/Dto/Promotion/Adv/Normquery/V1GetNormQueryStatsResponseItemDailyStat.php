<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Promotion\Adv\Normquery;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class V1GetNormQueryStatsResponseItemDailyStat implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $date,
        public ?V1GetNormQueryStatsResponseItemStat $stat,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            date: WildberriesDtoValue::string($payload['date'] ?? null),
            stat: WildberriesDtoValue::object($payload['stat'] ?? null, V1GetNormQueryStatsResponseItemStat::class),
            extra: WildberriesDtoValue::extra($payload, ['date', 'stat']),
        );
    }
}
