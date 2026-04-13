<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Communications\Api\Feedbacks;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class OpenapiSellerLimit implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $perUnitLimit,
        public ?int $remaining,
        public ?int $totalLimit,
        public ?bool $unlimited,
        public ?int $used,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            perUnitLimit: WildberriesDtoValue::int($payload['perUnitLimit'] ?? null),
            remaining: WildberriesDtoValue::int($payload['remaining'] ?? null),
            totalLimit: WildberriesDtoValue::int($payload['totalLimit'] ?? null),
            unlimited: WildberriesDtoValue::bool($payload['unlimited'] ?? null),
            used: WildberriesDtoValue::int($payload['used'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['perUnitLimit', 'remaining', 'totalLimit', 'unlimited', 'used']),
        );
    }
}
