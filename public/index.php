<?php
    $page_title = "home page";
    require_once("../private/config/db_connect.php")
    required("../private/config/config.php");
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
            <div class="body-header" data-aos="zoom-out-down" data-aos-duration="1000">
                <div id="hamberger" class="hamberger">
                    <span class="hamberger__line"></span>
                    <span class="hamberger__line"></span>
                    <span class="hamberger__line"></span>
                </div>
                <!-- end hamberger -->
                <header class="wrap-container">
                    <div class="header-brand">
                        <a href="<?php base_url();?>index.php">
                            <img src="<?php base_url();?>img/brand/header-logo.png" alt="faculty 4 you">
                        </a>
                    </div>
                    <!-- end header brand -->
                    <nav class="header__nav">
                        <ul>
                            <li class="nav__list"><a href="<?php base_url();?>" class="nav__link">become teacher</a></li>
                            <li class="nav__list"><a href="<?php base_url();?>" class="nav__link">log in</a></li>
                            <li class="nav__list"><a href="<?php base_url();?>" class="nav__link button-primary">sign up</a></li>
                        </ul>
                    </nav>
                    <!-- end header nav -->
                </header>
            </div>
            <!-- end body header -->

            <div class="body-banner" data-aos="zoom-out-up" data-aos-duration="1000">

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
                                <form action="<?php base_url();?>student/login.php" class="banner__form">
                                    <input type="search" placeholder="search top teachers city / subject / category" class="banner-search" name="search">
                                    <button class="banner__button" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                                <p>
                                    <span class="highlight-secondary">Current  trending courses:</span> <strong class="note-primary">IIT-JEE</strong>, <strong class="note-primary">NEET</strong>, <strong class="note-primary">Dance</strong>, <strong class="note-primary">Yoga</strong>
                                </p>
                            </div>
                        </article>
                    </section>
                    <!-- end banner content -->
                    <div class="banner-image">
                        <img src="<?php base_url();?>img/banner/teacher.svg" class="banner__image" alt="">
                    </div>
                    <!-- end banner imager -->
                </div>
                <!-- end banner wrap -->
            </div>
            <!-- end body banner -->

            <div class="body-container">
                <main class="page-home">
                    <section class="section-student">
                        <div class="section-header u-center-text"  data-aos="zoom-out-up" data-aos-duration="1000">
                            <heeader class="text-primary"> 
                                how <strong>faculty4you</strong> works for students
                            </header>
                            <div class="sub-heading wrap-container">
                                <h6 class="text-sub-primary">
                                    Join <strong>faculty4you.com</strong> and connect with top <strong>teachers</strong> on the platform. Create your profile post your requirements and learn <strong>online</strong>  or <strong>home tuition</strong>.
                                </h6>
                            </div>
                        </div>
                        <section class="section-body wrap-container">
                            <article class="article-block" data-aos="zoom-out-right" data-aos-duration="1000">
                                <figure class="studnet-section__figure">
                                    <span>step 1</span>
                                    <img src="<?php base_url();?>img/member/register.svg" alt="">

                                </figure>
                                <header class="article-header student-section__header">
                                    <h4 class="text-secondary">register</h4>
                                </header>
                                <div class="article-body student-body">
                                    <p>
                                        It will take you less than 1 minute to start you adventure with BuddySchool
                                    </p>
                                </div>
                            </article>
                            <article class="article-block" data-aos="zoom-out-up" data-aos-duration="1000">
                                <figure class="studnet-section__figure">
                                    <span>step 2</span>
                                    <img src="<?php base_url();?>img/member/post-requirement.svg" alt="">

                                </figure>
                                <header class="article-header student-section__header">
                                    <h4 class="text-secondary">Post your requirements</h4>
                                </header>
                                <div class="article-body student-body">
                                    <p>
                                        Post your requiriment of subject, teacher will contact you.
                                    </p>
                                </div>
                            </article>
                            <article class="article-block" data-aos="zoom-out-left" data-aos-duration="1000">
                                <figure class="studnet-section__figure">
                                <span>step 3</span>
                                    <img src="<?php base_url();?>img/member/schedule.svg" alt="">

                                </figure>
                                <header class="article-header student-section__header">
                                    <h4 class="text-secondary">Schedule lesson</h4>
                                </header>
                                <div class="article-body student-body">
                                    <p>
                                    confirem with teacher and start your learning with out teacher
                                    </p>
                                </div>
                            </article>
                        </section>
                    </section>
                    <section class="section-teacher">
                        
                        <div class="section-header u-center-text"  data-aos="zoom-out-up" data-aos-duration="1000">
                            <heeader class="text-primary"> 
                                Looking to become a <strong>trainer</strong>
                            </header>
                            <div class="sub-heading wrap-container">
                                <h6 class="text-sub-primary">
                                    Join <strong>faculty4you.com</strong> and connect with <strong>students</strong> on the platform. Create a strong profile and grow your network.
                                </h6>
                            </div>
                        </div>
                        <section class="section-body wrap-container">
                            <article class="article-block" data-aos="zoom-out-right" data-aos-duration="1000">
                                <figure class="studnet-section__figure">
                                    <img src="<?php base_url();?>img/member/register.svg" alt="">
                                    <span>step 1</span>
                                </figure>
                                <header class="article-header student-section__header">
                                    <h4 class="text-secondary">register</h4>
                                </header>
                                <div class="article-body student-body">
                                    <p>
                                    It will take you less than 1 minute to start you adventure with faculty4you
                                    </p>
                                </div>
                            </article>
                            <article class="article-block" data-aos="zoom-out-up" data-aos-duration="1000">
                                <figure class="studnet-section__figure">
                                    <img src="<?php base_url();?>img/member/member.svg" alt="">
                                    
                                    <span>step 2</span>
                                </figure>
                                <header class="article-header student-section__header">
                                    <h4 class="text-secondary">activate membership</h4>
                                </header>
                                <div class="article-body student-body">
                                    <p>
                                    You need to become prime memebt to see student requirement post
                                    </p>
                                </div>
                            </article>
                            <article class="article-block" data-aos="zoom-out-up" data-aos-duration="1000">
                                <figure class="studnet-section__figure">
                                    <img src="<?php base_url();?>img/member/find-student.svg" alt="">
                                    <span>step 3</span>
                                </figure>
                                <header class="article-header student-section__header">
                                    <h4 class="text-secondary">Find students</h4>
                                </header>
                                <div class="article-body student-body">
                                    <p>
                                    Once you become prime member search student and student’s post then conatc student
                                    </p>
                                </div>
                            </article>
                            <article class="article-block" data-aos="zoom-out-left" data-aos-duration="1000">
                                <figure class="studnet-section__figure">
                                    <img src="<?php base_url();?>img/member/schedule.svg" alt="">
                                    <span>step 4</span>

                                </figure>
                                <header class="article-header student-section__header">
                                    <h4 class="text-secondary">Schedule lesson</h4>
                                </header>
                                <div class="article-body student-body">
                                    <p>
                                    scedule your time and start your lesson
                                    </p>
                                </div>
                            </article>
                        </section>
                    </section>
                    <section class="section-testimonial">
                         
                    <div class="section-header u-center-text" data-aos="zoom-out-up" data-aos-duration="1000">
                            <heeader class="text-primary"> 
                                Student comumnity feed back
                            </header>
                        </div>
                        <blockquote class="section-body wrap-container owl-carousel owl-theme" data-aos="zoom-out-up" data-aos-duration="1000">
                            <article class="article-block">
                                <div class="testimonial-client-detail">
                                    <p>
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nam repellat rem aut fugiat aspernatur. Quia ipsa vel porro cum.
                                    </p>
                                </div>        
                                <footer class="article-footer">
                                    <figure>
                                        <img  class="testimonial-client-img" src="<?php base_url();?>" alt="">
                                    </figure>
                                    <ul>
                                        <li class="testimonial-client-name"><cite>name</cite></li>
                                        <li class="testimonial-client-place">mumbai</li>
                                    </ul>
                                </footer>
                            </article>
                            <article class="article-block">
                                <div class="testimonial-client-detail">
                                    <p>
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nam repellat rem aut fugiat aspernatur. Quia ipsa vel porro cum.
                                    </p>
                                </div>        
                                <footer class="article-footer">
                                    <figure>
                                        <img  class="testimonial-client-img" src="<?php base_url();?>" alt="">
                                    </figure>
                                    <ul>
                                        <li class="testimonial-client-name"><cite>name</cite></li>
                                        <li class="testimonial-client-place">mumbai</li>
                                    </ul>
                                </footer>
                            </article>
                            <article class="article-block">
                                <div class="testimonial-client-detail">
                                    <p>
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nam repellat rem aut fugiat aspernatur. Quia ipsa vel porro cum.
                                    </p>
                                </div>        
                                <footer class="article-footer">
                                    <figure>
                                        <img  class="testimonial-client-img" src="<?php base_url();?>" alt="">
                                    </figure>
                                    <ul>
                                        <li class="testimonial-client-name"><cite>name</cite></li>
                                        <li class="testimonial-client-place">mumbai</li>
                                    </ul>
                                </footer>
                            </article>
                        </blockquote>
                        
                        <!-- <div class="svg">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                <path fill="#0099ff" fill-opacity="1" d="M0,64L48,74.7C96,85,192,107,288,106.7C384,107,480,85,576,96C672,107,768,149,864,186.7C960,224,1056,256,1152,229.3C1248,203,1344,117,1392,74.7L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                            </svg>
                        </div> -->
                    </section>
                    <section class="section-partner">
                        
                        
                    <div class="section-header u-center-text" data-aos="zoom-out-up" data-aos-duration="1000">
                            <heeader class="text-primary"> 
                                Our pratners
                            </header>
                        </div>
                        
                        <section class="section-body wrap-container">
                            <article class="article-block" data-aos="zoom-out-right" data-aos-duration="1000"> 
                                <figure class="article-block__figure">
                                    
                                    <img src="<?php base_url();?>img/member/register.svg" alt="">

                                </figure>
                               
                            </article>
                            <article class="article-block" data-aos="zoom-out-up" data-aos-duration="1000">
                                <figure class="article-block__figure">
                                    
                                    <img src="<?php base_url();?>img/member/post-requirement.svg" alt="">

                                </figure>
                                
                            </article>
                            <article class="article-block" data-aos="zoom-out-left" data-aos-duration="1000">
                                <figure class="article-block__figure">
                              
                                    <img src="<?php base_url();?>img/member/schedule.svg" alt="">

                                </figure>
                               
                            </article>
                        </section>
                    </section>
                </main>
                <!-- end page home -->
            </div>
            <!-- end body container -->

            <div class="body-footer"></div>
            <!-- end body footer -->
        </div>
        <!-- end body wrap -->

        <!-- script -->
            <script src="<?php base_url();?>js/jquery-3.5.1.js"></script>
            <script src="<?php base_url();?>js/owl.carousel.js"></script>
            <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
            <script src="<?php base_url();?>js/script.js"></script>
            
            <script>
                AOS.init();
              </script>
    </body>
</html>