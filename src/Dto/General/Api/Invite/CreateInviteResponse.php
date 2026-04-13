<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\General\Api\Invite;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class CreateInviteResponse implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $inviteID,
        public ?string $expiredAt,
        public ?bool $isSuccess,
        public ?string $inviteUrl,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            inviteID: WildberriesDtoValue::string($payload['inviteID'] ?? null),
            expiredAt: WildberriesDtoValue::string($payload['expiredAt'] ?? null),
            isSuccess: WildberriesDtoValue::bool($payload['isSuccess'] ?? null),
            inviteUrl: WildberriesDtoValue::string($payload['inviteUrl'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['inviteID', 'expiredAt', 'isSuccess', 'inviteUrl']),
        );
    }
}
