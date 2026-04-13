<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Promotion\Api\Advert;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class Timestamps implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $created,
        public ?string $updated,
        public ?string $started,
        public ?string $deleted,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            created: WildberriesDtoValue::string($payload['created'] ?? null),
            updated: WildberriesDtoValue::string($payload['updated'] ?? null),
            started: WildberriesDtoValue::string($payload['started'] ?? null),
            deleted: WildberriesDtoValue::string($payload['deleted'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['created', 'updated', 'started', 'deleted']),
        );
    }
}
