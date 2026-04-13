<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api\SearchReport;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class TableProductItem implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $price
     * @param array<array-key, mixed> $avgPosition
     * @param array<array-key, mixed> $openCard
     * @param array<array-key, mixed> $addToCart
     * @param array<array-key, mixed> $openToCart
     * @param array<array-key, mixed> $orders
     * @param array<array-key, mixed> $cartToOrder
     * @param array<array-key, mixed> $visibility
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $nmId,
        public ?string $name,
        public ?string $vendorCode,
        public ?string $subjectName,
        public ?string $brandName,
        public ?string $mainPhoto,
        public ?bool $isAdvertised,
        public ?bool $isSubstitutedSKU,
        public ?bool $isCardRated,
        public ?float $rating,
        public ?float $feedbackRating,
        public array $price,
        public array $avgPosition,
        public array $openCard,
        public array $addToCart,
        public array $openToCart,
        public array $orders,
        public array $cartToOrder,
        public array $visibility,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            nmId: WildberriesDtoValue::int($payload['nmId'] ?? null),
            name: WildberriesDtoValue::string($payload['name'] ?? null),
            vendorCode: WildberriesDtoValue::string($payload['vendorCode'] ?? null),
            subjectName: WildberriesDtoValue::string($payload['subjectName'] ?? null),
            brandName: WildberriesDtoValue::string($payload['brandName'] ?? null),
            mainPhoto: WildberriesDtoValue::string($payload['mainPhoto'] ?? null),
            isAdvertised: WildberriesDtoValue::bool($payload['isAdvertised'] ?? null),
            isSubstitutedSKU: WildberriesDtoValue::bool($payload['isSubstitutedSKU'] ?? null),
            isCardRated: WildberriesDtoValue::bool($payload['isCardRated'] ?? null),
            rating: WildberriesDtoValue::float($payload['rating'] ?? null),
            feedbackRating: WildberriesDtoValue::float($payload['feedbackRating'] ?? null),
            price: WildberriesDtoValue::array($payload['price'] ?? null),
            avgPosition: WildberriesDtoValue::array($payload['avgPosition'] ?? null),
            openCard: WildberriesDtoValue::array($payload['openCard'] ?? null),
            addToCart: WildberriesDtoValue::array($payload['addToCart'] ?? null),
            openToCart: WildberriesDtoValue::array($payload['openToCart'] ?? null),
            orders: WildberriesDtoValue::array($payload['orders'] ?? null),
            cartToOrder: WildberriesDtoValue::array($payload['cartToOrder'] ?? null),
            visibility: WildberriesDtoValue::array($payload['visibility'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['nmId', 'name', 'vendorCode', 'subjectName', 'brandName', 'mainPhoto', 'isAdvertised', 'isSubstitutedSKU', 'isCardRated', 'rating', 'feedbackRating', 'price', 'avgPosition', 'openCard', 'addToCart', 'openToCart', 'orders', 'cartToOrder', 'visibility']),
        );
    }
}
