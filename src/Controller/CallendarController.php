<?php
/**
 * Created by PhpStorm.
 * User: marcin2
 * Date: 2018-07-11
 * Time: 13:08
 */

namespace App\Controller;

use App\Entity\BookCallendar;
use App\Entity\Callendar;
use App\Entity\Email;
use App\Service\CacheService\CacheService;
use App\Service\CreateCalenderService\CallenderService;
use App\Service\CreateCalenderService\CheckDB;
use App\Service\Parameters\InscriptionParametersService;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CallendarController extends Controller
{
    /**
     * zmiennna title i subtitle to nazwy zmiennych przypisanych do InscriptionParametersService zapisane w formacie string
     * @Route("/callendar", name="callendar")
     */
    public function callendarAction($name='callendar.')
    {
        $entityMenager=$this->getDoctrine();
        $callendarService= new CallenderService;
        $stringHtml=$callendarService->callendarService($entityMenager);
        return $this->render('default/Callendar/callendar.html.twig',["vievPrepare"=>$stringHtml]);

    }


}