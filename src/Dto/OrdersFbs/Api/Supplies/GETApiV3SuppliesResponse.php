<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Supplies;

use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Orders\Next;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class GETApiV3SuppliesResponse implements WildberriesDtoInterface
{
    /**
     * @param list<Supply> $supplies
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?Next $next,
        public array $supplies,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            next: WildberriesDtoValue::object($payload['next'] ?? null, Next::class),
            supplies: WildberriesDtoValue::objectList($payload['supplies'] ?? null, Supply::class),
            extra: WildberriesDtoValue::extra($payload, ['next', 'supplies']),
        );
    }
}
