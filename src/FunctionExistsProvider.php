<?php

declare(strict_types=1);

namespace tspencer244\IsItPhp10Yet;

use tspencer244\IsItPhp10Yet\Exception\HoustonWeHaveAProblemException;

class FunctionExistsProvider implements FunctionExistsProviderInterface
{
    public function __construct()
    {
        if (!function_exists("function_exists")) {
            throw new HoustonWeHaveAProblemException();
        }
    }

    public function __invoke(string $functionName): bool
    {
        return function_exists($functionName);
    }
}
