<?php
/**
 * Created by PhpStorm.
 * User: marcin2
 * Date: 2018-06-08
 * Time: 11:07
 */

namespace App\Service\CacheService;


use App\Service\InscriptionService;

class CacheService
{
    function cacheService($name,$title,$subtitle){

        $cache='cache/'.$name.'cache.php';
        if(file_exists($cache)){
            $string=file_get_contents($cache);
        }
        else{
            $inscriptionObject= new InscriptionService();
            $stringTitle=$inscriptionObject->inscriptionService($title,"letter");
            $stringSubtitle=$inscriptionObject->inscriptionService($subtitle,"letter1");
            $string=$stringTitle.$stringSubtitle;

            $fh=fopen($cache,'w+') or die( 'error writing file');
            fwrite($fh,$string);
            fclose($fh);
        }
        return $string;
    }

}