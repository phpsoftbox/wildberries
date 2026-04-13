<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Promotion\Adv\Advert;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class GETAdvV1AdvertResponse implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $extended
     * @param array<array-key, mixed> $items
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $advertId,
        public ?string $name,
        public ?string $brand,
        public ?int $type,
        public ?int $status,
        public ?string $createTime,
        public array $extended,
        public array $items,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            advertId: WildberriesDtoValue::int($payload['advertId'] ?? null),
            name: WildberriesDtoValue::string($payload['name'] ?? null),
            brand: WildberriesDtoValue::string($payload['brand'] ?? null),
            type: WildberriesDtoValue::int($payload['type'] ?? null),
            status: WildberriesDtoValue::int($payload['status'] ?? null),
            createTime: WildberriesDtoValue::string($payload['createTime'] ?? null),
            extended: WildberriesDtoValue::array($payload['extended'] ?? null),
            items: WildberriesDtoValue::array($payload['items'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['advertId', 'name', 'brand', 'type', 'status', 'createTime', 'extended', 'items']),
        );
    }
}
