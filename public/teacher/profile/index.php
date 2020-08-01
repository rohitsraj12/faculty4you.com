<?php
    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: ../login.php');
    } 

    $page_title = "profile view";

    require_once("../../../private/config/db_connect.php");
    require("../../../private/config/config.php");
    require("../include/header.inc.php");
    
?>


                
<div class="header__profile u-right-text text-sub-primary">
        <i class="fa fa-user" aria-hidden="true"></i>                        
        <?php 
        
        $sql = "SELECT *  FROM teachers WHERE teacher_user_name = '$teacher_name'";
        $result = mysqli_query($conn, $sql);
            echo $row['teacher_user_name'];
        ?>
    </div>
<?php 
        include_once'../include/banner.inc.php';

?>
<div class="body-container">
                
    <div class="header__profile u-right-text text-sub-primary">
        <i class="fa fa-user" aria-hidden="true"></i>                        
        <?php 
            echo $row['teacher_user_name'];
        ?>
    </div>

    <main class="wrap-container profile">
        <section class="section-profile">
            <div class="section-header u-center-text"  data-aos="zoom-out-up" data-aos-duration="1000">
                <heeader class="text-primary-h"> 
                    my profile
                </header>
                
            </div>
            <div class="section-body row">
                <section class="col-md-4">
                    <article class="article-profil" data-aos="zoom-out-up" data-aos-duration="1000">
                        <figure class="text-center">
                            <img src="<?php base_url()?>img/teacher/profile_pic/rohit.jpg" alt="">
                        </figure>
                        <header class=" u-center-text">
                            <h1 class="text-dark py-5">
                            <?php 
                                echo $row['teacher_first_name'];
                            ?>
                            </h1>
                        </header>
                        <footer class="px-5">
                            <ul>
                                <li class="text-dark h4 py-1 font-weight-normal">
                                <i class="h2 fa fa-mobile pr-3" aria-hidden="true"></i>
                                
                            <?php 
                                echo $row['teacher_email'];
                            ?>
                                </li>
                                <li  class="text-dark h4 pb-4 font-weight-normal">
                                <i class="h2 fa fa-mobile  pr-3" aria-hidden="true"></i>
                            <?php 
                                echo $row['teacher_phone']; 
                            ?>9999999999
                                </li>

                                <li class="text-center">
                                    <a href="<?php base_url()?>teacher/profile/profile_update.php" class="w-100 h4 button-primary">edit profile</a>
                                </li>
                            </ul>
                        </footer>
                    </article>
                </section>
                <section class="col-md-8">
                    <article class="article-profil " data-aos="zoom-out-up" data-aos-duration="1000">
                        <header class="p-4 h3 bg-dark text-light m-0">
                            About me
                        </header>
                        <div class="article-body p-4 text-dark  border">
                        <p>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus, ipsa!
                        </p>
                        </div>
                    </article>
                    <article class="article-profil py-5" data-aos="zoom-out-up" data-aos-duration="1000">
                        <header class="p-4 h3 bg-dark text-light  m-0">
                            Personal detail
                        </header>
                        <div class="article-body p-4 bg-light border">
                            <div class="article-info">
                                <ul class="row">
                                    <li class="col-sm-2">name</li>
                                    <li class="col-sm-10 h4 font-weight-normal">
                                        <?php 
                                            echo $row['teacher_first_name'] . " " . $row['teacher_last_name'];
                                        ?>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="article-info">
                                <ul>
                                    <li>phone</li>
                                    <li></li>
                                </ul>
                            </div>
                            
                            <div class="article-info">
                                <ul class="row">
                                    <li class="col-sm-2">email</li>
                                    <li class="col-sm-10 h4 font-weight-normal">
                                        <?php 
                                            echo $row['teacher_email'];
                                        ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="article-info">
                                <ul class="row">
                                    <li class="col-sm-2">address</li>
                                    <li class="col-sm-10 h4 font-weight-normal"><?php echo $row['city_name'];?>, <?php echo $row['state_name'];?></li>
                                </ul>
                            </div>
                        </div>
                    </article>
                    <article class="article-profil" data-aos="zoom-out-up" data-aos-duration="1000">
                        <header class="p-4 h3 bg-dark text-light  m-0">
                            Professional detail
                        </header>
                        <div class="article-body p-4 border">
                        
                            <div class="article-info">
                                <ul class="row">
                                    <li class="col-sm-4">experience</li>
                                    <li></li>
                                </ul>
                            </div>
                            
                            <div class="article-info">
                                <ul class="row">
                                    <li class="col-sm-4">tuition type</li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>
                            </div>
                            
                            <div class="article-info">
                                <ul>
                                    <li>subject</li>
                                    <li></li>
                                </ul>
                            </div>
                        </div>
                    </article>
                </section>
            <?php 
                
            ?>
            </div>
        </section>
    </main>
</div>
<?php
    require("../include/footer.inc.php");
?>