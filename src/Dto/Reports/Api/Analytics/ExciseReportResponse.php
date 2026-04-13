<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Reports\Api\Analytics;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ExciseReportResponse implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?ModelsExciseReportResponse $response,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            response: WildberriesDtoValue::object($payload['response'] ?? null, ModelsExciseReportResponse::class),
            extra: WildberriesDtoValue::extra($payload, ['response']),
        );
    }
}
