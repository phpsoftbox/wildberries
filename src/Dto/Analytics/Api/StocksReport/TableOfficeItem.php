<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api\StocksReport;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class TableOfficeItem implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $regionName,
        public ?int $officeID,
        public ?string $officeName,
        public ?TableCommonMetrics $metrics,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            regionName: WildberriesDtoValue::string($payload['regionName'] ?? null),
            officeID: WildberriesDtoValue::int($payload['officeID'] ?? null),
            officeName: WildberriesDtoValue::string($payload['officeName'] ?? null),
            metrics: WildberriesDtoValue::object($payload['metrics'] ?? null, TableCommonMetrics::class),
            extra: WildberriesDtoValue::extra($payload, ['regionName', 'officeID', 'officeName', 'metrics']),
        );
    }
}
