<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api\SearchReport;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ItemOrdersTextItem implements WildberriesDtoInterface
{
    /**
     * @param list<ItemOrdersMetrics> $dateItems
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $text,
        public ?int $frequency,
        public array $dateItems,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            text: WildberriesDtoValue::string($payload['text'] ?? null),
            frequency: WildberriesDtoValue::int($payload['frequency'] ?? null),
            dateItems: WildberriesDtoValue::objectList($payload['dateItems'] ?? null, ItemOrdersMetrics::class),
            extra: WildberriesDtoValue::extra($payload, ['text', 'frequency', 'dateItems']),
        );
    }
}
