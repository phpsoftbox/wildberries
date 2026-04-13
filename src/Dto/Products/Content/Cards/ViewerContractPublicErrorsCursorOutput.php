<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Products\Content\Cards;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ViewerContractPublicErrorsCursorOutput implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?bool $next,
        public ?string $updatedAt,
        public ?string $batchUUID,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            next: WildberriesDtoValue::bool($payload['next'] ?? null),
            updatedAt: WildberriesDtoValue::string($payload['updatedAt'] ?? null),
            batchUUID: WildberriesDtoValue::string($payload['batchUUID'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['next', 'updatedAt', 'batchUUID']),
        );
    }
}
