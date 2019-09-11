<?php


namespace app\controllers;


use app\models\UserMessage;
use yii\web\Controller;
use Yii;

class MessageController extends Controller
{
    public function actionIndex()
    {
        $model = new UserMessage();
        return $this->render('index', [
            'model' => $model
        ]);
    }

    public function actionSubmit()
    {
        var_dump(Yii::$app->request->post());
    }

    public function actionResult()
    {
        // result
    }
}