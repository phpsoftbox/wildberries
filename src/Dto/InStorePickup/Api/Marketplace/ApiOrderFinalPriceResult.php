<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\InStorePickup\Api\Marketplace;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ApiOrderFinalPriceResult implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $data
     * @param list<ApiBatchErrorFinalPriceResponse> $errors
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $orderId,
        public array $data,
        public array $errors,
        public ?bool $isError,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            orderId: WildberriesDtoValue::int($payload['orderId'] ?? null),
            data: WildberriesDtoValue::array($payload['data'] ?? null),
            errors: WildberriesDtoValue::objectList($payload['errors'] ?? null, ApiBatchErrorFinalPriceResponse::class),
            isError: WildberriesDtoValue::bool($payload['isError'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['orderId', 'data', 'errors', 'isError']),
        );
    }
}
