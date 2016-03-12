<?php

namespace Tax;


use Tax\Country\Country;
use Tax\Country\Repository\CountryRepository;
use Tax\Vo\TaxRate;

class TaxService
{
    /** @var CountryRepository */
    private $countryRepository;

    /** @var bool | Country */
    private $country = false;

    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    public function calculateOverallTaxCollectedPerState()
    {
        $country = $this->getCountry();

        $response = [];

        foreach($country->getStates() as $state) {
            $response[$state->getName()] = $state->calculateTotalTaxCollected();
        }

        return $response;
    }

    public function calculateAverageTaxCollectedPerState()
    {
        $country = $this->getCountry();

        $response = [];

        foreach($country->getStates() as $state) {
            $response[$state->getName()] = $state->calculateAverageTaxCollected();
        }

        return $response;
    }

    /**
     * @return TaxRate[]
     */
    public function calculateAverageCountyTaxRatePerState()
    {
        $country = $this->getCountry();

        $response = [];

        foreach($country->getStates() as $state) {
            $response[$state->getName()] = $state->calculateAverageTaxRate();
        }

        return $response;
    }

    /**
     * @return TaxRate
     */
    public function calculateAverageTaxRate()
    {
        $country = $this->getCountry();
        return $country->calculateAverageTaxRate();
    }

    public function calculateAllTaxesCollected()
    {
        $country = $this->getCountry();
        return $country->calculateAllTaxesCollected();
    }

    private function getCountry()
    {
        // Doing this because it's just one country and it makes no sense to read it each time
        if(!$this->country) {
            $this->country = $this->countryRepository->getCountry();
        }

        return $this->country;
    }
}