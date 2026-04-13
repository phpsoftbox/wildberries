<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\Api;

use PhpSoftBox\Wildberries\WildberriesApiClient;
use PhpSoftBox\Wildberries\WildberriesApiHost;

use function rawurlencode;
use function str_replace;

abstract class WildberriesApiSection
{
    public function __construct(
        protected readonly WildberriesApiClient $client,
    ) {
    }

    protected function host(string $host): WildberriesApiHost
    {
        return $this->client->host($host);
    }

    /**
     * @param array<string, string|int> $parameters
     */
    protected function resolvePath(string $path, array $parameters = []): string
    {
        if ($parameters === []) {
            return $path;
        }

        $search  = [];
        $replace = [];
        foreach ($parameters as $name => $value) {
            $search[]  = '{' . $name . '}';
            $replace[] = rawurlencode((string) $value);
        }

        return str_replace($search, $replace, $path);
    }
}
