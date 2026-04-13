<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Products\Api\Content;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class SetRecomRes implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $errors
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?bool $isError,
        public array $errors,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            isError: WildberriesDtoValue::bool($payload['isError'] ?? null),
            errors: WildberriesDtoValue::array($payload['errors'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['isError', 'errors']),
        );
    }
}
