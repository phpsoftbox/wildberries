<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Promotion\Adv\Normquery;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class V0GetNormQueryBidsResponse implements WildberriesDtoInterface
{
    /**
     * @param list<V0GetNormQueryBidsItem> $bids
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $bids,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            bids: WildberriesDtoValue::objectList($payload['bids'] ?? null, V0GetNormQueryBidsItem::class),
            extra: WildberriesDtoValue::extra($payload, ['bids']),
        );
    }
}
