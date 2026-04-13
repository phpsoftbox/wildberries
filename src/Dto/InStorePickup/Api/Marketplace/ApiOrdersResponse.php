<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\InStorePickup\Api\Marketplace;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ApiOrdersResponse implements WildberriesDtoInterface
{
    /**
     * @param list<ApiOrdersErrorResponse> $errors
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $orderId,
        public ?bool $isError,
        public array $errors,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            orderId: WildberriesDtoValue::int($payload['orderId'] ?? null),
            isError: WildberriesDtoValue::bool($payload['isError'] ?? null),
            errors: WildberriesDtoValue::objectList($payload['errors'] ?? null, ApiOrdersErrorResponse::class),
            extra: WildberriesDtoValue::extra($payload, ['orderId', 'isError', 'errors']),
        );
    }
}
