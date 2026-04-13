<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\InStorePickup\Api\ClickCollect;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ApiOrderClientInfo implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $phone,
        public ?string $firstName,
        public ?int $orderID,
        public ?int $phoneCode,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            phone: WildberriesDtoValue::string($payload['phone'] ?? null),
            firstName: WildberriesDtoValue::string($payload['firstName'] ?? null),
            orderID: WildberriesDtoValue::int($payload['orderID'] ?? null),
            phoneCode: WildberriesDtoValue::int($payload['phoneCode'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['phone', 'firstName', 'orderID', 'phoneCode']),
        );
    }
}
