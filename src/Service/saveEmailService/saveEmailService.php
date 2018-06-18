<?php
/**
 * Created by PhpStorm.
 * User: marcin2
 * Date: 2018-06-12
 * Time: 12:15
 */

namespace App\Service\saveEmailService;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Email;


class saveEmailService
{
    private $email;
    private $entityMenager;

    public function __construct($email,$entityMenager)
    {
        $this->email = $email;
        $this->entityMenager=$entityMenager;
    }
    public function saveEmail(){

        $emailEntity= new Email();
        $emailEntity->setEmail($this->email);
        $emailEntity->setDateCreated(new \DateTime());

        $this->entityMenager->persist($emailEntity);
        $this->entityMenager->flush();
    }

}