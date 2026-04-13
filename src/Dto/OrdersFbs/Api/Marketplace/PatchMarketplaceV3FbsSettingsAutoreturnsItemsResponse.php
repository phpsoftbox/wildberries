<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Marketplace;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class PatchMarketplaceV3FbsSettingsAutoreturnsItemsResponse implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $results
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $results,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            results: WildberriesDtoValue::array($payload['results'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['results']),
        );
    }
}
