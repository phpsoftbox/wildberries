<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Products\Api\Stocks;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class POSTApiV3StocksWarehouseIdResponse implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $stocks
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $stocks,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            stocks: WildberriesDtoValue::array($payload['stocks'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['stocks']),
        );
    }
}
