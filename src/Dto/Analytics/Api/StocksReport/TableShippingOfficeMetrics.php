<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api\StocksReport;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class TableShippingOfficeMetrics implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $saleRate
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $stockCount,
        public ?int $stockSum,
        public array $saleRate,
        public ?int $toClientCount,
        public ?int $fromClientCount,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            stockCount: WildberriesDtoValue::int($payload['stockCount'] ?? null),
            stockSum: WildberriesDtoValue::int($payload['stockSum'] ?? null),
            saleRate: WildberriesDtoValue::array($payload['saleRate'] ?? null),
            toClientCount: WildberriesDtoValue::int($payload['toClientCount'] ?? null),
            fromClientCount: WildberriesDtoValue::int($payload['fromClientCount'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['stockCount', 'stockSum', 'saleRate', 'toClientCount', 'fromClientCount']),
        );
    }
}
