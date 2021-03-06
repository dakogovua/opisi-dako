<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;



    use app\assets\CabinetAsset;
    CabinetAsset::register($this);

    ?>

<div id="preloader">
    <div id="status">
        <img src="pay/images/preloader.gif" height="64" width="64" alt="">
    </div>
</div>

<!-- Intro Section
================================================== -->
<section id="intro">

    <header >
        <div class="row">

        <nav class="container">
            <div id="logo">

                <a class="logo" href="">
                    <span>Д</span>
                    <span>А</span>
                    <span>К</span>
                    <span>O</span>
                </a>

                <h5 class="service">сервіс</h5>
            </div>
                <div class="nav-toggle"><span></span></div>
            <ul id="menu">

                <li><a href="">ВИйти</a></li>
<!--                <li><a href="">Зареєструватись</a></li>-->
            </ul>
        </nav>


        </div>
    </header> <!-- Header End -->
<div class="alertflash">
    <?php if( Yii::$app->session->hasFlash('success') ): ?>

            <div class="alert alert-success alert-dismissible" role="alert">

                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo Yii::$app->session->getFlash('success'); ?>
            </div>

    <?php endif;?>

    <?php if( Yii::$app->session->hasFlash('warning') ): ?>

        <div class="alert alert-warning alert-dismissible" role="alert">

            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('warning'); ?>
        </div>

    <?php endif;?>

</div>
    <div  id="main" class="row">

        <div class="twelve columns koss reg">

            <ul class="nav nav-tabs">
                <li class="active">
                    <a data-toggle="tab" href="#description">Login</a>
                </li>
                <li>
                    <a data-toggle="tab" href="#characteristics">Register</a>
                </li>
                <li>
                    <a data-toggle="tab" href="#opinion">Правила</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="description">
                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'layout' => 'horizontal',
                        'fieldConfig' => [
                            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                            'labelOptions' => ['class' => 'col-lg-1 control-label'],
                        ],
                    ]); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <?//= $form->field($model, 'rememberMe')->checkbox([
                     //   'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                   // ]) ?>

                    <div class="form-group">
                        <div class="col-lg-offset-1 col-lg-11">
                            <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
                <div class="tab-pane" id="characteristics">
                    Для реєстрації заповніть форму та підтвердіть е-мейл
                </div>
                <div class="tab-pane" id="opinion">
                    Як користуватись кабінетом користувача ДАКО.сервіс


                </div>
            </div>




        </div>

    </div> <!-- main end -->

</section> <!-- end intro section -->


<!-- About Section
================================================== -->
<section id="about">

    <div class="row section-header">

        <div class="twelve columns">

            <div class="icon-wrap">
                <i class="fa fa-group"></i>
            </div>

            <h1>Про реєстрацію.</h1>

            <p class="lead">
                Реєстрація в системі ДАКО.сервіс дає користувачу можливість доступу до поточних заказів у режимі реального часу за допомогою мережі
                Internet.
            </p>

        </div>

    </div> <!-- end section-header -->




</section> <!-- About Section End-->

<footer>

    <div class="row">

        <div class="twelve columns">

            <ul class="copyright">
                <li>&copy; Copyright 2020 - <?= date("Y") ?> ДАКО</li>
                <li>Developed by Konstantinov</li>
            </ul>

        </div>

    </div>

    <div id="go-top"><a class="smoothscroll" title="Back to Top" href="#intro"><i class="icon-up-open"></i></a></div>

</footer> <!-- Footer End-->

<!-- Java Script
================================================== -->
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
<!--<script>window.jQuery || document.write('<script src="pay/js/jquery-1.10.2.min.js"><\/script>')</script>-->
<!--<script type="text/javascript" src="pay/js/jquery-migrate-1.2.1.min.js"></script>-->

<!--<script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>-->

