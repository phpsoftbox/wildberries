<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries;

use function implode;
use function trim;

final class WildberriesApiHost
{
    public function __construct(
        private readonly WildberriesApiClient $client,
        private readonly string $host,
        private readonly string $section = '',
    ) {
    }

    public function section(string $section): self
    {
        return new self($this->client, $this->host, $section);
    }

    /**
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function get(string $path = '', array $query = []): WildberriesApiResponse
    {
        return $this->client->requestToHost($this->host, $this->buildPath($path), method: 'GET', query: $query);
    }

    /**
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function post(string $path = '', array $payload = [], array $query = []): WildberriesApiResponse
    {
        return $this->client->requestToHost($this->host, $this->buildPath($path), $payload, 'POST', $query);
    }

    /**
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function put(string $path = '', array $payload = [], array $query = []): WildberriesApiResponse
    {
        return $this->client->requestToHost($this->host, $this->buildPath($path), $payload, 'PUT', $query);
    }

    /**
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function patch(string $path = '', array $payload = [], array $query = []): WildberriesApiResponse
    {
        return $this->client->requestToHost($this->host, $this->buildPath($path), $payload, 'PATCH', $query);
    }

    /**
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function delete(string $path = '', array $payload = [], array $query = []): WildberriesApiResponse
    {
        return $this->client->requestToHost($this->host, $this->buildPath($path), $payload, 'DELETE', $query);
    }

    /**
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function request(string $path = '', array $payload = [], string $method = 'POST', array $query = []): WildberriesApiResponse
    {
        return $this->client->requestToHost($this->host, $this->buildPath($path), $payload, $method, $query);
    }

    private function buildPath(string $path): string
    {
        $segments = [];
        if ($this->section !== '') {
            $segments[] = trim($this->section, '/');
        }

        $path = trim($path, '/');
        if ($path !== '') {
            $segments[] = $path;
        }

        if ($segments === []) {
            return '';
        }

        return implode('/', $segments);
    }
}
