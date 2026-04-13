<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\Cli;

use PhpSoftBox\CliApp\Command\HandlerInterface;
use PhpSoftBox\CliApp\Response;
use PhpSoftBox\CliApp\Runner\RunnerInterface;
use PhpSoftBox\Wildberries\CodeGeneration\WildberriesOpenApiDtoGenerator;
use PhpSoftBox\Wildberries\CodeGeneration\WildberriesOpenApiDtoGeneratorOptions;

use function getcwd;
use function is_string;
use function preg_match;
use function sprintf;
use function str_starts_with;
use function trim;

final readonly class GenerateOpenApiDtoHandler implements HandlerInterface
{
    public function __construct(
        private WildberriesOpenApiDtoGenerator $generator = new WildberriesOpenApiDtoGenerator(),
    ) {
    }

    public function run(RunnerInterface $runner): int|Response
    {
        $root = getcwd();
        if ($root === false) {
            $runner->io()->writeln('Не удалось определить рабочую директорию.', 'error');

            return Response::FAILURE;
        }

        $result = $this->generator->generate(new WildberriesOpenApiDtoGeneratorOptions(
            specPattern: $this->pathOption($runner, $root, 'spec', 'docs/*.yaml'),
            dtoDirectory: $this->pathOption($runner, $root, 'output', 'src/Dto'),
            responseMapPath: $this->pathOption($runner, $root, 'map', 'src/Dto/WildberriesResponseDtoMap.php'),
            cleanDtoDirectory: !$this->boolOption($runner, 'keep-existing-dto'),
        ));

        $runner->io()->writeln(sprintf(
            'Сгенерировано DTO: %d, response mappings: %d.',
            $result->generatedClasses,
            $result->responseMappings,
        ), 'success');

        return Response::SUCCESS;
    }

    private function boolOption(RunnerInterface $runner, string $name): bool
    {
        return (bool) $runner->request()->option($name, false);
    }

    private function stringOption(RunnerInterface $runner, string $name, string $default): string
    {
        $value = $runner->request()->option($name, $default);

        return is_string($value) && trim($value) !== '' ? trim($value) : $default;
    }

    private function pathOption(RunnerInterface $runner, string $root, string $name, string $default): string
    {
        $path = $this->stringOption($runner, $name, $default);
        if (str_starts_with($path, '/') || preg_match('~^[A-Za-z]:\\\\~', $path) === 1) {
            return $path;
        }

        return $root . '/' . $path;
    }
}
