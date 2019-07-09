<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DelaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Delas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dela-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Dela', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nomer_fonda',
            'opisi_num',
            'delo_num',
            'papka_fond',
            'papka_opis',
            'papka_delo',
            'title:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
