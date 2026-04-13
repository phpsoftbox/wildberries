<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Marketplace;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class POSTApiMarketplaceV3DbsOrdersStickersResponse implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $stickers
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $stickers,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            stickers: WildberriesDtoValue::array($payload['stickers'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['stickers']),
        );
    }
}
