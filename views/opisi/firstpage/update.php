<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\opisi\Firstpage */

$this->title = 'Обновить запись фонда в БД: '.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Фонды', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="firstpage-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
