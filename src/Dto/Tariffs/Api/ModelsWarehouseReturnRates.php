<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Tariffs\Api;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ModelsWarehouseReturnRates implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $deliveryDumpKgtOfficeBase,
        public ?string $deliveryDumpKgtOfficeLiter,
        public ?string $deliveryDumpKgtReturnExpr,
        public ?string $deliveryDumpSrgOfficeExpr,
        public ?string $deliveryDumpSrgReturnExpr,
        public ?string $deliveryDumpSupCourierBase,
        public ?string $deliveryDumpSupCourierLiter,
        public ?string $deliveryDumpSupOfficeBase,
        public ?string $deliveryDumpSupOfficeLiter,
        public ?string $deliveryDumpSupReturnExpr,
        public ?string $warehouseName,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            deliveryDumpKgtOfficeBase: WildberriesDtoValue::string($payload['deliveryDumpKgtOfficeBase'] ?? null),
            deliveryDumpKgtOfficeLiter: WildberriesDtoValue::string($payload['deliveryDumpKgtOfficeLiter'] ?? null),
            deliveryDumpKgtReturnExpr: WildberriesDtoValue::string($payload['deliveryDumpKgtReturnExpr'] ?? null),
            deliveryDumpSrgOfficeExpr: WildberriesDtoValue::string($payload['deliveryDumpSrgOfficeExpr'] ?? null),
            deliveryDumpSrgReturnExpr: WildberriesDtoValue::string($payload['deliveryDumpSrgReturnExpr'] ?? null),
            deliveryDumpSupCourierBase: WildberriesDtoValue::string($payload['deliveryDumpSupCourierBase'] ?? null),
            deliveryDumpSupCourierLiter: WildberriesDtoValue::string($payload['deliveryDumpSupCourierLiter'] ?? null),
            deliveryDumpSupOfficeBase: WildberriesDtoValue::string($payload['deliveryDumpSupOfficeBase'] ?? null),
            deliveryDumpSupOfficeLiter: WildberriesDtoValue::string($payload['deliveryDumpSupOfficeLiter'] ?? null),
            deliveryDumpSupReturnExpr: WildberriesDtoValue::string($payload['deliveryDumpSupReturnExpr'] ?? null),
            warehouseName: WildberriesDtoValue::string($payload['warehouseName'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['deliveryDumpKgtOfficeBase', 'deliveryDumpKgtOfficeLiter', 'deliveryDumpKgtReturnExpr', 'deliveryDumpSrgOfficeExpr', 'deliveryDumpSrgReturnExpr', 'deliveryDumpSupCourierBase', 'deliveryDumpSupCourierLiter', 'deliveryDumpSupOfficeBase', 'deliveryDumpSupOfficeLiter', 'deliveryDumpSupReturnExpr', 'warehouseName']),
        );
    }
}
