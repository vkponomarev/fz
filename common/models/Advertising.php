<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "advertising".
 *
 * @property int $id
 * @property string $name
 * @property int $placement
 * @property string $code
 * @property string $code_ru
 * @property int $active 
 */
class Advertising extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'advertising';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'name', 'placement', 'code', 'code_ru', 'active'], 'required'],
            [[ 'placement', 'active'], 'integer'],
            [['code', 'code_ru'], 'string'],
            [['name'], 'string', 'max' => 255],

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
            'placement' => 'Placement',
            'code' => 'Code',
            'code_ru' => 'Code Ru',
            'active' => 'Active',
        ];
    }

    /*
     *  Модель для рекламы на сайте:
     * 1 - Страницы после текста 1
     * 2 - Страницы правая колонка
     * 3 - Страницы перед текстом 2
     * 4 - Страницы после текста 2
     * 5 - Страницы внутри формы калькулятора
     *
     */

    public function allAdvertising(){

        return Advertising::find()->asArray()->all();

       // return $allAdvertising = Advertising::find()->all();

    }

    public function showAdvertising($placement,$allAdvertising){

        $key = array_search($placement, array_column($allAdvertising, 'placement'));

        if ($allAdvertising[$key]['active']){

            if (Yii::$app->language == 'ru') {

                return $allAdvertising[$key]['code_ru'];

            } else {

                return $allAdvertising[$key]['code'];

            }

        } else {

            return false;

        }


    }

}



