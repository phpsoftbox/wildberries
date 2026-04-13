<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api\SearchReport;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class SearchReportPositionChartItem implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $dt,
        public ?int $average,
        public ?int $median,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            dt: WildberriesDtoValue::string($payload['dt'] ?? null),
            average: WildberriesDtoValue::int($payload['average'] ?? null),
            median: WildberriesDtoValue::int($payload['median'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['dt', 'average', 'median']),
        );
    }
}
