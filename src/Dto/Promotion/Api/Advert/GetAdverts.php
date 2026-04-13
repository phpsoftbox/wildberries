<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Promotion\Api\Advert;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class GetAdverts implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $adverts
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $adverts,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            adverts: WildberriesDtoValue::array($payload['adverts'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['adverts']),
        );
    }
}
