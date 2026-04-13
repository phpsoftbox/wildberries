<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Communications\Api\Feedbacks;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class StandardizedFQError implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $title,
        public ?string $requestId,
        public ?string $origin,
        public ?string $detail,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            title: WildberriesDtoValue::string($payload['title'] ?? null),
            requestId: WildberriesDtoValue::string($payload['requestId'] ?? null),
            origin: WildberriesDtoValue::string($payload['origin'] ?? null),
            detail: WildberriesDtoValue::string($payload['detail'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['title', 'requestId', 'origin', 'detail']),
        );
    }
}
