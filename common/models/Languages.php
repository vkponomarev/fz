<?php

namespace common\models;

use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "languages".
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property string $html_lang
 * @property int $active
 */
class Languages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'languages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'url', 'html_lang' ,'lang_lang' ,'name_ru'], 'required'],
            [['active'], 'integer'],
            [['name', 'url', 'html_lang','lang_lang' ,'name_ru'], 'string', 'max' => 255],
            [['url'],'unique'],
        ];

    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'name_ru' => 'name_ru',
            'url' => 'Url',
            'html_lang' => 'Html Lang',
            'active' => 'Active',
            'lang_lang' => 'Lang Lang',

        ];
    }









    public function getAllLanguages()
    {

        return $customer = Languages::find()
            ->andWhere(['active' => 1])
            ->all();

    }

    public static function getStatusList() {
        return ['off','on'];
    }



    public function getLanguagesText(){
        return $this->hasMany(LanguagesText::className(),['languages_trans_id'=>'id']);
    }

    public function getLanguagesOn(){
        return $this->hasMany(Languages::className(),['id'=>'languages_id'])->via('languagesText');
    }




    public function getLanguagesTextId(){
        return $this->hasMany(LanguagesText::className(),['languages_trans_id'=>'id']);
    }



        public function translateLanguages($model){

        $text='';

        $allLanguages=ArrayHelper::map($model->allLanguages,'id','url');
        $allLanguagesInverse=ArrayHelper::map($model->allLanguages,'url','id');
        $onLanguages=ArrayHelper::map($model->languagesOn,'url','id');
        $onLanguagesText=ArrayHelper::map($model->languagesTextId,'languages_id','id');

       // echo print_r($allLanguages) . '  <br><br>';
       // echo print_r($allLanguagesInverse) . '  <br><br>';
       // echo print_r($onLanguages) . '  <br><br>';
       // echo print_r($onLanguagesText) . '  <br><br>';

                   foreach ($allLanguages as $one) {
                       //echo $one . '  <br><br>';

                       if (isset($onLanguages[$one])) {
                           //echo $onLanguages[$one] . '  <br><br>';
                           //echo  $onLanguagesText[$onLanguages[$one]] . '  <br><br>';
                           $text .= '<a class="btn btn-success" href="/languages-text/update?id=' . $onLanguagesText[$onLanguages[$one]] . '&languages=' .$onLanguages[$one]. '&languages_trans=' .$model->id. '"><span class="fa fa-check"></span> ' . $one . ' </a> ';

                       } else {

                          $text .= '<a class="btn btn-primary" href="/languages-text/create?languages=' . $allLanguagesInverse[$one] . '&languages_trans='. $model->id .'"><span class="fa fa-times"></span> ' . $one . ' </a> ';
                       }

                   }

        return $text;

    }
}
