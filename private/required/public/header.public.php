
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= $page_title;?> | faculty4you.com</title>
        <!-- meta for facebook -->
        <meta property="og:url"           content="<?php base_url()?>" />
        <meta property="og:type"          content="website" />
        <meta property="og:title"         content="<?= $page_title;?> | faculty4you.com" />
        <meta property="og:description"   content="We provide top tutors for academic/non-academic and online/offline activities. Faculty for you is the best platform which helps you in reaching your destination." />
        <meta property="og:image"         content="<?php base_url()?>img/brand/faculty_for_you_brand.png" />

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- stylesheet -->
        <link rel="icon" href="<?php base_url();?>img/brand/factulyforyou_fevicon.png" type="image/gif" sizes="32x32">
        <link
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
        crossorigin="anonymous"
        />
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/owl.theme.default.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <div class="body-wrap">
            <div class="body-header">
                <div id="hamberger" class="hamberger">
                    <span class="hamberger__line"></span>
                    <span class="hamberger__line"></span>
                    <span class="hamberger__line"></span>
                </div>
                <!-- end hamberger -->
                <header class="header-main">
                
                    <div class="header-brand-section">
                    <div class="header-top">
                        <div class="wrap-container">

                            <ul>
                            <li class="social__list pt-2">Share:</li>

                                    <?php
                                    foreach($social_media_share as $share_name => $share_url){
                                    ?>
                                    <li class="social__list"><a class="social__link" href="<?php echo $share_url ;?>" target="_blank"><img src="<?php echo base_url() . 'img/social_media/' . $share_name ;?>" alt="<?php echo $share_name ?>"></a></li>
                                    <?php
                                    }
                                    ?>
                            </ul>
                        </div>
                    </div>
                    <div class="wrap-container">
                        <div class="header-brand">
                            <a href="<?php base_url();?>index.php">
                                <img src="<?php base_url();?>img/brand/faculty_for_you_brand.png" alt="faculty 4 you">
                            </a>
                        </div>
                        <!-- end header brand -->
                        <div class="header-right">
                        <div id="fb-root"></div>
                        
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

                        <div class="fb-share-button" 
data-href="<?php base_url();?>" 
data-layout="button_count">dsadasd
</div>
                        </div>
                    </div>
                    </div>                 
                    <div  class="header__nav">
                        <div class="wrap-container">
                            <nav>
                                <ul>
                                    <li class="nav__list"><a href="<?php base_url();?>" class="nav__link nav-active">Home</a></li>
                                    <li class="nav__list"><a href="<?php base_url();?>teacher/registration.php" class="nav__link">Tutor registration</a></li>
                                    <li class="nav__list"><a href="<?php base_url();?>teacher/login.php" class="nav__link">Tutor login</a></li>
                                    <li class="nav__list"><a href="<?php base_url();?>student/registration.php" class="nav__link">Student registration</a></li>
                                    <li class="nav__list"><a href="<?php base_url();?>student/login.php" class="nav__link">Student login</a></li>
                                </ul>
                            </nav>
                            
                            <div class="nav-social-media">
                                    <ul>
                                        <li class="nav-social__list text-light">Follow us: </li>
                                    <?php
                                    foreach($social_media_follow as $follow_name => $follow_url){
                                    ?>
                                    <li class="nav-social__list"><a class="nav-social__link" href="<?php echo $follow_url ;?>" target="_blank"><img src="<?php echo base_url() . 'img/social_media/' . $follow_name ;?>" alt="<?php echo $follow_name ?>"></a></li>
                                    <?php
                                    }
                                    ?>
                                    </ul>
                                </div>
                             </div>
                    </div>
                   
                    <!-- end header nav -->
                </header>
                
            </div>
            <!-- end body header -->