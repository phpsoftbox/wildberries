<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Products\Content\Get;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class POSTContentV2GetCardsListResponse implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $cards
     * @param array<array-key, mixed> $cursor
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $cards,
        public array $cursor,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            cards: WildberriesDtoValue::array($payload['cards'] ?? null),
            cursor: WildberriesDtoValue::array($payload['cursor'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['cards', 'cursor']),
        );
    }
}
