<?php

namespace TaxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Tax\Exception\InvalidTaxRateException;
use Tax\TaxService;

class TaxController extends Controller
{
    public function indexAction()
    {
        try{
            /** @var TaxService $taxService */
            $taxService = $this->get('tax.tax_service');

            $taxData = [
                'overAllTaxCollectedPerState' => $taxService->calculateOverallTaxCollectedPerState(),
                'averageTaxCollectedPerState' => $taxService->calculateAverageTaxCollectedPerState(),
                'averageCountyTaxRatePerState' => $taxService->calculateAverageCountyTaxRatePerState(),
                'averageCountryTaxRate' => $taxService->calculateAverageTaxRate(),
                'allTaxesCollected' => $taxService->calculateAllTaxesCollected()
            ];
        } catch (InvalidTaxRateException $e) {
            return new Response('The data provided is invalid');
        } catch (\Exception $e) {
            return new Response('An unknown error occured');
        }


        return $this->render('TaxBundle:Tax:tax.html.php', $taxData);
    }
}