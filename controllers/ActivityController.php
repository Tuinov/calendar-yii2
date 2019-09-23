<?php


namespace app\controllers;


use app\models\Activity;
use app\models\UserMessage;
use yii\data\ActiveDataProvider;
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
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create'],
                        'roles' => ['@'], // !isGuest
                    ],

                ],
            ],
        ];
    }

    public function actionIndex()
    {

        // методы без ActiveRecord
        // $query = new Query();
        // $rows = $query->select('*')->from('activities')->all();
        // $rows = Yii::$app->db->createCommand('SELECT * FROM activities')->queryAll();

        // метод ActiveRecord Создать новый объект запроса
        $query = Activity::find();
        // $rows = $query->all();
        $provider = new ActiveDataProvider([
            'query' => $query
        ]);
        return $this->render('index', [
            'provider' => $provider
        ]);
    }

    public function actionView($id)

    {
        $activityItem = Activity::findOne($id);
//        $activityItem = Yii::$app->db->createCommand('SELECT * FROM activities where id=:id', [
//            'id' => $id
//     ])->queryOne();

        return $this->render('view', [
            'model' => $activityItem
        ]);
    }

    public function actionUpdate(int $id = null)
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


    public function actionDelete($id)
    {

        $model =  Activity::findOne($id)->delete();
        if(Yii::$app->response->redirect(['/activity/index'])){
          } else {
            return "Failed: " . VarDumper::export($model->errors);
            }
    }
}