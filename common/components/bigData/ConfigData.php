<?php

namespace common\components\mainPagesData;


//UPDATE `categories_text` SET `url` = REPLACE( url, 'search', 'replace' ) where languages_id=2

use Yii;

class SaveData
{
    public function saveData($data){

        $saveData = Yii::$app->db
            ->createCommand('
            update
            big_data
            set
            process = ' . $data['count'] . '
            where 
            name = "' . $data['name'] . '"'
            )
            ->queryOne();

        //echo '<pre>';
        //var_dump($texts);
        //print_r($languageId);
        //echo '</pre>';

        return $saveData;

    }




}

