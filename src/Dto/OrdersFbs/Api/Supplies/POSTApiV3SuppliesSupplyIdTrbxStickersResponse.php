<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Supplies;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class POSTApiV3SuppliesSupplyIdTrbxStickersResponse implements WildberriesDtoInterface
{
    /**
     * @param list<TrbxStickers> $stickers
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
            stickers: WildberriesDtoValue::objectList($payload['stickers'] ?? null, TrbxStickers::class),
            extra: WildberriesDtoValue::extra($payload, ['stickers']),
        );
    }
}
