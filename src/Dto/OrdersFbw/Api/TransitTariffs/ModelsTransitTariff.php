<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersFbw\Api\TransitTariffs;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ModelsTransitTariff implements WildberriesDtoInterface
{
    /**
     * @param list<ModelsVolumeTariff> $boxTariff
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $transitWarehouseName,
        public ?string $destinationWarehouseName,
        public ?string $activeFrom,
        public array $boxTariff,
        public ?int $palletTariff,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            transitWarehouseName: WildberriesDtoValue::string($payload['transitWarehouseName'] ?? null),
            destinationWarehouseName: WildberriesDtoValue::string($payload['destinationWarehouseName'] ?? null),
            activeFrom: WildberriesDtoValue::string($payload['activeFrom'] ?? null),
            boxTariff: WildberriesDtoValue::objectList($payload['boxTariff'] ?? null, ModelsVolumeTariff::class),
            palletTariff: WildberriesDtoValue::int($payload['palletTariff'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['transitWarehouseName', 'destinationWarehouseName', 'activeFrom', 'boxTariff', 'palletTariff']),
        );
    }
}
