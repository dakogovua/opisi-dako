<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\opisi\RegionFondPage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="region-fond-page-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'papka')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nomer_fonda')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_fond')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'count_items')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'count_opisi')->textInput() ?>

    <?= $form->field($model, 'dates')->textarea(['rows' => 6]) ?>

    <?php // $form->field($model, 'fond_id')->textInput() ?>
    <?php


            $fonds = \app\models\opisi\RegionFondName::find()->all();

            $items = \yii\helpers\ArrayHelper::map($fonds,'id','fond_name');

            $params = [
                'prompt' => 'Укажите фонд'
            ];

            echo  $form->field($model, 'fond_id')->dropDownList($items,$params);
     ?>

    <?php
        $tags = \app\models\opisi\RegionTagName::find()->all();

        $items = \yii\helpers\ArrayHelper::map($tags,'id','tag_name');
        print_r($items);
        $params = [
            'prompt' => 'Укажите тип'
        ];
        echo $form->field($model, 'tag_id')->dropDownList($items, $params);

    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
