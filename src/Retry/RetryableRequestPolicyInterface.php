<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\Retry;

use Psr\Http\Message\RequestInterface;

interface RetryableRequestPolicyInterface
{
    public function allows(RequestInterface $request): bool;
}
