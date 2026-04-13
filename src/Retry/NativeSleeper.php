<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\Retry;

use function floor;
use function round;
use function sleep;
use function usleep;

final class NativeSleeper implements SleeperInterface
{
    public function sleep(float $seconds): void
    {
        if ($seconds <= 0) {
            return;
        }

        $wholeSeconds = (int) floor($seconds);
        if ($wholeSeconds > 0) {
            sleep($wholeSeconds);
        }

        $microseconds = (int) round(($seconds - $wholeSeconds) * 1_000_000);
        if ($microseconds > 0) {
            usleep($microseconds);
        }
    }
}
