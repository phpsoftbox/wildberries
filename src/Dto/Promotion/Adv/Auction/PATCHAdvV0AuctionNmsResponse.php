<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Promotion\Adv\Auction;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class PATCHAdvV0AuctionNmsResponse implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $nms
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $nms,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            nms: WildberriesDtoValue::array($payload['nms'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['nms']),
        );
    }
}
