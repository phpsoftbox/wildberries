<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class WbClubMetricsDynamic implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $orderCount,
        public ?int $orderSum,
        public ?int $buyoutSum,
        public ?int $buyoutCount,
        public ?int $cancelSum,
        public ?int $cancelCount,
        public ?int $avgPrice,
        public ?int $buyoutPercent,
        public ?float $avgOrderCountPerDay,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            orderCount: WildberriesDtoValue::int($payload['orderCount'] ?? null),
            orderSum: WildberriesDtoValue::int($payload['orderSum'] ?? null),
            buyoutSum: WildberriesDtoValue::int($payload['buyoutSum'] ?? null),
            buyoutCount: WildberriesDtoValue::int($payload['buyoutCount'] ?? null),
            cancelSum: WildberriesDtoValue::int($payload['cancelSum'] ?? null),
            cancelCount: WildberriesDtoValue::int($payload['cancelCount'] ?? null),
            avgPrice: WildberriesDtoValue::int($payload['avgPrice'] ?? null),
            buyoutPercent: WildberriesDtoValue::int($payload['buyoutPercent'] ?? null),
            avgOrderCountPerDay: WildberriesDtoValue::float($payload['avgOrderCountPerDay'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['orderCount', 'orderSum', 'buyoutSum', 'buyoutCount', 'cancelSum', 'cancelCount', 'avgPrice', 'buyoutPercent', 'avgOrderCountPerDay']),
        );
    }
}
