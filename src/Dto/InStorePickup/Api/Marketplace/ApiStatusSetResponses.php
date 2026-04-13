<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\InStorePickup\Api\Marketplace;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ApiStatusSetResponses implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $requestId
     * @param list<ApiStatusSetResponse> $results
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $requestId,
        public array $results,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            requestId: WildberriesDtoValue::array($payload['requestId'] ?? null),
            results: WildberriesDtoValue::objectList($payload['results'] ?? null, ApiStatusSetResponse::class),
            extra: WildberriesDtoValue::extra($payload, ['requestId', 'results']),
        );
    }
}
