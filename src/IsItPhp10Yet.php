<?php

declare(strict_types=1);

namespace tspencer244\IsItPhp10Yet;

/**
 * Class IsItPhp10Yet
 * @package tspencer244\IsItPhp10Yet
 */
final class IsItPhp10Yet
{
    /**
     * @var string
     */
    private $major;

    /**
     * @var string
     */
    private $minor;

    /**
     * @var string
     */
    private $release;

    /**
     * @return string
     */
    private function getMajor(): string
    {
        return $this->major;
    }

    /**
     * @return string
     */
    private function getMinor(): string
    {
        return $this->minor;
    }

    /**
     * @return string
     */
    private function getRelease(): string
    {
        return $this->release;
    }

    /**
     * @return string
     */
    private function itIsOverNineThousand(): string
    {
        return "It's over 9000!";
    }

    /**
     * @param string $major
     */
    private function setMajor(string $major)
    {
        $this->major = $major;
    }

    /**
     * @param string $minor
     */
    private function setMinor(string $minor)
    {
        $this->minor = $minor;
    }

    /**
     * @param string $release
     */
    private function setRelease(string $release)
    {
        $this->release = $release;
    }

    /**
     * @return string
     */
    private function weDidItBoys(): string
    {
        return "We did it boys!";
    }

    private function weRequireMoreMinerals(): string
    {
        return "We require more minerals.";
    }

    /**
     * IsItPhp10Yet constructor.
     * @param PhpVersionProviderInterface $phpVersionProvider
     */
    public function __construct(PhpVersionProviderInterface $phpVersionProvider, FunctionExistsProviderInterface $functionExistsProvider)
    {
        $phpVersion = $phpVersionProvider($functionExistsProvider);

        list($major, $minor, $release) = explode(".", $phpVersion);

        $this->setMajor($major);
        $this->setMinor($minor);
        $this->setRelease($release);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->isItPhp10Yet();
    }

    /**
     * @return string
     */
    public function isItPhp10Yet(): string
    {
        $major = (int)$this->getMajor();

        if ($major >= 0 && $major < 10) {
            return $this->weRequireMoreMinerals();
        }

        if ($major === 10) {
            return $this->weDidItBoys();
        }

        if ($major > 10 && $major <= 9000) {
            return $this->thisIsTheYearThreeThousandAndSeventeen();
        }

        if ($major > 9000) {
            return $this->itIsOverNineThousand();
        }

        return $this->thisIsNotThePhpVersionYouAreLookingFor();
    }

    /**
     * @return string
     */
    public function thisIsNotThePhpVersionYouAreLookingFor(): string
    {
        return "This is not the PHP version you are looking for.";
    }

    /**
     * @return string
     */
    public function whatVersionIsThis(): string
    {
        return $this->getMajor() . "." . $this->getMinor() . "." . $this->getRelease();
    }

    private function thisIsTheYearThreeThousandAndSeventeen(): string
    {
        return "This is the year 3017.";
    }
}
