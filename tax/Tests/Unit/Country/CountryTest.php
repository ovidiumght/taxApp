<?php

namespace tax\Tests\Unit\Country;


use Tax\Country\Country;
use Tax\County\County;
use Tax\State\State;
use Tax\Tests\Unit\Helpers;
use Tax\Vo\TaxRate;

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

}