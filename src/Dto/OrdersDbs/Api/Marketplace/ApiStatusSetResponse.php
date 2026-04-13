<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Marketplace;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ApiStatusSetResponse implements WildberriesDtoInterface
{
    /**
     * @param list<ApiBatchErrorResponse> $errors
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $errors,
        public ?bool $isError,
        public ?int $orderId,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            errors: WildberriesDtoValue::objectList($payload['errors'] ?? null, ApiBatchErrorResponse::class),
            isError: WildberriesDtoValue::bool($payload['isError'] ?? null),
            orderId: WildberriesDtoValue::int($payload['orderId'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['errors', 'isError', 'orderId']),
        );
    }
}
