<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class PostV2ItemRatingResponse implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?ItemRatingResponse $data,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            data: WildberriesDtoValue::object($payload['data'] ?? null, ItemRatingResponse::class),
            extra: WildberriesDtoValue::extra($payload, ['data']),
        );
    }
}
