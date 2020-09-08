<?php

namespace common\components\songs;

use Yii;
use yii\data\SqlDataProvider;
use yii\web\NotFoundHttpException;

class SongsByLanguage
{

    public function songs($languageID, $pageSize)
    {

        $count = Yii::$app->db->createCommand('
            SELECT
            m_languages.count_songs
            from
            m_languages
            where 
            m_languages.id = :languageID
            ', [':languageID' => $languageID])->queryOne();

        $songs = new SqlDataProvider([
            'sql' => '
            select
            m_songs.id,
            m_songs.name,
            m_songs.url,
            m_songs.url_youtube,
            m_artists.name as artistName,
            m_artists.url as artistUrl,
            m_albums.name as albumName,
            m_albums.url as albumUrl,
            m_albums.photos as albumPhoto,
            m_albums.year as albumYear,
            m_albums.first_letter as albumFirstLetter
            from
            m_songs_languages
            left join m_songs on m_songs.id = m_songs_languages.m_songs_id
            left join m_artists on m_artists.id = m_songs.m_artists_id
            left join m_albums on m_albums.id = m_songs.m_albums_id
            where 
            m_songs_languages.m_languages_id = :languageID
            ',
            'params' => [':languageID' => $languageID],
            'totalCount' => $count['count_songs'],
            'pagination' => [
                'pageSize' => $pageSize,
            ],
            //'sort' => [
            //    'attributes' => [
            //        '',
            //'view_count',
            //'created_at',
            //   ],
            //],
        ]);

        return [

            'songs' => $songs,
            'itemsCount' => $count['count_songs'],

        ];
    }

}

