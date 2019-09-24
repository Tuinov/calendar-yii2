<?php


namespace app\models;

use Yii;
use yii\base\Model;

class SignUpForm extends Model
{
    public $username;
    public $password;
    public $email;

    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'password' => 'Пароль',

        ];
    }
        /**
         * Правило валидации данных модели
         */
        public function rules()
    {
        return [
            [['username', 'password'], 'required'],
        ];
    }

    public function registration()
    {
        if($this->validate()) {
            $user = new User([
                'username' => $this->username,
//            'password_hash' => '',
//            'auth_key' => '',
                'access_token' =>"{$this->username}-token",
//                'created_at' => time(),
//                'updated_at' => time(),
            ]);

            $user->generateAuthKey();
            $user->password = $this->password;

           if($user->save()) {
              return Yii::$app->user->login($user);
           }
        }
        return false;

    }


}