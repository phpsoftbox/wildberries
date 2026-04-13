<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api\SearchReport;

use PhpSoftBox\Wildberries\Dto\Analytics\Api\Currency;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ProductSearchTextsResponse implements WildberriesDtoInterface
{
    /**
     * @param list<TableSearchTextItem> $items
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $items,
        public ?Currency $currency,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            items: WildberriesDtoValue::objectList($payload['items'] ?? null, TableSearchTextItem::class),
            currency: WildberriesDtoValue::object($payload['currency'] ?? null, Currency::class),
            extra: WildberriesDtoValue::extra($payload, ['items', 'currency']),
        );
    }
}
