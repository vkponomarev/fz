<?php

namespace common\components\main;



use Yii;

class MainAlternate
{

    function alternate($url, $mainUrl){


        if ($mainUrl){

            if (!$url){

                $alternate = $mainUrl . '/';

            }else{

                $alternate = $mainUrl . '/' . $url . '/';

            }

        }else{

            $alternate = '';

        }

        return $alternate;

    }

}

