<?php


namespace app\models;


use yii\base\Model;

class Registration extends Model
{
    public $userName;
    public $password;
    public $email;

    public function attributeLabels()
    {
        return [
            'userName' => 'Логин',
            'password' => 'Пароль',
            'email' => 'Емаил',

        ];
    }
        /**
         * Правило валидации данных модели
         */
        public function rules()
    {
        return [
            [['userName', 'password', 'email'], 'required'],
            ['email', 'email'],


        ];
    }


}