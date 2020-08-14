<?php 
    require("../../private/config/config.php");
    require("../../private/config/db_connect.php");
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
              <header class="wrap-container">
                    <div class="header-brand">
                        <a href="<?php base_url();?>index.php">
                            <!-- <img src="<?php base_url();?>img/brand/header-logo.png" alt="faculty 4 you"> -->
                            facultyforyou admin
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
                                <li class="side-nav__list"><a class="side-nav__link" href=""> dashboard </a></li>
                                <li class="side-nav__list"><a class="side-nav__link" href=""> page content </a></li>
                                <li class="side-nav__list"><a class="side-nav__link" href=""> teachers </a></li>
                                <li class="side-nav__list"><a class="side-nav__link" href=""> students </a></li>
                                <li class="side-nav__list"><a class="side-nav__link" href=""> testimonial </a></li>
                            </ul>
                            <ul>
                                <li class="side-nav__list"><a class="side-nav__link" href=""> place </a></li>
                                <li class="side-nav__list"><a class="side-nav__link" href=""> study </a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- end  left -->
