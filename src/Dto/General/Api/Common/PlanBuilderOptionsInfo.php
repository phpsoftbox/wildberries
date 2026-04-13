<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\General\Api\Common;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class PlanBuilderOptionsInfo implements WildberriesDtoInterface
{
    /**
     * @param list<PlanBuilderPackage> $packages
     * @param list<PlanBuilderOption> $options
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?float $activeOptionCount,
        public ?float $activePackageCount,
        public ?float $totalCommissionRate,
        public array $packages,
        public array $options,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            activeOptionCount: WildberriesDtoValue::float($payload['activeOptionCount'] ?? null),
            activePackageCount: WildberriesDtoValue::float($payload['activePackageCount'] ?? null),
            totalCommissionRate: WildberriesDtoValue::float($payload['totalCommissionRate'] ?? null),
            packages: WildberriesDtoValue::objectList($payload['packages'] ?? null, PlanBuilderPackage::class),
            options: WildberriesDtoValue::objectList($payload['options'] ?? null, PlanBuilderOption::class),
            extra: WildberriesDtoValue::extra($payload, ['activeOptionCount', 'activePackageCount', 'totalCommissionRate', 'packages', 'options']),
        );
    }
}
