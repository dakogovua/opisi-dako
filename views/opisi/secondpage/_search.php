<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\opisi\SecondpageSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="secondpage-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'papka') ?>

    <?= $form->field($model, 'podpapka') ?>

    <?= $form->field($model, 'nomer_opisi') ?>

    <?= $form->field($model, 'name_opisi') ?>

    <?php // echo $form->field($model, 'copy_opisi') ?>

    <?php // echo $form->field($model, 'count_opisis') ?>

    <?php // echo $form->field($model, 'years') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
