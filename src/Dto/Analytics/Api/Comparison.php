<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class Comparison implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $timeToReadyDynamic
     * @param array<array-key, mixed> $wbClubDynamic
     * @param array<array-key, mixed> $conversions
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $openCountDynamic,
        public ?int $cartCountDynamic,
        public ?int $orderCountDynamic,
        public ?int $orderSumDynamic,
        public ?int $buyoutCountDynamic,
        public ?int $buyoutSumDynamic,
        public ?int $cancelCountDynamic,
        public ?int $cancelSumDynamic,
        public ?int $avgOrdersCountPerDayDynamic,
        public ?int $avgPriceDynamic,
        public ?int $shareOrderPercentDynamic,
        public ?int $addToWishlistDynamic,
        public array $timeToReadyDynamic,
        public ?int $localizationPercentDynamic,
        public array $wbClubDynamic,
        public array $conversions,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            openCountDynamic: WildberriesDtoValue::int($payload['openCountDynamic'] ?? null),
            cartCountDynamic: WildberriesDtoValue::int($payload['cartCountDynamic'] ?? null),
            orderCountDynamic: WildberriesDtoValue::int($payload['orderCountDynamic'] ?? null),
            orderSumDynamic: WildberriesDtoValue::int($payload['orderSumDynamic'] ?? null),
            buyoutCountDynamic: WildberriesDtoValue::int($payload['buyoutCountDynamic'] ?? null),
            buyoutSumDynamic: WildberriesDtoValue::int($payload['buyoutSumDynamic'] ?? null),
            cancelCountDynamic: WildberriesDtoValue::int($payload['cancelCountDynamic'] ?? null),
            cancelSumDynamic: WildberriesDtoValue::int($payload['cancelSumDynamic'] ?? null),
            avgOrdersCountPerDayDynamic: WildberriesDtoValue::int($payload['avgOrdersCountPerDayDynamic'] ?? null),
            avgPriceDynamic: WildberriesDtoValue::int($payload['avgPriceDynamic'] ?? null),
            shareOrderPercentDynamic: WildberriesDtoValue::int($payload['shareOrderPercentDynamic'] ?? null),
            addToWishlistDynamic: WildberriesDtoValue::int($payload['addToWishlistDynamic'] ?? null),
            timeToReadyDynamic: WildberriesDtoValue::array($payload['timeToReadyDynamic'] ?? null),
            localizationPercentDynamic: WildberriesDtoValue::int($payload['localizationPercentDynamic'] ?? null),
            wbClubDynamic: WildberriesDtoValue::array($payload['wbClubDynamic'] ?? null),
            conversions: WildberriesDtoValue::array($payload['conversions'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['openCountDynamic', 'cartCountDynamic', 'orderCountDynamic', 'orderSumDynamic', 'buyoutCountDynamic', 'buyoutSumDynamic', 'cancelCountDynamic', 'cancelSumDynamic', 'avgOrdersCountPerDayDynamic', 'avgPriceDynamic', 'shareOrderPercentDynamic', 'addToWishlistDynamic', 'timeToReadyDynamic', 'localizationPercentDynamic', 'wbClubDynamic', 'conversions']),
        );
    }
}
