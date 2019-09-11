<?php


namespace app\models;


use yii\base\Model;

class Activity extends Model
{
    public $title;
    public $dayStart;
    public $dayEnd;
    public $userID;
    public $discription;

    public $repeat = false;
    public $BlockDay = false;

    public function attributeLabels()
    {
        return [
            'title' => 'событие',
            'discription' => 'описание',
        ];
    }

    public function rules()
    {
        return [
            [['title', 'discription'], 'required'],
            [['title'], 'string', 'min' => 3, 'max' => 30],
        ];
    }

}