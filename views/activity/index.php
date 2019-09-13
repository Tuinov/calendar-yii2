<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'События';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-list">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Список событий
    </p>

    <a href="/activity/create">Создать</a>
</div>
