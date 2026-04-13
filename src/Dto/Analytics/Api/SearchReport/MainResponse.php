<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api\SearchReport;

use PhpSoftBox\Wildberries\Dto\Analytics\Api\Currency;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class MainResponse implements WildberriesDtoInterface
{
    /**
     * @param list<TableGroupItem> $groups
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?CommonInfo $commonInfo,
        public ?PositionInfo $positionInfo,
        public ?VisibilityInfo $visibilityInfo,
        public array $groups,
        public ?Currency $currency,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            commonInfo: WildberriesDtoValue::object($payload['commonInfo'] ?? null, CommonInfo::class),
            positionInfo: WildberriesDtoValue::object($payload['positionInfo'] ?? null, PositionInfo::class),
            visibilityInfo: WildberriesDtoValue::object($payload['visibilityInfo'] ?? null, VisibilityInfo::class),
            groups: WildberriesDtoValue::objectList($payload['groups'] ?? null, TableGroupItem::class),
            currency: WildberriesDtoValue::object($payload['currency'] ?? null, Currency::class),
            extra: WildberriesDtoValue::extra($payload, ['commonInfo', 'positionInfo', 'visibilityInfo', 'groups', 'currency']),
        );
    }
}
