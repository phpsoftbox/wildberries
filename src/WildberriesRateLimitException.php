<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries;

final class WildberriesRateLimitException extends WildberriesException
{
    /**
     * @param array<string, mixed> $payload
     */
    public function __construct(
        string $message,
        private readonly float $retryAfterSeconds,
        array $payload = [],
    ) {
        parent::__construct($message, 429, $payload);
    }

    public function retryAfterSeconds(): float
    {
        return $this->retryAfterSeconds;
    }
}
