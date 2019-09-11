<?php


namespace app\controllers;


use app\models\Activity;
use app\models\UserMessage;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use Yii;

class ActivityController extends Controller
{
    public function actionIndex()
    {
        return 'actionIndex';
    }

    public function actionView()
    {
        $activityItem = new Activity();
        $activityItem->title = 'New Activity heading';

        return $this->render('view', [
            'model' => $activityItem
        ]);
    }

    public function actionCreate()
    {
        $model = new Activity();
        return $this->render('form', [
            'model' => $model
        ]);
    }

    public function actionSubmit()
    {
        var_dump(Yii::$app->request->post());
    }


    public function actionEdit()
    {
        // редактирование
    }
}