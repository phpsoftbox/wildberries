<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Communications\Api\Seller;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class GoodCard implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $date,
        public ?int $nmID,
        public ?int $price,
        public ?string $priceCurrency,
        public ?string $rid,
        public ?string $size,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            date: WildberriesDtoValue::string($payload['date'] ?? null),
            nmID: WildberriesDtoValue::int($payload['nmID'] ?? null),
            price: WildberriesDtoValue::int($payload['price'] ?? null),
            priceCurrency: WildberriesDtoValue::string($payload['priceCurrency'] ?? null),
            rid: WildberriesDtoValue::string($payload['rid'] ?? null),
            size: WildberriesDtoValue::string($payload['size'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['date', 'nmID', 'price', 'priceCurrency', 'rid', 'size']),
        );
    }
}
