<?php


namespace app\models;

use yii\db\ActiveRecord;

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
            [['title', 'description', 'date_start', 'date_end', 'user_id'], 'required'],
            [['title'], 'string', 'min' => 3, 'max' => 30],
            [['date_start', 'date_end'], 'date', 'format' => 'php:Y-m-d'],
            [['user_id'], 'integer'],
            [['repeat', 'blocked'], 'boolean'],
            //[['attachments'], 'file', 'maxFiles' => 5]
        ];
    }

}