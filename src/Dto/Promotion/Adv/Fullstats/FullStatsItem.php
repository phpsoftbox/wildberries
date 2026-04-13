<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Promotion\Adv\Fullstats;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class FullStatsItem implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $advertId,
        public ?int $atbs,
        public ?BoosterStatsV3 $boosterStats,
        public ?int $canceled,
        public ?int $clicks,
        public ?float $cpc,
        public ?float $cr,
        public ?float $ctr,
        public ?DaysV3 $days,
        public ?int $orders,
        public ?int $shks,
        public ?float $sum,
        public ?float $sumPrice,
        public ?int $views,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            advertId: WildberriesDtoValue::int($payload['advertId'] ?? null),
            atbs: WildberriesDtoValue::int($payload['atbs'] ?? null),
            boosterStats: WildberriesDtoValue::object($payload['boosterStats'] ?? null, BoosterStatsV3::class),
            canceled: WildberriesDtoValue::int($payload['canceled'] ?? null),
            clicks: WildberriesDtoValue::int($payload['clicks'] ?? null),
            cpc: WildberriesDtoValue::float($payload['cpc'] ?? null),
            cr: WildberriesDtoValue::float($payload['cr'] ?? null),
            ctr: WildberriesDtoValue::float($payload['ctr'] ?? null),
            days: WildberriesDtoValue::object($payload['days'] ?? null, DaysV3::class),
            orders: WildberriesDtoValue::int($payload['orders'] ?? null),
            shks: WildberriesDtoValue::int($payload['shks'] ?? null),
            sum: WildberriesDtoValue::float($payload['sum'] ?? null),
            sumPrice: WildberriesDtoValue::float($payload['sum_price'] ?? null),
            views: WildberriesDtoValue::int($payload['views'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['advertId', 'atbs', 'boosterStats', 'canceled', 'clicks', 'cpc', 'cr', 'ctr', 'days', 'orders', 'shks', 'sum', 'sum_price', 'views']),
        );
    }
}
