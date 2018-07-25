<?php
/**
 * Created by PhpStorm.
 * User: marcin2
 * Date: 2018-06-08
 * Time: 11:07
 */

namespace App\Service\CacheService;


use App\Service\InscriptionService;
use App\Service\Parameters\InscriptionParametersService;

class CacheService
{
    function cacheService($name,$inscriptionTitle,$inscriptionSubTitle=""){
        $subtitle="";
        //wartości typu string, są przetwarzane na nazwy zmiennych
        if(!empty($inscriptionSubTitle)){
            $subtitle=$inscriptionSubTitle;
        }

        //sprawdzana jest obecność, pliku z  wygenerowanym kodem html
        $cache='cache/'.$name.'cache.php';
        if(file_exists($cache)){
            $stringHTML=file_get_contents($cache);
        }
        else{

            $stringHTML=$this->createHtmlString($inscriptionTitle,$subtitle);

            $this->createCacheFile($cache,$stringHTML);

        }
        return $stringHTML;
    }

    function createCacheFile($cache,$string){
        $fh=fopen($cache,'w+') or die( 'error writing file');
        fwrite($fh,$string);
        fclose($fh);
        return true;
    }
    function createHtmlString($title,$subtitle=''){
        $inscriptionObject= new InscriptionService();
        $stringTitle=$inscriptionObject->inscriptionService($title,"letter");
        $stringSubtitle=$inscriptionObject->inscriptionService($subtitle,"letter1");
        $stringHTML=$stringTitle.$stringSubtitle;
        return $stringHTML;
    }

}