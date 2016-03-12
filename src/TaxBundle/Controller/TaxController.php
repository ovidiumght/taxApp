<?php

namespace TaxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Tax\TaxService;

class TaxController extends Controller
{
    public function indexAction()
    {
        /** @var TaxService $taxService */
        $taxService = $this->get('tax.tax_service');

        return $this->render('TaxBundle:Tax:tax.html.php',[
            'overAllTaxCollectedPerState' => $taxService->calculateOverallTaxCollectedPerState(),
            'averageTaxCollectedPerState' => $taxService->calculateAverageTaxCollectedPerState(),
            'averageCountyTaxRatePerState' => $taxService->calculateAverageCountyTaxRatePerState(),
            'averageCountryTaxRate' => $taxService->calculateAverageTaxRate(),
            'allTaxesCollected' => $taxService->calculateAllTaxesCollected()
        ]);
    }
}