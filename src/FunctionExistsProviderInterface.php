<?php

declare(strict_types=1);

namespace tspencer244\IsItPhp10Yet;

interface FunctionExistsProviderInterface
{
    public function __invoke(string $functionName): bool;
}
