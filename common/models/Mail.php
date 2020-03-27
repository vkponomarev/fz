<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mail".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $text
 */
class Mail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'text'], 'required'],
            [['text','language','date'], 'string'],
            [['name', 'email','language','date'], 'string', 'max' => 255],
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
            'email' => 'Email',
            'text' => 'Text',
            'language' => 'Language',
            'date' => 'date',
        ];
    }

    public function contact($emailto)
    {
        /* Проверяем форму на валидацию */
        if ($this->validate()) {
            echo 'validated';
            Yii::$app->mailer->compose()
                ->setFrom([$this->email => $this->name]) /* от кого */
                ->setTo($emailto) /* куда */
                ->setSubject($this->language) /* имя отправителя */
                ->setTextBody($this->text) /* текст сообщения */
                ->send(); /* функция отправки письма */
            echo 'отправилось';
            return true;
        } else {
            return false;
        }
    }


}
