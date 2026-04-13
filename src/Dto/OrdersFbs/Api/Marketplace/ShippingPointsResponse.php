<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Marketplace;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ShippingPointsResponse implements WildberriesDtoInterface
{
    /**
     * @param list<ShippingPoint> $shippingPoints
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $shippingPoints,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            shippingPoints: WildberriesDtoValue::objectList($payload['shippingPoints'] ?? null, ShippingPoint::class),
            extra: WildberriesDtoValue::extra($payload, ['shippingPoints']),
        );
    }
}
