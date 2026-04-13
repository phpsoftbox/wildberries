<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Promotion\Adv;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class GETAdvV1PromotionCountResponse implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $adverts
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $adverts,
        public ?int $all,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            adverts: WildberriesDtoValue::array($payload['adverts'] ?? null),
            all: WildberriesDtoValue::int($payload['all'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['adverts', 'all']),
        );
    }
}
