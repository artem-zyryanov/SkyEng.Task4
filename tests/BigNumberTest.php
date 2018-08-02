<?php

use PHPUnit\Framework\TestCase;
use SkyEng\BigNumber;

class BigNumberTest extends TestCase
{
    public function testSumOfTwoDigits()
    {
        $this->assertEquals(new BigNumber("3"), (new BigNumber("1"))->Sum(new BigNumber("2")));
    }

    public function testSumOfTwoNumbers()
    {
        $this->assertEquals(new BigNumber("46"), (new BigNumber("12"))->Sum(new BigNumber("34")));
    }

    public function testSumOfNumberAndDigit()
    {
        $this->assertEquals(new BigNumber("16"), (new BigNumber("12"))->Sum(new BigNumber("4")));
    }

    public function testDigitOverflow()
    {
        $this->assertEquals(new BigNumber("51"), (new BigNumber("12"))->Sum(new BigNumber("39")));
    }

    public function testNumberLengthOverflow()
    {
        $this->assertEquals(new BigNumber("114"), (new BigNumber("75"))->Sum(new BigNumber("39")));
    }

    public function testSub()
    {
        $this->assertEquals(new BigNumber("27"), (new BigNumber("39"))->Sum(new BigNumber("-12")));
    }

    public function testShrinkString()
    {
        $this->assertEquals(new BigNumber("-3"), (new BigNumber("9"))->Sum(new BigNumber("-12")));
    }

    public function testSubInversion()
    {
        $this->assertEquals(new BigNumber("-27"), (new BigNumber("-39"))->Sum(new BigNumber("12")));
    }

    public function testSumOfNegativeNumbers()
    {
        $this->assertEquals(new BigNumber("-51"), (new BigNumber("-39"))->Sum(new BigNumber("-12")));
    }

    public function testIncorrectValue()
    {
        $this->expectException(InvalidArgumentException::class);
        new BigNumber("123-13");
    }

    public function testEmptyValue()
    {
        $this->expectException(InvalidArgumentException::class);
        new BigNumber("");
    }
}