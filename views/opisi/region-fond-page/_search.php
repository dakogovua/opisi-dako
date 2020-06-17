<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\opisi\RegionFondPageSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="region-fond-page-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'papka') ?>

    <?= $form->field($model, 'nomer_fonda') ?>

    <?= $form->field($model, 'name_fond') ?>

    <?= $form->field($model, 'count_items') ?>

    <?php // echo $form->field($model, 'count_opisi') ?>

    <?php // echo $form->field($model, 'dates') ?>

    <?php // echo $form->field($model, 'fond_id') ?>

    <?php // echo $form->field($model, 'tag_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
