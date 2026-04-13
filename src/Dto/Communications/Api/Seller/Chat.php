<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Communications\Api\Seller;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class Chat implements WildberriesDtoInterface
{
    /**
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $chatID,
        public ?string $replySign,
        public ?string $clientName,
        public ?GoodCard $goodCard,
        public ?LastMessage $lastMessage,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            chatID: WildberriesDtoValue::string($payload['chatID'] ?? null),
            replySign: WildberriesDtoValue::string($payload['replySign'] ?? null),
            clientName: WildberriesDtoValue::string($payload['clientName'] ?? null),
            goodCard: WildberriesDtoValue::object($payload['goodCard'] ?? null, GoodCard::class),
            lastMessage: WildberriesDtoValue::object($payload['lastMessage'] ?? null, LastMessage::class),
            extra: WildberriesDtoValue::extra($payload, ['chatID', 'replySign', 'clientName', 'goodCard', 'lastMessage']),
        );
    }
}
