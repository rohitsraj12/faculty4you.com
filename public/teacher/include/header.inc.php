<?php 

    $teacher_name = $_SESSION['user_name'];
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
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php base_url();?>css/owl.carousel.css">
        <link rel="stylesheet" href="<?php base_url();?>css/owl.theme.default.css">
        <link rel="stylesheet" href="<?php base_url();?>css/style.css">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <div class="body-wrap">
            <div class="body-header" >
                <div id="hamberger" class="hamberger">
                    <span class="hamberger__line"></span>
                    <span class="hamberger__line"></span>
                    <span class="hamberger__line"></span>
                </div>
                <!-- end hamberger -->
               
                <header>
                    <div class="header-brand-section">
                        <div class="header-top">
                        <ul class="wrap-container">
                                <?php
                                    foreach($social_media as $name => $url){
                                ?>
                                <li class="social__list"><a class="social__link" href="<?php echo $url ;?>" target="_blank"><?php echo $name;?></a></li>
                                <?php
                                }
                                ?>  
                                    <li class="header-profile">
                                    <i class="fa fa-user" aria-hidden="true"></i>                        
                                    <?php 
                                        echo $teacher_name;
                                    ?>
                                    </li>
                                </ul>
                        </div>
                        <div class="wrap-container">
                            <div class="header-brand">
                                <a href="<?php base_url();?>teacher/index.php">
                                    <img src="<?php base_url();?>img/brand/header-logo.png" alt="faculty 4 you">
                                </a>
                            </div>
                            <!-- end header brand -->
                            <div class="header-right">
                                
                            </div>
                        </div>
                    </div>
                  
                    <div class="header__nav">
                        <nav class="wrap-container">
                            <ul>
                                <li class="nav__list"><a href="<?php base_url();?>teacher/index.php" class="nav__link nav-active">Home</a></li>
                                <li class="nav__list"><a href="<?php base_url();?>teacher/profile/index.php" class="nav__link">Profile</a></li>
                                <li class="nav__list"><a href="<?php base_url();?>logout.php" class="nav__link">Logout</a></li>
                            </ul>
                        </nav>
                    </div>
                   
                    <!-- end header nav -->
                </header>
              
            </div>
            <!-- end body header -->