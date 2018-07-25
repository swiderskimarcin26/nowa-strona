<?php
/**
 * Created by PhpStorm.
 * User: marcin2
 * Date: 2018-07-13
 * Time: 13:54
 */

namespace App\Service\SaveCalendarService;


use App\Entity\Callendar;

class SaveCalendarService
{
    private $email;
    private $name;
    private $surname;
    private $tel;
    private $divId;
    private $entityMenager;

    public function __construct($entityMenager,$name,$surname,$tel,$email,$divId)
    {
        $this->tel = $tel;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->divId = $divId;
        $this->entityMenager=$entityMenager;
    }
    public function saveCalendar(){

        $calendarEntity= new Callendar();
        $calendarEntity->setEmail($this->email);
        $calendarEntity->setName($this->name);
        $calendarEntity->setSurname($this->surname);
        $calendarEntity->setTel($this->tel);
        $calendarEntity->setDateCreated(new \DateTime());
        $calendarEntity->setDateBook(new \DateTime($this->divId));
        $calendarEntity->setDateKey($this->divId);

        $this->entityMenager->persist($calendarEntity);
        $this->entityMenager->flush();
    }
}