<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\InStorePickup\Api\ClickCollect;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ApiOrderClientInfoResp implements WildberriesDtoInterface
{
    /**
     * @param list<ApiOrderClientInfo> $orders
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $orders,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            orders: WildberriesDtoValue::objectList($payload['orders'] ?? null, ApiOrderClientInfo::class),
            extra: WildberriesDtoValue::extra($payload, ['orders']),
        );
    }
}
