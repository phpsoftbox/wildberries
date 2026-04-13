<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersDbw\Api\Dbw;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class Meta implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $imei
     * @param array<array-key, mixed> $uin
     * @param array<array-key, mixed> $gtin
     * @param array<array-key, mixed> $sgtin
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $imei,
        public array $uin,
        public array $gtin,
        public array $sgtin,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            imei: WildberriesDtoValue::array($payload['imei'] ?? null),
            uin: WildberriesDtoValue::array($payload['uin'] ?? null),
            gtin: WildberriesDtoValue::array($payload['gtin'] ?? null),
            sgtin: WildberriesDtoValue::array($payload['sgtin'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['imei', 'uin', 'gtin', 'sgtin']),
        );
    }
}
