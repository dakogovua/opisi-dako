<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\opisi\RegionFondName */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="region-fond-name-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fond_name')->textInput(['maxlength' => true]) ?>

    <?php
    echo $form->field($model, 'tags')->widget(Select2::classname(), [
       // 'data' => $data,
        'data' =>\yii\helpers\ArrayHelper::map(\app\models\opisi\RegionTagName::find()->all(), 'id', 'tag_name'),

//        'language' => 'de',
        'options' => ['placeholder' => 'Select a state ...', 'multiple' => true],
        'pluginOptions' => [
            'allowClear' => true,
            'tags' => true,
            'maximumInputLength' => 10
        ],
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
