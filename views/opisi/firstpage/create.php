<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\opisi\Firstpage */

$this->title = 'Create Firstpage';
$this->params['breadcrumbs'][] = ['label' => 'Firstpages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="firstpage-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
