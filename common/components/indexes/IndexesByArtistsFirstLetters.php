<?php

namespace common\components\indexes;

use Yii;
use yii\data\SqlDataProvider;

class IndexesByArtistsFirstLetters

{

    public function indexes()
    {
        //echo $languageId;
        //where
        //active = 1
        $indexes = Yii::$app->db
            ->createCommand('
            select
            first_letter,
            url
            from
            m_artists_first_letters

            ')
            ->queryAll();

        //(new \common\components\dump\Dump())->printR($indexes);

        return $indexes;
    }


}