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

    <h1>Новое событие</h1>

<?php $form = ActiveForm::begin([
    'action' => '/activity/submit'
]) ?>

    <h3>Заполните форму</h3>

<?= $form->field($model, 'title')->textInput()?>
<?= $form->field($model, 'discription')->textarea()?>

<?= Html::submitButton('Отправить сообщение', ['class' => 'btn btn-success']) ?>

<?php ActiveForm::end() ?>