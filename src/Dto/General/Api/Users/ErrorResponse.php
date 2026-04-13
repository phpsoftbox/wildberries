<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\General\Api\Users;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ErrorResponse implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $title,
        public ?string $detail,
        public ?string $requestId,
        public ?string $origin,
        public ?float $status,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            title: WildberriesDtoValue::string($payload['title'] ?? null),
            detail: WildberriesDtoValue::string($payload['detail'] ?? null),
            requestId: WildberriesDtoValue::string($payload['requestId'] ?? null),
            origin: WildberriesDtoValue::string($payload['origin'] ?? null),
            status: WildberriesDtoValue::float($payload['status'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['title', 'detail', 'requestId', 'origin', 'status']),
        );
    }
}
