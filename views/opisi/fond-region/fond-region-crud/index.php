<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Region Fond Names';
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
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'fond_name',
            ['attribute' => 'tags', 'value' => function($data){
                print_r($data);
            }],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>

<pre>

</pre>

<?php

echo yii\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        [

            'label' => 'Tags',
            'attribute' => 'tags',
            'value' => function($data){
//                echo '<pre>';
//                    print_r(\yii\helpers\ArrayHelper::map($data->getTagNames()->asArray()->all(),'id', 'tag_name'));
//                echo '</pre>';
//                $tag ='';
//
//                foreach ($data->tags as $fff){
//                    $tag .= $fff->tag_name.'; ';
//                }
//
//                return  $tag;


            },
            'format' => 'raw',


        ],
    ]
]);

?>