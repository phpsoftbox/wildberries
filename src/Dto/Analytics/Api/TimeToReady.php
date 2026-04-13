<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class TimeToReady implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $days,
        public ?int $hours,
        public ?int $mins,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            days: WildberriesDtoValue::int($payload['days'] ?? null),
            hours: WildberriesDtoValue::int($payload['hours'] ?? null),
            mins: WildberriesDtoValue::int($payload['mins'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['days', 'hours', 'mins']),
        );
    }
}
