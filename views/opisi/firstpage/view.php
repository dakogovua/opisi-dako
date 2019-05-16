<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\opisi\Firstpage */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Фонды', 'url' => ['index', 'nametable' => $_GET['nametable']]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="firstpage-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'nametable' => $_GET['nametable']], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'nametable' => $_GET['nametable']], [
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
            'papka',
            'nomer_fonda',
            'name_fond:ntext',
            'count_items',
            'count_opisi',
            'dates:ntext',
        ],
    ]) ?>

</div>
