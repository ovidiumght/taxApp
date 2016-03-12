<?php

namespace TaxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Tax\TaxService;

class DefaultController extends Controller
{
    public function indexAction()
    {
        /** @var TaxService $taxService */
        $taxService = $this->get('tax.tax_service');


    }
}
