<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Promotion\Api\Advert;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class V0BidRecommendationReachMax implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $bidKopecks,
        public ?int $bidKopecksMin,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            bidKopecks: WildberriesDtoValue::int($payload['bidKopecks'] ?? null),
            bidKopecksMin: WildberriesDtoValue::int($payload['bidKopecksMin'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['bidKopecks', 'bidKopecksMin']),
        );
    }
}
