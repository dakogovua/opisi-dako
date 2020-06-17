<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\opisi\RegionFondPage */

$this->title = 'Update Region Fond Page: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Region Fond Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="region-fond-page-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
