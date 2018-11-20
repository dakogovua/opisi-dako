<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use kartik\spinner\Spinner;
use yii\imagine\Image;
use himiklab\colorbox\Colorbox;

$this->title = 'Покажчики';



$this->params['breadcrumbs'][] = ['label' => 'ДАКО.покажчики', 'url' => ['']];

//$this->params['breadcrumbs'][] = ['label' => 'Описи', 'url' => ['/opisi/secondpage/']];
$this->params['breadcrumbs'][] = $this->title;
?>


<h1><?= $this->title.", папка ".Yii::$app->request->get('folder')."/".Yii::$app->request->get('subfolder')  ?></h1>
<?= Yii::$app->request->get('params') ?>

<p>
<div class="well">
<?= Spinner::widget([
 'preset' => Spinner::LARGE,
 'color' => 'blue',
]) ?>
</div>


<div id = "gallery_1">
<?php $i=1; ?>
<?php foreach($filelist as $file): ?>
<div>
<?= Html::a(Html::img($file, ['class' => 'koss-img', 'alt' => 'опис']), $file, ['class' => 'colorbox', 'alt' => 'відкриється опис', 'rel' => 'gallery']) ?>
<br>
<b>
<?= $i++ ?>
</b>
</div>

<?php endforeach;?>

</div>

</p>

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

$('.well').remove();


 
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
    
   
	$this->registerJs($script, yii\web\View::POS_LOAD);
    
?>