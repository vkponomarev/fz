<?php

namespace common\components\main;



use Yii;

class MainCanonical
{

    function canonical($url, $mainUrl){


        if ($mainUrl){

            if (!$url){

                $canonical = Yii::$app->language . '/' . $mainUrl . '/';

            }else{

                $canonical = Yii::$app->language . '/' . $mainUrl . '/' . $url . '/';

            }

        }else{

            $canonical = Yii::$app->language . '/';

        }

        return $canonical;

    }

}

