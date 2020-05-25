<?php

namespace common\components\mainPagesData;



use Yii;

class MainPagesDataAlternate
{

    function alternate($givenUrl){


        if ($givenUrl){

            if ($givenUrl <> 'index')
                Yii::$app->params['alternate'] = $givenUrl . '/';
            else
                Yii::$app->params['alternate'] = '';
        }else{

            Yii::$app->params['alternate'] = '';

        }

    }

}

