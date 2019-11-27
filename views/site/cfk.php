<?php

use yii\helpers\Html;



/* @var $this yii\web\View */


?>
    <div class="site-index">

        <div class="jumbotron">
            <h2 class="koss-red">Шановні користувачі!</h2>
            <p>Державний архів Київської області представляє новий проект Е-Архів,
                який покликаний забезпечити відкритий доступ до цифрових копій документів, які зберігаються в його фондах.
            </p>





            <section id="container" class="cfk-container">
                <p>Оберіть період</p>

                <div class="row" >

                    <?php
                    /* echo Html::dropDownList('cat',null,
                        array('firstpage'=>'До 1917', 'radfirstpage'=>'1917 - 1991'),
                        array('empty'=>'Select Category', 'class' => 'form-control form-control-lg')
                    ); */

                    $items = [
                        'firstpage' => 'До 1917',
                        'radfirstpage' => '1917 - 1991',

                    ];
                    $params = [
                        'prompt' => '- Сделайте выбор -',
                        'class' => 'form-control form-control-lg',
                        'options' => [
                            'firstpage' => [
                                'Selected' => true,
                                'data-cfk' => 'cfk',
                            ],
                            'radfirstpage' => [
                                'data-cfk' => 'cfk',
                            ],

                        ],
                    ];

                    echo Html::dropDownList('cat', '10', $items, $params);

                    ?>


                </div>
                <br>

                <p><a id="kossbtn" class="btn btn-lg btn-success" >До ЦФК!</a></p>

            </section>
        </div>



        <div class="body-content">
            <p class="lead">Інструкція для користування Цифровим фондом користування оцифрованих описів справ
            </p>
            <div class="row">
                <div class="col-lg-4 koss-blue">
                    <h2>[Загальні відомості]</h2>


                    <p>
                        Представлені цифрові копії зроблені з оригіналів документів виключно технічними засобами Державного архіву Київської області і є частиною Цифрового фонду користування (ЦФК) державного архіву. В нижній частині кожного файлу документа розміщені додаткові данні: назва державного архіву та № фонду. Цифрові копій документів зроблені в форматі jpg.
                    </p>
                    <p>


                        <!--     <p><a class="btn btn-default" href="http://dako.gov.ua/catalog/login.php">Перейти в каталог &raquo;</a></p> -->
                </div>
                <div class="col-lg-4 ">
                    <h2>[Правила користування]</h2>

                    <p>
                        Після того, як Ви відкрили головну сторінку,  натисніть на Розпочнемо і перед Вами відкриється перша сторінка Фонди, де Ви маєте можливість побачити загальну інформацію про фонди, на документи яких зроблені цифрові копії, а саме: № та назва фонду (представлена мовою оригіналу документа)
                    </p>
                    <p>
                        Після натиску на назву фонду для Вас відкривається друга сторінка – Описи, де розміщено інформацію про цей опис, а саме: № опису, анотація складу документів опису справ, кількість одиниць зберігання, крайні дати, кількість цифрових копій
                    </p>
                    <p>
                        Після натиску на ЦФК з’явиться таблиця з заголовками справ, цифрові копії яких представлені в Е-Архіві.
                    </p>
                    <p>
                        Цифрові копії справ з’являються на екрані після натискання на заголовок справи.
                    </p>


                    <!--   <p><a class="btn btn-default" href="http://dako.gov.ua/">Перейти к описям &raquo;</a></p> -->
                </div>
                <div class="col-lg-4 koss-red">
                    <h2>[Зручне доповнення]</h2>

                    <p>
                        Державний архів Київської області продовжує працювати  над поповненням Е-Архіва і планує постійне обновлення цієї рубрики.
                    </p>



                    <!-- <p><a class="btn btn-default" href="http://dako.gov.ua/">Перейти к документам &raquo;</a></p> -->
                </div>
            </div>
            <div class="jumbotron">
                <p>
                    <b>Читайте та досліджуйте!</b>
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
                    <p><a class="btn btn-default" href="http://old.dako.gov.ua/">Перейти на старий сайт &raquo;</a></p>
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
         //cfk = $("select[name=cat] option:selected").data('cfk');
         //console.log('cfk', cfk);
         fondtext = $("select[name=cat] option:selected").text();
         //console.log('opt',opt);
         window.location = "/web/index.php?r=opisi/firstpage&nametable="+link+"&fondtext=" + fondtext+"&cfk=true";        
     })
     
});

JS;
//маркер конца строки, обязательно сразу, без пробелов и табуляции
$this->registerJs($script, yii\web\View::POS_READY);

?>