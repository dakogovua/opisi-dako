<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\opisi\Firstpage;

/* @var $this yii\web\View */
/* @var $model app\models\opisi\Secondpage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="secondpage-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // echo $form->field($model, 'papka')->textarea(['rows' => 6]); ?>

    <?php
    $modelka = Firstpage::useTable($_GET['sectablename']);
        echo $form->field($model, 'papka')
		->dropDownList(\yii\helpers\ArrayHelper::map($modelka::find()->all(), 'id', 'papka')); ?>

    <?= $form->field($model, 'podpapka')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nomer_opisi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_opisi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'copy_opisi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'count_opisis')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'years')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
