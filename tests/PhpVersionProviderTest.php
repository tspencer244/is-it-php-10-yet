<?php

declare(strict_types=1);

namespace tspencer244\IsItPhp10Yet\Test;

use PHPUnit\Framework\TestCase;
use tspencer244\IsItPhp10Yet\Exception\HoustonWeHaveAProblemException;
use tspencer244\IsItPhp10Yet\FunctionExistsProvider;
use tspencer244\IsItPhp10Yet\FunctionExistsProviderInterface;
use tspencer244\IsItPhp10Yet\PhpVersionProvider;

final class FunctionNeverExistsProviderMock implements FunctionExistsProviderInterface
{
    public function __invoke(string $functionName): bool
    {
        return false;
    }
}

final class PhpVersionProviderTest extends TestCase
{
    public function testReturnsSameAsNativePhpVersionFunction()
    {
        $phpVersionProvider = new PhpVersionProvider();
        $this->assertEquals(phpversion(), $phpVersionProvider(new FunctionExistsProvider()));
    }

    public function testThrowsExceptionIfNativePhpVersionFunctionMissing()
    {
        $this->expectException(HoustonWeHaveAProblemException::class);

        (new PhpVersionProvider())(new FunctionNeverExistsProviderMock());
    }
}