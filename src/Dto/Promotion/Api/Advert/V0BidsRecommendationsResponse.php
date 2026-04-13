<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Promotion\Api\Advert;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class V0BidsRecommendationsResponse implements WildberriesDtoInterface
{
    /**
     * @param list<V0BidRecommendationNormQuery> $normQueries
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $advertId,
        public ?V0BidRecommendationBase $base,
        public ?int $nmId,
        public array $normQueries,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            advertId: WildberriesDtoValue::int($payload['advertId'] ?? null),
            base: WildberriesDtoValue::object($payload['base'] ?? null, V0BidRecommendationBase::class),
            nmId: WildberriesDtoValue::int($payload['nmId'] ?? null),
            normQueries: WildberriesDtoValue::objectList($payload['normQueries'] ?? null, V0BidRecommendationNormQuery::class),
            extra: WildberriesDtoValue::extra($payload, ['advertId', 'base', 'nmId', 'normQueries']),
        );
    }
}
