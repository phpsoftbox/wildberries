<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Finances\Api\Account;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class GETApiV1AccountBalanceResponse implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $currency,
        public ?float $current,
        public ?float $forWithdraw,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            currency: WildberriesDtoValue::string($payload['currency'] ?? null),
            current: WildberriesDtoValue::float($payload['current'] ?? null),
            forWithdraw: WildberriesDtoValue::float($payload['for_withdraw'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['currency', 'current', 'for_withdraw']),
        );
    }
}
