<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Marketplace;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class V3SupplyOrderIDsAPI implements WildberriesDtoInterface
{
    /**
     * @param list<int> $orderIds
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $orderIds,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            orderIds: WildberriesDtoValue::array($payload['orderIds'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['orderIds']),
        );
    }
}
