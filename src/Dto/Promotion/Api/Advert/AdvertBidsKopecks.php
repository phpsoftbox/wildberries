<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Promotion\Api\Advert;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class AdvertBidsKopecks implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $search,
        public ?int $recommendations,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            search: WildberriesDtoValue::int($payload['search'] ?? null),
            recommendations: WildberriesDtoValue::int($payload['recommendations'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['search', 'recommendations']),
        );
    }
}
