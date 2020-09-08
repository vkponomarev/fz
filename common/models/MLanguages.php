<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "pages_text_second".
 *
 * @property int $id
 * @property int $pages_id
 * @property int $languages_id
 * @property string $url
 * @property string $menu_name
 * @property string $title
 * @property string $h1
 * @property string $description
 * @property string $keywords
 * @property string $text1
 * @property string $text2
 * @property int $active
 */
class MLanguages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'm_languages';
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




    public function translateButtons($model){

        $text='';
        $allLanguages=ArrayHelper::map(Languages::getAllLanguages(),'id','url');
        $allLanguagesInverse=ArrayHelper::map(Languages::getAllLanguages(),'url','id');
        $onLanguages=ArrayHelper::map($model->languages,'url','id');
        $onPagesText=ArrayHelper::map($model->languagesTextId,'languages_id','id');

        foreach ($allLanguages as $one) {


            if (isset($onLanguages[$one])) {

                $text .= '<a class="btn btn-success" href="/m-languages-text/update?id=' . $onPagesText[$onLanguages[$one]] . '&languages=' .$onLanguages[$one]. '&m-languages=' .$model->id. '"><span class="fa fa-check"></span> ' . $one . ' </a> ';

            } else {

                $text .= '<a class="btn btn-primary" href="/m-languages-text/create?languages=' . $allLanguagesInverse[$one] . '&m-languages='. $model->id .'"><span class="fa fa-times"></span> ' . $one . ' </a> ';
            }

        }

        return $text;

    }


    public function getLanguages(){
        return $this->hasMany(Languages::className(),['id'=>'languages_id'])->via('languagesText');
    }

    public function getLanguagesText(){
        return $this->hasMany(MLanguagesText::className(),['m_languages_id'=>'id']);
    }


    public function getLanguagesTextId(){
        return $this->hasMany(MLanguagesText::className(),['m_languages_id'=>'id']);
    }

}





