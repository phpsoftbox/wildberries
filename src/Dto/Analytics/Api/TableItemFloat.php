<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class TableItemFloat implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?float $current,
        public ?float $dynamics,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            current: WildberriesDtoValue::float($payload['current'] ?? null),
            dynamics: WildberriesDtoValue::float($payload['dynamics'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['current', 'dynamics']),
        );
    }
}
