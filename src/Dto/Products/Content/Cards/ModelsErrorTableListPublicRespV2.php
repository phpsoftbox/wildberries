<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Products\Content\Cards;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ModelsErrorTableListPublicRespV2 implements WildberriesDtoInterface
{
    /**
     * @param list<ModelsErrorTableListPublicRespV2Item> $items
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $items,
        public ?ViewerContractPublicErrorsCursorOutput $cursor,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            items: WildberriesDtoValue::objectList($payload['items'] ?? null, ModelsErrorTableListPublicRespV2Item::class),
            cursor: WildberriesDtoValue::object($payload['cursor'] ?? null, ViewerContractPublicErrorsCursorOutput::class),
            extra: WildberriesDtoValue::extra($payload, ['items', 'cursor']),
        );
    }
}
