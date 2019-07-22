<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\opisi\Dela */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Delas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dela-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nomer_fonda',
            'opisi_num',
            'delo_num',
            'papka_fond',
            'papka_opis',
            'papka_delo',
            'title:ntext',
        ],
    ]) ?>

</div>
