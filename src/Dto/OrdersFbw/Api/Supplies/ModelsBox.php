<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersFbw\Api\Supplies;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ModelsBox implements WildberriesDtoInterface
{
    /**
     * @param list<ModelsGoodInBox> $barcodes
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $packageCode,
        public ?int $quantity,
        public array $barcodes,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            packageCode: WildberriesDtoValue::string($payload['packageCode'] ?? null),
            quantity: WildberriesDtoValue::int($payload['quantity'] ?? null),
            barcodes: WildberriesDtoValue::objectList($payload['barcodes'] ?? null, ModelsGoodInBox::class),
            extra: WildberriesDtoValue::extra($payload, ['packageCode', 'quantity', 'barcodes']),
        );
    }
}
