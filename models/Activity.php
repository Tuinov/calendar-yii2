<?php


namespace app\models;

use yii\db\ActiveRecord;

/**
 * @package app\models
* @property-read User $user
*/

class Activity extends ActiveRecord
{
    public static function tableName()
    {
        return 'activities';
    }


    public function attributeLabels()
    {
        return [
            'title' => 'Событие',
            'date_start' => 'Дата начала',
            'date_end' => 'Дата окончания',
            'user_id' => 'Пользователь',
            'description' => 'Описание',
            'repeat' => 'Повторение',
            'blocked' => 'Блокирующее',
            'attachments' => 'Загрузить файлы',
        ];
    }

    /**
    * Правило валидации данных модели
    */
    public function rules()
    {
        return [
            [['title', 'description', 'date_start', 'user_id'], 'required'],

            [['title'], 'string', 'min' => 3, 'max' => 30],
            [['date_start'], 'date', 'format' => 'php:Y-m-d'],
            [['date_end'], 'default', 'value' => 'date_start'],
           // [['date_end'], 'date', 'min' => 'date_start'],


            [['user_id'], 'integer'],
            [['repeat', 'blocked'], 'boolean'],
            //[['attachments'], 'file', 'maxFiles' => 5]
        ];
    }

    public function getUser()  //$model->user
    {
       return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

}