<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api\StocksReport;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class TableGroupItemSt implements WildberriesDtoInterface
{
    /**
     * @param list<TableProductItemSt> $items
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $subjectID,
        public ?string $subjectName,
        public ?string $brandName,
        public ?int $tagID,
        public ?string $tagName,
        public ?TableCommonMetrics $metrics,
        public array $items,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            subjectID: WildberriesDtoValue::int($payload['subjectID'] ?? null),
            subjectName: WildberriesDtoValue::string($payload['subjectName'] ?? null),
            brandName: WildberriesDtoValue::string($payload['brandName'] ?? null),
            tagID: WildberriesDtoValue::int($payload['tagID'] ?? null),
            tagName: WildberriesDtoValue::string($payload['tagName'] ?? null),
            metrics: WildberriesDtoValue::object($payload['metrics'] ?? null, TableCommonMetrics::class),
            items: WildberriesDtoValue::objectList($payload['items'] ?? null, TableProductItemSt::class),
            extra: WildberriesDtoValue::extra($payload, ['subjectID', 'subjectName', 'brandName', 'tagID', 'tagName', 'metrics', 'items']),
        );
    }
}
