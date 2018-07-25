<?php
/**
 * Created by PhpStorm.
 * User: marcin2
 * Date: 2018-07-11
 * Time: 13:43
 */

namespace App\Service\CreateCalenderService;


use App\Entity\Callendar;
use DateTime;

class CreateCalenderService
{

    private $month;
    private $year;
    private $weekday;
    private $day;
    private $firstDayMonth;
    private $presentDayNumber;
    private $lastDayNumber;
    private $nextDayNumber;

    public function createCalendarService($entityMenager)
    {
        $this->checkDate();
        $array2 = $this->checkDB($entityMenager);
        $string = $this->generateTable($this->presentDayNumber, $this->firstDayMonth, $this->lastDayNumber, $this->month, $this->year, $this->day, $array2);
        return $string;
    }

    private function checkDB($entityMenager)
    {
        $array = $entityMenager->getRepository(Callendar::class)->findAll();

        foreach ($array as $value) {
            $array2[] = $value->getDateKey();

        }
        return $array2;
    }

    private function checkDate()
    {


        $todayDate = getdate();
        $month = $todayDate['mon'];
        $year = $todayDate['year'];
        $day = $todayDate['mday'];
        $weekday = $todayDate['weekday'];


        $dateTime = new DateTime("$year-$month-01");
        $timeStamp = $dateTime->getTimestamp();
        $firstDayMonth = date('w', $timeStamp);
        if ($firstDayMonth == '0') {
            $firstDayMonth = '7';
        }
        $firstDayMonth = intval($firstDayMonth) - 1;

        $presentDayNumber = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $lastDayNumber = cal_days_in_month(CAL_GREGORIAN, $month - 1, $year);
        $nextDayNumber = cal_days_in_month(CAL_GREGORIAN, $month + 1, $year);
        $day = $this->changeExpressionData($day);
        $month = $this->changeExpressionData($month);
        $this->month = $month;
        $this->year = $year;
        $this->day = $day;
        $this->firstDayMonth = $firstDayMonth;
        $this->weekday = $weekday;
        $this->presentDayNumber = $presentDayNumber;
        $this->lastDayNumber = $lastDayNumber;
        $this->nextDayNumber = $nextDayNumber;
        return true;
    }

    private function generateTable($presentDayNumber, $firstDayMonth, $lastDayNumber, $month, $year, $day, $array2)
    {

        $string = '<div class="row" style="padding-bottom:0rem;padding-top:0rem">';
        $i2 = 1;
        $i3 = 1;
        for ($i = 1; $i <= 41; $i++) {
            if ($i <= $firstDayMonth) {
                $lDN = $lastDayNumber - $firstDayMonth + $i;
                $string .= '<div class="col-xs-12 calendar-day calendar-no-current-month">' . "$lDN" .
                    '</div>';
            }
            if ($i > $firstDayMonth AND $i - $firstDayMonth <= $presentDayNumber) {
                $i2StringFormat = $this->changeExpressionData($i2);
                $id = "$year" . "$month" . "$i2StringFormat";
                $today = "$year" . "$month" . "$day";
                if (in_array($id, $array2)) {
                    $string .= '<div class="col-xs-12 inactive" id=' . "$id>" . $i2++ .
                        '</div>';
                } elseif ($id == $today) {

                    $string .= '<div class="col-xs-12 calendar-day today">' . $i2++ .
                        '</div>';
                } else {
                    $string .= '<div class="col-xs-12 calendar-day" id=' . "$id>" . '<div class="events">' . '<div class="event">' . $i2++ .
                        '</div></div></div>';
                }
            }
            if ($i - $firstDayMonth >= ($presentDayNumber)) {
                $string .= '<div class="col-xs-12 calendar-day calendar-no-current-month">' . $i3++ .
                    '</div>';
            }
        }
        return $string;
    }

    private function changeExpressionData($experssion)
    {
        if (preg_match('/^[0-9]$/D', $experssion)) {
            $experssion = '0' . $experssion;
        }

        return $experssion;
    }
}



