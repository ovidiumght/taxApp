<?php

namespace Tax\Country;


use Tax\State\State;
use Tax\Vo\TaxRate;

class Country
{
    protected $name;

    /** @var  State[] */
    protected $states;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function addState(State $state)
    {
        $this->states[] = $state;
    }

    /**
     * @return \Tax\State\State[]
     */
    public function getStates()
    {
        return $this->states;
    }

    public function calculateAverageAmountOfTaxesPerState()
    {
        $totalTaxCollected = 0;

        foreach($this->states as $state) {
            $totalTaxCollected += $state->getTotalTaxCollected();
        }

        $averageTaxCollectedPerState = $totalTaxCollected/count($this->states);

        return $averageTaxCollectedPerState;
    }
    /**
     * @return TaxRate
     */
    public function calculateAverageTaxRate()
    {
        $totalTaxRate = 0;

        foreach($this->states as $state) {
            $totalTaxRate += $state->getAverageTaxRate()->getTaxRate();
        }

        $averageCountryTaxRate = new TaxRate($totalTaxRate/count($this->states));

        return $averageCountryTaxRate;
    }

    public function calculateAllTaxesCollected()
    {
        $taxesCollected = 0;

        foreach($this->states as $state) {
            $taxesCollected = $state->getTotalTaxCollected();
        }

        return $taxesCollected;
    }

    public function getName()
    {
        return $this->name;
    }
}