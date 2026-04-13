<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Promotion\Adv\Stats;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class StatsBlok1 implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $itemId,
        public ?string $itemName,
        public ?string $categoryName,
        public ?int $advertType,
        public ?int $place,
        public ?int $views,
        public ?int $clicks,
        public ?float $cr,
        public ?float $ctr,
        public ?string $dateFrom,
        public ?string $dateTo,
        public ?string $subjectName,
        public ?int $atbs,
        public ?int $orders,
        public ?float $price,
        public ?float $cpc,
        public ?int $status,
        public ?DailyStats1 $dailyStats,
        public ?float $expenses,
        public ?float $cr1,
        public ?int $cr2,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            itemId: WildberriesDtoValue::int($payload['item_id'] ?? null),
            itemName: WildberriesDtoValue::string($payload['item_name'] ?? null),
            categoryName: WildberriesDtoValue::string($payload['category_name'] ?? null),
            advertType: WildberriesDtoValue::int($payload['advert_type'] ?? null),
            place: WildberriesDtoValue::int($payload['place'] ?? null),
            views: WildberriesDtoValue::int($payload['views'] ?? null),
            clicks: WildberriesDtoValue::int($payload['clicks'] ?? null),
            cr: WildberriesDtoValue::float($payload['cr'] ?? null),
            ctr: WildberriesDtoValue::float($payload['ctr'] ?? null),
            dateFrom: WildberriesDtoValue::string($payload['date_from'] ?? null),
            dateTo: WildberriesDtoValue::string($payload['date_to'] ?? null),
            subjectName: WildberriesDtoValue::string($payload['subject_name'] ?? null),
            atbs: WildberriesDtoValue::int($payload['atbs'] ?? null),
            orders: WildberriesDtoValue::int($payload['orders'] ?? null),
            price: WildberriesDtoValue::float($payload['price'] ?? null),
            cpc: WildberriesDtoValue::float($payload['cpc'] ?? null),
            status: WildberriesDtoValue::int($payload['status'] ?? null),
            dailyStats: WildberriesDtoValue::object($payload['daily_stats'] ?? null, DailyStats1::class),
            expenses: WildberriesDtoValue::float($payload['expenses'] ?? null),
            cr1: WildberriesDtoValue::float($payload['cr1'] ?? null),
            cr2: WildberriesDtoValue::int($payload['cr2'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['item_id', 'item_name', 'category_name', 'advert_type', 'place', 'views', 'clicks', 'cr', 'ctr', 'date_from', 'date_to', 'subject_name', 'atbs', 'orders', 'price', 'cpc', 'status', 'daily_stats', 'expenses', 'cr1', 'cr2']),
        );
    }
}
