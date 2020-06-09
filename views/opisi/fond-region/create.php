<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\opisi\RegionFondName */

$this->title = 'Create Region Fond Name';
$this->params['breadcrumbs'][] = ['label' => 'Region Fond Names', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="region-fond-name-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
