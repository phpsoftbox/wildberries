<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api\SearchReport;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class CommonResponseProperties implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $data
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $data,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            data: WildberriesDtoValue::array($payload['data'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['data']),
        );
    }
}
