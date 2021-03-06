<?php

namespace App\Controller;

use App\Service\CacheService\CacheService;
use App\Service\InscriptionService;
use App\Service\Parameters\InscriptionParametersService;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

	/**
     * zmiennna title i subtitle to nazwy zmiennych przypisanych do InscriptionParametersService zapisane w formacie string
     * @Route("/", name="homepage")
     */
    public function index($name='index.')
    {
        $title=InscriptionParametersService::$inscriptionIndexTitle;
        $subtitle=InscriptionParametersService::$instriptionIndexSubTitle;

        $cacheService= new CacheService;
        $stringHtml=$cacheService->cacheService($name,$title,$subtitle);

        return $this->render('default/index.html.twig',["vievPrepare"=>$stringHtml,'name'=>""]);
    }
}
