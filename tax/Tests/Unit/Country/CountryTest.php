<?php

namespace tax\Tests\Unit\Country;


use Tax\Country\Country;
use Tax\Tests\Unit\Helpers;

class CountryTest extends \PHPUnit_Framework_TestCase
{

    /** @var  Country */
    private $country;

    public function setUp()
    {
        $this->country = Helpers::createCountry();
    }

    public function testItHasTheRightName()
    {
        $this->assertEquals(Helpers::COUNTRY_NAME, $this->country->getName());
    }

    public function testItHasTheStates()
    {
        $this->assertSame(Helpers::$states, $this->country->getStates());
    }

    public function testItCalculatesTheAverageAmountOfTaxPerStateCorrectly()
    {
        $this->assertEquals(Helpers::AVERAGE_TAX_RATE_PER_STATE, $this->country->calculateAverageAmountOfTaxesPerState());
    }

    public function testItCalculatesAverageTaxRate()
    {
        $this->assertEquals(Helpers::AVERAGE_COUNTRY_TAX_RATE, $this->country->calculateAverageTaxRate()->getTaxRate());
    }

    public function testItCalculatesTotalTaxCollected()
    {
        $this->assertEquals(Helpers::TOTAL_TAXES_COLLECTED, $this->country->calculateTotalTaxCollected());
    }
}