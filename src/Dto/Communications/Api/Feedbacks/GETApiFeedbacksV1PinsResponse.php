<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Communications\Api\Feedbacks;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class GETApiFeedbacksV1PinsResponse implements WildberriesDtoInterface
{
    /**
     * @param list<OpenapiPinnedReviewItemResult> $data
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $data,
        public ?int $next,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            data: WildberriesDtoValue::objectList($payload['data'] ?? null, OpenapiPinnedReviewItemResult::class),
            next: WildberriesDtoValue::int($payload['next'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['data', 'next']),
        );
    }
}
