<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api\StocksReport;

use PhpSoftBox\Wildberries\Dto\Analytics\Api\Currency;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class TableItemResponse implements WildberriesDtoInterface
{
    /**
     * @param list<TableItemItemSt> $items
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
            items: WildberriesDtoValue::objectList($payload['items'] ?? null, TableItemItemSt::class),
            currency: WildberriesDtoValue::object($payload['currency'] ?? null, Currency::class),
            extra: WildberriesDtoValue::extra($payload, ['items', 'currency']),
        );
    }
}
