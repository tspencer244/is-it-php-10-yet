<?php

declare(strict_types=1);

namespace tspencer244\IsItPhp10Yet\Test;

use PHPUnit\Framework\TestCase;
use tspencer244\IsItPhp10Yet\FunctionExistsProvider;
use tspencer244\IsItPhp10Yet\FunctionExistsProviderInterface;
use tspencer244\IsItPhp10Yet\IsItPhp10Yet;
use tspencer244\IsItPhp10Yet\PhpVersionProviderInterface;

/**
 * Class PhpVersionProviderMock
 * @package tspencer244\IsItPhp10Yet\Test
 */
final class PhpVersionProviderMock implements PhpVersionProviderInterface
{
    private $phpVersion;

    public function __construct(string $phpVersion)
    {
        $this->phpVersion = $phpVersion;
    }

    public function __invoke(FunctionExistsProviderInterface $functionExistsProvider): string
    {
        return $this->phpVersion;
    }
}

/**
 * Class IsItPhp10YetTest
 * @package tspencer244\IsItPhp10Yet\Test
 */
final class IsItPhp10YetTest extends TestCase
{
    /**
     * @return void
     */
    public function testPhpVersionOverNineThousand()
    {
        $phpTenYet = new IsItPhp10Yet(new PhpVersionProviderMock("9001.0.0"), new FunctionExistsProvider());
        $this->assertEquals("It's over 9000!", $phpTenYet->isItPhp10Yet());
    }

    /**
     * @return void
     */
    public function testPhpVersionTen()
    {
        $phpTenYet = new IsItPhp10Yet(new PhpVersionProviderMock("10.0.0"), new FunctionExistsProvider());
        $this->assertEquals("We did it boys!", $phpTenYet->isItPhp10Yet());
    }

    /**
     * @return void
     */
    public function testRequiresMoreMinerals()
    {
        $phpTenYet = new IsItPhp10Yet(new PhpVersionProviderMock("7.0.0"), new FunctionExistsProvider());
        $this->assertEquals("We require more minerals.", $phpTenYet->isItPhp10Yet());
    }

    public function testYearThreeThousandAndSeventeen()
    {
        $phpTenYet = new IsItPhp10Yet(new PhpVersionProviderMock("11.0.0"), new FunctionExistsProvider());
        $this->assertEquals("This is the year 3017.", $phpTenYet->isItPhp10Yet());
    }

    public function testNotThePhpVersionWeAreLookingFor()
    {
        $phpTenYet = new IsItPhp10Yet(new PhpVersionProviderMock("-1.0.0"), new FunctionExistsProvider());
        $this->assertEquals("This is not the PHP version you are looking for.", $phpTenYet->isItPhp10Yet());
    }
}
