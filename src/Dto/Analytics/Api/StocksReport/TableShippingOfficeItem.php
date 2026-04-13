<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api\StocksReport;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class TableShippingOfficeItem implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $offices
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $regionName,
        public ?TableShippingOfficeMetrics $metrics,
        public array $offices,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            regionName: WildberriesDtoValue::string($payload['regionName'] ?? null),
            metrics: WildberriesDtoValue::object($payload['metrics'] ?? null, TableShippingOfficeMetrics::class),
            offices: WildberriesDtoValue::array($payload['offices'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['regionName', 'metrics', 'offices']),
        );
    }
}
