<?php

namespace app\controllers;

use app\models\User;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;

class UserController extends \yii\web\Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['@'],
                    ],

                ],
            ],
        ];
    }

    public function actionIndex()
    {

        $query = User::find();

        if (!Yii::$app->user->can('admin')) {
            $query->andWhere(['id' => Yii::$app->user->id]);
        }

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
