<?php
    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: ../login.php');
    } 

    $page_title = "profile view";

    require_once("../../../private/config/db_connect.php");
    require("../../../private/config/config.php");
    include("../../../private/required/public/components/social_media.php");
    require("../include/header.inc.php");
    // include_once'../include/banner.inc.php';

    $teacher_name = $_SESSION['user_name'];
    
    $sql = "SELECT teachers.*, cities.*, states.*, gender.*, subjects.* FROM teachers 
    LEFT JOIN cities
        ON cities.city_id = teachers.city_id
    LEFT JOIN states
        ON states.state_id = teachers.state_id
    LEFT JOIN gender
        ON gender.gender_id = teachers.gender_id
    LEFT JOIN subjects
        ON subjects.subject_id = teachers.subject_id
    WHERE teacher_user_name = '$teacher_name'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if(!empty($_GET['message'])){
        $message = "Congratulations! You have successfully updated your profile detail.";
        
?>

<div class="alert alert-success m-0" role="alert">
    <div class="wrap-container h3 py-4">
        <?php echo $message;
            // header('location: index.php');
        ?>
    </div>
</div>

<?php
    }

?>
<div class="body-container">

    <main class="wrap-container profile">
        <section class="section-profile">
            <div class="section-header u-center-text">
                <heeader class="text-primary-h-3"> 
                    My profile
                </header>
            </div>
            <div class="section-body row">
                <section class="col-md-4">
                    <article class="bg-light article-profil">
                        <figure>
                        <?php 

                            if($row['teacher_photo'] == ""){
                        ?>
                                <img class="img-fluid" src="<?php echo base_url()?>img/teacher/profile_pic/male_profile.svg" alt="">
                        <?php
                            } else {
                        ?>
                                <img class="img-fluid" src="<?php echo base_url() . $row['teacher_photo'];?>" alt="">
                        <?php
                            }
                        ?>
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
                                <li class="text-dark h3 py-1 font-weight-normal">
                                <i class="h5 fa fa-envelope-o pr-3" aria-hidden="true"></i>
                                
                            <?php 
                                echo $row['teacher_email'];
                            ?>
                                </li>
                                <li  class="text-dark h4 pb-4 font-weight-normal">
                                <i class="h2 fa fa-mobile  pr-3" aria-hidden="true"></i>
                                +91 
                            <?php 
                                 echo $row['teacher_phone']; 
                            ?>
                                </li>

                                <li class="text-center">
                                    <a href="<?php base_url();?>teacher/profile/profile_update.php?id=<?php echo $row['teacher_id'];?>" class="h4 button-primary">Edit profile</a>
                                </li>
                            </ul>
                        </footer>
                    </article>
                </section>
                <section class="col-md-8">
                    <article class="article-profil">
                        <header class="p-4 h3 article-profile__header text-light m-0">
                            About me
                        </header>
                        <div class="article-body p-4 text-dark">
                        <p>
                        <?php
                            echo $row['teacher_about_me']; 
                        ?>
                        </p>
                        </div>
                    </article>
                    <article class="article-profil">
                        <header class="p-4 h3 article-profile__header text-light  m-0">
                            Personal detail
                        </header>
                        <div class="article-body p-4">
                            <div class="article-info">
                                <ul class="row">
                                    <li class="col-sm-2">Name</li>
                                    <li class="col-sm-10 h4 font-weight-normal">:
                                        <?php 
                                            echo $row['teacher_first_name'] . " " . $row['teacher_last_name'];
                                        ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="article-info">
                                <ul class="row">
                                    <li class="col-sm-2">Gender</li>
                                    <li class="col-sm-10 h4 font-weight-normal">:
                                        <?php 
                                           echo $row['gender_type'];

                                        if($row['gender_id'] == 0){
                                           // echo "no data";
                                        } else {
                                           //echo $row['gender_type'];
                                        }
                                        ?>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="article-info">
                                <ul class="row">
                                    <li  class="col-sm-2">Phone</li>
                                    <li class="col-sm-10 h4 font-weight-normal">: +91
                                        <?php 
                                            echo $row['teacher_phone'];
                                        ?>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="article-info">
                                <ul class="row">
                                    <li class="col-sm-2">Email</li>
                                    <li class="col-sm-10 h4 font-weight-normal">:
                                        <?php 
                                            echo $row['teacher_email'];
                                        ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="article-info">
                                <ul class="row">
                                    <li class="col-sm-2">Address</li>
                                    <li class="col-sm-10 h4 font-weight-normal">
                                        <address>:
                                            <?php echo $row['teacher_address'];?>, </br>
                                              <?php echo $row['city_name'];?>, </br>
                                              <?php echo $row['state_name'];?>
                                        </address>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </article>
                    <article class="article-profil">
                        <header class="h3 p-4 article-profile__header text-light  m-0">
                            Professional detail
                        </header>
                        <div class="article-body p-4">
                        
                            <div class="article-info">
                                <ul class="row">
                                    <li class="col-sm-2">Experience</li>
                                    <li class="col-sm-10 h4 font-weight-normal">: <?php echo $row['teacher_experience']?> years of experince</li>
                                </ul>
                            </div>
                            <div class="article-info">
                                <ul class="row">
                                    <li class="col-sm-2">Subject</li>
                                        <li class="col-sm-10 h4 font-weight-normal">: <?php echo $row['sub_name']?></li>
                                   
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
  include("../../../private/required/public/components/agreement.php");
    require("../include/footer.inc.php");
?>