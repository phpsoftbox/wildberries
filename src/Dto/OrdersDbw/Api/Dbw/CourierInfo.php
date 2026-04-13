<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersDbw\Api\Dbw;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class CourierInfo implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?CourierContactsResponse $contacts,
        public ?bool $mustBeAssigned,
        public ?string $updatedAt,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            contacts: WildberriesDtoValue::object($payload['contacts'] ?? null, CourierContactsResponse::class),
            mustBeAssigned: WildberriesDtoValue::bool($payload['mustBeAssigned'] ?? null),
            updatedAt: WildberriesDtoValue::string($payload['updatedAt'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['contacts', 'mustBeAssigned', 'updatedAt']),
        );
    }
}
