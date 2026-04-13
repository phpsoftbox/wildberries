<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Promotion\Api\Advert;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class AdvertSettings implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $placements
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $paymentType,
        public ?string $name,
        public array $placements,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            paymentType: WildberriesDtoValue::string($payload['payment_type'] ?? null),
            name: WildberriesDtoValue::string($payload['name'] ?? null),
            placements: WildberriesDtoValue::array($payload['placements'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['payment_type', 'name', 'placements']),
        );
    }
}
