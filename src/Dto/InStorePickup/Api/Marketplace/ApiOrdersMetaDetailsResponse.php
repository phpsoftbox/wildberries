<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\InStorePickup\Api\Marketplace;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ApiOrdersMetaDetailsResponse implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $orders
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $requestId,
        public array $orders,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            requestId: WildberriesDtoValue::string($payload['requestId'] ?? null),
            orders: WildberriesDtoValue::array($payload['orders'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['requestId', 'orders']),
        );
    }
}
