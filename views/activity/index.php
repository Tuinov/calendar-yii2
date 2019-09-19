<?php

/**
 * @var $this yii\web\View
* @var app\models\Activity[] $activities
 */

use yii\helpers\Html;

$this->title = 'События';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-list">
    <h1><?= Html::encode($this->title) ?></h1>

    <ul>
        <?php foreach ($activities as $item) { ?>
            <li>

                <?= var_dump($item); ?>
            </li>
        <?php } ?>
    </ul>

    <a href="/activity/create">Создать</a>
</div>
