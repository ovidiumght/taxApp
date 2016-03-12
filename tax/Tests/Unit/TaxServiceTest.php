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
        $this->assertEquals(Helpers::$taxCollectedPerState, $this->taxService->calculateOverallTaxCollectedPerState());
    }

    public function testItCalculatesAverageTaxCollectedPerState()
    {
        $this->countryRepositoryShouldReturnCountry();
        $this->assertEquals(Helpers::$averageTaxCollectedPerState,$this->taxService->calculateAverageTaxCollectedPerState());
    }

    public function testItCalculatesAverageCountyTaxRatePerState()
    {
        $this->countryRepositoryShouldReturnCountry();

        $averageCountyTaxRatePerState = $this->taxService->calculateAverageCountyTaxRatePerState();

        $this->assertEquals(50, $averageCountyTaxRatePerState['Timis']->getTaxRate());
        $this->assertEquals(30, $averageCountyTaxRatePerState['Arad']->getTaxRate());
    }

    public function testItCalculatesAverageTaxRate()
    {
        $this->countryRepositoryShouldReturnCountry();

        $this->assertEquals(Helpers::AVERAGE_COUNTRY_TAX_RATE, $this->taxService->calculateAverageTaxRate()->getTaxRate());
    }

    public function testItCalculatesAllTaxesCollected()
    {
        $this->countryRepositoryShouldReturnCountry();

        $this->assertEquals(Helpers::TOTAL_TAXES_COLLECTED, $this->taxService->calculateAllTaxesCollected());
    }

    private function countryRepositoryShouldReturnCountry()
    {
        $this->countryRepository->expects($this->once())->method('getCountry')->will($this->returnValue(Helpers::createCountry()));
    }
}