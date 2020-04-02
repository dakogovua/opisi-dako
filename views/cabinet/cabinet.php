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
</div>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Sidebar Nav</a>
        <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarCollapse"
                aria-controls="navbarCollapse"
                aria-expanded="false"
                aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto sidenav" id="navAccordion">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Item 1</a>
                </li>
                <li class="nav-item">
                    <a
                            class="nav-link nav-link-collapse"
                            href="#"
                            id="hasSubItems"
                            data-toggle="collapse"
                            data-target="#collapseSubItems2"
                            aria-controls="collapseSubItems2"
                            aria-expanded="false"
                    >Item 2</a>
                    <ul class="nav-second-level collapse" id="collapseSubItems2" data-parent="#navAccordion">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="nav-link-text">Item 2.1</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="nav-link-text">Item 2.2</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Item 3</a>
                </li>
                <li class="nav-item">
                    <a
                            class="nav-link nav-link-collapse"
                            href="#"
                            id="hasSubItems"
                            data-toggle="collapse"
                            data-target="#collapseSubItems4"
                            aria-controls="collapseSubItems4"
                            aria-expanded="false"
                    >Item 4</a>
                    <ul class="nav-second-level collapse" id="collapseSubItems4" data-parent="#navAccordion">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="nav-link-text">Item 4.1</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="nav-link-text">Item 4.2</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="nav-link-text">Item 4.2</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Item 5</a>
                </li>
            </ul>
            <form class="form-inline ml-auto mt-2 mt-md-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <main class="content-wrapper">
        <div class="container-fluid">
            <h1>Main Content</h1>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="text-center">
                <span>Coded by <a href="https://si-dev.com/ru">SI-Dev</a>, 2018</span>
            </div>
        </div>
    </footer>