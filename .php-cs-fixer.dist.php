<?php

declare(strict_types=1);

use PhpSoftBox\CsFixer\Console\AbstractCsFixerHandler;

$handler = require __DIR__ . '/config/cs-fixer.php';
if (!$handler instanceof AbstractCsFixerHandler) {
    throw new RuntimeException('CsFixer handler not configured.');
}

return $handler->createConfig();
