<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\opisi\Firstpage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="firstpage-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'papka')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nomer_fonda')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_fond')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'count_items')->textInput() ?>

    <?= $form->field($model, 'count_opisi')->textInput() ?>

    <?= $form->field($model, 'dates')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
