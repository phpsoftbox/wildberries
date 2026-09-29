<?php

use PhpCsFixer\Finder;
use PhpSoftBox\CsFixer\Console\AbstractCsFixerHandler;

return new class extends AbstractCsFixerHandler {
    protected function getFinder(): Finder
    {
        return Finder::create()
            ->in([__DIR__ . '/../src', __DIR__ . '/../tests'])
            ->exclude('vendor')
            ->ignoreVCS(true)
            ->name('*.php');
    }

    protected function extendRules(array $rules): array
    {
        $rules['PhpSoftBox/sql_format'] = true;

        return $rules;
    }
};
