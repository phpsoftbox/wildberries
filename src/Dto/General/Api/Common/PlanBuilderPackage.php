<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\General\Api\Common;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class PlanBuilderPackage implements WildberriesDtoInterface
{
    /**
     * @param list<PlanBuilderOptionShort> $options
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $id,
        public ?string $slug,
        public ?string $name,
        public ?string $status,
        public ?string $activatedAt,
        public ?string $expiresAt,
        public ?float $commissionRate,
        public ?float $periodDuration,
        public array $options,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            id: WildberriesDtoValue::string($payload['id'] ?? null),
            slug: WildberriesDtoValue::string($payload['slug'] ?? null),
            name: WildberriesDtoValue::string($payload['name'] ?? null),
            status: WildberriesDtoValue::string($payload['status'] ?? null),
            activatedAt: WildberriesDtoValue::string($payload['activatedAt'] ?? null),
            expiresAt: WildberriesDtoValue::string($payload['expiresAt'] ?? null),
            commissionRate: WildberriesDtoValue::float($payload['commissionRate'] ?? null),
            periodDuration: WildberriesDtoValue::float($payload['periodDuration'] ?? null),
            options: WildberriesDtoValue::objectList($payload['options'] ?? null, PlanBuilderOptionShort::class),
            extra: WildberriesDtoValue::extra($payload, ['id', 'slug', 'name', 'status', 'activatedAt', 'expiresAt', 'commissionRate', 'periodDuration', 'options']),
        );
    }
}
