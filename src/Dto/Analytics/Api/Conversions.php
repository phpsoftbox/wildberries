<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class Conversions implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $addToCartPercent,
        public ?int $cartToOrderPercent,
        public ?int $buyoutPercent,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            addToCartPercent: WildberriesDtoValue::int($payload['addToCartPercent'] ?? null),
            cartToOrderPercent: WildberriesDtoValue::int($payload['cartToOrderPercent'] ?? null),
            buyoutPercent: WildberriesDtoValue::int($payload['buyoutPercent'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['addToCartPercent', 'cartToOrderPercent', 'buyoutPercent']),
        );
    }
}
