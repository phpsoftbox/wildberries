<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class Product implements WildberriesDtoInterface
{
    /**
     * @param list<Tag> $tags
     * @param array<array-key, mixed> $stocks
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $nmId,
        public ?string $title,
        public ?string $vendorCode,
        public ?string $brandName,
        public ?int $subjectId,
        public ?string $subjectName,
        public array $tags,
        public ?float $productRating,
        public ?float $feedbackRating,
        public array $stocks,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            nmId: WildberriesDtoValue::int($payload['nmId'] ?? null),
            title: WildberriesDtoValue::string($payload['title'] ?? null),
            vendorCode: WildberriesDtoValue::string($payload['vendorCode'] ?? null),
            brandName: WildberriesDtoValue::string($payload['brandName'] ?? null),
            subjectId: WildberriesDtoValue::int($payload['subjectId'] ?? null),
            subjectName: WildberriesDtoValue::string($payload['subjectName'] ?? null),
            tags: WildberriesDtoValue::objectList($payload['tags'] ?? null, Tag::class),
            productRating: WildberriesDtoValue::float($payload['productRating'] ?? null),
            feedbackRating: WildberriesDtoValue::float($payload['feedbackRating'] ?? null),
            stocks: WildberriesDtoValue::array($payload['stocks'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['nmId', 'title', 'vendorCode', 'brandName', 'subjectId', 'subjectName', 'tags', 'productRating', 'feedbackRating', 'stocks']),
        );
    }
}
