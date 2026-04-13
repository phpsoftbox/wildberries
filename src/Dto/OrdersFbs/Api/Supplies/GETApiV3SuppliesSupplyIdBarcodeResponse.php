<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Supplies;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class GETApiV3SuppliesSupplyIdBarcodeResponse implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $barcode,
        public ?string $file,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            barcode: WildberriesDtoValue::string($payload['barcode'] ?? null),
            file: WildberriesDtoValue::string($payload['file'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['barcode', 'file']),
        );
    }
}
