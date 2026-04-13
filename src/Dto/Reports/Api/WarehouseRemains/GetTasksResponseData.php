<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Reports\Api\WarehouseRemains;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class GetTasksResponseData implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $id,
        public ?string $status,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            id: WildberriesDtoValue::string($payload['id'] ?? null),
            status: WildberriesDtoValue::string($payload['status'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['id', 'status']),
        );
    }
}
