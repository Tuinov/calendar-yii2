<?php

/**
 * @var $this yii\web\View
 * @var $provider ActiveDataProvider
 * @var $model Activity
 */

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Activity;
use yii\grid\ActionColumn;
use yii\web\View;

$this->title = 'Событие';
$this->params['breadcrumbs'][] = $this->title;

var_dump(time());
?>
<div class="activity-list">

    <?= Html::a('К списку', ['/activity'], ['class' => 'btn btn-info']) ?>

    <h1><?= \yii\helpers\Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $provider,
        'columns' => [
            [
                'class' => 'yii\grid\CheckboxColumn',
                'name' => '№'
                // you may configure additional properties here
            ],
            [
                'class' => yii\grid\SerialColumn::class,
                'header' => '№'
            ],
            [
                'label' => 'Пользователь',
                'attribute' => 'user.username',

            ],

            'title',
            'date_start',
            'date_end:date',
//        'user_id',
            'description',
            'repeat:boolean',
            'blocked:boolean',
            [
                'class' => ActionColumn::className(),

                // you may configure additional properties here
            ],


        ]
    ]) ?>


<?= Html::a('Редактировать', ['activity/update','id'=>$model['id']], ['class' => 'btn btn-success']) ?>

</div>
