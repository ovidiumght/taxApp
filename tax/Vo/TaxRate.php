<?php

namespace Tax\Vo;


use Tax\Exception\InvalidTaxRateException;

final class TaxRate
{
    private $taxRate;

    public function __construct($taxRate)
    {
        if($taxRate > 100 || $taxRate < 0) {
            throw new InvalidTaxRateException('The tax rate cannot be higher than 100 or lower than 0');
        }

        if(!is_numeric($taxRate)) {
            throw new InvalidTaxRateException('The tax rate must be a number');
        }

        $this->taxRate = $taxRate;
    }

    public function getTaxRate()
    {
        return $this->taxRate;
    }

    public function __toString()
    {
        return number_format($this->taxRate,2)." %";
    }
}