<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api\SearchReport;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class PostV2SearchReportProductSearchTextsResponse implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?ItemSearchTextsResponse $data,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            data: WildberriesDtoValue::object($payload['data'] ?? null, ItemSearchTextsResponse::class),
            extra: WildberriesDtoValue::extra($payload, ['data']),
        );
    }
}
