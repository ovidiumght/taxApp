<?php

namespace tax\Tests\Unit\County;


use Tax\County\County;
use Tax\Vo\TaxRate;

class CountyTest extends \PHPUnit_Framework_TestCase
{
    const COUNTY_NAME = 'TestCounty';
    const TAX_RATE = 20;
    const TAX_COLLECTED = 10000;

    /** @var  County */
    private $county;

    /** @var  TaxRate */
    private $taxRate;

    public function setUp()
    {
        $this->taxRate = new TaxRate(self::TAX_RATE);
        $this->county = new County(self::COUNTY_NAME, $this->taxRate, self::TAX_COLLECTED);
    }

    public function testItHasTheRightName()
    {
        $this->assertEquals(self::COUNTY_NAME, $this->county->getName());
    }

    public function testItHasTheRightTaxRate()
    {
        $this->assertSame($this->taxRate, $this->county->getTaxRate());
    }

    public function testItHasTheRightTaxCollected()
    {
        $this->assertSame(self::TAX_COLLECTED, $this->county->getTaxCollected());
    }
}