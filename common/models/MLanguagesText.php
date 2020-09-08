<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "pages_text_second".
 *
 * @property int $id
 * @property int $m_languages_id
 * @property int $languages_id
 * @property string $name
 * @property string $name_second
 */
class MLanguagesText extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'm_languages_text';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['m_languages_id', 'languages_id'], 'required'],
            [['m_languages_id', 'languages_id'], 'integer'],
            [['name','name_second'], 'string'],
            [['name','name_second'], 'string', 'max' => 255],
        ];
    }

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





