<?php
    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: ../login.php');
    } 
    $page_title = "View profile";

    require_once("../../../private/config/db_connect.php");
    require("../../../private/config/config.php");
    include("../../../private/required/public/components/social_media.php");
    require("../include/header.inc.php");
    // include("../../../private/required/public/components/search.php");

    $student_name = $_SESSION['user_name'];

    
    $sql = "SELECT students.*, cities.*, states.*, gender.* FROM students 
    LEFT JOIN cities
        ON cities.city_id = students.city_id
    LEFT JOIN states
        ON states.state_id = students.state_id
    LEFT JOIN gender
        ON gender.gender_id = students.gender_id
     WHERE student_user_name = '$student_name'";
    // $sql = "SELECT * FROM students WHERE student_user_name = '$student_name'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $student_first_name = $row['student_first_name'];

    if(!empty($_GET['message'])){
        $message = "Congratulations you have successfully updated your profile. Now post your requirement/s.";
        
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
                            <a href="update_student_image.php?id=<?php echo $row['student_id'];?>"class="d-block" data-toggle="modal" data-target="#exampleModal">Update Image</a>
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
                                    <!-- <a href="<?php base_url();?>student/profile/profile_update.php?id=<?php echo $row['student_id'];?>" class="h4 button-primary">Edit profile</a> -->
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
                           
                            <a href="personal_info.php?id=<?php echo $row['student_id']?>" class="button-primary">Update</a>
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
                                            echo $row['city_pincode'];
                                        ?>
                                    </li>
                                </ul>
                            </div>
                            
                           <a href="contact_info.php?id=<?php echo $row['student_id']?>" class="button-primary">Update</a>
                        </div>
                    </article>
                </section>
            </div>
        </section>
    </main>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
       <form action="update_student_image.php" method="post"  enctype="multipart/form-data">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload your image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group mb-4">
            <label for="photo">Upload image</label>
            <span class="error-msg"></span>
            <input type="file" name="file" class="form-control-file image pt-0" id="photo"  value="" placeholder="<?php echo $row['student_photo'];?>">
            <input type="hidden" name="id" value="<?php echo $row['student_id'];?>">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit_image" class="btn btn-primary">Save image</button>
      </div>
    </div>
    </form>
 </div>
 
</div>

<?php
    include("../../../private/required/public/components/agreement.php");

    require("../include/footer.inc.php");
?>