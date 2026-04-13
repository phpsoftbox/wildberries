<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Promotion\Adv\Count;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class GETAdvV1CountResponse implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $adverts
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $all,
        public array $adverts,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            all: WildberriesDtoValue::int($payload['all'] ?? null),
            adverts: WildberriesDtoValue::array($payload['adverts'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['all', 'adverts']),
        );
    }
}
