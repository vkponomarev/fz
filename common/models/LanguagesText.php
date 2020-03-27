<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "languages_text".
 *
 * @property int $id
 * @property int $languages_trans_id
 * @property int $languages_id
 * @property string $name
 */
class LanguagesText extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'languages_text';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['languages_trans_id', 'languages_id', 'name'], 'required'],
            [['languages_trans_id', 'languages_id'], 'integer'],
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
            'languages_trans_id' => 'Languages Trans ID',
            'languages_id' => 'Languages ID',
            'name' => 'Name',
        ];
    }
}
