<?php

use PHPUnit\Framework\TestCase;
$autoloader = require __DIR__ ."/../vendor/autoload.php";
$autoloader->addPsr4('SkyEng\\', __DIR__.'/../');

class BigNumberTest extends TestCase
{
    public function testSumOfTwoDigits()
    {
        $this->assertEquals("3", SkyEng\BigNumber::Sum("1", "2"));
    }

    public function testSumOfTwoNum()
    {
        $this->assertEquals("46", SkyEng\BigNumber::Sum("12", "34"));
    }

    public function testSumOfNumAndDigit()
    {
        $this->assertEquals("16", SkyEng\BigNumber::Sum("12", "4"));
    }

    public function testBigNum()
    {
        $this->assertEquals("51", SkyEng\BigNumber::Sum("12", "39"));
    }

    public function testBigNum2()
    {
        $this->assertEquals("114", SkyEng\BigNumber::Sum("75", "39"));
    }

    public function testSumOfNegativeNumbers()
    {
        $this->assertEquals("27", SkyEng\BigNumber::Sum("39", "-12"));
    }

    public function testSumOfNegativeNumbers1()
    {
        $this->assertEquals("-3", SkyEng\BigNumber::Sum("9", "-12"));
    }

    public function testSumOfNegativeNumbers2()
    {
        $this->assertEquals("-27", SkyEng\BigNumber::Sum("-39", "12"));
    }

    public function testSumOfNegativeNumbers3()
    {
        $this->assertEquals("-51", SkyEng\BigNumber::Sum("-39", "-12"));
    }
}