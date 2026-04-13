<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ItemRatingResponse implements WildberriesDtoInterface
{
    /**
     * @param list<DistributionTableItem> $items
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?TableItemFloat $sellerRating,
        public ?FeedbacksIncreaseItem $feedbackIncrease,
        public array $items,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            sellerRating: WildberriesDtoValue::object($payload['sellerRating'] ?? null, TableItemFloat::class),
            feedbackIncrease: WildberriesDtoValue::object($payload['feedbackIncrease'] ?? null, FeedbacksIncreaseItem::class),
            items: WildberriesDtoValue::objectList($payload['items'] ?? null, DistributionTableItem::class),
            extra: WildberriesDtoValue::extra($payload, ['sellerRating', 'feedbackIncrease', 'items']),
        );
    }
}
