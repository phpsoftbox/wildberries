<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Finances\Api\Finance;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class AcquiringReportListRes implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $reportId,
        public ?string $sellerFinanceName,
        public ?string $dateFrom,
        public ?string $dateTo,
        public ?string $createDate,
        public ?string $currency,
        public ?string $acquiringFeeSum,
        public ?string $acquiringFeeVatSum,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            reportId: WildberriesDtoValue::int($payload['reportId'] ?? null),
            sellerFinanceName: WildberriesDtoValue::string($payload['sellerFinanceName'] ?? null),
            dateFrom: WildberriesDtoValue::string($payload['dateFrom'] ?? null),
            dateTo: WildberriesDtoValue::string($payload['dateTo'] ?? null),
            createDate: WildberriesDtoValue::string($payload['createDate'] ?? null),
            currency: WildberriesDtoValue::string($payload['currency'] ?? null),
            acquiringFeeSum: WildberriesDtoValue::string($payload['acquiringFeeSum'] ?? null),
            acquiringFeeVatSum: WildberriesDtoValue::string($payload['acquiringFeeVatSum'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['reportId', 'sellerFinanceName', 'dateFrom', 'dateTo', 'createDate', 'currency', 'acquiringFeeSum', 'acquiringFeeVatSum']),
        );
    }
}
