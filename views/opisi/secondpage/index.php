<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\opisi\SecondpageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Описи';
//
$this->params['breadcrumbs'][] = ['label' => 'Фонды', 'url' => ['/opisi/firstpage']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="secondpage-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
   	<?php	 
	echo Yii::$app->user->isGuest ? (
                "Користувач Гість"
            ) : (
               Html::a('Додати опис', ['create'], ['class' => 'btn btn-success'])
                );
        ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'id' =>[
			'label' => 'ID',
                'value' => function($data)
                    {
                       return ($data->id);
                    },
                'format' => 'html',
				'filter' => Html::input('text', $searchModel->formName() . '[id]', $searchModel->id,['class' => 'form-control']),
				'visible' => !Yii::$app->user->isGuest, 
			],
            //'papka:ntext',
            'papka:ntext' =>[
			'label' => 'Папка',
                'value' => function($data)
                    {
                       return ($data->papka);
                    },
                'format' => 'html',
				'filter' => Html::input('text', $searchModel->formName() . '[papka]', $searchModel->papka,['class' => 'form-control']),
				'visible' => !Yii::$app->user->isGuest, 			
			],
            'podpapka' => [

                'label' => 'Подпапка',
                'value' => function($data)
                    {
                       //return Html::a($data->podpapka, ('/web/index.php?r=opisi/secondpage/index&message='.$data->podpapka));
                       return Html::a($data->podpapka, ('/web/index.php?r=opisi/list-files/index&folder='.$data->papka.'&subfolder='.$data->podpapka));
                    },
                'format' => 'raw',
				'filter' => Html::input('text', $searchModel->formName() . '[podpapka]', $searchModel->podpapka,['class' => 'form-control']),
				'visible' => !Yii::$app->user->isGuest, 
            ],
            'nomer_opisi',
            //'name_opisi:ntext',
            'name_opisi:ntext'=> [

                'label' => 'Анотація складу документів опису справ',
                'attribute' => 'name_opisi',
				'value' => function($data)
                    {
                       //return Html::a($data->podpapka, ('/web/index.php?r=opisi/secondpage/index&message='.$data->podpapka));
                       return Html::a($data->name_opisi, ('/web/index.php?r=opisi/list-files/index&folder='.$data->papka.'&subfolder='.$data->podpapka.'&params='.$data->name_opisi));
                    },
                'format' => 'raw',
				'filter' => Html::input('text', $searchModel->formName() . '[name_opisi]', $searchModel->name_opisi,['class' => 'form-control']),

            ],
            // 'copy_opisi',
            'copy_opisi' =>[
				'label' => 'Оцифровані копії опису',
				'visible' => !Yii::$app->user->isGuest, 
			],
            'count_opisis',
            'years:ntext',

            ['class' => 'yii\grid\ActionColumn',
			 'visible' => !Yii::$app->user->isGuest, 
			],
        ],
    ]); ?>
</div>
<?= 'Папка '.Html::encode($message)?>


