<?php

use yii\helpers\Html;
use yii\grid\GridView;


use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\opisi\FirstpageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Фонди';

$this->params['breadcrumbs'][] = $this->title;

?>



<div class="firstpage-index">

    <h1><?= Html::encode($this->title).' '.$fondtext ?></h1>


    <p>
<?php	
	 echo Yii::$app->user->isGuest ? (
                "Користувач Гість"
            ) : (
               Html::a('Додати Фонд', ['create', 'nametable' => $_GET['nametable']], ['class' => 'btn btn-success'])
                );
                
	
	?>

<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    </p>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'id' =>[
			    'label' => 'ID',
                'attribute' => 'id',
                'value' => function($data)
                    {
                       return ($data->id);
                    },

				//'filter' => Html::input('text', $searchModel->formName() . '[id]', $searchModel->id,['class' => 'form-control']),
                'format' => 'raw',
				'visible' => !Yii::$app->user->isGuest, 
			],
           // 'papka',
			'papka' => [

                'label' => 'Папка',
                'attribute' => 'papka',
                'value' => function($data)
                    {
                       return $data->papka;
                    },
                'format' => 'html',
				// 'filter' => Html::input('text', $searchModel->formName() . '[papka]', $searchModel->papka,['class' => 'form-control']),
				'visible' => !Yii::$app->user->isGuest, 
            ],
			
            'nomer_fonda',
            //'name_fond:ntext',
            'name_fond:ntext' => [

                'label' => 'Назва фонду*',
				'attribute' => 'name_fond',
                'value' => function($data) use ($cfk)
                    {
                       //return Html::a($data->name_fond, ('/web/index.php?r=opisi/secondpage/index&message='.$data->papka.'&sectablename='.$secnametable));
                       return Html::a($data->name_fond, ['opisi/secondpage',
                           'message' => $data->papka,
                           'nametable' => $_GET['nametable'] ,
                           'sectablename' => $_GET['nametable'],
                           'fond' => $data->nomer_fonda,
                           'cfk' => Yii::$app->request->get('cfk')? 1 : 0,
                            ],
                           ['class' => 'profile-link']);

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
                'urlCreator' => function ($action, $model, $key, $index) {
                    return Url::to([$action, 'id' => $model->id, 'nametable' => $_GET['nametable'] ]);
                }
			],

            [

                'label' => 'ЦФК',
                'attribute' => 'dela',
                'value' => function($data){
                   // return  Html::a($data->opisi($_GET['nametable']));//, ['opisi/list-files/index', 'folder' => $data->papka, 'subfolder' => $data->podpapka, 'params' => $data->name_opisi, 'fond'=> $_GET['fond'],'opis' => $data->nomer_opisi], ['class' => '']);
                    return  Html::a($data->delacount);//, ['opisi/list-files/index', 'folder' => $data->papka, 'subfolder' => $data->podpapka, 'params' => $data->name_opisi, 'fond'=> $_GET['fond'],'opis' => $data->nomer_opisi], ['class' => '']);

                },
                'format' => 'raw',


            ],



        ],
    ]); 
	

	
	?>
</div>



<p>* Назва фонду представлена мовою оригіналу</p>
