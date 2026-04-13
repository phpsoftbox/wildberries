<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Promotion\Adv\Normquery;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class V0GetNormQueryBidsItem implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $advertId,
        public ?int $nmId,
        public ?string $normQuery,
        public ?int $bid,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            advertId: WildberriesDtoValue::int($payload['advert_id'] ?? null),
            nmId: WildberriesDtoValue::int($payload['nm_id'] ?? null),
            normQuery: WildberriesDtoValue::string($payload['norm_query'] ?? null),
            bid: WildberriesDtoValue::int($payload['bid'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['advert_id', 'nm_id', 'norm_query', 'bid']),
        );
    }
}
