<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "m_featuring".
 * @property int $id
 * @property int $m_songs_id
 * @property int $m_genres_id

 */
class MSongsGenres extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'm_songs_genres';
    }

    /**
     * {@inheritdoc}
     */
    /*public function rules()
    {
        return [
            [['pages_id', 'languages_id', 'url', 'menu_name', 'title', 'h1', 'description', 'keywords', 'text1', 'text2', 'active'], 'required'],
            [['pages_id', 'languages_id', 'active'], 'integer'],
            [['description', 'text1', 'text2', 'text'], 'string'],
            [['url', 'menu_name', 'title', 'h1', 'keywords'], 'string', 'max' => 255],
        ];
    }*/

    /**
     * {@inheritdoc}
     */
  /*  public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'pages_id' => Yii::t('app', 'Pages ID'),
            'languages_id' => Yii::t('app', 'Languages ID'),
            'url' => Yii::t('app', 'Url'),
            'menu_name' => Yii::t('app', 'Menu Name'),
            'title' => Yii::t('app', 'Title'),
            'h1' => Yii::t('app', 'H1'),
            'description' => Yii::t('app', 'Description'),
            'keywords' => Yii::t('app', 'Keywords'),
            'text1' => Yii::t('app', 'Text1'),
            'text2' => Yii::t('app', 'Text2'),
            'active' => Yii::t('app', 'Active'),
            'start' => Yii::t('app', 'Start'),
            'text' => Yii::t('app', 'Text'),
        ];
    }*/
}
