<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Products\Api\Dbw;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class GETApiV3DbwWarehousesWarehouseIdContactsResponse implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $contacts
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $contacts,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            contacts: WildberriesDtoValue::array($payload['contacts'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['contacts']),
        );
    }
}
