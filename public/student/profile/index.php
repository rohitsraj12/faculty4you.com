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
    include("../../../private/required/public/components/social_media.php");
    require("../include/header.inc.php");
    // include("../../../private/required/public/components/search.php");

    $student_name = $_SESSION['user_name'];

    
    $sql = "SELECT std.*, cities.*, states.*, gender.* FROM std 
    LEFT JOIN cities
        ON cities.city_id = std.city_id
    LEFT JOIN states
        ON states.state_id = std.state_id
    LEFT JOIN gender
        ON gender.gender_id = std.gender_id
     WHERE student_user_name = '$student_name'";
    // $sql = "SELECT * FROM std WHERE student_user_name = '$student_name'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if(!empty($_GET['message'])){
        $message = "Congratulations! You have successfully updated your profile detail.";
        
?>
<div class="alert alert-success m-0" role="alert">
    <div class="wrap-container h3 py-4">

        <?php 
        
        echo $message;
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
            <div class="section-header u-center-text"  >
                <heeader class="text-primary-h-3"> 
                    My profile
                </header>
                
            </div>
        
            <div class="section-body row">
                <section class="col-md-4">
                    <article class="article-profil" >
                        <figure class="text-center"> <?php 

                            if($row['student_photo'] == ""){
                            ?>
                                <img class="" src="<?php echo base_url()?>img/teacher/profile_pic/male_profile.svg" alt="">
                            <?php
                            } else {
                            ?>
                                <img class="" src="<?php echo base_url() . $row['student_photo'];?>" alt="">
                            <?php
                            }
                            ?>
                        </figure>
                        <header class=" u-center-text">
                            <h1 class="text-dark py-5">
                            <?php 
                                echo $row['student_first_name'];
                            ?>
                            </h1>
                        </header>
                        <footer class="px-5">
                            <ul class="pl-3">
                                <li class="text-dark h4 py-1 font-weight-normal">
                                <i class="h5 fa fa-envelope-o pr-3" aria-hidden="true"></i>
                                
                            <?php 
                                echo $row['student_email'];
                            ?>
                                </li>
                                <li  class="text-dark h4 pb-4 font-weight-normal">
                                <i class="h2 fa fa-mobile  pr-4" aria-hidden="true"></i>
                            <?php 
                                echo "+91 " . $row['student_phone']; 
                            ?>
                                </li>

                                <li class="text-center">
                                    <a href="<?php base_url();?>student/profile/profile_update.php?id=<?php echo $row['student_id'];?>" class="h4 button-primary">Edit profile</a>
                                </li>
                            </ul>
                        </footer>
                    </article>
                </section>
                <section class="col-md-8">
                    
                    <article class="article-profil" >
                        <header class="article-profile__header p-4 h3 bg-dark text-light  m-0">
                            Personal detail
                        </header>
                        <div class="article-body p-4">
                        
                        <div class="article-info">
                                <ul class="row">
                                    <li class="col-sm-3">User name</li>
                                    <li class="col-sm-9 h4 font-weight-normal">:
                                        <?php 
                                            echo $row['student_user_name'];
                                        ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="article-info">
                                <ul class="row">
                                    <li class="col-sm-3">Name</li>
                                    <li class="col-sm-9 h4 font-weight-normal">:
                                        <?php 
                                            echo $row['student_first_name'] . " " . $row['student_last_name'];
                                        ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="article-info">
                                <ul class="row">
                                    <li class="col-sm-3">Date of birth</li>
                                    <li class="col-sm-9 h4 font-weight-normal">:
                                        <?php 
                                            $date = date_create($row['student_date_of_birth']);
                                        
                                            echo date_format($date, 'd-M-Y');
                                        ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="article-info">
                                <ul class="row">
                                    <li class="col-sm-3">Gender</li>
                                    <li class="col-sm-9 h4 font-weight-normal">:
                                        <?php 
                                            echo $row['gender_type'];
                                        ?>
                                    </li>
                                </ul>
                            </div>
                            
                                     </div>
                    </article>
                    <article class="article-profil" >
                        <header class="article-profile__header p-4 h3 bg-dark text-light  m-0">
                            Contact detail
                        </header>
                        <div class="article-body p-4">
                        <div class="article-info">
                                <ul class="row">
                                    <li class="col-sm-3">Phone</li>
                                    <li class="col-sm-9  h4 font-weight-normal">:
                                    <?php echo '+91 ' .  $row['student_phone']?>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="article-info">
                                <ul class="row">
                                    <li class="col-sm-3">Email</li>
                                    <li class="col-sm-9 h4 font-weight-normal">:
                                        <?php 
                                            echo $row['student_email'];
                                        ?>
                                    </li>
                                </ul>
                            </div>
                            <!-- <div class="article-info">
                                <ul class="row">
                                    <li class="col-sm-3">parent name</li>
                                    <li class="col-sm-9 h4 font-weight-normal">
                                        <?php 
                                            echo $row['student_parent_name'];
                                        ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="article-info">
                                <ul class="row">
                                    <li class="col-sm-3">parent phone</li>
                                    <li class="col-sm-9 h4 font-weight-normal">
                                        <?php 
                                            echo $row['student_parent_phone'];
                                        ?>
                                    </li>
                                </ul>
                            </div> -->

                            <div class="article-info">
                                <ul class="row">
                                    <li class="col-sm-3">Address</li>
                                    
                                    <li class="col-sm-9 h4 font-weight-normal">:
                                        <?php 
                                            echo $row['student_address'];
                                        ?>, </br></br>
                                        <?php 
                                        
                                            echo $row['city_name'];
                                        ?>, </br></br>
                                        <?php 
                                            echo $row['state_name'];
                                        ?>, 
                                        <?php 
                                            echo $row['student_city_pincode'];
                                        ?>
                                    </li>
                                </ul>
                            </div>
  
                          
                            <!-- <div class="article-info">
                                <ul class="row">
                                    <li class="col-sm-4">tuition type</li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>
                            </div> -->
                            
                           
                        </div>
                    </article>
                </section>
            </div>
        </section>
    </main>
</div>
<?php
    include("../../../private/required/public/components/agreement.php");

    require("../include/footer.inc.php");
?>