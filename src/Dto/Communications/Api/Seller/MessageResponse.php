<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Communications\Api\Seller;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class MessageResponse implements WildberriesDtoInterface
{
    /**
     * @param list<string> $errors
     * @param array<array-key, mixed> $result
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $errors,
        public array $result,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            errors: WildberriesDtoValue::array($payload['errors'] ?? null),
            result: WildberriesDtoValue::array($payload['result'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['errors', 'result']),
        );
    }
}
