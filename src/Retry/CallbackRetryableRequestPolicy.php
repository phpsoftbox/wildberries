<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\Retry;

use Closure;
use Psr\Http\Message\RequestInterface;

final readonly class CallbackRetryableRequestPolicy implements RetryableRequestPolicyInterface
{
    /** @var Closure(RequestInterface): bool */
    private Closure $callback;

    /**
     * @param callable(RequestInterface): bool $callback
     */
    public function __construct(callable $callback)
    {
        $this->callback = Closure::fromCallable($callback);
    }

    public function allows(RequestInterface $request): bool
    {
        return ($this->callback)($request);
    }
}
