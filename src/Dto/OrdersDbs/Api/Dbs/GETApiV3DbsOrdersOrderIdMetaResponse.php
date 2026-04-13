<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Dbs;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class GETApiV3DbsOrdersOrderIdMetaResponse implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?Meta $meta,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            meta: WildberriesDtoValue::object($payload['meta'] ?? null, Meta::class),
            extra: WildberriesDtoValue::extra($payload, ['meta']),
        );
    }
}
