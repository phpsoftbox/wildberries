<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Supplies;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class GETApiV3SuppliesSupplyIdTrbxResponse implements WildberriesDtoInterface
{
    /**
     * @param list<SupplyTrbx> $trbxes
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $trbxes,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            trbxes: WildberriesDtoValue::objectList($payload['trbxes'] ?? null, SupplyTrbx::class),
            extra: WildberriesDtoValue::extra($payload, ['trbxes']),
        );
    }
}
