<?php

    require_once('../../private/config/db_connect.php');

    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: login.php');
    }

    $page_title = "profile";
    include_once("../../private/config/config.php");
        include_once'include/header.inc.php';
    while($row = mysqli_fetch_assoc($result)){
?>

                
<div class="header__profile u-right-text text-sub-primary">
    <i class="fa fa-user" aria-hidden="true"></i>                        
    <?php 
        echo $row['teacher_user_name'];
    ?>
</div>
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

            </div>

<?php 
    }
     require("include/footer.inc.php");    
?>