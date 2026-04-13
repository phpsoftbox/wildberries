<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\Retry;

use Closure;
use InvalidArgumentException;

use function is_finite;

final readonly class RateLimitRetryOptions
{
    /** @var (Closure(WildberriesRetryEvent): void)|null */
    public ?Closure $onRetry;

    /**
     * @param callable(WildberriesRetryEvent): void|null $onRetry
     */
    public function __construct(
        public int $maxAttempts = 4,
        public ?RetryableRequestPolicyInterface $requestPolicy = null,
        public ?SleeperInterface $sleeper = null,
        ?callable $onRetry = null,
        public ?float $maxDelaySeconds = 30.0,
        public ?float $maxTotalDelaySeconds = 60.0,
    ) {
        if ($maxAttempts < 1) {
            throw new InvalidArgumentException('Wildberries retry maxAttempts must be at least 1.');
        }

        if ($maxDelaySeconds !== null && ($maxDelaySeconds < 0 || !is_finite($maxDelaySeconds))) {
            throw new InvalidArgumentException('Wildberries retry maxDelaySeconds must be finite and non-negative.');
        }

        if ($maxTotalDelaySeconds !== null && ($maxTotalDelaySeconds < 0 || !is_finite($maxTotalDelaySeconds))) {
            throw new InvalidArgumentException('Wildberries retry maxTotalDelaySeconds must be finite and non-negative.');
        }

        $this->onRetry = $onRetry === null ? null : Closure::fromCallable($onRetry);
    }
}
