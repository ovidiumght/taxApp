<?php

namespace Tax\Tests\Vo;


use Tax\Exception\InvalidTaxRateException;
use Tax\Vo\TaxRate;

class TaxRateTest extends \PHPUnit_Framework_TestCase
{
    const VALID_TAX_RATE = 97;
    const VALID_TAX_RATE_FROMAT = '97.00 %';

    public function testItHasTheRightTaxRate()
    {
        $taxRate = new TaxRate(self::VALID_TAX_RATE);
        $this->assertEquals(self::VALID_TAX_RATE, $taxRate->getTaxRate());
    }

    public function testItFormatsTheTaxRateCorrectly()
    {
        $taxRate = new TaxRate(self::VALID_TAX_RATE);
        $this->assertEquals(self::VALID_TAX_RATE_FROMAT,(string)$taxRate);
    }

    public function testItThrowsExceptionIfTaxRateIsGreaterThan100()
    {
        $this->setExpectedException(InvalidTaxRateException::class);
        $taxRate = new TaxRate(110);
    }

    public function testItThrowsExceptionIfTaxRateIsLessThan0()
    {
        $this->setExpectedException(InvalidTaxRateException::class);
        $taxRate = new TaxRate(-10);
    }

    public function testItThrowsExceptionIfTaxRateIsNotANumber()
    {
        $this->setExpectedException(InvalidTaxRateException::class);
        $taxRate = new TaxRate('invalidTaxRate');
    }
}