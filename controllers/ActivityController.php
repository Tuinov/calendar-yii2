<?php


namespace app\controllers;


use app\models\Activity;
use app\models\UserMessage;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use Yii;
use yii\web\UploadedFile;

class ActivityController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
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
        $model = new Activity();

        if ($model->load(Yii::$app->request->post())) {
            $model->attachments = UploadedFile::getInstance($model, 'attachments');


        }
        return 'событие создано';

    }


    public function actionEdit()
    {
        // редактирование
    }
}