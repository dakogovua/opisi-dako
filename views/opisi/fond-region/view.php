<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\opisi\RegionFondName */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Region Fond Names', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="region-fond-name-view">

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

    <pre>
        <?php print_r($model->tagNames); ?>
    </pre>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'fond_name',
        ],
    ]) ?>

</div>
