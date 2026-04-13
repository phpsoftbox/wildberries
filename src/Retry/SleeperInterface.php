<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\Retry;

interface SleeperInterface
{
    public function sleep(float $seconds): void;
}
