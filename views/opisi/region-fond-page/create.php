<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\opisi\RegionFondPage */

$this->title = 'Create Region Fond Page';
$this->params['breadcrumbs'][] = ['label' => 'Region Fond Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="region-fond-page-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
