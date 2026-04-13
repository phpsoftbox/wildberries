<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Promotion\Adv\Normquery;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class V0GetNormQueryListResponseItemNormQueries implements WildberriesDtoInterface
{
    /**
     * @param list<string> $active
     * @param list<string> $excluded
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $active,
        public array $excluded,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            active: WildberriesDtoValue::array($payload['active'] ?? null),
            excluded: WildberriesDtoValue::array($payload['excluded'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['active', 'excluded']),
        );
    }
}
