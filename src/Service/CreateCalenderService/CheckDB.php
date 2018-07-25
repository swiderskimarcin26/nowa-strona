<?php
/**
 * Created by PhpStorm.
 * User: marcin2
 * Date: 2018-07-12
 * Time: 12:00
 */

namespace App\Service\CreateCalenderService;


use App\Entity\BookCallendar;

class CheckDB
{
    private $entityMenager;

    public function __construct($entityMenager)
    {
        $this->entityMenager=$entityMenager;
    }
    public function checkBook(){

        $emailEntity= new BookCallendar();

        $product = $this->getDoctrine()
            ->getRepository('BookCallendar')
            ->findAll();

        //$array=$this->entityMenager->getRepository('BookCallendar')->findAll();
        return $array;
    }

}