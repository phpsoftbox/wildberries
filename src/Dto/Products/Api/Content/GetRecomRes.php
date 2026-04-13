<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Products\Api\Content;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class GetRecomRes implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $data
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $data,
        public ?int $next,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            data: WildberriesDtoValue::array($payload['data'] ?? null),
            next: WildberriesDtoValue::int($payload['next'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['data', 'next']),
        );
    }
}
