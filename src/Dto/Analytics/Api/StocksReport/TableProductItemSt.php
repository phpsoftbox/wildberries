<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api\StocksReport;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class TableProductItemSt implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $metrics
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $nmID,
        public ?bool $isDeleted,
        public ?string $subjectName,
        public ?string $name,
        public ?string $vendorCode,
        public ?string $brandName,
        public ?string $mainPhoto,
        public ?bool $hasSizes,
        public array $metrics,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            nmID: WildberriesDtoValue::int($payload['nmID'] ?? null),
            isDeleted: WildberriesDtoValue::bool($payload['isDeleted'] ?? null),
            subjectName: WildberriesDtoValue::string($payload['subjectName'] ?? null),
            name: WildberriesDtoValue::string($payload['name'] ?? null),
            vendorCode: WildberriesDtoValue::string($payload['vendorCode'] ?? null),
            brandName: WildberriesDtoValue::string($payload['brandName'] ?? null),
            mainPhoto: WildberriesDtoValue::string($payload['mainPhoto'] ?? null),
            hasSizes: WildberriesDtoValue::bool($payload['hasSizes'] ?? null),
            metrics: WildberriesDtoValue::array($payload['metrics'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['nmID', 'isDeleted', 'subjectName', 'name', 'vendorCode', 'brandName', 'mainPhoto', 'hasSizes', 'metrics']),
        );
    }
}
