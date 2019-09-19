<?php

use app\models\Activity;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

?>


<div class="activity-form">

    <h1>Новый пользователь</h1>

    <?php $form = ActiveForm::begin(['action' => '/activity/submit']) ?>
    <?= $form->field($model, 'userName')->textInput(['autofocus' => true])?>
    <?= $form->field($model, 'password')->textInput()?>
    <?= $form->field($model, 'email')->textInput()?>

    <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-success']) ?>

    <?php ActiveForm::end() ?>

</div>
