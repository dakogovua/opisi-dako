<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\opisi\Dela */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dela-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomer_fonda')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'opisi_num')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'delo_num')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'papka_fond')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'papka_opis')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'papka_delo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
