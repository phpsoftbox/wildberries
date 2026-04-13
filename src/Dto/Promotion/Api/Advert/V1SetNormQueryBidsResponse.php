<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Promotion\Api\Advert;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class V1SetNormQueryBidsResponse implements WildberriesDtoInterface
{
    /**
     * @param list<V1SetNormQueryBidsSuccessResponseItem> $success
     * @param list<NormQueryBidFailResponseItem> $failed
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $success,
        public array $failed,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            success: WildberriesDtoValue::objectList($payload['success'] ?? null, V1SetNormQueryBidsSuccessResponseItem::class),
            failed: WildberriesDtoValue::objectList($payload['failed'] ?? null, NormQueryBidFailResponseItem::class),
            extra: WildberriesDtoValue::extra($payload, ['success', 'failed']),
        );
    }
}
