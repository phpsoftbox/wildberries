<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Products\Content\Cards;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ResponsePublicViewerPublicErrorsTableListV2 implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $additionalErrors
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?ModelsErrorTableListPublicRespV2 $data,
        public ?bool $error,
        public ?string $errorText,
        public array $additionalErrors,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            data: WildberriesDtoValue::object($payload['data'] ?? null, ModelsErrorTableListPublicRespV2::class),
            error: WildberriesDtoValue::bool($payload['error'] ?? null),
            errorText: WildberriesDtoValue::string($payload['errorText'] ?? null),
            additionalErrors: WildberriesDtoValue::array($payload['additionalErrors'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['data', 'error', 'errorText', 'additionalErrors']),
        );
    }
}
