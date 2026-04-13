<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api\StocksReport;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class TableCommonMetrics implements WildberriesDtoInterface
{
    /**
     * @param list<FloatGraphByPeriodItem> $avgOrdersByMonth
     * @param array<array-key, mixed> $saleRate
     * @param array<array-key, mixed> $avgStockTurnover
     * @param array<array-key, mixed> $officeMissingTime
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $ordersCount,
        public ?int $ordersSum,
        public ?float $avgOrders,
        public array $avgOrdersByMonth,
        public ?int $buyoutCount,
        public ?int $buyoutSum,
        public ?int $buyoutPercent,
        public ?int $stockCount,
        public ?int $stockSum,
        public array $saleRate,
        public array $avgStockTurnover,
        public ?int $toClientCount,
        public ?int $fromClientCount,
        public array $officeMissingTime,
        public ?float $lostOrdersCount,
        public ?float $lostOrdersSum,
        public ?float $lostBuyoutsCount,
        public ?float $lostBuyoutsSum,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            ordersCount: WildberriesDtoValue::int($payload['ordersCount'] ?? null),
            ordersSum: WildberriesDtoValue::int($payload['ordersSum'] ?? null),
            avgOrders: WildberriesDtoValue::float($payload['avgOrders'] ?? null),
            avgOrdersByMonth: WildberriesDtoValue::objectList($payload['avgOrdersByMonth'] ?? null, FloatGraphByPeriodItem::class),
            buyoutCount: WildberriesDtoValue::int($payload['buyoutCount'] ?? null),
            buyoutSum: WildberriesDtoValue::int($payload['buyoutSum'] ?? null),
            buyoutPercent: WildberriesDtoValue::int($payload['buyoutPercent'] ?? null),
            stockCount: WildberriesDtoValue::int($payload['stockCount'] ?? null),
            stockSum: WildberriesDtoValue::int($payload['stockSum'] ?? null),
            saleRate: WildberriesDtoValue::array($payload['saleRate'] ?? null),
            avgStockTurnover: WildberriesDtoValue::array($payload['avgStockTurnover'] ?? null),
            toClientCount: WildberriesDtoValue::int($payload['toClientCount'] ?? null),
            fromClientCount: WildberriesDtoValue::int($payload['fromClientCount'] ?? null),
            officeMissingTime: WildberriesDtoValue::array($payload['officeMissingTime'] ?? null),
            lostOrdersCount: WildberriesDtoValue::float($payload['lostOrdersCount'] ?? null),
            lostOrdersSum: WildberriesDtoValue::float($payload['lostOrdersSum'] ?? null),
            lostBuyoutsCount: WildberriesDtoValue::float($payload['lostBuyoutsCount'] ?? null),
            lostBuyoutsSum: WildberriesDtoValue::float($payload['lostBuyoutsSum'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['ordersCount', 'ordersSum', 'avgOrders', 'avgOrdersByMonth', 'buyoutCount', 'buyoutSum', 'buyoutPercent', 'stockCount', 'stockSum', 'saleRate', 'avgStockTurnover', 'toClientCount', 'fromClientCount', 'officeMissingTime', 'lostOrdersCount', 'lostOrdersSum', 'lostBuyoutsCount', 'lostBuyoutsSum']),
        );
    }
}
