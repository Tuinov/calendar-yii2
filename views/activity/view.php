<?php

/**
 * @var \yii\web\View $this
 * @var \app\models\Activity $model
 */
use \yii\bootstrap\Html;
use yii\widgets\DetailView;

$this->title = 'Событие';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-list">

    <?= Html::a('К списку', ['/activity'], ['class' => 'btn btn-info']) ?>

    <h1><?= \yii\helpers\Html::encode($this->title) ?></h1>

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
//        [
//          'label' => 'Свойство',
//          'value' => 'значение'
//        ],
        [
            'label' => 'Имя создателя',
            'attribute' => 'user.username',

        ],

        'title',
        'date_start:date',
        'date_end:date',
//        'user_id',
        'description',
        'repeat:boolean',
        'blocked:boolean',

        [
            'label' => 'вернуться на главную',
            'value' => 'http://calendar',
            'format' => 'url',

        ],
    ]
]); ?>

<?= Html::a('Редактировать', ['activity/update','id'=>$model['id']], ['class' => 'btn btn-success']) ?>

</div>
