<?php


namespace app\controllers;


use app\models\Activity;
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
        // создание
    }
}