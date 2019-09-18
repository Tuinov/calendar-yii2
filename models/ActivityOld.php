<?php


namespace app\models;


use yii\base\Model;

class ActivityOld extends Model
{
    public $title;
    public $dayStart;
    public $dayEnd;
    public $userID;
    public $description;

    // прикрепленные файлы
    public $attachments;

    public $repeat = false;
    public $blockDay = false;

    public function attributeLabels()
    {
        return [
            'title' => 'Событие',
            'dayStart' => 'Дата начала',
            'dayEnd' => 'Дата окончания',
            'userID' => 'Пользователь',
            'description' => 'Описание',
            'repeat' => 'Повторение',
            'blockDay' => 'Блокирующее',
            'attachments' => 'Загрузить файлы',
        ];
    }

    /**
    * Правило валидации данных модели
    */
    public function rules()
    {
        return [
            [['title', 'description', 'dayStart', 'dayEnd', 'userID'], 'required'],
            [['title'], 'string', 'min' => 3, 'max' => 30],
            [['dayStart', 'dayEnd'], 'date', 'format' => 'php:Y-m-d'],
            [['userID'], 'integer'],
            [['repeat', 'blockDay'], 'boolean'],
            [['attachments'], 'file', 'maxFiles' => 5]
        ];
    }

}