<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\General\Api\Common;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class SupplierRatingModel implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $feedbackCount,
        public ?float $valuation,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            feedbackCount: WildberriesDtoValue::int($payload['feedbackCount'] ?? null),
            valuation: WildberriesDtoValue::float($payload['valuation'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['feedbackCount', 'valuation']),
        );
    }
}
