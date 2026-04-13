<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\InStorePickup\Api\ClickCollect;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ApiOrderStatus implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $id,
        public ?string $supplierStatus,
        public ?string $wbStatus,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            id: WildberriesDtoValue::int($payload['id'] ?? null),
            supplierStatus: WildberriesDtoValue::string($payload['supplierStatus'] ?? null),
            wbStatus: WildberriesDtoValue::string($payload['wbStatus'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['id', 'supplierStatus', 'wbStatus']),
        );
    }
}
