<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api\SearchReport;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class PositionInfo implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $average
     * @param array<array-key, mixed> $median
     * @param list<SearchReportPositionChartItem> $chartItems
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $average,
        public array $median,
        public array $chartItems,
        public ?SearchReportPositionClusters $clusters,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            average: WildberriesDtoValue::array($payload['average'] ?? null),
            median: WildberriesDtoValue::array($payload['median'] ?? null),
            chartItems: WildberriesDtoValue::objectList($payload['chartItems'] ?? null, SearchReportPositionChartItem::class),
            clusters: WildberriesDtoValue::object($payload['clusters'] ?? null, SearchReportPositionClusters::class),
            extra: WildberriesDtoValue::extra($payload, ['average', 'median', 'chartItems', 'clusters']),
        );
    }
}
