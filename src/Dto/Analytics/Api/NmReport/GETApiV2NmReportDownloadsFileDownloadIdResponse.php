<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Analytics\Api\NmReport;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class GETApiV2NmReportDownloadsFileDownloadIdResponse implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $title,
        public ?string $detail,
        public ?string $requestId,
        public ?string $origin,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            title: WildberriesDtoValue::string($payload['title'] ?? null),
            detail: WildberriesDtoValue::string($payload['detail'] ?? null),
            requestId: WildberriesDtoValue::string($payload['requestId'] ?? null),
            origin: WildberriesDtoValue::string($payload['origin'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['title', 'detail', 'requestId', 'origin']),
        );
    }
}
