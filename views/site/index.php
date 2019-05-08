<?php

use yii\helpers\Html;



/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
    <div class="site-index">

        <div class="jumbotron">
            <h2>База даних оцифрованих описів справ Державного архіву Київської області періоду:</h2>





            <section id="container">
                <p>Оберіть період</p>

            <div class="row" >

                    <?php
                        echo Html::dropDownList('cat',null, array('firstpage'=>'До 1917', 'radfirstpage'=>'1917 - 1991'),
                        array('empty'=>'Select Category', 'class' => 'form-control form-control-lg'));
                    ?>


            </div>
            <br>

                    <p><a id="kossbtn" class="btn btn-lg btn-success" >Розпочнемо!</a></p>

            </section>
        </div>



        <div class="body-content">
            <p class="lead">Інструкція для користування Базою даних
                оцифрованих описів справ
            </p>
            <div class="row">
                <div class="col-lg-4 koss-blue">
                    <h2>[Загальні відомості]</h2>


                    <p><strong>Шановні користувачі</strong>, до Вашої уваги пропонується <strong><em>&laquo;База даних оцифрованих описів справ Державного архіву Київської області періоду&nbsp; до&nbsp; 1917 року</em></strong><em>&raquo;, </em>яка містить інформацію щодо змісту 2269 описів справ&nbsp; за 1778-1917 рр. За списком фондів з № 1 по № 2230 періоду до 1917 року є в наявності 670 фондів (номерів переданих 1297,приєднаних 84, втрачених 2, пропущених 117)<p>


                        <!--     <p><a class="btn btn-default" href="http://dako.gov.ua/catalog/login.php">Перейти в каталог &raquo;</a></p> -->
                </div>
                <div class="col-lg-4 ">
                    <h2>[Правила користування]</h2>

                    <p>Після того, як Ви відкрили головну сторінку -&nbsp; натисніть на <strong><em>&laquo;Розпочнемо&raquo;</em></strong> і перед Вами відкриється перша сторінка <strong>(Фонди) </strong>Бази даних оцифрованих описів справ, де Ви маєте можливість побачити загальну інформацію про фонди періоду до 1917 року, які зберігаються у державному архіві, а саме: <em>№</em> <em>та</em> <em>назва фонду </em><em>(представлена мовою оригіналу документа</em><em>), кількість од.зб, кількість описів та крайні дати</em>.</p>
                    <p><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; У кожній графі під вищезазначеними назвами є поле пошуку - Ви можете використовувати його для фільтрації результатів.&nbsp; Для цього, в потрібній графі, вводите пошукову інформацію і, при наявності, знайдена інформація з</em><em>&rsquo;</em><em>являється на екрані.</em></p>
                    <p>Після натиску на назву <strong>фонду</strong> для Вас відкривається друга сторінка &ndash; (<strong>Описи)</strong>,&nbsp; де розміщено інформацію про кожний опис окремо, а саме:</p>
                    <p><em>№ опису, анотація складу документів опису справ (оцифровані копії опису), кількість од.зб. та крайні дати</em></p>
                    <p>Здійснювати пошук необхідно аналогічно до першої сторінки.</p>
                    <p><strong><em>&nbsp;Оцифровані описи справ</em></strong> з&rsquo;являються на екрані після натискання на <em>назву опису.</em></p>


                    <!--   <p><a class="btn btn-default" href="http://dako.gov.ua/">Перейти к описям &raquo;</a></p> -->
                </div>
                <div class="col-lg-4 koss-red">
                    <h2>[Зручне доповнення]</h2>

                    <p>Після перегляду <strong>Бази даних</strong> оцифрованих описів справ та виявлення потрібної інформації, Ви маєте змогу замовити потрібну Вам справу за</p>
                    <p>№ фонду, № опису та № справи в читальному залі Державного архіву Київської області, який знаходиться за адресою: вул. Мельникова, 38 м. Київ.</p>
                    <p><strong>До уваги</strong> - завдяки Базі даних оцифрованих описів справ, тепер Ви маєте можливість замовити потрібну Вам справу не відходячи від моніторів власних ПК. Потрібно лише зробити електронне замовлення за даною електронною адресою:&nbsp; <strong>chitzal</strong><strong>@</strong><strong>dako</strong><strong>.</strong><strong>gov</strong><strong>.</strong><strong>ua</strong></p>

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
         console.log('link',link);
         window.location = "/web/index.php?r=opisi/firstpage&nametable="+link;        
     })
     
});

JS;
//маркер конца строки, обязательно сразу, без пробелов и табуляции
$this->registerJs($script, yii\web\View::POS_READY);

?>