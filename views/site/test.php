<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Test Page';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <ul>
        <li>item 1</li>
        <li>item 2</li>
        <li>item 3</li>
    </ul>
</div>
