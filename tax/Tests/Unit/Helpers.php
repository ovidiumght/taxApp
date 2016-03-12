<?php

namespace Tax\Tests\Unit;


use Tax\Country\Country;
use Tax\County\County;
use Tax\State\State;
use Tax\Vo\TaxRate;

class Helpers
{
    const COUNTRY_NAME = 'Romania';
    const AVERAGE_TAX_RATE_PER_STATE = 8000;

    public static $states;

    public static $taxCollectedPerState = [
        'Timis' => 10000,
        'Arad'  => 6000
    ];

    public static function createCountry()
    {
        self::$states = [];

        $country = new Country('Romania');
        $state1 = new State('Timis');
        $state1->addCounty(new County('Timisoara',new TaxRate(40), 4000));
        $state1->addCounty(new County('Voiteg',new TaxRate(60), 6000));

        self::$states[] = $state1;
        $country->addState($state1);

        $state2 = new State('Arad');
        $state2->addCounty(new County('Arad',new TaxRate(20), 2000));
        $state2->addCounty(new County('Ineu',new TaxRate(40), 4000));

        self::$states[] = $state2;
        $country->addState($state2);

        return $country;
    }
}