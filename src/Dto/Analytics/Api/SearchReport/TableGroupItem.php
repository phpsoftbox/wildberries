<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api\SearchReport;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class TableGroupItem implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $metrics
     * @param list<TableProductItem> $items
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $subjectName,
        public ?int $subjectId,
        public ?string $brandName,
        public ?string $tagName,
        public ?int $tagId,
        public array $metrics,
        public array $items,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            subjectName: WildberriesDtoValue::string($payload['subjectName'] ?? null),
            subjectId: WildberriesDtoValue::int($payload['subjectId'] ?? null),
            brandName: WildberriesDtoValue::string($payload['brandName'] ?? null),
            tagName: WildberriesDtoValue::string($payload['tagName'] ?? null),
            tagId: WildberriesDtoValue::int($payload['tagId'] ?? null),
            metrics: WildberriesDtoValue::array($payload['metrics'] ?? null),
            items: WildberriesDtoValue::objectList($payload['items'] ?? null, TableProductItem::class),
            extra: WildberriesDtoValue::extra($payload, ['subjectName', 'subjectId', 'brandName', 'tagName', 'tagId', 'metrics', 'items']),
        );
    }
}
