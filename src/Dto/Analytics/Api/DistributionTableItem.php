<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class DistributionTableItem implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $feedbackRating
     * @param array<array-key, mixed> $feedbackCount
     * @param array<array-key, mixed> $fiveStar
     * @param array<array-key, mixed> $fourStar
     * @param array<array-key, mixed> $threeStar
     * @param array<array-key, mixed> $twoStar
     * @param array<array-key, mixed> $oneStar
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $nmId,
        public ?string $title,
        public ?string $vendorCode,
        public ?int $subjectId,
        public ?string $subjectName,
        public ?string $brandName,
        public ?string $tagName,
        public ?int $tagId,
        public ?bool $pinnedFeedback,
        public ?float $rating,
        public array $feedbackRating,
        public array $feedbackCount,
        public array $fiveStar,
        public array $fourStar,
        public array $threeStar,
        public array $twoStar,
        public array $oneStar,
        public ?int $disqualified,
        public ?bool $isShadowed,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            nmId: WildberriesDtoValue::int($payload['nmId'] ?? null),
            title: WildberriesDtoValue::string($payload['title'] ?? null),
            vendorCode: WildberriesDtoValue::string($payload['vendorCode'] ?? null),
            subjectId: WildberriesDtoValue::int($payload['subjectId'] ?? null),
            subjectName: WildberriesDtoValue::string($payload['subjectName'] ?? null),
            brandName: WildberriesDtoValue::string($payload['brandName'] ?? null),
            tagName: WildberriesDtoValue::string($payload['tagName'] ?? null),
            tagId: WildberriesDtoValue::int($payload['tagId'] ?? null),
            pinnedFeedback: WildberriesDtoValue::bool($payload['pinnedFeedback'] ?? null),
            rating: WildberriesDtoValue::float($payload['rating'] ?? null),
            feedbackRating: WildberriesDtoValue::array($payload['feedbackRating'] ?? null),
            feedbackCount: WildberriesDtoValue::array($payload['feedbackCount'] ?? null),
            fiveStar: WildberriesDtoValue::array($payload['fiveStar'] ?? null),
            fourStar: WildberriesDtoValue::array($payload['fourStar'] ?? null),
            threeStar: WildberriesDtoValue::array($payload['threeStar'] ?? null),
            twoStar: WildberriesDtoValue::array($payload['twoStar'] ?? null),
            oneStar: WildberriesDtoValue::array($payload['oneStar'] ?? null),
            disqualified: WildberriesDtoValue::int($payload['disqualified'] ?? null),
            isShadowed: WildberriesDtoValue::bool($payload['isShadowed'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['nmId', 'title', 'vendorCode', 'subjectId', 'subjectName', 'brandName', 'tagName', 'tagId', 'pinnedFeedback', 'rating', 'feedbackRating', 'feedbackCount', 'fiveStar', 'fourStar', 'threeStar', 'twoStar', 'oneStar', 'disqualified', 'isShadowed']),
        );
    }
}
