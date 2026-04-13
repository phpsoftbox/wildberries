<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class Statistic implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $period
     * @param array<array-key, mixed> $timeToReady
     * @param array<array-key, mixed> $wbClub
     * @param array<array-key, mixed> $conversions
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $period,
        public ?int $openCount,
        public ?int $cartCount,
        public ?int $orderCount,
        public ?int $orderSum,
        public ?int $buyoutCount,
        public ?int $buyoutSum,
        public ?int $cancelCount,
        public ?int $cancelSum,
        public ?int $avgPrice,
        public ?float $avgOrdersCountPerDay,
        public ?float $shareOrderPercent,
        public ?int $addToWishlist,
        public array $timeToReady,
        public ?int $localizationPercent,
        public array $wbClub,
        public array $conversions,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            period: WildberriesDtoValue::array($payload['period'] ?? null),
            openCount: WildberriesDtoValue::int($payload['openCount'] ?? null),
            cartCount: WildberriesDtoValue::int($payload['cartCount'] ?? null),
            orderCount: WildberriesDtoValue::int($payload['orderCount'] ?? null),
            orderSum: WildberriesDtoValue::int($payload['orderSum'] ?? null),
            buyoutCount: WildberriesDtoValue::int($payload['buyoutCount'] ?? null),
            buyoutSum: WildberriesDtoValue::int($payload['buyoutSum'] ?? null),
            cancelCount: WildberriesDtoValue::int($payload['cancelCount'] ?? null),
            cancelSum: WildberriesDtoValue::int($payload['cancelSum'] ?? null),
            avgPrice: WildberriesDtoValue::int($payload['avgPrice'] ?? null),
            avgOrdersCountPerDay: WildberriesDtoValue::float($payload['avgOrdersCountPerDay'] ?? null),
            shareOrderPercent: WildberriesDtoValue::float($payload['shareOrderPercent'] ?? null),
            addToWishlist: WildberriesDtoValue::int($payload['addToWishlist'] ?? null),
            timeToReady: WildberriesDtoValue::array($payload['timeToReady'] ?? null),
            localizationPercent: WildberriesDtoValue::int($payload['localizationPercent'] ?? null),
            wbClub: WildberriesDtoValue::array($payload['wbClub'] ?? null),
            conversions: WildberriesDtoValue::array($payload['conversions'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['period', 'openCount', 'cartCount', 'orderCount', 'orderSum', 'buyoutCount', 'buyoutSum', 'cancelCount', 'cancelSum', 'avgPrice', 'avgOrdersCountPerDay', 'shareOrderPercent', 'addToWishlist', 'timeToReady', 'localizationPercent', 'wbClub', 'conversions']),
        );
    }
}
