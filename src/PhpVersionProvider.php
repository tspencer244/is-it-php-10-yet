<?php

declare(strict_types=1);

namespace tspencer244\IsItPhp10Yet;

use tspencer244\IsItPhp10Yet\Exception\HoustonWeHaveAProblemException;

class PhpVersionProvider implements PhpVersionProviderInterface
{
    public function __invoke(): string
    {
        if (function_exists("phpversion")) {
            return phpversion();
        }

        throw new HoustonWeHaveAProblemException();
    }
}
