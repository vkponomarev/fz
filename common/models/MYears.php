<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pages_text_second".
 *
 * @property int $id
 * @property int $pages_id
 * @property int $languages_id
 * @property string $parent_id
 * @property string $first_letter
 * @property string $url
 * @property string $genre
 * @property string $year
 * @property string $text1
 * @property string $text2
 * @property int $active
 */
class MYears extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'm_years';
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
