<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Tariffs\Api;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ModelsWarehousesReturnRates implements WildberriesDtoInterface
{
    /**
     * @param list<ModelsWarehouseReturnRates> $warehouseList
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $dtNextDeliveryDumpKgt,
        public ?string $dtNextDeliveryDumpSrg,
        public ?string $dtNextDeliveryDumpSup,
        public array $warehouseList,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            dtNextDeliveryDumpKgt: WildberriesDtoValue::string($payload['dtNextDeliveryDumpKgt'] ?? null),
            dtNextDeliveryDumpSrg: WildberriesDtoValue::string($payload['dtNextDeliveryDumpSrg'] ?? null),
            dtNextDeliveryDumpSup: WildberriesDtoValue::string($payload['dtNextDeliveryDumpSup'] ?? null),
            warehouseList: WildberriesDtoValue::objectList($payload['warehouseList'] ?? null, ModelsWarehouseReturnRates::class),
            extra: WildberriesDtoValue::extra($payload, ['dtNextDeliveryDumpKgt', 'dtNextDeliveryDumpSrg', 'dtNextDeliveryDumpSup', 'warehouseList']),
        );
    }
}
