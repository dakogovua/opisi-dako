<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
use kartik\grid\GridView;

$this->title = 'Фонди архівних установ області';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="region-fond-name-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a('Create Region Fond Name', ['create'], ['class' => 'btn btn-success']) ?>
    </p>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'pjax' => true,
        'striped' => true,
        'hover' => true,
       // 'panel' => ['type' => 'primary', 'heading' => 'Grid Grouping Example'],
        'panel' => [
                'type' => 'primary',

            ],
        'toggleDataContainer' => ['class' => 'btn-group mr-2'],

        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            //'fond_name',
            [
                'attribute' => 'fond_name',
//                'width' => '310px',
//                'value' => function ($model, $key, $index, $widget) {
//
//                    return $model->fond_name;
//                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\opisi\RegionFondName::find()->asArray()->all(), 'fond_name', 'fond_name'),
                'filterInputOptions' => ['placeholder' => 'Зробіть вибір ...'],
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ]
            ],
            ['attribute' => 'tagNames',
                'value' => function($data){
                    return $data->tagsString;
                },

                'group' => true,
                'groupedRow' => true,                    // move grouped column to a single grouped row
                'groupOddCssClass' => 'kv-grouped-row',  // configure odd group cell css class
                'groupEvenCssClass' => 'kv-grouped-row', // configure even group cell css class
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>


