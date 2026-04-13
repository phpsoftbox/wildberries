<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Communications\Api\Seller;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class EventsResult implements WildberriesDtoInterface
{
    /**
     * @param list<Event> $events
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public ?int $next,
        public ?string $newestEventTime,
        public ?string $oldestEventTime,
        public ?int $totalEvents,
        public array $events,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            next: WildberriesDtoValue::int($payload['next'] ?? null),
            newestEventTime: WildberriesDtoValue::string($payload['newestEventTime'] ?? null),
            oldestEventTime: WildberriesDtoValue::string($payload['oldestEventTime'] ?? null),
            totalEvents: WildberriesDtoValue::int($payload['totalEvents'] ?? null),
            events: WildberriesDtoValue::objectList($payload['events'] ?? null, Event::class),
            extra: WildberriesDtoValue::extra($payload, ['next', 'newestEventTime', 'oldestEventTime', 'totalEvents', 'events']),
        );
    }
}
