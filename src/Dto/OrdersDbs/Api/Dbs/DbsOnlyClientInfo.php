<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Dbs;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class DbsOnlyClientInfo implements WildberriesDtoInterface
{
    /**
     * @param list<string> $additionalPhoneCodes
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $replacementPhone,
        public ?string $firstName,
        public ?string $fullName,
        public ?int $orderID,
        public ?string $phone,
        public ?int $phoneCode,
        public array $additionalPhoneCodes,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            replacementPhone: WildberriesDtoValue::string($payload['replacementPhone'] ?? null),
            firstName: WildberriesDtoValue::string($payload['firstName'] ?? null),
            fullName: WildberriesDtoValue::string($payload['fullName'] ?? null),
            orderID: WildberriesDtoValue::int($payload['orderID'] ?? null),
            phone: WildberriesDtoValue::string($payload['phone'] ?? null),
            phoneCode: WildberriesDtoValue::int($payload['phoneCode'] ?? null),
            additionalPhoneCodes: WildberriesDtoValue::array($payload['additionalPhoneCodes'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['replacementPhone', 'firstName', 'fullName', 'orderID', 'phone', 'phoneCode', 'additionalPhoneCodes']),
        );
    }
}
