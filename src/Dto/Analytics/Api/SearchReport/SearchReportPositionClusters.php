<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api\SearchReport;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class SearchReportPositionClusters implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $firstHundred
     * @param array<array-key, mixed> $secondHundred
     * @param array<array-key, mixed> $below
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $firstHundred,
        public array $secondHundred,
        public array $below,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            firstHundred: WildberriesDtoValue::array($payload['firstHundred'] ?? null),
            secondHundred: WildberriesDtoValue::array($payload['secondHundred'] ?? null),
            below: WildberriesDtoValue::array($payload['below'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['firstHundred', 'secondHundred', 'below']),
        );
    }
}
