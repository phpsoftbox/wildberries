<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersDbw\Api\Dbw;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class CourierContactsResponse implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $carNumber,
        public ?string $fullName,
        public ?string $phone,
        public ?string $pTimeFrom,
        public ?string $pTimeTo,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            carNumber: WildberriesDtoValue::string($payload['carNumber'] ?? null),
            fullName: WildberriesDtoValue::string($payload['fullName'] ?? null),
            phone: WildberriesDtoValue::string($payload['phone'] ?? null),
            pTimeFrom: WildberriesDtoValue::string($payload['pTimeFrom'] ?? null),
            pTimeTo: WildberriesDtoValue::string($payload['pTimeTo'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['carNumber', 'fullName', 'phone', 'pTimeFrom', 'pTimeTo']),
        );
    }
}
