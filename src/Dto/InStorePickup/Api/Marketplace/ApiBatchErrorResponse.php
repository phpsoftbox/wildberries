<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\InStorePickup\Api\Marketplace;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ApiBatchErrorResponse implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $code,
        public ?string $detail,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            code: WildberriesDtoValue::int($payload['code'] ?? null),
            detail: WildberriesDtoValue::string($payload['detail'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['code', 'detail']),
        );
    }
}
