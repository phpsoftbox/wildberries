<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\General\Api\SellerInfo;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class GETApiV1SellerInfoResponse implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $name,
        public ?string $sid,
        public ?string $tin,
        public ?string $tradeMark,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            name: WildberriesDtoValue::string($payload['name'] ?? null),
            sid: WildberriesDtoValue::string($payload['sid'] ?? null),
            tin: WildberriesDtoValue::string($payload['tin'] ?? null),
            tradeMark: WildberriesDtoValue::string($payload['tradeMark'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['name', 'sid', 'tin', 'tradeMark']),
        );
    }
}
