<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Marketplace;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ApiOrderStatusV2 implements WildberriesDtoInterface
{
    /**
     * @param list<ApiBatchErrorResponse> $errors
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $errors,
        public ?int $orderId,
        public ?string $supplierStatus,
        public ?string $wbStatus,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            errors: WildberriesDtoValue::objectList($payload['errors'] ?? null, ApiBatchErrorResponse::class),
            orderId: WildberriesDtoValue::int($payload['orderId'] ?? null),
            supplierStatus: WildberriesDtoValue::string($payload['supplierStatus'] ?? null),
            wbStatus: WildberriesDtoValue::string($payload['wbStatus'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['errors', 'orderId', 'supplierStatus', 'wbStatus']),
        );
    }
}
