<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Marketplace;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ApiB2bClientInfoResponses implements WildberriesDtoInterface
{
    /**
     * @param list<ApiB2bClientInfoResponse> $results
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
            results: WildberriesDtoValue::objectList($payload['results'] ?? null, ApiB2bClientInfoResponse::class),
            extra: WildberriesDtoValue::extra($payload, ['requestId', 'results']),
        );
    }
}
