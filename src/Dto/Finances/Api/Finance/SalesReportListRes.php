<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Finances\Api\Finance;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class SalesReportListRes implements WildberriesDtoInterface
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
        public ?int $reportType,
        public ?string $retailAmountSum,
        public ?string $forPaySum,
        public ?float $avgSalePercent,
        public ?string $deliveryServiceSum,
        public ?string $paidStorageSum,
        public ?string $paidAcceptanceSum,
        public ?string $deductionSum,
        public ?string $penaltySum,
        public ?string $additionalPaymentSum,
        public ?string $cashbackAmountSum,
        public ?string $cashbackDiscountSum,
        public ?string $cashbackCommissionChangeSum,
        public ?string $paymentSchedule,
        public ?string $bankPaymentSum,
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
            reportType: WildberriesDtoValue::int($payload['reportType'] ?? null),
            retailAmountSum: WildberriesDtoValue::string($payload['retailAmountSum'] ?? null),
            forPaySum: WildberriesDtoValue::string($payload['forPaySum'] ?? null),
            avgSalePercent: WildberriesDtoValue::float($payload['avgSalePercent'] ?? null),
            deliveryServiceSum: WildberriesDtoValue::string($payload['deliveryServiceSum'] ?? null),
            paidStorageSum: WildberriesDtoValue::string($payload['paidStorageSum'] ?? null),
            paidAcceptanceSum: WildberriesDtoValue::string($payload['paidAcceptanceSum'] ?? null),
            deductionSum: WildberriesDtoValue::string($payload['deductionSum'] ?? null),
            penaltySum: WildberriesDtoValue::string($payload['penaltySum'] ?? null),
            additionalPaymentSum: WildberriesDtoValue::string($payload['additionalPaymentSum'] ?? null),
            cashbackAmountSum: WildberriesDtoValue::string($payload['cashbackAmountSum'] ?? null),
            cashbackDiscountSum: WildberriesDtoValue::string($payload['cashbackDiscountSum'] ?? null),
            cashbackCommissionChangeSum: WildberriesDtoValue::string($payload['cashbackCommissionChangeSum'] ?? null),
            paymentSchedule: WildberriesDtoValue::string($payload['paymentSchedule'] ?? null),
            bankPaymentSum: WildberriesDtoValue::string($payload['bankPaymentSum'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['reportId', 'sellerFinanceName', 'dateFrom', 'dateTo', 'createDate', 'currency', 'reportType', 'retailAmountSum', 'forPaySum', 'avgSalePercent', 'deliveryServiceSum', 'paidStorageSum', 'paidAcceptanceSum', 'deductionSum', 'penaltySum', 'additionalPaymentSum', 'cashbackAmountSum', 'cashbackDiscountSum', 'cashbackCommissionChangeSum', 'paymentSchedule', 'bankPaymentSum']),
        );
    }
}
