<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Communications\Api\Seller;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class LastMessage implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $text,
        public ?int $addTimestamp,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            text: WildberriesDtoValue::string($payload['text'] ?? null),
            addTimestamp: WildberriesDtoValue::int($payload['addTimestamp'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['text', 'addTimestamp']),
        );
    }
}
