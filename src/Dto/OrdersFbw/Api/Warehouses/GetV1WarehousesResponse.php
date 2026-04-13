<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersFbw\Api\Warehouses;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class GetV1WarehousesResponse implements WildberriesDtoInterface
{
    /**
     * @param list<ModelsWarehousesResultItems> $value
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $value,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        $payload = ['value' => $payload];

        return new self(
            value: WildberriesDtoValue::objectList($payload['value'] ?? null, ModelsWarehousesResultItems::class),
            extra: WildberriesDtoValue::extra($payload, ['value']),
        );
    }
}
