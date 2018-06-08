<?php
/**
 * Created by PhpStorm.
 * User: marcin2
 * Date: 2018-06-07
 * Time: 15:30
 */

namespace App\Service;


class InscriptionService
{
    /**
     *
     */
    public function inscriptionService($inscription,$class)
    {
        // $inscription1=mb_substr($inscription,0,mb_strlen($inscription),"UTF-8");
        //mb_internal_encoding("UTF-8");
        $inscriptionArray = $this->mb_str_to_array($inscription);
        $countArrayElement = count($inscriptionArray);
        $str = "";
        for ($i = 0; $i <= ($countArrayElement - 1); ++$i) {
            if ($i == 0) {
                $str .= '<div class="' . $class . '">' . $inscriptionArray[$i] . '</div><!--';
            }

            if ($i == ($countArrayElement - 1)) {
                $str .= '--><div class="' . $class . '">' . $inscriptionArray[$i] . '</div><br><br>';
            } else {
                if ($inscriptionArray[$i] == " ") {
                    $str .= '--><div style="margin-left:0.25rem; margin-right:0.25rem;" class="' . $class . '">' . " " . '</div><!--';
                }
                if ($i == 0) {
                    continue;
                }
                if ($inscriptionArray[$i] == "<") {
                    $i = $i + 4;
                    $str .= "--><br><!--";
                }
                $str .= '--><div class="' . $class . '">' . $inscriptionArray[$i] . '</div><!--';
            }
        }
        return $str;
    }




    function mb_str_to_array($string){
        mb_internal_encoding("UTF-8"); // Important
        $chars = array();
        for ($i = 0; $i < mb_strlen($string); $i++ ) {
            $chars[] = mb_substr($string, $i, 1);
        }
        return $chars;
    }
}