<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ProductsResponse implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $products
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $products,
        public ?Currency $currency,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            products: WildberriesDtoValue::array($payload['products'] ?? null),
            currency: WildberriesDtoValue::object($payload['currency'] ?? null, Currency::class),
            extra: WildberriesDtoValue::extra($payload, ['products', 'currency']),
        );
    }
}
