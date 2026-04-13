<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Promotion\Api\Advert;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class NormQueryBidFailResponseItem implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $advertId,
        public ?int $nmId,
        public ?string $normQuery,
        public ?string $reason,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            advertId: WildberriesDtoValue::int($payload['advertId'] ?? null),
            nmId: WildberriesDtoValue::int($payload['nmId'] ?? null),
            normQuery: WildberriesDtoValue::string($payload['normQuery'] ?? null),
            reason: WildberriesDtoValue::string($payload['reason'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['advertId', 'nmId', 'normQuery', 'reason']),
        );
    }
}
