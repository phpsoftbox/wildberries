<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\General\Api\Users;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class GetUsersResponse implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $users
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $total,
        public ?int $countInResponse,
        public array $users,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            total: WildberriesDtoValue::int($payload['total'] ?? null),
            countInResponse: WildberriesDtoValue::int($payload['countInResponse'] ?? null),
            users: WildberriesDtoValue::array($payload['users'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['total', 'countInResponse', 'users']),
        );
    }
}
