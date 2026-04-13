<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Marketplace;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class SupplySpotDataResponse implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $supplies
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $supplies,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            supplies: WildberriesDtoValue::array($payload['supplies'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['supplies']),
        );
    }
}
