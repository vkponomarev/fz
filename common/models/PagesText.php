<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pages_text".
 *
 * @property int $id
 * @property int $pages_id
 * @property int $languages_id
 * @property string $menu_name
 * @property string $title
 * @property string $h1
 * @property string $description
 * @property string $keywords
 * @property string $text1
 * @property string $text2
 * @property int $active
 */
class PagesText extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pages_text';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pages_id', 'languages_id', 'menu_name', 'title', 'h1', 'description', 'active'], 'required'],
            [['pages_id', 'languages_id', 'active'], 'integer'],
            [['description', 'text1', 'text2'], 'string'],
            [['menu_name', 'index_name', 'plates_title', 'title', 'h1','short_description', 'keywords'], 'string', 'max' => 255],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pages_id' => 'Pages ID',
            'languages_id' => 'Languages ID',
            'menu_name' => 'Menu Name',
            'index_name' => 'Index Name',
            'title' => 'Title',
            'plates_title' => 'Plates title',
            'h1' => 'H1',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'text1' => 'Text1',
            'text2' => 'Text2',
            'active' => 'Active',
            'short_description' => 'Short Desc',

        ];
    }



    public function getPages()
    {
        return $this->hasOne(Pages::className(), ['id' => 'pages_id']);
    }




    public function getIndex(){

        //echo 'ТЕСТ функции getIndex() <br><br>';

        //$pagesTexts = '';

        $pagesTexts = PagesText::find()->where(['pages_id'=>1])->andWhere(['languages_id'=>PagesText::getLanguageId()])->one();

        //echo '$pagesTexts ULR = ' . $pagesTexts->url . '<br><br>';
        //echo 'Конец теста функции getIndex() <br><br>';

        return $pagesTexts;

    }


    public function getOther($url){

        //echo 'ТЕСТ функции getIndex() <br><br>';

        //$pagesTexts = '';

        $pagesTexts = PagesText::find()->where(['url'=>$url])->andWhere(['languages_id'=>PagesText::getLanguageId()])->one();

        //echo '$pagesTexts ULR = ' . $pagesTexts->url . '<br><br>';
        //echo 'Конец теста функции getIndex() <br><br>';

        return $pagesTexts;

    }


    public function getLanguageId(){


        $language = Yii::$app->language;
        $languageId = Languages::find()->where(['url'=>$language])->one();
        echo 'Язык который распознает система $language = '. $language . '<br><br>';
        //echo '$languageId = '. $languageId->id . '<br><br>';


        if (!$languageId){
            return 2;
        }else {

            return $languageId->id;
        }


    }

/*    public function getDataPosts(){
        echo 'ТЕСТ <br><br>';
        //$this->PagesText;
       // $language = Yii::$app->language;
      //  $languageId = Languages::find()->where(['url'=>$language])->one();

      //  echo $language . '<br><br>';
      //  echo $languageId->id . '<br><br>';
        //echo $languageId . '<br><br>';
        $data_lang = PagesText::find()->where(['languages_id'=>PagesText::getLanguageId()])->all();
        //$this->getPagesText()->where(['lang'=>$language])->one();
        if ($data_lang){
            foreach ($data_lang as $one){
                echo $one->url . '<br><br>';
                echo $one->id . '<br><br>';
                echo $one->title . '<br><br>';
            }

        }else {
            echo 'В дата ланг нет ничего <br><br>';

        }



        return $data_lang;
    }
*/
}
