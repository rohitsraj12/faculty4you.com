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
    include_once'../include/banner.inc.php';

?>
<div class="body-container">

    <main class="wrap-container profile">
        <section class="section-profile">
            <div class="section-header u-center-text"  data-aos="zoom-out-up" data-aos-duration="1000">
                <heeader class="text-primary-h"> 
                    my profile
                </header>
                <?php
                    $member = $rows['teacher_user_name'];

                    $sql = "SELECT teachers.*, cities.*, states.*, gender.*, subjects.* FROM teachers
                    JOIN cities
                        ON cities.city_id = teachers.city_id
                    JOIN states
                        ON states.state_id = teachers.state_id
                    JOIN gender
                        ON gender.gender_id = teachers.gender_id
                    JOIN subjects
                        ON subjects.subject_id = teachers.subject_id
                    WHERE teacher_user_name = '$member'";
    
                    $results = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($results);
                ?>
            </div>
            <div class="section-body row">
                <section class="col-md-4">
                    <article class="article-profil" data-aos="zoom-out-up" data-aos-duration="1000">
                        <figure class="text-center">
                            <img class="img-thumbnail img-fluid img-rounded" style="max-height: 300px" src="<?php echo base_url() . $row['teacher_photo'];?>" alt="">
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
                                <i class="h2 fa fa-mail pr-3" aria-hidden="true"></i>
                                
                            <?php 
                                echo $row['teacher_email'];
                            ?>
                                </li>
                                <li  class="text-dark h4 pb-4 font-weight-normal">
                                <i class="h2 fa fa-mobile  pr-3" aria-hidden="true"></i>
                            <?php 
                                echo $row['teacher_phone']; 
                            ?>
                                </li>

                                <li class="text-center">
                                    <a href="<?php base_url();?>teacher/profile/profile_update.php?id=<?php echo $row['teacher_id'];?>" class="w-100 h4 button-primary">edit profile</a>
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
                        <?php
                            echo $row['teacher_about_me']; 
                        ?>
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
                                <ul class="row">
                                    <li class="col-sm-2">Gender</li>
                                    <li class="col-sm-10 h4 font-weight-normal">
                                        <?php 
                                            echo $row['gender_type'];
                                        ?>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="article-info">
                                <ul class="row">
                                    <li  class="col-sm-2">phone</li>
                                    <li class="col-sm-10 h4 font-weight-normal">
                                        <?php 
                                            echo $row['teacher_phone'];
                                        ?>
                                    </li>
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
                                    <li class="col-sm-10 h4 font-weight-normal"><?php echo $row['teacher_address'];?>,</br> </br><?php echo $row['city_name'];?>, </br></br> <?php echo $row['state_name'];?></li>
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
                                    <li class="col-sm-2">experience</li>
                                    <li class="col-sm-10 h4 font-weight-normal"><?php echo $row['teacher_experience']?> years of experince</li>
                                </ul>
                            </div>
                            <div class="article-info">
                                <ul class="row">
                                    <li class="col-sm-2">Subject</li>
                                        <li class="col-sm-10 h4 font-weight-normal"><?php echo $row['sub_name']?></li>
                                   
                                </ul>
                            </div>
                            
                            <!-- <div class="article-info">
                                <ul class="row">
                                    <li class="col-sm-2">tuition type</li>
                                    <ul class="col-sm-10">   
                                        <li class="w-100 h4 font-weight-normal"><?php //if($row['teacher_online_one_to_one'] == 1 ){ echo "online one to one";}?></li>
                                        <li class="w-100 h4 font-weight-normal"><?php //if($row['teacher_online_group'] == 1){ echo "online group";}?></li>
                                        <li class="w-100 h4 font-weight-normal"><?php //if($row['teacher_home_tuition'] == 1){ echo "home tuition";}?></li>
                                    </ul>
                                   
                                </ul>
                            </div> -->
                            
                            <!-- <div class="article-info">
                                <ul>
                                    <li>subject</li>
                                    <li></li>
                                </ul>
                            </div> -->
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