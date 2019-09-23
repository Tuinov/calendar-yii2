<?php


namespace app\commands;


use app\models\User;
use yii\console\Controller;

class AppController extends Controller
{
    // создание начальных юзеров
    public function actionUsers()
    {
        // создание начальных юзеров
        $users = [
            'admin',
            'manager',
            'user'
        ];

        foreach ($users as $login){
            $user = new User([
                'username' => $login,
//            'password_hash' => '',
//            'auth_key' => '',
                'access_token' => "{$login}-token",
                'created_at' => time(),
                'updated_at' => time(),
            ]);

            $user->generateAuthKey();
            $user->password = '123123123';

            $user->save();
        }
    }
}