<?php

namespace Tax\County;


use Tax\Vo\TaxRate;

class County
{
    /** @var  TaxRate */
    protected $taxRate;
    protected $taxCollected;
    protected $name;

    public function __construct($name, TaxRate $taxRate, $taxCollected)
    {
        $this->taxCollected = $taxCollected;
        $this->taxRate = $taxRate;
        $this->name = $name;
    }

    /**
     * @return TaxRate
     */
    public function getTaxRate()
    {
        return $this->taxRate;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getTaxCollected()
    {
        return $this->taxCollected;
    }

}