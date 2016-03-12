<?php

namespace Tax;


use Tax\Country\Repository\CountryRepository;
use Tax\Vo\TaxRate;

class TaxService
{
    /** @var CountryRepository */
    protected $countryRepository;

    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    public function calculateOverallTaxCollectedPerState()
    {
        $response = [];

        $country = $this->countryRepository->getCountry();

        foreach($country->getStates() as $state) {
            $response[$state->getName()] = $state->getTotalTaxCollected();
        }

        return $response;
    }

    public function calculateAverageTaxCollectedPerState()
    {
        $response = [];

        $country = $this->countryRepository->getCountry();

        foreach($country->getStates() as $state) {
            $response[$state->getName()] = $state->calculateAverageTaxCollected();
        }

        return $response;
    }

    public function calculateAverageCountyTaxRatePerState()
    {
        $response = [];

        $country = $this->countryRepository->getCountry();

        foreach($country->getStates() as $state) {
            $response[$state->getName()] = $state->getAverageTaxRate();
        }

        return $response;
    }

    public function calculateAverageTaxRate()
    {
        $country = $this->countryRepository->getCountry();

        return $country->calculateAverageTaxRate();
    }

    public function calculateAllTaxesCollected()
    {
        $country = $this->countryRepository->getCountry();

        return $country->calculateAllTaxesCollected();
    }
}