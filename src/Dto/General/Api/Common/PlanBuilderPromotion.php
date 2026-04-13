<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\General\Api\Common;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class PlanBuilderPromotion implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?float $commissionRate,
        public ?string $expiresAt,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            commissionRate: WildberriesDtoValue::float($payload['commissionRate'] ?? null),
            expiresAt: WildberriesDtoValue::string($payload['expiresAt'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['commissionRate', 'expiresAt']),
        );
    }
}
