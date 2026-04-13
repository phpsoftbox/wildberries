<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersFbw\Api\TransitTariffs;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ModelsVolumeTariff implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $from,
        public ?int $to,
        public ?float $value,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            from: WildberriesDtoValue::int($payload['from'] ?? null),
            to: WildberriesDtoValue::int($payload['to'] ?? null),
            value: WildberriesDtoValue::float($payload['value'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['from', 'to', 'value']),
        );
    }
}
