<?php

namespace App\Controller;

use App\Service\CacheService\CacheService;
use App\Service\CreateCalenderService\CreateCalenderService;
use App\Service\Parameters\InscriptionParametersService;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContactController extends Controller
{
    /**
     * zmiennna title i subtitle to nazwy zmiennych przypisanych do InscriptionParametersService zapisane w formacie string
     * @Route("/contact", name="contact")
     */
    public function contactAction($name='contact.')
    {
        $title=InscriptionParametersService::$instriptionContactTitle;

        $cacheService= new CacheService;
        $stringHtml=$cacheService->cacheService($name,$title);

        $entityMenager=$this->getDoctrine();
        $createCalendarService= new CreateCalenderService;
        $stringHtml2=$createCalendarService->createCalendarService($entityMenager);

        return $this->render('default/Contact/contact.html.twig',["vievPrepare"=>$stringHtml,"vievPrepare2"=>$stringHtml2]);

    }
}
