<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Promotion\Api\Advert;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class V0BidRecommendationCPCLevels implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?V0BidRecommendationBaseBid $range1To2,
        public ?V0BidRecommendationBaseBid $range3To10,
        public ?V0BidRecommendationBaseBid $range11To34,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            range1To2: WildberriesDtoValue::object($payload['range1To2'] ?? null, V0BidRecommendationBaseBid::class),
            range3To10: WildberriesDtoValue::object($payload['range3To10'] ?? null, V0BidRecommendationBaseBid::class),
            range11To34: WildberriesDtoValue::object($payload['range11To34'] ?? null, V0BidRecommendationBaseBid::class),
            extra: WildberriesDtoValue::extra($payload, ['range1To2', 'range3To10', 'range11To34']),
        );
    }
}
