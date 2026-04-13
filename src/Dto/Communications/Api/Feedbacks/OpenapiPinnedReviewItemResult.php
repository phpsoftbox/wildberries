<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Communications\Api\Feedbacks;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class OpenapiPinnedReviewItemResult implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $changeStateAt,
        public ?int $imtId,
        public ?int $nmId,
        public ?int $pinId,
        public ?DomainReviewPinMethod $pinMethod,
        public ?DomainReviewPinOn $pinOn,
        public ?string $feedbackId,
        public ?DomainReviewState $state,
        public ?string $unpinnedCause,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            changeStateAt: WildberriesDtoValue::string($payload['changeStateAt'] ?? null),
            imtId: WildberriesDtoValue::int($payload['imtId'] ?? null),
            nmId: WildberriesDtoValue::int($payload['nmId'] ?? null),
            pinId: WildberriesDtoValue::int($payload['pinId'] ?? null),
            pinMethod: WildberriesDtoValue::object($payload['pinMethod'] ?? null, DomainReviewPinMethod::class),
            pinOn: WildberriesDtoValue::object($payload['pinOn'] ?? null, DomainReviewPinOn::class),
            feedbackId: WildberriesDtoValue::string($payload['feedbackId'] ?? null),
            state: WildberriesDtoValue::object($payload['state'] ?? null, DomainReviewState::class),
            unpinnedCause: WildberriesDtoValue::string($payload['unpinnedCause'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['changeStateAt', 'imtId', 'nmId', 'pinId', 'pinMethod', 'pinOn', 'feedbackId', 'state', 'unpinnedCause']),
        );
    }
}
