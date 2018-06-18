<?php

namespace App\Controller;

use App\Service\CacheService\CacheService;
use App\Service\Parameters\InscriptionParametersService;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class QlikController extends Controller
{
    /**
     * zmiennna title i subtitle to nazwy zmiennych przypisanych do InscriptionParametersService zapisane w formacie string
     * @Route("/qlik", name="qlik")
     */
    public function qlikAction($name='qlik.')
    {
        $title=InscriptionParametersService::$instriptionQlikTitle;
        $subtitle=InscriptionParametersService::$instriptionQlikSubTitle;

        $cacheService= new CacheService;
        $stringHtml=$cacheService->cacheService($name,$title,$subtitle);
        return $this->render('default/Qlik/qlik.html.twig',["vievPrepare"=>$stringHtml]);

    }
}
