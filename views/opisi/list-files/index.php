<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use kartik\spinner\Spinner;

use himiklab\colorbox\Colorbox;

use yii\helpers\Url;

use yii\grid\GridView;
use yii\widgets\ActiveForm;

use yii\jui\AutoComplete;

use yii\widgets\Pjax;

$this->title = 'Скани';


$this->params['breadcrumbs'][] = ['label' => 'Фонди',
    'url' => [
        '/opisi/firstpage',
        'nametable' => $_GET['nametable'],
        'sectablename' => $_GET['sectablename']
    ],

];
//$this->params['breadcrumbs'][] = ['label' => 'Описи', 'url' => ['/opisi/secondpage/']];
$this->params['breadcrumbs'][] = $this->title;



?>




    <h1><?= $this->title.", папка ".Yii::$app->request->get('folder')."/".Yii::$app->request->get('subfolder')."/".Yii::$app->request->get('delofolder')  ?></h1>


<?= $namefond ?> <br>
<?= $opisname ?> <br>
<?= $delaname ?>



    <p>


<?php


echo Yii::$app->user->isGuest ? (
"Користувач Гість"
) : (
Html::a('Додати СПРАВУ', ['create', 'nomer_fonda' => $fond, 'opisi_num' => $opis, 'folder' => $_GET['folder'], 'subfolder' => $_GET['subfolder']], ['class' => 'btn btn-success'])
);

?>

<?php if(!Yii::$app->user->isGuest):?>

    <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Внимание!</strong> Нажатие на красный крестик приведет к удвлению файла на сервере. До перезагрузки страницы у вас еще будет возможность посмотреть, что вы удалили (оно помечено красным). Но учтите, что открыв файл, после закрытия страничка перезагрузится!
    </div>

    <div class="alert alert-warning alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Если хотите заменить файлы и не поламать сортировку файлов, то новые файлы подгружайте с такими же именами, лучше всего по одному файлу. Файлы с именем titul автоматически будут вначале.
    </div>

    <?php $form = ActiveForm::begin(['options' => [
        'enctype' => 'multipart/form-data'
    ]]) ?>

    <?= $form->field($model, 'imageFiles[]')->fileInput([
        'multiple' => true,
        'accept' => 'image/*',
    ]) ?>

    <button>Закачать</button>

    <?php ActiveForm::end() ?>

    <hr>
<?php endif; ?>


    <div class="well">
        <?= Spinner::widget([
            'preset' => Spinner::LARGE,
            'color' => 'blue',
        ]) ?>
    </div>

<?php
$folderdelo = $_GET['delofolder'];
?>

<?php if(!$folderdelo) : ?>


    <h2>Справи:</h2>
    <b>Фонд <?= $_GET['fond']?></b>,
    <b>Опис <?= $_GET['opis']?></b>

    <?php // Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id'=>[
                'label' => 'ID',
                'value' => function($data)
                {
                    return ($data->id);
                },
                'format' => 'html',
                'filter' => Html::input('text', $searchModel->formName() . '[id]', $searchModel->id,['class' => 'form-control']),
                'visible' => !Yii::$app->user->isGuest,
            ],
            'nomer_fonda'=>[
                'visible' => !Yii::$app->user->isGuest,
            ],
            'opisi_num'=>[
                'visible' => !Yii::$app->user->isGuest,
            ],
            'delo_num',
            'papka_fond' =>[
                'label' => 'Папка Фонда',
                'value' => function($data)
                {
                    return ($data->papka_fond);
                },
                'format' => 'html',
                'filter' => Html::input('text', $searchModel->formName() . '[papka_fond]', $searchModel->papka_fond,['class' => 'form-control']),
                'visible' => !Yii::$app->user->isGuest,
            ],
            'papka_opis' => [

                'label' => 'Подпапка описи',
                'value' => function($data)
                {
                    return ($data->papka_opis);
                },
                'format' => 'raw',
                'filter' => Html::input('text', $searchModel->formName() . '[papka_opis]', $searchModel->papka_opis,['class' => 'form-control']),
                'visible' => !Yii::$app->user->isGuest,
            ],
            // 'papka_delo',
            'papka_delo' => [

                'label' => 'Папка дела',
                'value' => function($data)
                {
                    return ($data->papka_delo);
                },
                'format' => 'raw',
                'filter' => Html::input('text', $searchModel->formName() . '[papka_delo]', $searchModel->papka_delo,['class' => 'form-control']),
                'visible' => !Yii::$app->user->isGuest,
            ],
            'title:ntext' => [

                'label' => 'Заголовок справи (подано мовою оригіналу).',

                'value' => function($data)
                    /*  {
                          //return Html::a($data->podpapka, ('/web/index.php?r=opisi/secondpage/index&message='.$data->podpapka));
                         // return Html::a($data->title, ('/web/index.php?r=opisi/list-files/index&folder='.$data->papka_fond.'&subfolder='.$data->papka_opis.'&delofolder='.$data->papka_delo));
                          return Html::a($data->title, ('/web/index.php?r=opisi/list-files/index&folder='.
                              $data->papka_fond.'&subfolder='.$data->papka_opis.'&delofolder='.$data->papka_delo));
                      },*/

                {
                    return  Html::a($data->title, ['opisi/list-files/index',
                        'folder' => $data->papka_fond,
                        'subfolder' => $data->papka_opis,
                        'delofolder' => $data->papka_delo,
                        'fond'=> $_GET['fond'],
                        'nametable' => $_GET['nametable'],
                        'sectablename' => $_GET['sectablename'],
                    ],
                        ['class' => '']
                    );
                },
                'format' => 'raw',
                'attribute' => 'title',
                //    'filter' => Html::input('text', $searchModel->formName() . '[title]', $searchModel->title,['class' => 'form-control']),
                'filter' => AutoComplete::widget([
                    'model' => $searchModel,
                    'attribute' => 'title',
                    'clientOptions' => [
                        'source' => $titles,
                        'autoFill' => true,
                        'minLength' => 2,

                    ],
                    'options' => [
                        'class' => 'form-control'
                    ],

                    'clientEvents' => [
                        // 'keydown' => 'function () { console.log("event change occured."); }'
                    ],

                ]),


            ],



            // ['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'visible' => !Yii::$app->user->isGuest,
                'options' => [ 'id' => 'serial-column' ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    return Url::to([$action, 'id' => $model->id, 'nametable' => $_GET['nametable'] ]);
                }
            ],

        ],
    ]); ?>

    <?php // Pjax::end(); ?>

<?php endif; ?>

<?php if (isset($_GET['cfk'])): ?>
    <h2>Описи</h2>
<?php else: ?>
    <h2>Справи</h2>
<?php endif; ?>

    <div id = "gallery_1">
        <?php
        $i=1;
        $webroot = 'scans/'.$_GET['folder'].'/'.$_GET['subfolder'].'/'.$_GET['delofolder'].'/';

        ?>


        <?php // if(count($filelist ) > 0): ?>
        <?php if(isset($filelist ) > 0): ?>
            <?php foreach($filelist as $file): ?>
                <div>
                    <?= Html::a(Html::img($file, ['class' => 'koss-img', 'alt' => 'опис']), $file, ['class' => 'colorbox', 'alt' => 'відкриється опис', 'rel' => 'gallery']) ?>
                    <br>
                    <b>
                        <?= $i++.'.' ?>


                        <?php if(!Yii::$app->user->isGuest):?>
                            <?= $file ?>

                            <button type="button" class="btn btn-warning"
                                    data-delfile = '<?= $file ?>'
                                    data-ii = '<?= $i ?>'
                            >&#x274C;</button>
                        <?php endif; ?>
                    </b>
                </div>

            <?php endforeach;?>
        <?php endif; ?>

    </div>

    </p>

    </div>

    <div class="badge_1">
        <a href="https://www.facebook.com/%D0%94%D0%B5%D1%80%D0%B6%D0%B0%D0%B2%D0%BD%D0%B8%D0%B9-%D0%B0%D1%80%D1%85%D1%96%D0%B2-%D0%9A%D0%B8%D1%97%D0%B2%D1%81%D1%8C%D0%BA%D0%BE%D1%97-%D0%BE%D0%B1%D0%BB%D0%B0%D1%81%D1%82%D1%96-373819276287048/">
            <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="40px" height="40px" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd" viewBox="0 0 30 30" xmlns:xlink="http://www.w3.org/1999/xlink">
 
  <path class="logo_fb" d="M6 2l18 0c2,0 4,2 4,4l0 18c0,2 -2,4 -4,4l-18 0c-2,0 -4,-2 -4,-4l0 -18c0,-2 2,-4 4,-4zm14 7c0,-3 3,-1 5,-2l0 -4c-1,0 -3,0 -4,0 -5,0 -6,2 -6,6l0 2 -2 0 0 4 2 0 0 12 5 0 0 -12 4 0 1 -4 -5 0 0 -2z"></path>

</svg></a>


    </div>

<?= Colorbox::widget([
    'targets' => [
        '.colorbox' => [
            'maxWidth' => '100%',
            'maxHeight' => '100%',
            'slideshow' => true,
            "slideshowAuto" => false,
            "slideshowSpeed" => "10000",
            "opacity" => '0.01',
            'current' => '{current} из {total}'
        ],
    ],
    'coreStyle' => 3,

]) ?>



<?php

$this->registerJsFile ( 'js/elevatezoom-master/jquery.elevatezoom.js', [yii\web\View::POS_HEAD] );
$this->registerJsFile ( 'js/jquery.ez-plus.js', [yii\web\View::POS_HEAD] );
//$this->registerJsFile ( 'https://cdn.rawgit.com/igorlino/elevatezoom-plus/1.1.20/src/jquery.ez-plus.js', [yii\web\View::POS_END] );

$script = <<< JS


if ($('.well')){
    $('.well').remove();    
}

 
 $('a.colorbox').colorbox({
    'onComplete': function(){ 
       
		 $('.cboxPhoto').ezPlus({
		    scrollZoom: true
		 });
    },
	onClosed:function(){
		location.reload();
	}
	
});
 
 
 $('.koss-img').elevateZoom({
    zoomType: "inner",
cursor: "pointer",
zoomWindowFadeIn: 500,
zoomWindowFadeOut: 750,
scrollZoom : true
   });
 

JS;

$this->registerJsFile('@web/js/click.js', ['position' => yii\web\View::POS_END]);
$this->registerJs($script, yii\web\View::POS_LOAD);
$this->registerJsFile('@web/js/koss.js', ['position' => yii\web\View::POS_END]);

?>