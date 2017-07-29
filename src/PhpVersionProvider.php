<?php

declare(strict_types=1);

namespace tspencer244\IsItPhp10Yet;

use tspencer244\IsItPhp10Yet\Exception\HoustonWeHaveAProblemException;

class PhpVersionProvider implements PhpVersionProviderInterface
{
    public function __invoke(FunctionExistsProviderInterface $functionExistsProvider): string
    {
        if ($functionExistsProvider("phpversion")) {
            return phpversion();
        }

        throw new HoustonWeHaveAProblemException();
    }
}
