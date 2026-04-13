<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\General\Api\Common;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class SubscriptionsJamInfo implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $state,
        public ?string $activationSource,
        public ?string $level,
        public ?string $since,
        public ?string $till,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            state: WildberriesDtoValue::string($payload['state'] ?? null),
            activationSource: WildberriesDtoValue::string($payload['activationSource'] ?? null),
            level: WildberriesDtoValue::string($payload['level'] ?? null),
            since: WildberriesDtoValue::string($payload['since'] ?? null),
            till: WildberriesDtoValue::string($payload['till'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['state', 'activationSource', 'level', 'since', 'till']),
        );
    }
}
