<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\jui\AutoComplete;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\opisi\FirstpageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Фонди';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="firstpage-index">

    <h1><?= Html::encode($this->title) ?></h1>



    <p>
<?php	
	 echo Yii::$app->user->isGuest ? (
                "Користувач Гість"
            ) : (
               Html::a('Додати Фонд', ['create'], ['class' => 'btn btn-success'])
                );
                
	
	?>
	

    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
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
           // 'papka',
			'papka' => [

                'label' => 'Папка',
                'value' => function($data)
                    {
                       return Html::a($data->papka, ('/web/index.php?r=opisi/secondpage/index&message='.$data->papka));
                    },
                'format' => 'html',
				'filter' => Html::input('text', $searchModel->formName() . '[papka]', $searchModel->papka,['class' => 'form-control']),
				'visible' => !Yii::$app->user->isGuest, 
            ],
			
            'nomer_fonda',
            //'name_fond:ntext',
            'name_fond:ntext' => [

                'label' => 'Назва фонду*',
				'attribute' => 'name_fond',
                'value' => function($data)
                    {
                       //return Html::a($data->name_fond, ('/web/index.php?r=opisi/secondpage/index&message='.$data->papka.'&sectablename='.$secnametable));
                       return Html::a($data->name_fond, ['opisi/secondpage', 'message' => $data->papka, 'sectablename' => $_GET['nametable']], ['class' => 'profile-link']);
					  // return $data->name_fond;
                    },
                'format' => 'raw',
				'filter' => Html::input('text', $searchModel->formName() . '[name_fond]', $searchModel->name_fond, ['class' => 'form-control']),
		

            ],
            'count_items',
            'count_opisi',
            //'dates:ntext',
            'dates:ntext' =>[
				'label' => 'Крайні дати',
				'attribute' => 'dates',
					'value' => function($tada)
						{
						return $tada->dates;
						},				
				],
				
				
				

            [
				'class' => 'yii\grid\ActionColumn',
					 'visible' => !Yii::$app->user->isGuest, 
				 'options' => [ 'id' => 'serial-column' ],
			],
        ],
    ]); 
	

	
	?>
</div>
<p>* Назва фонду представлена мовою оригіналу</p>
