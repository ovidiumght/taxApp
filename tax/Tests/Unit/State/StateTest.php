<?php

namespace Tax\Tests\Unit\State;


use Tax\County\County;
use Tax\State\State;
use Tax\Vo\TaxRate;

class StateTest extends \PHPUnit_Framework_TestCase
{
    const STATE_NAME = 'somestate';
    const TOTAL_TAX_COLLECTED = 5000;

    const AVERAGE_TAX = 15;

    /** @var  State */
    private $state;

    /** @var  County[] */
    private $counties;

    public function setUp()
    {
        $this->state = new State(self::STATE_NAME);

        $this->counties[] = new County('county1', new TaxRate(10), 1000);
        $this->counties[] = new County('county2', new TaxRate(20), 4000);

        foreach($this->counties as $county) {
            $this->state->addCounty($county);
        }
    }

    public function testItHasTheRightName()
    {
        $this->assertEquals(self::STATE_NAME, $this->state->getName());
    }

    public function testItHasTheRightCounties()
    {
        $this->assertSame($this->counties, $this->state->getCounties());
    }

    public function testItCalculatesTheTotalTaxCorrected()
    {
        $this->assertSame(self::TOTAL_TAX_COLLECTED, $this->state->getTotalTaxCollected());
    }

    public function testItCalculatesTheAverageTax()
    {
        $this->assertEquals(self::AVERAGE_TAX, $this->state->getAverageTaxRate()->getTaxRate());
    }
}