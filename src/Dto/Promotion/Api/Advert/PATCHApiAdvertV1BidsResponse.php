<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Promotion\Api\Advert;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class PATCHApiAdvertV1BidsResponse implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $bids
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
            bids: WildberriesDtoValue::array($payload['bids'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['bids']),
        );
    }
}
