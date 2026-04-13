<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class FeedbacksIncreaseItem implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $fiveStar
     * @param array<array-key, mixed> $fourStar
     * @param array<array-key, mixed> $threeStar
     * @param array<array-key, mixed> $twoStar
     * @param array<array-key, mixed> $oneStar
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $current,
        public ?int $total,
        public ?int $dynamics,
        public array $fiveStar,
        public array $fourStar,
        public array $threeStar,
        public array $twoStar,
        public array $oneStar,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            current: WildberriesDtoValue::int($payload['current'] ?? null),
            total: WildberriesDtoValue::int($payload['total'] ?? null),
            dynamics: WildberriesDtoValue::int($payload['dynamics'] ?? null),
            fiveStar: WildberriesDtoValue::array($payload['fiveStar'] ?? null),
            fourStar: WildberriesDtoValue::array($payload['fourStar'] ?? null),
            threeStar: WildberriesDtoValue::array($payload['threeStar'] ?? null),
            twoStar: WildberriesDtoValue::array($payload['twoStar'] ?? null),
            oneStar: WildberriesDtoValue::array($payload['oneStar'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['current', 'total', 'dynamics', 'fiveStar', 'fourStar', 'threeStar', 'twoStar', 'oneStar']),
        );
    }
}
