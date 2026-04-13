<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Communications\Api\Seller;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class EventAttachments implements WildberriesDtoInterface
{
    /**
     * @param list<File> $files
     * @param list<Image> $images
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?GoodCard $goodCard,
        public array $files,
        public array $images,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            goodCard: WildberriesDtoValue::object($payload['goodCard'] ?? null, GoodCard::class),
            files: WildberriesDtoValue::objectList($payload['files'] ?? null, File::class),
            images: WildberriesDtoValue::objectList($payload['images'] ?? null, Image::class),
            extra: WildberriesDtoValue::extra($payload, ['goodCard', 'files', 'images']),
        );
    }
}
