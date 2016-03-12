<?php

namespace Tax\State;


use Tax\County\County;
use Tax\Vo\TaxRate;

class State
{
    protected $name;

    /** @var  County[] */
    protected $counties;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function addCounty(County $county)
    {
        $this->counties[] = $county;
    }

    public function getTotalTaxCollected()
    {
        $totalTaxCollected = 0;

        foreach($this->counties as $county) {
            $totalTaxCollected += $county->getTaxCollected();
        }

        return $totalTaxCollected;
    }

    /**
     * @return TaxRate
     */
    public function getAverageTaxRate()
    {
        $totalTaxRate = 0;

        foreach($this->counties as $county) {
            $totalTaxRate += $county->getTaxRate()->getTaxRate();
        }

        $averageTaxRate = new TaxRate($totalTaxRate/count($this->counties));

        return $averageTaxRate;
    }

    public function calculateAverageTaxCollected()
    {
        $taxCollected = 0;

        foreach($this->counties as $county) {
            $taxCollected += $county->getTaxCollected();
        }

        $averageTaxCollected = $taxCollected/count($this->counties);

        return $averageTaxCollected;
    }

    public function getCounties()
    {
        return $this->counties;
    }
}