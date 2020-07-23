<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\depdrop\DepDrop;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\opisi\RegionFondPageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Region Fond Pages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="region-fond-page-index">

    <h1>Фонди архівних установ області</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php if(!Yii::$app->user->isGuest): ?>
    <p>
        <?= Html::a('Create Region Fond Page', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php endif ?>

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
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            [
//                'attribute' => 'papka',
//            ],

            [
                'attribute' => 'nomer_fonda',
                'width' => '25px'
            ],
            [
                'attribute' => 'name_fond',
                'width' => '250px'
             ],
            [
                'attribute' => 'count_items',
                'width' => '25px'
            ],
            [
                'attribute' => 'count_opisi',
                'width' => '25px'
            ],
            [
                'attribute' => 'dates',
                'width' => '25px'
            ],


//            'fond_id',
//            'tag_id',

            [
                'attribute' => 'nameFondsString',
                'group' => true,
//                  'groupedRow' => true,                    // move grouped column to a single grouped row
                'groupOddCssClass' => 'kv-grouped-row',  // configure odd group cell css class
                'groupEvenCssClass' => 'kv-grouped-row', // configure even group cell css class
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\opisi\RegionFondName::find()->asArray()->all(), 'fond_name', 'fond_name'),
                'filterInputOptions' => ['placeholder' => 'Зробіть вибір ...'],
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ]
            ],
            [
               'attribute' => 'nameFondsTagString',

                'group' => true,
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\opisi\RegionTagName::find()->asArray()->all(), 'tag_name', 'tag_name'),
                'filterInputOptions' => ['placeholder' => 'Зробіть вибір ...'],
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],


            ],

//            'papka' => [
//
//                'label' => 'Папка',
//                'attribute' => 'papka',
//                'value' => function($data)
//                {
//                    return $data->nameFonds->tagsString;
//                 },
//                'format' => 'html',
//                // 'filter' => Html::input('text', $searchModel->formName() . '[papka]', $searchModel->papka,['class' => 'form-control']),
//                'visible' => !Yii::$app->user->isGuest,
//            ],


//            ['value' => function($data){
//                return $data->nameTag->tag_name;
//
//            }],
//            ['value' => function($data){
//              //  print_r($data->nameFond->tags);
//        return $data->nameFond->fond_name;
//
//            }],

            [
                'class' => 'yii\grid\ActionColumn',
                'visible' => !Yii::$app->user->isGuest,
            ],
        ],
    ]); ?>
</div>

