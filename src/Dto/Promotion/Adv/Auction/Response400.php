<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Promotion\Adv\Auction;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class Response400 implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $detail,
        public ?string $origin,
        public ?string $requestId,
        public ?int $status,
        public ?string $title,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            detail: WildberriesDtoValue::string($payload['detail'] ?? null),
            origin: WildberriesDtoValue::string($payload['origin'] ?? null),
            requestId: WildberriesDtoValue::string($payload['request_id'] ?? null),
            status: WildberriesDtoValue::int($payload['status'] ?? null),
            title: WildberriesDtoValue::string($payload['title'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['detail', 'origin', 'request_id', 'status', 'title']),
        );
    }
}
