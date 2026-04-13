<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Marketplace;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class GetMarketplaceV3FbsSettingsAutoreturnsSubcategoriesRestrictedResponse implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $data
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $next,
        public array $data,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            next: WildberriesDtoValue::int($payload['next'] ?? null),
            data: WildberriesDtoValue::array($payload['data'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['next', 'data']),
        );
    }
}
