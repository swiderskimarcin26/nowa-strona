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
     * @Route("/", name="homepage")
     */
    public function index($name='index.')
    {
        $title=InscriptionParametersService::$inscriptionIndexTitle;
        $subtitle=InscriptionParametersService::$instriptionIndexSubTitle;
        $cacheService= new CacheService;
        $string=$cacheService->cacheService($name,$title,$subtitle);

        return $this->render('default/index.html.twig',["vievPrepare"=>$string]);
    }



    /**
     * @Route("/company", name="company")
     */
    public function companyAction($name='company.')
    {

        $title=InscriptionParametersService::$instriptionCompanyTitle;
        $subtitle=InscriptionParametersService::$instriptionCompanySubTitle;
        $cacheService= new CacheService;
        $string=$cacheService->cacheService($name,$title,$subtitle);
        return $this->render('default/Company/company.html.twig',["vievPrepare"=>$string]);

    }
    /**
     * @Route("/comarch", name="comarch")
     */
    public function comarchAction($name='comarch.')
    {
        $title=InscriptionParametersService::$instriptionComarchTitle;
        $subtitle=InscriptionParametersService::$instriptionComarchSubTitle;
        $cacheService= new CacheService;
        $string=$cacheService->cacheService($name,$title,$subtitle);
        return $this->render('default/Comarch/comarch.html.twig',["vievPrepare"=>$string]);

    }
    /**
     * @Route("/qlik", name="qlik")
     */
    public function qlikAction($name='qlik.')
    {
        $title=InscriptionParametersService::$instriptionQlikTitle;
        $subtitle=InscriptionParametersService::$instriptionQlikSubTitle;
        $cacheService= new CacheService;
        $string=$cacheService->cacheService($name,$title,$subtitle);
        return $this->render('default/Qlik/qlik.html.twig',["vievPrepare"=>$string]);

    }
    /**
     * @Route("/it", name="it")
     */
    public function itAction($name='it.')
    {
        $title=InscriptionParametersService::$instriptionItTitle;
        $subtitle=InscriptionParametersService::$instriptionItSubTitle;
        $cacheService= new CacheService;
        $string=$cacheService->cacheService($name,$title,$subtitle);
        return $this->render('default/IT/it.html.twig',["vievPrepare"=>$string]);

    }
    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction($name='contact.')
    {
        $inscriptionObject= new InscriptionService();
        $stringTitle=$inscriptionObject->inscriptionService(InscriptionParametersService::$instriptionContactTitle,"letter");
        return $this->render('default/Contact/contact.html.twig',["vievPrepare"=>$stringTitle]);

    }
    /**
     * @Route("/shop", name="shop")
     */
    public function shopAction()
    {

        return $this->render('default/Company.html.twig');

    }
}
