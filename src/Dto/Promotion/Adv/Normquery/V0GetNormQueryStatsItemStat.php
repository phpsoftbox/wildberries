<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Promotion\Adv\Normquery;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class V0GetNormQueryStatsItemStat implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $normQuery,
        public ?int $views,
        public ?int $clicks,
        public ?int $atbs,
        public ?int $orders,
        public ?float $ctr,
        public ?float $cpc,
        public ?float $cpm,
        public ?float $avgPos,
        public ?int $shks,
        public ?float $spend,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            normQuery: WildberriesDtoValue::string($payload['norm_query'] ?? null),
            views: WildberriesDtoValue::int($payload['views'] ?? null),
            clicks: WildberriesDtoValue::int($payload['clicks'] ?? null),
            atbs: WildberriesDtoValue::int($payload['atbs'] ?? null),
            orders: WildberriesDtoValue::int($payload['orders'] ?? null),
            ctr: WildberriesDtoValue::float($payload['ctr'] ?? null),
            cpc: WildberriesDtoValue::float($payload['cpc'] ?? null),
            cpm: WildberriesDtoValue::float($payload['cpm'] ?? null),
            avgPos: WildberriesDtoValue::float($payload['avg_pos'] ?? null),
            shks: WildberriesDtoValue::int($payload['shks'] ?? null),
            spend: WildberriesDtoValue::float($payload['spend'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['norm_query', 'views', 'clicks', 'atbs', 'orders', 'ctr', 'cpc', 'cpm', 'avg_pos', 'shks', 'spend']),
        );
    }
}
