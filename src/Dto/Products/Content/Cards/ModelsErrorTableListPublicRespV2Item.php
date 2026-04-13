<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Products\Content\Cards;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ModelsErrorTableListPublicRespV2Item implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $subjects
     * @param array<array-key, mixed> $brands
     * @param list<string> $vendorCodes
     * @param array<array-key, mixed> $errors
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $batchUUID,
        public array $subjects,
        public array $brands,
        public array $vendorCodes,
        public array $errors,
        public ?string $updatedAt,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            batchUUID: WildberriesDtoValue::string($payload['batchUUID'] ?? null),
            subjects: WildberriesDtoValue::array($payload['subjects'] ?? null),
            brands: WildberriesDtoValue::array($payload['brands'] ?? null),
            vendorCodes: WildberriesDtoValue::array($payload['vendorCodes'] ?? null),
            errors: WildberriesDtoValue::array($payload['errors'] ?? null),
            updatedAt: WildberriesDtoValue::string($payload['updatedAt'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['batchUUID', 'subjects', 'brands', 'vendorCodes', 'errors', 'updatedAt']),
        );
    }
}
