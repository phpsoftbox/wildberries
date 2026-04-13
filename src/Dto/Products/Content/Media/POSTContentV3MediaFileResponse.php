<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Products\Content\Media;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class POSTContentV3MediaFileResponse implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $data
     * @param array<array-key, mixed> $additionalErrors
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $data,
        public ?bool $error,
        public ?string $errorText,
        public array $additionalErrors,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            data: WildberriesDtoValue::array($payload['data'] ?? null),
            error: WildberriesDtoValue::bool($payload['error'] ?? null),
            errorText: WildberriesDtoValue::string($payload['errorText'] ?? null),
            additionalErrors: WildberriesDtoValue::array($payload['additionalErrors'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['data', 'error', 'errorText', 'additionalErrors']),
        );
    }
}
