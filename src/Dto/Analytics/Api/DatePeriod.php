<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class DatePeriod implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $start,
        public ?string $end,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            start: WildberriesDtoValue::string($payload['start'] ?? null),
            end: WildberriesDtoValue::string($payload['end'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['start', 'end']),
        );
    }
}
