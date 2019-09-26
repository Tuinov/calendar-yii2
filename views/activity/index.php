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

$this->title = 'События';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-list">
    <h1><?= Html::encode($this->title) ?></h1>

</div>

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


