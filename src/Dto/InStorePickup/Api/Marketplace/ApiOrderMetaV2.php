<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\InStorePickup\Api\Marketplace;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ApiOrderMetaV2 implements WildberriesDtoInterface
{
    /**
     * @param list<string> $sgtin
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $error,
        public ?string $gtin,
        public ?string $imei,
        public ?int $orderId,
        public array $sgtin,
        public ?string $uin,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            error: WildberriesDtoValue::string($payload['error'] ?? null),
            gtin: WildberriesDtoValue::string($payload['gtin'] ?? null),
            imei: WildberriesDtoValue::string($payload['imei'] ?? null),
            orderId: WildberriesDtoValue::int($payload['orderId'] ?? null),
            sgtin: WildberriesDtoValue::array($payload['sgtin'] ?? null),
            uin: WildberriesDtoValue::string($payload['uin'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['error', 'gtin', 'imei', 'orderId', 'sgtin', 'uin']),
        );
    }
}
