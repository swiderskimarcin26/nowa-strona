<?php

namespace App\Controller;

use App\Service\CacheService\CacheService;
use App\Service\saveEmailService\saveEmailService;
use http\Env\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Email;

class EmailSaveController extends Controller
{
    /**
     * @Route("/email/save", name="POST /email_save")
     */
    public function emailSave(\Symfony\Component\HttpFoundation\Request $request)
    {
        $email=$request->get("email");
        $entityMenager=$this->getDoctrine()->getManager();
        $saveEmailService= new saveEmailService($email,$entityMenager);
        $saveEmailService->saveEmail();


        return  new JsonResponse(["name"=>$email]);
;

    }

}
