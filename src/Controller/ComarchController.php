<?php

namespace App\Controller;

use App\Service\CacheService\CacheService;
use App\Service\Parameters\InscriptionParametersService;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ComarchController extends Controller
{
    /**
     * zmiennna title i subtitle to nazwy zmiennych przypisanych do InscriptionParametersService zapisane w formacie string
     * @Route("/comarch", name="comarch")
     */
    public function comarchAction($name='comarch.')
    {
        $title=InscriptionParametersService::$instriptionComarchTitle;
        $subtitle=InscriptionParametersService::$instriptionComarchSubTitle;

        $cacheService= new CacheService;
        $stringHtml=$cacheService->cacheService($name,$title,$subtitle);
        return $this->render('default/Comarch/comarch.html.twig',["vievPrepare"=>$stringHtml]);

    }
}
