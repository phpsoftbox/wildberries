<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\Cli;

use PhpSoftBox\CliApp\Command\Command;
use PhpSoftBox\CliApp\Command\CommandRegistryInterface;
use PhpSoftBox\CliApp\Command\OptionDefinition;
use PhpSoftBox\CliApp\Loader\CommandProviderInterface;

final class WildberriesCommandProvider implements CommandProviderInterface
{
    public function register(CommandRegistryInterface $registry): void
    {
        $registry->register(Command::define(
            name: 'wildberries:openapi:generate-dto',
            description: 'Сгенерировать DTO Wildberries API из локальных OpenAPI YAML файлов',
            signature: [
                new OptionDefinition(
                    name: 'spec',
                    short: 's',
                    description: 'Glob-паттерн YAML спецификаций',
                    required: false,
                    default: 'docs/*.yaml',
                    type: 'string',
                ),
                new OptionDefinition(
                    name: 'output',
                    short: 'o',
                    description: 'Базовая директория DTO',
                    required: false,
                    default: 'src/Dto',
                    type: 'string',
                ),
                new OptionDefinition(
                    name: 'map',
                    short: null,
                    description: 'Файл карты response DTO',
                    required: false,
                    default: 'src/Dto/WildberriesResponseDtoMap.php',
                    type: 'string',
                ),
                new OptionDefinition(
                    name: 'keep-existing-dto',
                    short: null,
                    description: 'Не очищать директорию DTO перед генерацией',
                    flag: true,
                    required: false,
                    default: false,
                    type: 'bool',
                ),
            ],
            handler: GenerateOpenApiDtoHandler::class,
        ));
    }
}
