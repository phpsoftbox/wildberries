<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Promotion\Api\Advert;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class AdvertNMsSettings implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?AdvertBidsKopecks $bidsKopecks,
        public ?AdvertSubject $subject,
        public ?int $nmId,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            bidsKopecks: WildberriesDtoValue::object($payload['bids_kopecks'] ?? null, AdvertBidsKopecks::class),
            subject: WildberriesDtoValue::object($payload['subject'] ?? null, AdvertSubject::class),
            nmId: WildberriesDtoValue::int($payload['nm_id'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['bids_kopecks', 'subject', 'nm_id']),
        );
    }
}
