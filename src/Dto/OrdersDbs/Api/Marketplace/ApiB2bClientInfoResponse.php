<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Marketplace;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ApiB2bClientInfoResponse implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $errors
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?ApiB2bClientInfo $data,
        public array $errors,
        public ?bool $isError,
        public ?int $orderId,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            data: WildberriesDtoValue::object($payload['data'] ?? null, ApiB2bClientInfo::class),
            errors: WildberriesDtoValue::array($payload['errors'] ?? null),
            isError: WildberriesDtoValue::bool($payload['isError'] ?? null),
            orderId: WildberriesDtoValue::int($payload['orderId'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['data', 'errors', 'isError', 'orderId']),
        );
    }
}
