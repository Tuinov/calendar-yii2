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
                'only' => ['index', 'view', 'update'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'update'],
                        'roles' => ['@'],
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

        // если юзер не админ, то просматривает только свои записи
        if (!Yii::$app->user->can('admin')) {
            $query->andWhere(['user_id' => Yii::$app->user->id]);
        }

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

    public function actionToday()
    {

        $time = date('Y-m-d');


        // запись в кэш событий на сегодня
        $cacheKey = 'todayActivity';

        if (Yii::$app->cache->exists($cacheKey)) {
            $query = Yii::$app->cache->get($cacheKey);
        } else {
            $query = Activity::find()->where(['date_start' => $time]);
            // если юзер не админ, то просматривает только свои записи
            if (!Yii::$app->user->can('admin')) {
                $query->andWhere(['user_id' => Yii::$app->user->id]);
            }
            Yii::$app->cache->set($cacheKey, $query);
        }



        $provider = new ActiveDataProvider([
            'query' => $query
        ]);
        return $this->render('index', [
            'provider' => $provider
        ]);
    }
}