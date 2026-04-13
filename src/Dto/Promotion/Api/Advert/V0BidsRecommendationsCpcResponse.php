<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Promotion\Api\Advert;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class V0BidsRecommendationsCpcResponse implements WildberriesDtoInterface
{
    /**
     * @param list<V0BidRecommendationCPCLevels> $levels
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $advertId,
        public array $levels,
        public ?int $nmId,
        public ?string $paymentType,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            advertId: WildberriesDtoValue::int($payload['advertId'] ?? null),
            levels: WildberriesDtoValue::objectList($payload['levels'] ?? null, V0BidRecommendationCPCLevels::class),
            nmId: WildberriesDtoValue::int($payload['nmId'] ?? null),
            paymentType: WildberriesDtoValue::string($payload['paymentType'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['advertId', 'levels', 'nmId', 'paymentType']),
        );
    }
}
