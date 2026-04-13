<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Promotion\Adv\Normquery;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class V0GetNormQueryListResponseItem implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $advertId,
        public ?int $nmId,
        public ?V0GetNormQueryListResponseItemNormQueries $normQueries,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            advertId: WildberriesDtoValue::int($payload['advertId'] ?? null),
            nmId: WildberriesDtoValue::int($payload['nmId'] ?? null),
            normQueries: WildberriesDtoValue::object($payload['normQueries'] ?? null, V0GetNormQueryListResponseItemNormQueries::class),
            extra: WildberriesDtoValue::extra($payload, ['advertId', 'nmId', 'normQueries']),
        );
    }
}
