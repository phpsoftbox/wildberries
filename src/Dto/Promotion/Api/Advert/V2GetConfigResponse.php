<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Promotion\Api\Advert;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class V2GetConfigResponse implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $currency,
        public ?int $currencyCode,
        public ?int $cpmStep,
        public ?int $cpcStep,
        public ?int $minTopUp,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            currency: WildberriesDtoValue::string($payload['currency'] ?? null),
            currencyCode: WildberriesDtoValue::int($payload['currencyCode'] ?? null),
            cpmStep: WildberriesDtoValue::int($payload['cpmStep'] ?? null),
            cpcStep: WildberriesDtoValue::int($payload['cpcStep'] ?? null),
            minTopUp: WildberriesDtoValue::int($payload['minTopUp'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['currency', 'currencyCode', 'cpmStep', 'cpcStep', 'minTopUp']),
        );
    }
}
