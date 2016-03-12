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

    public function calculateTaxCollectedPerState()
    {
        $response = [];

        $country = $this->countryRepository->getCountry();

        foreach($country->getStates() as $state) {
            $response[$state->getName()] = $state->getTotalTaxCollected();
        }

        return $response;
    }
}