<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api\StocksReport;

use PhpSoftBox\Wildberries\Dto\Analytics\Api\Currency;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class TableGroupResponseSt implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?TableGroups $groups,
        public ?Currency $currency,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            groups: WildberriesDtoValue::object($payload['groups'] ?? null, TableGroups::class),
            currency: WildberriesDtoValue::object($payload['currency'] ?? null, Currency::class),
            extra: WildberriesDtoValue::extra($payload, ['groups', 'currency']),
        );
    }
}
