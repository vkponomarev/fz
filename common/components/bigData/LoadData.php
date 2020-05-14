<?php

namespace common\components\bigData;


//UPDATE `categories_text` SET `url` = REPLACE( url, 'search', 'replace' ) where languages_id=2

use Yii;

class LoadData
{
    public function loadData($ProcessName){

        $loadData = Yii::$app->db
            ->createCommand('
            select
            process
            from
            big_data
            where 
            name = "' . $ProcessName . '"'
            )
            ->queryOne();


        echo '<pre>';
        //var_dump($texts);
        print_r($loadData);
        echo '</pre>';

        return $loadData;

    }




}

