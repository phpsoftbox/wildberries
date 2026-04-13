<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Promotion\Adv\Budget;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class GETAdvV1BudgetResponse implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $cash,
        public ?int $netting,
        public ?int $total,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            cash: WildberriesDtoValue::int($payload['cash'] ?? null),
            netting: WildberriesDtoValue::int($payload['netting'] ?? null),
            total: WildberriesDtoValue::int($payload['total'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['cash', 'netting', 'total']),
        );
    }
}
