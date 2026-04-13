<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Promotion\Adv\Stats;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class StatCampaignNotFound implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $advertId,
        public ?string $error,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            advertId: WildberriesDtoValue::int($payload['advert_id'] ?? null),
            error: WildberriesDtoValue::string($payload['error'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['advert_id', 'error']),
        );
    }
}
