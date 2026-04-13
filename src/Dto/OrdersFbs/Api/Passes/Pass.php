<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Passes;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class Pass implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $firstName,
        public ?string $dateEnd,
        public ?string $lastName,
        public ?string $carModel,
        public ?string $carNumber,
        public ?string $officeName,
        public ?string $officeAddress,
        public ?int $officeId,
        public ?int $id,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            firstName: WildberriesDtoValue::string($payload['firstName'] ?? null),
            dateEnd: WildberriesDtoValue::string($payload['dateEnd'] ?? null),
            lastName: WildberriesDtoValue::string($payload['lastName'] ?? null),
            carModel: WildberriesDtoValue::string($payload['carModel'] ?? null),
            carNumber: WildberriesDtoValue::string($payload['carNumber'] ?? null),
            officeName: WildberriesDtoValue::string($payload['officeName'] ?? null),
            officeAddress: WildberriesDtoValue::string($payload['officeAddress'] ?? null),
            officeId: WildberriesDtoValue::int($payload['officeId'] ?? null),
            id: WildberriesDtoValue::int($payload['id'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['firstName', 'dateEnd', 'lastName', 'carModel', 'carNumber', 'officeName', 'officeAddress', 'officeId', 'id']),
        );
    }
}
