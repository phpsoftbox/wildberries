<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Marketplace;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class UpdatedSupplies implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?ReplyBatchError $error,
        public ?bool $success,
        public ?string $supplyId,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            error: WildberriesDtoValue::object($payload['error'] ?? null, ReplyBatchError::class),
            success: WildberriesDtoValue::bool($payload['success'] ?? null),
            supplyId: WildberriesDtoValue::string($payload['supplyId'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['error', 'success', 'supplyId']),
        );
    }
}
