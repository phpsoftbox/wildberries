<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersDbw\Api\Marketplace;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ApiBatchErrorResponse implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $metaDetails
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $code,
        public ?string $detail,
        public array $metaDetails,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            code: WildberriesDtoValue::int($payload['code'] ?? null),
            detail: WildberriesDtoValue::string($payload['detail'] ?? null),
            metaDetails: WildberriesDtoValue::array($payload['metaDetails'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['code', 'detail', 'metaDetails']),
        );
    }
}
