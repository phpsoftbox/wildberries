<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Marketplace;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class CountriesOKSMList implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $countries
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $countries,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            countries: WildberriesDtoValue::array($payload['countries'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['countries']),
        );
    }
}
