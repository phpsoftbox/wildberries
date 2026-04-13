<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Communications\Api\Feedbacks;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class OpenapiResultErr implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $origin,
        public ?string $detail,
        public ?string $requestId,
        public ?string $status,
        public ?string $title,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            origin: WildberriesDtoValue::string($payload['origin'] ?? null),
            detail: WildberriesDtoValue::string($payload['detail'] ?? null),
            requestId: WildberriesDtoValue::string($payload['requestId'] ?? null),
            status: WildberriesDtoValue::string($payload['status'] ?? null),
            title: WildberriesDtoValue::string($payload['title'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['origin', 'detail', 'requestId', 'status', 'title']),
        );
    }
}
