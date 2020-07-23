<?php
    $page_title = "home page";
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= $page_title;?> | faculty4you.com</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- stylesheet -->
        <link
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
        crossorigin="anonymous"
        />
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <div class="body-wrap">
            <div class="body-header">
                <div class="hamberger" id="hamberger">
                    
                </div>
                <!-- end hamberger -->
                <header class="wrap-container">
                    <div class="header-brand">
                        <a href="index.php">
                            <img src="img/brand/header-logo.png" alt="">
                        </a>
                    </div>
                    <!-- end header brand -->
                    <nav class="header__nav">
                        <ul>
                            <li class="nav__list"><a href="" class="nav__link">become teacher</a></li>
                            <li class="nav__list"><a href="" class="nav__link">log in</a></li>
                            <li class="nav__list"><a href="" class="nav__link button-primary">sign up</a></li>
                        </ul>
                    </nav>
                    <!-- end header nav -->
                </header>
            </div>
            <!-- end body header -->

            <div class="body-banner">

                <div class="banner-wrap">
                    <section class="banner-content">
                        <article>
                            <header class="banner-content__header">
                                <h2 class="text-primary">Faculty4you take learning  to new heights</h2>
                                <h5 class="text-secondary">
                                    we provide top <strong>teachers</strong> for <strong class="highlight-primary">online</strong> and <strong class="highlight-primary">home tution</strong> all over india    
                                </h5>
                            </header>
                            <div class="banner-content-body">
                                <form action="student/login.php" class="banner__form">
                                    <input type="search" placeholder="search top teachers city / subject / category" class="banner-search" name="search">
                                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </div>
                        </article>
                    </section>
                    <!-- end banner content -->
                    <div class="banner-image">
                        <img src="img/banner/teacher.svg" class="banner__image" alt="">
                    </div>
                    <!-- end banner imager -->
                </div>
                <!-- end banner wrap -->
            </div>
            <!-- end body banner -->

            <div class="body-container">
                <main class="page-home">
                    <section class="section-student">
                        
                    </section>
                    <section class="section-teacher"></section>
                    <section class="section-testimonial"></section>
                    <section class="section-partner"></section>
                </main>
                <!-- end page home -->
            </div>
            <!-- end body container -->

            <div class="body-footer"></div>
            <!-- end body footer -->
        </div>
            <!-- end body wrap -->

            <!-- script -->
        <script src="" async defer></script>
    </body>
</html>