<?php

namespace common\components\mainPagesData;



use Yii;

class MainPagesDataAlternate
{

    function alternate($givenUrl, $mainUrl){


        if ($mainUrl){

            if (!$givenUrl){

                Yii::$app->params['alternate'] = $mainUrl . '/';

            }else{

                Yii::$app->params['alternate'] = $mainUrl . '/' . $givenUrl . '/';

            }

        }else{

            Yii::$app->params['alternate'] = '';

        }

    }

}

