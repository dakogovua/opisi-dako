<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\opisi\Secondpage */

$this->title = 'Create Secondpage';
$this->params['breadcrumbs'][] = ['label' => 'Secondpages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="secondpage-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
