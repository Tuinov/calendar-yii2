<?php

namespace app\controllers;

use app\models\User;use yii\data\ActiveDataProvider;

class UserController extends \yii\web\Controller
{
    public function actionIndex()
    {

        $query = User::find();

        $provider = new ActiveDataProvider([
            'query' => $query
        ]);
        return $this->render('index', [
            'provider' => $provider
        ]);
    }

    public function actionView()
    {
        return $this->render('view');
    }

}
