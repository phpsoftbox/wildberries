<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\InStorePickup\Api\Marketplace;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ApiOrdersMetaResponse implements WildberriesDtoInterface
{
    /**
     * @param list<ApiOrderMetaV2> $meta
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $meta,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            meta: WildberriesDtoValue::objectList($payload['meta'] ?? null, ApiOrderMetaV2::class),
            extra: WildberriesDtoValue::extra($payload, ['meta']),
        );
    }
}
