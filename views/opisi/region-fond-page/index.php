<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\opisi\RegionFondPageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Region Fond Pages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="region-fond-page-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Region Fond Page', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'papka',
            'nomer_fonda',
            'name_fond:ntext',
            'count_items',
            'count_opisi',
            'dates:ntext',
            'fond_id',
            'tag_id',
            ['value' => function($data){
                return $data->nameTag->tag_name;

            }],
            ['value' => function($data){
              //  print_r($data->nameFond->tags);
        return $data->nameFond->fond_name;

            }],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
