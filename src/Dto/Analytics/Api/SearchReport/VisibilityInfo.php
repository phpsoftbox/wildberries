<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api\SearchReport;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class VisibilityInfo implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $visibility
     * @param array<array-key, mixed> $openCard
     * @param array<array-key, mixed> $byDay
     * @param array<array-key, mixed> $byWeek
     * @param array<array-key, mixed> $byMonth
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $visibility,
        public array $openCard,
        public array $byDay,
        public array $byWeek,
        public array $byMonth,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            visibility: WildberriesDtoValue::array($payload['visibility'] ?? null),
            openCard: WildberriesDtoValue::array($payload['openCard'] ?? null),
            byDay: WildberriesDtoValue::array($payload['byDay'] ?? null),
            byWeek: WildberriesDtoValue::array($payload['byWeek'] ?? null),
            byMonth: WildberriesDtoValue::array($payload['byMonth'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['visibility', 'openCard', 'byDay', 'byWeek', 'byMonth']),
        );
    }
}
