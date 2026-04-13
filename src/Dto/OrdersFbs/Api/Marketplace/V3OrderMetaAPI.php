<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Marketplace;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class V3OrderMetaAPI implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $id,
        public ?MetaDetails $metaDetails,
        public ?Meta $meta,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            id: WildberriesDtoValue::int($payload['id'] ?? null),
            metaDetails: WildberriesDtoValue::object($payload['metaDetails'] ?? null, MetaDetails::class),
            meta: WildberriesDtoValue::object($payload['meta'] ?? null, Meta::class),
            extra: WildberriesDtoValue::extra($payload, ['id', 'metaDetails', 'meta']),
        );
    }
}
