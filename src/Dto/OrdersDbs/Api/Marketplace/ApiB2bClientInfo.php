<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Marketplace;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ApiB2bClientInfo implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $inn,
        public ?string $kpp,
        public ?string $orgName,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            inn: WildberriesDtoValue::string($payload['inn'] ?? null),
            kpp: WildberriesDtoValue::string($payload['kpp'] ?? null),
            orgName: WildberriesDtoValue::string($payload['orgName'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['inn', 'kpp', 'orgName']),
        );
    }
}
