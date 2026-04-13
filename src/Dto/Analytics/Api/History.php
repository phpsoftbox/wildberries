<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class History implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $date,
        public ?int $openCount,
        public ?int $cartCount,
        public ?int $orderCount,
        public ?int $orderSum,
        public ?int $buyoutCount,
        public ?int $buyoutSum,
        public ?int $buyoutPercent,
        public ?int $addToCartConversion,
        public ?int $cartToOrderConversion,
        public ?int $addToWishlistCount,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            date: WildberriesDtoValue::string($payload['date'] ?? null),
            openCount: WildberriesDtoValue::int($payload['openCount'] ?? null),
            cartCount: WildberriesDtoValue::int($payload['cartCount'] ?? null),
            orderCount: WildberriesDtoValue::int($payload['orderCount'] ?? null),
            orderSum: WildberriesDtoValue::int($payload['orderSum'] ?? null),
            buyoutCount: WildberriesDtoValue::int($payload['buyoutCount'] ?? null),
            buyoutSum: WildberriesDtoValue::int($payload['buyoutSum'] ?? null),
            buyoutPercent: WildberriesDtoValue::int($payload['buyoutPercent'] ?? null),
            addToCartConversion: WildberriesDtoValue::int($payload['addToCartConversion'] ?? null),
            cartToOrderConversion: WildberriesDtoValue::int($payload['cartToOrderConversion'] ?? null),
            addToWishlistCount: WildberriesDtoValue::int($payload['addToWishlistCount'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['date', 'openCount', 'cartCount', 'orderCount', 'orderSum', 'buyoutCount', 'buyoutSum', 'buyoutPercent', 'addToCartConversion', 'cartToOrderConversion', 'addToWishlistCount']),
        );
    }
}
