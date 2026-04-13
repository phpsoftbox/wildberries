<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class Statistics implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $selected
     * @param array<array-key, mixed> $past
     * @param array<array-key, mixed> $comparison
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $selected,
        public array $past,
        public array $comparison,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            selected: WildberriesDtoValue::array($payload['selected'] ?? null),
            past: WildberriesDtoValue::array($payload['past'] ?? null),
            comparison: WildberriesDtoValue::array($payload['comparison'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['selected', 'past', 'comparison']),
        );
    }
}
