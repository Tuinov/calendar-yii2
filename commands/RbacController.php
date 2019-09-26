<?php


namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {


        // аналогично выоплнению в терминале 'php yii migrate --migrationPath=@yii/rbac/migrations'
//        Yii::$app->runAction('migrate', ['migrationPath' => '@yii/rbac/migrations']);
        // компонент управления RBAC

        /**
         *
         * Создание ролей пользователей
         *
         */
        $auth = Yii::$app->authManager;

        $admin = $auth->createRole('admin');
        $admin->description = 'Администратор';
        $auth->add($admin);

        $auth->assign($admin, 1);

        $user = $auth->createRole('user');
        $user->description = 'Пользователь';
        $auth->add($user);

        $auth->assign($user, 2);


    }
}