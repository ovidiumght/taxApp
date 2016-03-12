<?php

namespace Tax\Tests\Integration;


use Tax\Country\Country;
use Tax\Country\Repository\XmlCountryRepository;

class XmlCountryRepositoryTest extends \PHPUnit_Framework_TestCase
{
    /** @var  Country */
    private $country;
    /** @var  XmlCountryRepository */
    protected $xmlCountryRepository;

    public function setUp()
    {
        parent::setUp();
        $this->xmlCountryRepository = new XmlCountryRepository('../../testData/tax.xml');
        $this->country = $this->xmlCountryRepository->getCountry();
    }

    public function testItCanGetCountry()
    {
        $this->assertInstanceOf(Country::class,$this->country);
    }

    public function testTheCountryHasAllTheStates()
    {
        $this->assertCount(2, $this->country->getStates());
    }

    public function testTheStateNamesAreCorrect()
    {
        $states = $this->country->getStates();

        $this->assertEquals('Florida',$states[0]->getName());
        $this->assertEquals('Kansas',$states[1]->getName());
    }

    public function testTheStatesHaveAllTheCounties()
    {
        $states = $this->country->getStates();

        $this->assertCount(2, $states[0]->getCounties());
        $this->assertCount(1, $states[1]->getCounties());
    }

    public function testTheCountiesHaveTheCorrectData()
    {
        $states = $this->country->getStates();

        $firstStateCounties = $states[0]->getCounties();
        $secondStateCounties = $states[1]->getCounties();

        $this->assertEquals('county1', $firstStateCounties[0]->getName());
        $this->assertEquals('county2', $firstStateCounties[1]->getName());

        $this->assertEquals(10000, $secondStateCounties[0]->getTaxCollected());
    }

}