<?php


namespace app\controllers;


use app\models\Activity;
use app\models\UserMessage;
use yii\db\Query;
use yii\db\QueryBuilder;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use yii\web\Controller;
use Yii;
use yii\web\UploadedFile;

class ActivityController extends Controller
{
//    public function behaviors()
//    {
//        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'only' => ['index', 'view', 'create'],
//                'rules' => [
//                    [
//                        'allow' => true,
//                        'actions' => ['login', 'signup'],
//                        'roles' => ['@'], // isGuest
//                    ],
//                    [
//                        'allow' => true,
//                        'actions' => ['logout'],
//                        'roles' => ['@'],  // !isGuest
//                    ],
//                ],
//            ],
//        ];
//    }

    public function actionIndex()
    {

        // методы без ActiveRecord
        // $query = new Query();
        // $rows = $query->select('*')->from('activities')->all();
        // $rows = Yii::$app->db->createCommand('SELECT * FROM activities')->queryAll();

        // метод ActiveRecord Создать новый объект запроса
        $query = Activity::find();
        $rows = $query->all();
        return $this->render('index', [
            'activities' => $rows]);
    }

    public function actionView()

    {
        $activityItem = Yii::$app->db->createCommand('SELECT * FROM activities where id=1')->queryOne();

        return $this->render('view', [
            'model' => $activityItem
        ]);
    }

    public function actionCreate(int $id = null)
    {

        $model = $id ? Activity::findOne($id) : new Activity();
        return $this->render('form', [
            'model' => $model
        ]);
    }

    public function actionSubmit()
    {
        $model = new Activity();

        if ($model->load(Yii::$app->request->post())) {
           // $model->attachments = UploadedFile::getInstance($model, 'attachments');

            if ($model->validate()) {
                $model->save();
                // методы без ActiveRecord
              //  $query = new QueryBuilder(Yii::$app->db);
              //  $query->insert('activities', $model->attributes, $params);

                return Yii::$app->response->redirect(['/activity/index']);
            } else {
                return "Failed: " . VarDumper::export($model->errors);
            }
        }

    }


    public function actionEdit()
    {
        $item = Yii::$app->db->createCommand('SELECT * FROM activities where id=1')->queryOne();

        return $this->render('form', [
            'item' => $item
        ]);
    }
}