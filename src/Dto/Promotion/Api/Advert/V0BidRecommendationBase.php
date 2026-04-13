<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Promotion\Api\Advert;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class V0BidRecommendationBase implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?V0BidRecommendationBaseBidCompetitiveBid $competitiveBid,
        public ?V0BidRecommendationBaseBidLeadersBid $leadersBid,
        public ?V0BidRecommendationBaseBidTop2 $top2,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            competitiveBid: WildberriesDtoValue::object($payload['competitiveBid'] ?? null, V0BidRecommendationBaseBidCompetitiveBid::class),
            leadersBid: WildberriesDtoValue::object($payload['leadersBid'] ?? null, V0BidRecommendationBaseBidLeadersBid::class),
            top2: WildberriesDtoValue::object($payload['top2'] ?? null, V0BidRecommendationBaseBidTop2::class),
            extra: WildberriesDtoValue::extra($payload, ['competitiveBid', 'leadersBid', 'top2']),
        );
    }
}
