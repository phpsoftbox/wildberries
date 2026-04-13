<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\Tests\Support;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use RuntimeException;

use function array_key_last;
use function array_shift;
use function array_values;
use function is_array;

final class FakeHttpClient implements ClientInterface
{
    /** @var list<ResponseInterface> */
    private array $responses;
    private ?ResponseInterface $fallback   = null;
    private ?RequestInterface $lastRequest = null;

    /** @var list<RequestInterface> */
    private array $requests = [];

    /** @var list<string> */
    private array $requestBodies = [];

    public function __construct(
        ResponseInterface|array $response,
        private readonly bool $consumeRequestBodies = false,
    ) {
        $this->responses = is_array($response) ? array_values($response) : [$response];
        $this->fallback  = $this->responses !== [] ? $this->responses[array_key_last($this->responses)] : null;
    }

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        $this->lastRequest = $request;
        $this->requests[]  = $request;

        if ($this->consumeRequestBodies) {
            $this->requestBodies[] = $request->getBody()->getContents();
        }

        if ($this->responses !== []) {
            return array_shift($this->responses);
        }

        if ($this->fallback !== null) {
            return $this->fallback;
        }

        throw new RuntimeException('No response configured for FakeHttpClient.');
    }

    public function lastRequest(): ?RequestInterface
    {
        return $this->lastRequest;
    }

    /**
     * @return list<RequestInterface>
     */
    public function requests(): array
    {
        return $this->requests;
    }

    /**
     * @return list<string>
     */
    public function requestBodies(): array
    {
        return $this->requestBodies;
    }
}
