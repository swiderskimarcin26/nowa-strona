<?php

namespace App\Controller;

use App\Service\CacheService\CacheService;
use App\Service\Parameters\InscriptionParametersService;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CompanyController extends Controller
{
    /**
     * zmiennna title i subtitle to nazwy zmiennych przypisanych do InscriptionParametersService zapisane w formacie string
     * @Route("/company", name="company")
     */
    public function companyAction($name='company.')
    {
        $title=InscriptionParametersService::$instriptionCompanyTitle;
        $subtitle=InscriptionParametersService::$instriptionCompanySubTitle;

        $cacheService= new CacheService;
        $stringHtml=$cacheService->cacheService($name,$title,$subtitle);

        return $this->render('default/Company/company.html.twig',["vievPrepare"=>$stringHtml]);

    }
}
