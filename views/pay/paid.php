

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

                <li><a href="">Увійти в кабінет</a></li>
<!--                <li><a href="">Зареєструватись</a></li>-->
            </ul>
        </nav>

        <nav id="nav-wrap">

            <a class="menu-btn" href="#nav-wrap" title="Show navigation">Show navigation</a>
            <a class="menu-btn" href="#" title="Hide navigation">Hide navigation</a>

            <ul id="nav" class="nav">
                <li class="current"><a class="smoothscroll" href="#home">Home</a></li>
                <li><a class="smoothscroll" href="#about">About</a></li>
                <li><a class="smoothscroll" href="#location">Location</a></li>
            </ul> <!-- end #nav -->

        </nav> <!-- end #nav-wrap -->
        </div>
    </header> <!-- Header End -->

    <div  id="main" class="row">

        <div class="twelve columns koss">

            <h1>Ми вже працюємо над Вашим замовленням, <?= $clientmodel->name ?>. </h1>

            <p>Номер замовлення <?= $clientmodel->order_dako ?>, з Вами зв"яжуться за телефоном <?= $clientmodel->phone ?> або через е-мейл <?=$clientmodel -> email ?>.</p>
            <p>Якщо Ви вже зареєстровані, то натисніть Увійти щоб попасти в кабінет користувача</p>

            <h5>Нам потрібен час для виконання замовлення</h5>

            <div id="counter" class="cf">
                <span>134 <em>дні</em></span>
                <span>12 <em>години</em></span>
                <span>50 <em>хвилини</em></span>
                <span>33 <em>секунди</em></span>
            </div>

            <!-- Begin MailChimp Signup Form -->
            <div id="mc_embed_signup">
                <form action="#" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>

                    <input type="email" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required value="<?= $clientmodel->email ?>">

                    <input type="password" name="password" class="email" id="mce-Password" placeholder="password" required value="">

                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;"><input type="text" name="b_cdb7b577e41181934ed6a6a44_e65110b38d" value=""></div>

                    <!-- <div class="clear"> --><input type="submit" value="Зареєструватись" name="subscribe" id="mc-embedded-subscribe" class="button"><!-- </div> -->

                </form>
            </div>
<hr>
            <p><a id="kossbtn" class="btn btn-lg btn-red">Закрити</a></p>

<!--            <ul class="social">-->
<!--                <li><a href="#"><i class="fa fa-facebook"></i></a></li>-->
<!--                <li><a href="#"><i class="fa fa-twitter"></i></a></li>-->
<!--                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>-->
<!--                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>-->
<!--                <li><a href="#"><i class="fa fa-instagram"></i></a></li>-->
<!--                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>-->
<!--                <li><a href="#"><i class="fa fa-skype"></i></a></li>-->
<!--            </ul>-->

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

    <div class="row section-content">

        <div class="six columns">
            <h3>Our Process.</h3>

            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,
                eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
            </p>
        </div>

        <div class="six columns">
            <h3>Our Approach.</h3>

            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,
                eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
            </p>
        </div>

    </div> <!-- end section-content -->

    <div class="row section-content">

        <div class="six columns">
            <h3>Our Vision.</h3>

            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,
                eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
            </p>
        </div>

        <div class="six columns">
            <h3>Our Objective.</h3>

            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,
                eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
            </p>
        </div>

    </div> <!-- end section-content -->



</section> <!-- About Section End-->


<!-- Location Section
================================================== -->
<section id="location">

    <div class="contacts">

        <div class="row contact-details">

            <div class="columns">

                <h3><i class="fa fa-home"></i>Address.</h3>
                <p>5th Avenue, Fort Bonifacio<br>
                    Taguig, Metro Manila <br>
                    Philippines
                </p>

            </div>

            <div class="columns">

                <h3><i class="fa fa-phone"></i>Phone Numbers.</h3>
                <p>Phone: (000) 777 1515<br>
                    Mobile: (000) 777 0100<br>
                    Fax: (000) 777 0101
                </p>

            </div>

            <div class="columns end">

                <h3><i class="fa fa-envelope"></i>Emails.</h3>
                <p>johndoe@zoon.com<br>
                    janedoe@zoon.com <br>
                    juandelacruz@zoon.com
                </p>

            </div>

        </div> <!-- end contact-details -->

    </div> <!-- end contacts -->



</section> <!-- end location section -->

<!-- footer
================================================== -->
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

