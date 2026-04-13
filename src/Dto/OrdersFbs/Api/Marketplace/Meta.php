<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Marketplace;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class Meta implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $imei
     * @param array<array-key, mixed> $uin
     * @param array<array-key, mixed> $gtin
     * @param array<array-key, mixed> $sgtin
     * @param array<array-key, mixed> $expiration
     * @param array<array-key, mixed> $customsDeclaration
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $imei,
        public array $uin,
        public array $gtin,
        public array $sgtin,
        public array $expiration,
        public array $customsDeclaration,
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
            expiration: WildberriesDtoValue::array($payload['expiration'] ?? null),
            customsDeclaration: WildberriesDtoValue::array($payload['customsDeclaration'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['imei', 'uin', 'gtin', 'sgtin', 'expiration', 'customsDeclaration']),
        );
    }
}
