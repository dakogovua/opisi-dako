<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);

$this->title = Yii::$app->name;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
	
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Головна', 'url' => ['/site/index']],
            ['label' => 'Фонди', 'url' => ['opisi/firstpage']],
        //    ['label' => 'Про сервіс', 'url' => ['/site/about']],
            ['label' => 'Контакти', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Увійти', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <b>ДАКО</b> 2018 - <?= date('Y') ?></p>

        <p class="pull-right"><?= "Developed by <b>Konstantinov</b>" ?></p>
    </div>
	<div>
	    <p class="text-center">
		<!--bigmir)net TOP 100-->
<script type="text/javascript" language="javascript">
bmN=navigator,bmD=document,bmD.cookie='b=b',i=0,bs=[],bm={v:16954040,s:16954040,t:33,c:bmD.cookie?1:0,n:Math.round((Math.random()* 1000000)),w:0};
for(var f=self;f!=f.parent;f=f.parent)bm.w++;
try{if(bmN.plugins&&bmN.mimeTypes.length&&(x=bmN.plugins['Shockwave Flash']))bm.m=parseInt(x.description.replace(/([a-zA-Z]|\s)+/,''));
else for(var f=3;f<20;f++)if(eval('new ActiveXObject("ShockwaveFlash.ShockwaveFlash.'+f+'")'))bm.m=f}catch(e){;}
try{bm.y=bmN.javaEnabled()?1:0}catch(e){;}
try{bmS=screen;bm.v^=bm.d=bmS.colorDepth||bmS.pixelDepth;bm.v^=bm.r=bmS.width}catch(e){;}
r=bmD.referrer.replace(/^w+:\/\//,'');if(r&&r.split('/')[0]!=window.location.host){bm.f=escape(r).slice(0,400);bm.v^=r.length}
bm.v^=window.location.href.length;for(var x in bm) if(/^[vstcnwmydrf]$/.test(x)) bs[i++]=x+bm[x];
bmD.write('<a href="http://www.bigmir.net/" target="_blank" onClick="img=new Image();img.src="//www.bigmir.net/?cl=16954040";"><img src="//c.bigmir.net/?'+bs.join('&')+'"  width="160" height="19" border="0" alt="bigmir)net TOP 100" title="bigmir)net TOP 100"></a>');
</script>
<noscript>
<a href="http://www.bigmir.net/" target="_blank"><img src="//c.bigmir.net/?v16954040&s16954040&t33" width="160" height="19" alt="bigmir)net TOP 100" title="bigmir)net TOP 100" border="0" /></a>
</noscript>
<!--bigmir)net TOP 100-->
		</p>
	</div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
