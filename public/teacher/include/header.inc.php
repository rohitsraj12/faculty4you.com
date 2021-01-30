<?php 

    // $teacher_name = $_SESSION['user_name'];

    
    $user_name = $_SESSION['user_name'];
    $user_query = "SELECT teachers.*, cities.* 
        FROM teachers 
        JOIN cities
            ON cities.city_id = teachers.city_id
        WHERE teacher_user_name = '$user_name'";
    $user_result = mysqli_query($conn, $user_query);
    $user_row = mysqli_fetch_assoc($user_result);

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= $page_title;?> | faculty4you.com | Academic - Non academic | Online - Offline Training</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
        <!-- stylesheet -->
        <link rel="icon" href="<?php base_url();?>img/brand/factulyforyou_fevicon.png" type="image/gif" sizes="32x32">
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                            <div class="wrap-container">
                                <ul class="">
                                
                                <li class="social__list pt-2">Share: </li>
                                    <?php
                                        foreach($social_media_share as $share_name => $share_url){
                                    ?>
                                    <li class="social__list"><a class="social__link" href="<?php echo $share_url ;?>" target="_blank"><img src="<?php echo base_url() . 'img/social_media/' . $share_name ;?>" alt="<?php echo $share_name ?>"></a></li>
                                    <?php
                                    }
                                    ?>  
                                        <li class="header-profile" title="user name">
                                        <i class="fa fa-user" aria-hidden="true"></i>                        
                                        <?php    
                                            echo $user_name;
                                        ?>
                                        </li>
                                </ul>
                            </div>
                        </div>
                        <div class="main__header">
                            <div class="wrap-container">
                                <div class="header-brand">  
                                    <a href="<?php base_url();?>teacher/index.php">
                                        <img src="<?php base_url();?>img/brand/faculty_for_you_brand.png" alt="faculty for you">
                                    </a>
                                </div>
                                <!-- end header brand -->
                            
                                <div class="section__header-search">
                                    <?php
                                        if(!empty($teacher_name)){
                                        $member_query = "SELECT * FROM memberships WHERE teacher_id = $teacher_id";
                                        $member_result = mysqli_query($conn, $member_query);
                                        $mem_row = mysqli_fetch_assoc($member_result);
                                        $token = $mem_row['member_token'];
                                            // echo $token;
                                        if($token > 0){
                                            if($page_title == "Profile view" || $page_title == "Profile update"){
                                                include('../include/search_engine.php');
                                            }else{
                                                include('include/search_engine.php');
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header__nav">
                        <div class="wrap-container">
                        <nav>
                            <ul>
                                <li class="nav__list"><a href="<?php base_url();?>teacher/index.php" class="nav__link <?php if($page_title == "Home page" || $page_title == "Membership plan" || $page_title == "Payment" || $page_title == "Student's post details"){ echo " nav-active";}?>">Home</a></li>
                                <li class="nav__list"><a href="<?php base_url();?>teacher/profile/index.php" class="nav__link <?php if($page_title == "Profile view" || $page_title == "Profile update"){ echo "nav-active";}?>">Profile</a></li>
                                <li class="nav__list"><a href="<?php base_url();?>teacher/membership_plan.php" class="nav__link <?php if($page_title == "Profile view" || $page_title == "Profile update"){ echo "nav-active" || $page_title == "membership plan" ;}?>">Become a member</a></li>
                                <li class="nav__list"><a href="<?php base_url();?>logout.php" class="nav__link">Logout</a></li>
                            
                  
                            </ul>
                        </nav>
                            <div class="nav-social-media">
                                <ul>
                                        <li class="nav-social__list text-light">Follow us : </li>
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