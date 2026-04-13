<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api\StocksReport;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class FloatGraphByPeriodItem implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $start,
        public ?string $end,
        public ?float $value,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            start: WildberriesDtoValue::string($payload['start'] ?? null),
            end: WildberriesDtoValue::string($payload['end'] ?? null),
            value: WildberriesDtoValue::float($payload['value'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['start', 'end', 'value']),
        );
    }
}
