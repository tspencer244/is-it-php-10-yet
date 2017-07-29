<?php

declare(strict_types=1);

namespace tspencer244\IsItPhp10Yet;

/**
 * Interface PhpVersionProviderInterface
 * @package tspencer244\IsItPhp10Yet
 */
interface PhpVersionProviderInterface
{
    public function __invoke(FunctionExistsProviderInterface $functionExistsProvider): string;
}
