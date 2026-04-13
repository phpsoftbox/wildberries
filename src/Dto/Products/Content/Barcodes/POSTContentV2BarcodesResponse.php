<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Products\Content\Barcodes;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class POSTContentV2BarcodesResponse implements WildberriesDtoInterface
{
    /**
     * @param list<string> $data
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $data,
        public ?bool $error,
        public ?string $errorText,
        public ?string $additionalErrors,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            data: WildberriesDtoValue::array($payload['data'] ?? null),
            error: WildberriesDtoValue::bool($payload['error'] ?? null),
            errorText: WildberriesDtoValue::string($payload['errorText'] ?? null),
            additionalErrors: WildberriesDtoValue::string($payload['additionalErrors'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['data', 'error', 'errorText', 'additionalErrors']),
        );
    }
}
