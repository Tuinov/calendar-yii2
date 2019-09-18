<?php

use app\models\Activity;
use yii\bootstrap\ActiveForm;
use yii\web\View;
use yii\bootstrap\Html;

/**
 * @var View $this
 * @var \app\models\Activity $model
 */
?>

<div class="activity-form">

    <h1>Новое событие</h1>

    <?php $form = ActiveForm::begin(['action' => '/activity/submit']) ?>
    <?= $form->field($model, 'title')->textInput()?>
    <?= $form->field($model, 'date_start')->textInput(['type' => 'date'])?>
    <?= $form->field($model, 'date_end')->textInput(['type' => 'date'])?>
    <?= $form->field($model, 'user_id')->textInput()?>
    <?= $form->field($model, 'description')->textarea()?>
    <?= $form->field($model, 'repeat')->checkbox()?>
    <?= $form->field($model, 'blocked')->checkbox()?>
<!--    --><?//= $form->field($model, 'attachments[]')->fileInput(['multiple' => true])?>

    <?= Html::submitButton('Создать', ['class' => 'btn btn-success']) ?>

    <?php ActiveForm::end() ?>

</div>
