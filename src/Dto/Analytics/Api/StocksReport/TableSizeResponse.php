<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api\StocksReport;

use PhpSoftBox\Wildberries\Dto\Analytics\Api\Currency;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class TableSizeResponse implements WildberriesDtoInterface
{
    /**
     * @param list<TableOfficeItem> $offices
     * @param array<array-key, mixed> $sizes
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $offices,
        public array $sizes,
        public ?Currency $currency,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            offices: WildberriesDtoValue::objectList($payload['offices'] ?? null, TableOfficeItem::class),
            sizes: WildberriesDtoValue::array($payload['sizes'] ?? null),
            currency: WildberriesDtoValue::object($payload['currency'] ?? null, Currency::class),
            extra: WildberriesDtoValue::extra($payload, ['offices', 'sizes', 'currency']),
        );
    }
}
