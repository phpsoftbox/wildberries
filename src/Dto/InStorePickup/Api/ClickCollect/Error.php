<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\InStorePickup\Api\ClickCollect;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class Error implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $data
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $code,
        public ?string $message,
        public array $data,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            code: WildberriesDtoValue::string($payload['code'] ?? null),
            message: WildberriesDtoValue::string($payload['message'] ?? null),
            data: WildberriesDtoValue::array($payload['data'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['code', 'message', 'data']),
        );
    }
}
