<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\InStorePickup\Api\Marketplace;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ApiOrdersFinalPriceResponse implements WildberriesDtoInterface
{
    /**
     * @param list<ApiOrderFinalPriceResult> $results
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $requestId,
        public array $results,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            requestId: WildberriesDtoValue::string($payload['requestId'] ?? null),
            results: WildberriesDtoValue::objectList($payload['results'] ?? null, ApiOrderFinalPriceResult::class),
            extra: WildberriesDtoValue::extra($payload, ['requestId', 'results']),
        );
    }
}
