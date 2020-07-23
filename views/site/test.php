<?php

use yii\helpers\Html;

use app\assets\TabsAsset;
TabsAsset::register($this)

/* @var $this yii\web\View */


?>


    <div class="mainDiv">
        <?php foreach ($tags as $tag): ?>
        <div class="expandableCollapsibleDiv">
            <img src="Image/up-arrow.jpg" />
            <h4><a><?= $tag->tag_name ?></a></h4>
            <ul>
                <? foreach ($tag->fonds as $fond):?>
                <li><a><?= $fond['fond_name'] ?></a></li>


                <? endforeach; ?>
            </ul>
        </div>
        <? endforeach; ?>
    </div>


    <svg class="hidden">
        <defs>
            <path id="tabshape" d="M80,60C34,53.5,64.417,0,0,0v60H80z"/>
        </defs>
    </svg>


    <div class="site-index">


            <div class="tabs tabs-style-shape">
                <nav>
                    <ul>
                        <li>
                            <a href="#section-shape-1">
                                <svg viewBox="0 0 80 60" preserveAspectRatio="none"><use xlink:href="#tabshape"></use></svg>
                                <span>Державний архів Київської області</span>
                            </a>
                        </li>
                        <li>
                            <a href="#section-shape-2">
                                <svg viewBox="0 0 80 60" preserveAspectRatio="none"><use xlink:href="#tabshape"></use></svg>
                                <svg viewBox="0 0 80 60" preserveAspectRatio="none"><use xlink:href="#tabshape"></use></svg>
                                <span>Архівні установи Київської області</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="content-wrap">
                    <section id="section-shape-1">

                        <div class="jumbotron">
                            <h2>База даних оцифрованих описів справ Державного архіву Київської області періоду:</h2>





                            <div id="container">
                                <p>Оберіть період test</p>

                                <div class="row" >

                                    <?php
                                    echo Html::dropDownList('cat',null, array('firstpage'=>'До 1917', 'radfirstpage'=>'1917 - 1991'),
                                        array('empty'=>'Select Category', 'class' => 'form-control form-control-lg'));
                                    ?>


                                </div>
                                <br>

                                <p><a id="kossbtn" class="btn btn-lg btn-success" >Розпочнемо!</a></p>

                            </div>
                        </div>

                    </section>
                    <section id="section-shape-2">
                        <h2>
                            База фондів архівних установ Київської області
                        </h2>
                        <div class="containeroblasti">
                            <div class="mainDiv">
                                <?php foreach ($tags as $tag):?>
                                    <div class="expandableCollapsibleDiv">
                                        <img src="images/icons8-arrow-100.png" />
                                        <h4><a><?= $tag->tag_name ?></a></h4>
                                        <ul>
                                            <? foreach ($tag->fonds as $fond):?>
                                                <li><a><?= $fond['fond_name'] ?></a></li>
                                            <? endforeach; ?>
                                        </ul>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <p>
                            <?= Html::a('Перейти до всіх фондів', ['opisi/region-fond-page', ], ['class' => 'btn btn-lg btn-success']) ?>
                        </p>

                        </section>

                </div><!-- /content -->
            </div><!-- /tabs -->






        <div class="body-content">
            <p class="lead">Інструкція для користування Базою даних
                оцифрованих описів справ
            </p>
            <div class="row">
                <div class="col-lg-4 koss-blue">
                    <h2>[Загальні відомості]</h2>


                    <p>
                        <strong>Шановні користувачі</strong>, до Вашої уваги пропонується <em><strong>&laquo;База даних оцифрованих описів справ Державного архіву Київської області періоду</strong></em><em><strong>&nbsp;</strong></em><em><strong> до</strong></em><em><strong>&nbsp;</strong></em><em><strong> 1917 року</strong></em> <em><strong>та періоду з 1917 по 1991роки</strong></em><em>&raquo;</em>. За списком фондів з № 1 по &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;№ 2230 періоду до 1917 року є в наявності 670 фондів (номерів переданих - &nbsp;1297, приєднаних - 84, втрачених - 2, пропущених - 117), які містять інформацію щодо змісту 2269 описів справ&nbsp; за 1778-1917 рр. За списком фондів з № Р-1 по № Р-1000 періоду з 1917 по 1991 рр. до Бази даних внесена інформація щодо змісту 659 описів справ 430 фондів.</p>
                    <p>


                        <!--     <p><a class="btn btn-default" href="http://dako.gov.ua/catalog/login.php">Перейти в каталог &raquo;</a></p> -->
                </div>
                <div class="col-lg-4 ">
                    <h2>[Правила користування]</h2>

                    <p>Після того, як Ви відкрили головну сторінку -&nbsp; натисніть на <em><strong>&laquo;Розпочнемо&raquo;</strong></em> і перед Вами відкриється перша сторінка <strong>(Фонди) </strong>Бази даних оцифрованих описів справ, де Ви маєте можливість побачити загальну інформацію про фонди періоду до 1917 року та періоду з 1917 по 1991роки, які зберігаються у державному архіві, а саме: <em>№</em> <em>та</em> <em>назва фонду (представлена мовою оригіналу документа), кількість од.зб., кількість описів та крайні дати</em>.</p>
                    <p><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</em> <em>У кожній графі під вищезазначеними назвами є поле пошуку - Ви можете використовувати його для фільтрації результатів.&nbsp; Для цього, в потрібній графі, вводите пошукову інформацію і, при наявності, знайдена інформація з&rsquo;являється на екрані.</em></p>
                    <p>Після натиску на назву <strong>фонду</strong> для Вас відкривається друга сторінка &ndash; (<strong>Описи)</strong>,&nbsp;де розміщено інформацію про кожний опис окремо, а саме:</p>
                    <p><em>№ опису, анотація складу документів опису справ (оцифровані копії опису), кількість од.зб. та крайні дати</em></p>
                    <p>Здійснювати пошук необхідно аналогічно до першої сторінки.</p>
                    <p><em><strong>&nbsp;Оцифровані описи справ</strong></em> з&rsquo;являються на екрані після натискання на <em>назву опису.</em></p>


                    <!--   <p><a class="btn btn-default" href="http://dako.gov.ua/">Перейти к описям &raquo;</a></p> -->
                </div>
                <div class="col-lg-4 koss-red">
                    <h2>[Зручне доповнення]</h2>

                    <p>Після перегляду <strong>Бази даних</strong> оцифрованих описів справ та виявлення потрібної інформації, Ви маєте змогу замовити потрібну Вам справу за</p>
                    <p>№ фонду, № опису та № справи в читальному залі Державного архіву Київської області, який знаходиться за адресою: вул. Ю. Іллєнка, 38 м. Київ.</p>
                    <p><strong>До уваги</strong> - завдяки Базі даних оцифрованих описів справ, тепер Ви маєте можливість замовити потрібну Вам справу не відходячи від моніторів власних ПК. Потрібно лише зробити електронне замовлення за даною електронною адресою:&nbsp; <a href="mailto:chitzal@dako.gov.ua">chitzal@dako.gov.ua</a></p>

                    <!-- <p><a class="btn btn-default" href="http://dako.gov.ua/">Перейти к документам &raquo;</a></p> -->
                </div>
            </div>
            <div class="jumbotron">
                <p>
                    <b>Приємного та зручного користування!</b>
                </p>

            </div>

            <div class="row">
                <div class="col-lg-4">
                    <p><a class="btn btn-default" href="http://dako.gov.ua/">Перейти на сайт ДАКО &raquo;</a></p>
                </div>
                <div class="col-lg-4">
                    <p><a class="btn btn-default" href="http://catalog.dako.gov.ua/">Перейти на ДАКО.каталог &raquo;</a></p>
                </div>
                <div class="col-lg-4">
                    <p><a class="btn btn-default" href="/web/index.php?r=site/cfk">Перейти на ДАКО.e-архів &raquo;</a></p>
                </div>
            </div>


        </div>
        <div class="row">
            <p class="text-center">
                <b>Розмір бази даних:</b> <span id="bdsize"></span> килобайт
            </p>
        </div>
    </div>

<?php

$script = <<< JS

   $(function() {
	   console.log('ready');
     $.ajax({url: "http://catalog.dako.gov.ua/catalog/scripts/sizeopisi.php", success: function(result){
     $("#bdsize").html(result);
	  }});
     
     $('#kossbtn').on('click',function() {
         link = $("select[name=cat]").val();
         fondtext = $("select[name=cat] option:selected").text();
         //console.log('opt',opt);
         window.location = "/web/index.php?r=opisi/firstpage&nametable="+link+"&fondtext=" + fondtext;        
     })
     
});


(function() {

				[].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
				    // console.log('el', el);
					new CBPFWTabs( el );
				});

			})();
	

JS;
//маркер конца строки, обязательно сразу, без пробелов и табуляции
$this->registerJs($script, yii\web\View::POS_READY);


$script = <<< JS
    // $(document).ready(function () {
        
    $(".expandableCollapsibleDiv > img, .expandableCollapsibleDiv > h4").click(function (e) {
        console.log('click')
        var showElementDescription =
            $(this).parents(".expandableCollapsibleDiv").find("ul");

        if ($(showElementDescription).is(":visible")) {
            showElementDescription.hide("fast", "swing");
            $(this).attr("src", "images/icons8-arrow-100.png");
        } else {
            showElementDescription.show("fast", "swing");
            $(this).attr("src", "images/icons8-down-arrow-100.png");
        }
    });
// });

JS;
$this->registerJs($script, yii\web\View::POS_READY);

$css = <<< CSS
    .mainDiv {
    font-family: Verdana;
    font-size: 14px;
    padding-left: 20px;
    padding-right: 5px;
}
  
.expandableCollapsibleDiv img {
    width: 30px;
    cursor: pointer;
    margin-right: 10px;
    margin-top: 5px;
    padding-left: 10px;
    float: left;
}
  
.expandableCollapsibleDiv ul {
    border-bottom: 1px solid #000;
    clear: both;
    list-style: outside none none;
    margin: 0;
    padding-bottom: 10px;
    display: none;
}

.expandableCollapsibleDiv a {
    cursor: pointer;
}

.containeroblasti {
    max-width: 500px;
    margin: 20px auto 0 auto;
    background-color: #3a87ad;
    background-color: rgba(255,255,255,0.5);
    border: 7px solid #41ad3a;
    padding: 20px;
    border-radius: 10px;
}

CSS;

 $this->registerCss($css);



?>