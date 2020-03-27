<?php

namespace common\models;

use Yii;

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
class Songs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'songs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'artisits_id', 'albums_id', 'name', 'body'], 'required'],
            [['id', 'artisits_id', 'albums_id'], 'integer'],
            [['name', 'body'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'artisits_id' => Yii::t('app', 'artisits_id'),
            'albums_id' => Yii::t('app', 'albums_id'),
            'name' => Yii::t('app', 'name'),
            'body' => Yii::t('app', 'body'),

        ];
    }
}
