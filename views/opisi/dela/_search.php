<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DelaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dela-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nomer_fonda') ?>

    <?= $form->field($model, 'opisi_num') ?>

    <?= $form->field($model, 'delo_num') ?>

    <?= $form->field($model, 'papka_fond') ?>

    <?php // echo $form->field($model, 'papka_opis') ?>

    <?php // echo $form->field($model, 'papka_delo') ?>

    <?php // echo $form->field($model, 'title') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
