<?php

namespace Tax\Country\Repository;


use Tax\Country\Country;
use Tax\County\County;
use Tax\State\State;
use Tax\Vo\TaxRate;

class XmlCountryRepository implements CountryRepository
{
    private $dataFile;

    public function __construct($dataFile)
    {
        $this->dataFile = $dataFile;
    }

    public function getCountry()
    {
        $countryData = new \SimpleXMLElement(file_get_contents($this->dataFile));

        $country = new Country((string)$countryData['name']);

        foreach($countryData as $stateData) {
            $state = new State((string)$stateData['name']);
            foreach($stateData as $countyData) {
                $county = new County((string)$countyData['name'],new TaxRate((float)$countyData->taxPercent),(float)$countyData->taxAmount);
                $state->addCounty($county);
            }
            $country->addState($state);
        }

        return $country;
    }


}