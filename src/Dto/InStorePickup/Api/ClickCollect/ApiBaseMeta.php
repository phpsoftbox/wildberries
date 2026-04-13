<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\InStorePickup\Api\ClickCollect;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ApiBaseMeta implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $gtin
     * @param array<array-key, mixed> $imei
     * @param array<array-key, mixed> $sgtin
     * @param array<array-key, mixed> $uin
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $gtin,
        public array $imei,
        public array $sgtin,
        public array $uin,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            gtin: WildberriesDtoValue::array($payload['gtin'] ?? null),
            imei: WildberriesDtoValue::array($payload['imei'] ?? null),
            sgtin: WildberriesDtoValue::array($payload['sgtin'] ?? null),
            uin: WildberriesDtoValue::array($payload['uin'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['gtin', 'imei', 'sgtin', 'uin']),
        );
    }
}
