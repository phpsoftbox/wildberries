<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Marketplace;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class SupplySpotData implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $status,
        public ?string $carrierName,
        public ?string $carrierTaxNumber,
        public ?string $carrierCountryCode,
        public ?string $vehicleRegistrationNumber,
        public ?string $trailerRegistrationNumber,
        public ?string $errorCode,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            status: WildberriesDtoValue::string($payload['status'] ?? null),
            carrierName: WildberriesDtoValue::string($payload['carrierName'] ?? null),
            carrierTaxNumber: WildberriesDtoValue::string($payload['carrierTaxNumber'] ?? null),
            carrierCountryCode: WildberriesDtoValue::string($payload['carrierCountryCode'] ?? null),
            vehicleRegistrationNumber: WildberriesDtoValue::string($payload['vehicleRegistrationNumber'] ?? null),
            trailerRegistrationNumber: WildberriesDtoValue::string($payload['trailerRegistrationNumber'] ?? null),
            errorCode: WildberriesDtoValue::string($payload['errorCode'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['status', 'carrierName', 'carrierTaxNumber', 'carrierCountryCode', 'vehicleRegistrationNumber', 'trailerRegistrationNumber', 'errorCode']),
        );
    }
}
