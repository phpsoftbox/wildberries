<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Supplies;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class POSTApiV3SuppliesSupplyIdTrbxResponse implements WildberriesDtoInterface
{
    /**
     * @param list<string> $trbxIds
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $trbxIds,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            trbxIds: WildberriesDtoValue::array($payload['trbxIds'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['trbxIds']),
        );
    }
}
