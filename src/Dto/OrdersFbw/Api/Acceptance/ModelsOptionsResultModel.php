<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersFbw\Api\Acceptance;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ModelsOptionsResultModel implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $result
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $result,
        public ?string $requestId,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            result: WildberriesDtoValue::array($payload['result'] ?? null),
            requestId: WildberriesDtoValue::string($payload['requestId'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['result', 'requestId']),
        );
    }
}
