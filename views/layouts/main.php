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

            ['label' => 'Фонди',
                'url' => ['#'],
                // 'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
                'items' => [
                    ['label' => 'До 1917 року', 'url' => '/web/index.php?r=opisi/firstpage'],
                    ['label' => 'Радянський перiод', 'url' => '/web/index.php?r=opisi/firstpage&nametable=radfirstpage'],
                    //['label' => 'Something else here', 'url' => '#'],
                ],
            ],

        //    ['label' => 'Фонди', 'url' => ['opisi/firstpage']],
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
            ),


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
	<div class="text-center">

            <!--bigmir)net TOP 100-->
            <script type="text/javascript" language="javascript">
                function BM_Draw(oBM_STAT){
                    document.write('<table cellpadding="0" cellspacing="0" border="0" style="display:inline;margin-right:4px;"><tr><td><div style="margin:0;padding:0;font-size:1px;width:88px;"><div style="background:url(\'//i.bigmir.net/cnt/samples/diagonal/b59_top.gif\') no-repeat top;height:1px;line-height:1px;"> </div><div style="font:10px Tahoma;text-align:center;background-color:#EFEFEF;height:15px;"><a href="http://www.bigmir.net/" target="_blank" style="color:#0000ab;text-decoration:none;">bigmir<span style="color:#ff0000;">)</span>net</a></div><div style="height:1px;background:url(\'//i.bigmir.net/cnt/samples/diagonal/b59_top.gif\') no-repeat bottom;"></div><div style="font:10px Tahoma;padding-left:7px;background:url(\'//i.bigmir.net/cnt/samples/diagonal/b59_center.gif\');"><div style="padding:4px 6px 0 0;"><div style="float:left;color:#969696;">хиты</div><div style="float:right;color:#003596;font:10px Tahoma;">'+oBM_STAT.hits+'</div></div><br clear="all" /><div style="padding-right:6px;"><div style="float:left;color:#969696;">хосты</div><div style="float:right;color:#003596;font:10px Tahoma;">'+oBM_STAT.hosts+'</div></div><br clear="all" /><div style="padding-right:6px;"><div style="float:left;color:#969696;">всего</div><div style="float:right;color:#003596;font:10px Tahoma;">'+oBM_STAT.total+'</div></div><br clear="all" /><div style="height:3px;"></div></div><div style="background:url(\'//i.bigmir.net/cnt/samples/diagonal/b59_bottom.gif\') no-repeat top;height:2px;line-height:1px;"> </div></div></td></tr></table>');
                }
            </script>
            <script type="text/javascript" language="javascript">
                bmN=navigator,bmD=document,bmD.cookie='b=b',i=0,bs=[],bm={o:1,v:16954040,s:16954040,t:0,c:bmD.cookie?1:0,n:Math.round((Math.random()* 1000000)),w:0};
                for(var f=self;f!=f.parent;f=f.parent)bm.w++;
                try{if(bmN.plugins&&bmN.mimeTypes.length&&(x=bmN.plugins['Shockwave Flash']))bm.m=parseInt(x.description.replace(/([a-zA-Z]|\s)+/,''));
                else for(var f=3;f<20;f++)if(eval('new ActiveXObject("ShockwaveFlash.ShockwaveFlash.'+f+'")'))bm.m=f}catch(e){;}
                try{bm.y=bmN.javaEnabled()?1:0}catch(e){;}
                try{bmS=screen;bm.v^=bm.d=bmS.colorDepth||bmS.pixelDepth;bm.v^=bm.r=bmS.width}catch(e){;}
                r=bmD.referrer.replace(/^w+:\/\//,'');if(r&&r.split('/')[0]!=window.location.host){bm.f=escape(r).slice(0,400);bm.v^=r.length}
                bm.v^=window.location.href.length;for(var x in bm) if(/^[ovstcnwmydrf]$/.test(x)) bs[i++]=x+bm[x];
                bmD.write('<sc'+'ript type="text/javascript" language="javascript" src="//c.bigmir.net/?'+bs.join('&')+'"></sc'+'ript>');
            </script>
        <noscript>
            <a href="http://www.bigmir.net/" target="_blank"><img src="//c.bigmir.net/?v16954040&s16954040&t2" width="88" height="31" alt="bigmir)net TOP 100" title="bigmir)net TOP 100" border="0" /></a>
        </noscript>
        <!--bigmir)net TOP 100-->

	</div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
