<?php

namespace Tax\Country\Repository;


use Tax\Country\Country;

interface CountryRepository
{
    /**
     * @return Country
     */
    public function getCountry();
}