<?php

/**
 * @var \yii\web\View $this
 * @var \app\models\Activity $model
 */
use \yii\bootstrap\Html;

?>

<a href="/site">на главную</a>

<h1>Событие</h1>

<h2><?= $model->title ?></h2>



<h1>Название события: <?= Html::tag('span', Html::encode($model->title), ['class' => 'heading-name']) ?></h1>

<a href="/activity/edit">редактировать</a>