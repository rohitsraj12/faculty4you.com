<?php
    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: ../login.php');
    } 
    $page_title = "profile";
    $banner_image = "profile.svg";

    require_once("../../../private/config/db_connect.php");
    require("../../../private/config/config.php");
    require("../include/header.inc.php");
    require("../include/banner.inc.php");

?>
<div class="body-container">

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
                            <img src="<?php base_url()?>img/teacher/profile_pic/rohit.jpg" alt="<?php echo $row['student_first_name'];?>">
                        </figure>
                        <header class=" u-center-text">
                            <h1 class="text-dark py-5">
                            <?php 
                                echo $row['student_first_name'];
                            ?>
                            </h1>
                        </header>
                        <footer class="px-5">
                            <ul>
                                <li class="text-dark h4 py-1 font-weight-normal">
                                <i class="h2 fa fa-mobile pr-3" aria-hidden="true"></i>
                                
                            <?php 
                                echo $row['student_email'];
                            ?>
                                </li>
                                <li  class="text-dark h4 pb-4 font-weight-normal">
                                <i class="h2 fa fa-mobile  pr-3" aria-hidden="true"></i>
                            <?php 
                                echo $row['student_phone']; 
                            ?>
                                </li>

                                <li class="text-center">
                                    <a href="<?php base_url()?>student/profile/profile_update.php?id=<?php echo $row['student_id'];?>" class="w-100 h4 button-primary">edit profile</a>
                                </li>
                            </ul>
                        </footer>
                    </article>
                </section>
                <section class="col-md-8">
                    
                    <article class="article-profil py-5" data-aos="zoom-out-up" data-aos-duration="1000">
                        <header class="p-4 h3 bg-dark text-light  m-0">
                            Personal detail
                        </header>
                        <div class="article-body p-4 bg-light border">
                        
                        <div class="article-info">
                                <ul class="row">
                                    <li class="col-sm-2">user name</li>
                                    <li class="col-sm-10 h4 font-weight-normal">
                                        <?php 
                                            echo $row['student_user_name'];
                                        ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="article-info">
                                <ul class="row">
                                    <li class="col-sm-2">name</li>
                                    <li class="col-sm-10 h4 font-weight-normal">
                                        <?php 
                                            echo $row['student_first_name'] . " " . $row['student_last_name'];
                                        ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="article-info">
                                <ul class="row">
                                    <li class="col-sm-2">date of birth</li>
                                    <li class="col-sm-10 h4 font-weight-normal">
                                        <?php 
                                            echo $row['student_date_of_birth'];
                                        ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="article-info">
                                <ul class="row">
                                    <li class="col-sm-2">gender</li>
                                    <li class="col-sm-10 h4 font-weight-normal">
                                        <?php 
                                            // echo $row['student_first_name'];
                                            echo "female";
                                        ?>
                                    </li>
                                </ul>
                            </div>
                            
                                     </div>
                    </article>
                    <article class="article-profil" data-aos="zoom-out-up" data-aos-duration="1000">
                        <header class="p-4 h3 bg-dark text-light  m-0">
                            contact detail
                        </header>
                        <div class="article-body p-4 border">
                        <div class="article-info">
                                <ul class="row">
                                    <li class="col-sm-2">phone</li>
                                    <li class="col-sm-10  h4 font-weight-normal">
                                    <?php echo $row['student_phone']?>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="article-info">
                                <ul class="row">
                                    <li class="col-sm-2">email</li>
                                    <li class="col-sm-10 h4 font-weight-normal">
                                        <?php 
                                            echo $row['student_email'];
                                        ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="article-info">
                                <ul class="row">
                                    <li class="col-sm-2">parent name</li>
                                    <li class="col-sm-10 h4 font-weight-normal">
                                        <?php 
                                            echo $row['student_parent_name'];
                                        ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="article-info">
                                <ul class="row">
                                    <li class="col-sm-2">parent phone</li>
                                    <li class="col-sm-10 h4 font-weight-normal">
                                        <?php 
                                            echo $row['student_parent_phone'];
                                        ?>
                                    </li>
                                </ul>
                            </div>

                            <div class="article-info">
                                <ul class="row">
                                    <li class="col-sm-2">address</li>
                                    
                                    <li class="col-sm-10  h4 font-weight-normal">
                                        <?php 
                                            echo $row['student_address'];
                                        ?>, 
                                        <?php 
                                            echo $row['city_name'];
                                        ?>, 
                                        <?php 
                                            echo $row['state_name'];
                                        ?>, 
                                        <?php 
                                            echo $row['student_city_pincode'];
                                        ?>
                                    </li>
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
                            
                           
                        </div>
                    </article>
                </section>
            </div>
        </section>
    </main>
</div>
<?php
    require("../include/footer.inc.php");
?>