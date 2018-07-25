<?php

namespace App\Controller;

use App\Service\CreateCalenderService\CreateCalenderService;
use App\Service\Parameters\InscriptionParametersService;
use App\Service\SaveCalendarService\SaveCalendarService;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Service\CacheService\CacheService;
use App\Service\saveEmailService\saveEmailService;
use http\Env\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class CalendarSaveController extends Controller
{
    /**
     * @Route("/calendar/save", name="POST/calendar_save")
     */
    public function calendarSaveAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $email=$request->get('email');
        $name=$request->get('name');
        $surname=$request->get('surname');
        $tel=$request->get('tel');
        $divId=$request->get('divId');

        $entityMenager=$this->getDoctrine()->getManager();

       $saveCalendarService= new saveCalendarService($entityMenager,$name,$surname,$tel,$email,$divId);
       $saveCalendarService->saveCalendar();

        $title=InscriptionParametersService::$instriptionContactTitle;

        $cacheService= new CacheService;
        $stringHtml=$cacheService->cacheService($name,$title);

        $entityMenager=$this->getDoctrine();
        $createCalendarService= new CreateCalenderService;
        $stringHtml2=$createCalendarService->createCalendarService($entityMenager);

        return $this->render('default/Contact/contact.html.twig',["vievPrepare"=>$stringHtml,"vievPrepare2"=>$stringHtml2]);

    }
}
