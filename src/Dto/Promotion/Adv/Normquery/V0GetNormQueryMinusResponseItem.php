<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Promotion\Adv\Normquery;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class V0GetNormQueryMinusResponseItem implements WildberriesDtoInterface
{
    /**
     * @param list<string> $normQueries
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $advertId,
        public ?int $nmId,
        public array $normQueries,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            advertId: WildberriesDtoValue::int($payload['advert_id'] ?? null),
            nmId: WildberriesDtoValue::int($payload['nm_id'] ?? null),
            normQueries: WildberriesDtoValue::array($payload['norm_queries'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['advert_id', 'nm_id', 'norm_queries']),
        );
    }
}
