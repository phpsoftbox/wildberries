<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Reports\Api\Analytics;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class GETApiV1AnalyticsBannedProductsShadowedResponse implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $report
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $report,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            report: WildberriesDtoValue::array($payload['report'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['report']),
        );
    }
}
