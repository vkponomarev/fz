<?php

namespace common\models\components;



use Yii;

class FlowPageContent
{

    public function pageContentArtist($pageId)
    {
        //echo $languageId;
        $pageContentArtist = Yii::$app->db
            ->createCommand('
            select
            id,
            name,
            url
            from
            m_artists
            where id = ' . $pageId . '
            ')
            ->queryOne();

        echo '<pre>';
        //var_dump($texts);
        print_r($pageContentArtist);
        echo '</pre>';

        return $pageContentArtist;
    }


}

