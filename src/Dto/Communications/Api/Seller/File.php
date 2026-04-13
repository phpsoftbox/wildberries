<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Communications\Api\Seller;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class File implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $contentType,
        public ?string $date,
        public ?string $downloadID,
        public ?string $name,
        public ?string $url,
        public ?int $size,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            contentType: WildberriesDtoValue::string($payload['contentType'] ?? null),
            date: WildberriesDtoValue::string($payload['date'] ?? null),
            downloadID: WildberriesDtoValue::string($payload['downloadID'] ?? null),
            name: WildberriesDtoValue::string($payload['name'] ?? null),
            url: WildberriesDtoValue::string($payload['url'] ?? null),
            size: WildberriesDtoValue::int($payload['size'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['contentType', 'date', 'downloadID', 'name', 'url', 'size']),
        );
    }
}
