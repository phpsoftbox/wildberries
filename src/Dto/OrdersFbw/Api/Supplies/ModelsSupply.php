<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersFbw\Api\Supplies;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ModelsSupply implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $boxTypeID
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $phone,
        public ?int $supplyID,
        public ?int $preorderID,
        public ?string $createDate,
        public ?string $supplyDate,
        public ?string $factDate,
        public ?string $updatedDate,
        public ?int $statusID,
        public array $boxTypeID,
        public ?bool $isBoxOnPallet,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            phone: WildberriesDtoValue::string($payload['phone'] ?? null),
            supplyID: WildberriesDtoValue::int($payload['supplyID'] ?? null),
            preorderID: WildberriesDtoValue::int($payload['preorderID'] ?? null),
            createDate: WildberriesDtoValue::string($payload['createDate'] ?? null),
            supplyDate: WildberriesDtoValue::string($payload['supplyDate'] ?? null),
            factDate: WildberriesDtoValue::string($payload['factDate'] ?? null),
            updatedDate: WildberriesDtoValue::string($payload['updatedDate'] ?? null),
            statusID: WildberriesDtoValue::int($payload['statusID'] ?? null),
            boxTypeID: WildberriesDtoValue::array($payload['boxTypeID'] ?? null),
            isBoxOnPallet: WildberriesDtoValue::bool($payload['isBoxOnPallet'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['phone', 'supplyID', 'preorderID', 'createDate', 'supplyDate', 'factDate', 'updatedDate', 'statusID', 'boxTypeID', 'isBoxOnPallet']),
        );
    }
}
