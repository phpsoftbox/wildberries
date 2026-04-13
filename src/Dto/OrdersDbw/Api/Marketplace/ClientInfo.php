<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersDbw\Api\Marketplace;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ClientInfo implements WildberriesDtoInterface
{
    /**
     * @param list<string> $additionalPhones
     * @param list<int> $additionalPhoneCodes
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $replacementPhone,
        public ?string $phone,
        public ?string $firstName,
        public ?string $fullName,
        public array $additionalPhones,
        public array $additionalPhoneCodes,
        public ?int $orderId,
        public ?int $phoneCode,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            replacementPhone: WildberriesDtoValue::string($payload['replacementPhone'] ?? null),
            phone: WildberriesDtoValue::string($payload['phone'] ?? null),
            firstName: WildberriesDtoValue::string($payload['firstName'] ?? null),
            fullName: WildberriesDtoValue::string($payload['fullName'] ?? null),
            additionalPhones: WildberriesDtoValue::array($payload['additionalPhones'] ?? null),
            additionalPhoneCodes: WildberriesDtoValue::array($payload['additionalPhoneCodes'] ?? null),
            orderId: WildberriesDtoValue::int($payload['orderId'] ?? null),
            phoneCode: WildberriesDtoValue::int($payload['phoneCode'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['replacementPhone', 'phone', 'firstName', 'fullName', 'additionalPhones', 'additionalPhoneCodes', 'orderId', 'phoneCode']),
        );
    }
}
