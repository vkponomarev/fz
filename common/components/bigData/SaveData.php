<?php

namespace common\components\bigData;


//UPDATE `categories_text` SET `url` = REPLACE( url, 'search', 'replace' ) where languages_id=2

use Yii;

class SaveData
{
    public function saveData($processCount, $ProcessName){

        Yii::$app->db->createCommand()->update('big_data', ['process' => $processCount], 'name = \'' . $ProcessName.'\'')->execute();

    }




}

