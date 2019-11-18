<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\opisi\Secondpage */

$this->title = $model->id;
//  $this->params['breadcrumbs'][] = ['label' => 'Secondpages', 'url' => ['index', 'sectablename' => $_GET['sectablename']]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="secondpage-view">

    <h1><?= Html::encode($this->title) ?></h1>



    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'sectablename' => $_GET['sectablename']], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'sectablename' => $_GET['sectablename']], [
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
            'papka:ntext',
            'podpapka',
            'nomer_opisi',
            'name_opisi:ntext',
            'copy_opisi',
            'count_opisis',
            'years:ntext',
        ],
    ]) ?>

</div>
