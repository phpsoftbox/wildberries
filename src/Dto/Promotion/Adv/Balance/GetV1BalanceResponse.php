<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Promotion\Adv\Balance;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class GetV1BalanceResponse implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $cashbacks
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $balance,
        public ?int $net,
        public ?string $currency,
        public ?int $bonus,
        public array $cashbacks,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            balance: WildberriesDtoValue::int($payload['balance'] ?? null),
            net: WildberriesDtoValue::int($payload['net'] ?? null),
            currency: WildberriesDtoValue::string($payload['currency'] ?? null),
            bonus: WildberriesDtoValue::int($payload['bonus'] ?? null),
            cashbacks: WildberriesDtoValue::array($payload['cashbacks'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['balance', 'net', 'currency', 'bonus', 'cashbacks']),
        );
    }
}
