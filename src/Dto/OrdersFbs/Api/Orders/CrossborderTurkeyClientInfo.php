<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Orders;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class CrossborderTurkeyClientInfo implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $firstName,
        public ?string $fullName,
        public ?string $lastName,
        public ?string $middleName,
        public ?int $orderID,
        public ?string $phone,
        public ?string $phoneCode,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            firstName: WildberriesDtoValue::string($payload['firstName'] ?? null),
            fullName: WildberriesDtoValue::string($payload['fullName'] ?? null),
            lastName: WildberriesDtoValue::string($payload['lastName'] ?? null),
            middleName: WildberriesDtoValue::string($payload['middleName'] ?? null),
            orderID: WildberriesDtoValue::int($payload['orderID'] ?? null),
            phone: WildberriesDtoValue::string($payload['phone'] ?? null),
            phoneCode: WildberriesDtoValue::string($payload['phoneCode'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['firstName', 'fullName', 'lastName', 'middleName', 'orderID', 'phone', 'phoneCode']),
        );
    }
}
