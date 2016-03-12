<?php

namespace tax\Tests\Unit;


use Tax\Country\Repository\CountryRepository;
use Tax\TaxService;

class TaxServiceTest extends \PHPUnit_Framework_TestCase
{
    /** @var CountryRepository | \PHPUnit_Framework_MockObject_MockObject  */
    private $countryRepository;

    /** @var TaxService */
    private $taxService;

    public function setUp()
    {
        $this->countryRepository = $this->getMock(CountryRepository::class);
        $this->taxService = new TaxService($this->countryRepository);
    }

    public function testItCalculatesTaxCollectedPerState()
    {
        $this->countryRepositoryShouldReturnCountry();
        $this->assertEquals(Helpers::$taxCollectedPerState, $this->taxService->calculateTaxCollectedPerState());
    }

    private function countryRepositoryShouldReturnCountry()
    {
        $this->countryRepository->expects($this->once())->method('getCountry')->will($this->returnValue(Helpers::createCountry()));
    }


}