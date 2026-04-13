<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Marketplace;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ApiErrorV3 implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $detail,
        public ?string $title,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            detail: WildberriesDtoValue::string($payload['detail'] ?? null),
            title: WildberriesDtoValue::string($payload['title'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['detail', 'title']),
        );
    }
}
