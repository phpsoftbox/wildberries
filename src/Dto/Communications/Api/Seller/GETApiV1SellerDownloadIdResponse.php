<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Communications\Api\Seller;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class GETApiV1SellerDownloadIdResponse implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $moderationState,
        public ?int $retrySeconds,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            moderationState: WildberriesDtoValue::string($payload['moderationState'] ?? null),
            retrySeconds: WildberriesDtoValue::int($payload['retrySeconds'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['moderationState', 'retrySeconds']),
        );
    }
}
