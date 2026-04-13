<?php

declare(strict_types=1);

/**
 * @generated Wildberries OpenAPI DTO
 */

namespace PhpSoftBox\Wildberries\Dto\Communications\Api\Seller;

use PhpSoftBox\Wildberries\Dto\WildberriesDtoInterface;
use PhpSoftBox\Wildberries\Dto\WildberriesDtoValue;

final readonly class ChatsResponse implements WildberriesDtoInterface
{
    /**
     * @param list<Chat> $result
     * @param list<string> $errors
     * @param array<string, mixed> $extra
     */
    public function __construct(
        public array $result,
        public array $errors,
        public array $extra = [],
    ) {
    }

    public static function fromArray(array $payload): static
    {
        return new self(
            result: WildberriesDtoValue::objectList($payload['result'] ?? null, Chat::class),
            errors: WildberriesDtoValue::array($payload['errors'] ?? null),
            extra: WildberriesDtoValue::extra($payload, ['result', 'errors']),
        );
    }
}
