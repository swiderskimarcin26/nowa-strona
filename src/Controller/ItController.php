<?php

namespace App\Controller;

use App\Service\CacheService\CacheService;
use App\Service\Parameters\InscriptionParametersService;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ItController extends Controller
{
    /**
     * zmiennna title i subtitle to nazwy zmiennych przypisanych do InscriptionParametersService zapisane w formacie string
     * @Route("/it", name="it")
     */
    public function itAction($name='it.')
    {
        $title=InscriptionParametersService::$instriptionItTitle;
        $subtitle=InscriptionParametersService::$instriptionItSubTitle;

        $cacheService= new CacheService;
        $stringHtml=$cacheService->cacheService($name,$title,$subtitle);
        return $this->render('default/IT/it.html.twig',["vievPrepare"=>$stringHtml]);

    }
}
