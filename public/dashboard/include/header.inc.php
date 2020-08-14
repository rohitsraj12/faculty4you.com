<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
        crossorigin="anonymous"
     />
     <link rel="stylesheet" href="<?php base_url();?>css/dashboard.css">

      
</head>
<body>
        <div class="body-wrap">
            <div class="body-header" data-aos="zoom-out-down" data-aos-duration="1000">
              <header class="wrap-header">
                    <div class="header-brand">
                        <a href="<?php base_url();?>index.php">
                            <!-- <img src="<?php base_url();?>img/brand/header-logo.png" alt="faculty 4 you"> -->
                            faculty for you
                        </a>
                    </div>
                    <!-- end header brand -->
                    <nav class="header__nav">
                        <ul>
                            <li> 
                                <form action="POST" class="header-search">
                                    <div class="">
                                        
                                        <input type="search" placeholder="search" class="search__input">
                                        <a href="" class="header-search-btn" >
                                            <i class="fa fa-search pr-3" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </form>
                                
                            </li>
                            <li class="nav__list">
                                 <a href="#" class="nav__link">
                                    <i class="fa fa-bell nav__link-i" aria-hidden="true"></i>
                                </a>
                                <sub class="sub__nav" >
                                    <ul>
                                        <li class="sub__nav-list">sdcxc</li>
                                        <li class="sub__nav-list">werftgy</li>
                                    </ul>
                                </sub>
                            </li>
                           
                            <li class="nav__list">
                                <a href="#" class="nav__link">
                                   <img src="" class="profile__image" alt="">
                                </a>
                                <sub class="sub__nav">
                                    <ul>
                                        <li class="sub__nav-list"> <a class="sub__nav-link" href="">profile</a></li>
                                        <li class="sub__nav-list"> <a class="sub__nav-link" href="">update</a></li>
                                        <li class="sub__nav-list"> <a class="sub__nav-link" href="">logout</a></li>
                                    </ul>
                                </sub>
                            </li>

                        </ul>
                    </nav>
                    <!-- end header nav -->
                </header>
            </div>
            <!-- end body header -->
            <div class="body-container">
                <main class="body-container__main">

                    <div class="body-container-left">
                        <nav class="side-main__nav">
                            <ul>
                                <li class="side-nav__list"><a class="side-nav__link <?php if($active == "home"){ echo "active";}?>" href="<?php base_url();?>dashboard/"> dashboard </a></li>
                                <!-- <li class="side-nav__list"><a class="side-nav__link <?php if($active == "page content"){ echo "active";}?>" href="<?php base_url();?>dashboard/"> page content </a></li> -->
                                <li class="side-nav__list"><a class="side-nav__link <?php if($active == "teacher"){ echo "active";}?>" href="<?php base_url();?>dashboard/teacher/"> teachers </a></li>
                                <li class="side-nav__list"><a class="side-nav__link <?php if($active == "student"){ echo "active";}?>" href="<?php base_url();?>dashboard/student/"> students </a></li>
                            </ul>
                            <ul> 
                                <li class="side-nav__list">
                                    <a class="side-nav__link side-nav-toggle <?php if($active == "faq"){ echo "active";}?>" href="#" > FAQs <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <ul class="side-sub-nav">
                                        <li>
                                            <a class="side-sub-nav__link <?php if($active == "faq" && $sub == "faq_view"){ echo "active sub_active";}?>" href="<?php base_url();?>dashboard/faq/">view faqs</a> 
                                        </li>
                                        <li>
                                        <a class="side-sub-nav__link  <?php if($active == "faq" && $sub == "faq_compose"){ echo "active";}?>" href="<?php base_url();?>dashboard/faq/compose.php">compose new faq</a> 
                                        </li>
                                    </ul>
                                </li>
                                <li class="side-nav__list"><a class="side-nav__link <?php if($active == "testimonial"){ echo "active";}?>" href="<?php base_url();?>dashboard/testimonial/"> testimonial </a></li>
                            
                                <li class="side-nav__list"><a class="side-nav__link" href="<?php base_url();?>dashboard/testimonial/"> place </a></li>
                                <li class="side-nav__list"><a class="side-nav__link" href="<?php base_url();?>dashboard/testimonial/"> study </a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- end  left -->
                    