<?php

namespace common\components\mainPagesData;




use Yii;

class MainPagesDataAdvertising
{

   public function showAdvertising($placement){


        $showAdvertising = Yii::$app->db
            ->createCommand('
            select
            code,
            code_ru
            from
            advertising
            where 
            placement = :placement
            and
            active = 1
            ', [':placement' => $placement])
            ->queryOne();



        if ($showAdvertising){

            if (Yii::$app->language == 'ru') {

                return $showAdvertising['code_ru'];

            } else {

                return $showAdvertising['code'];

            }

        } else {

            return false;

        }


    }

}

