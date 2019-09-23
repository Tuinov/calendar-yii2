<?php

/**
 * @var $this yii\web\View
 * @var $provider ActiveDataProvider
 * @var $model Activity
 */

use yii\grid\SerialColumn;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\User;
use yii\grid\ActionColumn;

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="user-list">
        <h1><?= Html::encode($this->title) ?></h1>

    </div>

<?= GridView::widget([
    'dataProvider' => $provider,
    'columns' => [


        'id',
        'username',
        'password_hash',
        'auth_key',
        'access_token',
        'created_at:date',
        'updated_at:date',

        [
            'class' => ActionColumn::className(),

            // you may configure additional properties here
        ],
    ]
]) ?>