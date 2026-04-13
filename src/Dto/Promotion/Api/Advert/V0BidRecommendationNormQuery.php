<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Promotion\Api\Advert;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class V0BidRecommendationNormQuery implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $normQuery,
        public ?V0BidRecommendationReachMax $reachMax,
        public ?V0BidRecommendationReachMedium $reachMedium,
        public ?V0BidRecommendationReachMin $reachMin,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            normQuery: WildberriesDtoValue::string($payload['normQuery'] ?? null),
            reachMax: WildberriesDtoValue::object($payload['reachMax'] ?? null, V0BidRecommendationReachMax::class),
            reachMedium: WildberriesDtoValue::object($payload['reachMedium'] ?? null, V0BidRecommendationReachMedium::class),
            reachMin: WildberriesDtoValue::object($payload['reachMin'] ?? null, V0BidRecommendationReachMin::class),
            extra: WildberriesDtoValue::extra($payload, ['normQuery', 'reachMax', 'reachMedium', 'reachMin']),
        );
    }
}
