<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\opisi\RegionFondName */

$this->title = 'Update Region Fond Name: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Region Fond Names', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="region-fond-name-update">

    <h1><?= Html::encode($this->title) ?></h1>
<!--    <pre>-->
<!--        --><?php //print_r($model); ?>
<!--    </pre>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
