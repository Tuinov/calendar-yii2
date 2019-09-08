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

}