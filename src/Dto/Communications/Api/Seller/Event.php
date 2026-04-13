<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Communications\Api\Seller;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class Event implements WildberriesDtoInterface
{
    /**
     * @param array<array-key, mixed> $message
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?string $chatID,
        public ?string $eventID,
        public ?EventType $eventType,
        public ?bool $isNewChat,
        public array $message,
        public ?string $source,
        public ?int $addTimestamp,
        public ?string $addTime,
        public ?string $replySign,
        public ?Sender $sender,
        public ?string $clientName,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            chatID: WildberriesDtoValue::string($payload['chatID'] ?? null),
            eventID: WildberriesDtoValue::string($payload['eventID'] ?? null),
            eventType: WildberriesDtoValue::object($payload['eventType'] ?? null, EventType::class),
            isNewChat: WildberriesDtoValue::bool($payload['isNewChat'] ?? null),
            message: WildberriesDtoValue::array($payload['message'] ?? null),
            source: WildberriesDtoValue::string($payload['source'] ?? null),
            addTimestamp: WildberriesDtoValue::int($payload['addTimestamp'] ?? null),
            addTime: WildberriesDtoValue::string($payload['addTime'] ?? null),
            replySign: WildberriesDtoValue::string($payload['replySign'] ?? null),
            sender: WildberriesDtoValue::object($payload['sender'] ?? null, Sender::class),
            clientName: WildberriesDtoValue::string($payload['clientName'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['chatID', 'eventID', 'eventType', 'isNewChat', 'message', 'source', 'addTimestamp', 'addTime', 'replySign', 'sender', 'clientName']),
        );
    }
}
