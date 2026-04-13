<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Finances\Api\Finance;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class AcquiringReportsDetailedRes implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $rrdId,
        public ?int $reportId,
        public ?string $acqDate,
        public ?string $acquiringBank,
        public ?string $tin,
        public ?string $taxRegistrationReasonCode,
        public ?string $saleDate,
        public ?string $srid,
        public ?string $docTypeName,
        public ?int $nmId,
        public ?string $retailAmount,
        public ?string $acquiringFee,
        public ?string $acquiringFeeVat,
        public ?string $invoiceNumber,
        public ?string $invoiceDate,
        public ?int $shkId,
        public ?string $currency,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            rrdId: WildberriesDtoValue::int($payload['rrdId'] ?? null),
            reportId: WildberriesDtoValue::int($payload['reportId'] ?? null),
            acqDate: WildberriesDtoValue::string($payload['acqDate'] ?? null),
            acquiringBank: WildberriesDtoValue::string($payload['acquiringBank'] ?? null),
            tin: WildberriesDtoValue::string($payload['tin'] ?? null),
            taxRegistrationReasonCode: WildberriesDtoValue::string($payload['taxRegistrationReasonCode'] ?? null),
            saleDate: WildberriesDtoValue::string($payload['saleDate'] ?? null),
            srid: WildberriesDtoValue::string($payload['srid'] ?? null),
            docTypeName: WildberriesDtoValue::string($payload['docTypeName'] ?? null),
            nmId: WildberriesDtoValue::int($payload['nmId'] ?? null),
            retailAmount: WildberriesDtoValue::string($payload['retailAmount'] ?? null),
            acquiringFee: WildberriesDtoValue::string($payload['acquiringFee'] ?? null),
            acquiringFeeVat: WildberriesDtoValue::string($payload['acquiringFeeVat'] ?? null),
            invoiceNumber: WildberriesDtoValue::string($payload['invoiceNumber'] ?? null),
            invoiceDate: WildberriesDtoValue::string($payload['invoiceDate'] ?? null),
            shkId: WildberriesDtoValue::int($payload['shkId'] ?? null),
            currency: WildberriesDtoValue::string($payload['currency'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['rrdId', 'reportId', 'acqDate', 'acquiringBank', 'tin', 'taxRegistrationReasonCode', 'saleDate', 'srid', 'docTypeName', 'nmId', 'retailAmount', 'acquiringFee', 'acquiringFeeVat', 'invoiceNumber', 'invoiceDate', 'shkId', 'currency']),
        );
    }
}
