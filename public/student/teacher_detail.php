<?php
    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: login.php');
    } 
    $page_title = "Teacher details";

    require_once("../../private/config/db_connect.php");
    require_once("../../private/config/config.php");

    include("../../private/required/public/components/social_media.php");
    require("include/header.inc.php");

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

    $student_id = $row['student_id'];
    ?>

<div class="body-container">

    <main class="wrap-container profile">
        <section class="section-profile">
        <?php
            $teacher_id = $_GET['id'];
            // echo $teacher_id;
            $teacher_query = "SELECT teachers.*, cities.*, states.*, gender.*, subjects.*
            FROM teachers 
            JOIN gender
                ON gender.gender_id = teachers.gender_id
            JOIN cities
                ON cities.city_id = teachers.city_id
            JOIN states
                ON states.state_id = teachers.state_id
            JOIN subjects
                ON subjects.subject_id = teachers.subject_id
              WHERE teacher_id = '$teacher_id'";
            $teacher_result = mysqli_query($conn, $teacher_query);
            $row = mysqli_fetch_assoc($teacher_result);
        ?>
            <div class="section-header u-center-text">
                <heeader class="text-primary-h-3"> 
                    Tutor details
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
                                echo $row['teacher_first_name'] . " " . $row['teacher_last_name'] ;
                            ?>
                            </h1>
                        </header>
                        <footer class="px-5">
                            <ul>
                                <?php
                                    // if token number or membership not exired then show phone number and email
                                    $member_query = "SELECT * FROM memberships WHERE teacher_id = $teacher_id AND membership_expiry_date > CURRENT_DATE()";
                                    $memeber_result = mysqli_query($conn, $member_query);

                                    $member_row = mysqli_fetch_assoc($memeber_result);

                                    $num = $member_row['member_token'];

                                    // echo $member_row['membership_expiry_date'];

                                    if($num > 0) {
                                        ?>

                                            <li class="text-dark h3 py-1 font-weight-normal">
                                                <i class="h5 fa fa-envelope-o pr-3" aria-hidden="true"></i>
                                            
                                                <?php 
                                                    echo $row['teacher_email'];
                                                ?>
                                                
                                                

                                            </li>
                                            <li  class="text-dark h4 py-1 font-weight-normal">
                                                <i class="h2 fa fa-mobile  pr-3" aria-hidden="true"></i> +91 
                                                <?php 
                                                    echo $row['teacher_phone']; 
                                                ?>
                                            </li> 

                                        <?php
                                    }
                                ?>
                     
                                
                                <li class="text-dark h4 py-1 font-weight-normal">

                                    <?php 
                                        

                                    if($row['gender_id'] == 1){
                                        // echo "no data";
                                        echo " <i class='h2 fa fa-mars pr-3' aria-hidden='true'></i>" . $row['gender_type'];
                                    } else if ($row['gender_id'] == 2){
                                        //echo $row['gender_type'];
                                        echo " <i class='h2 fa fa-venus pr-3' aria-hidden='true'></i>" . $row['gender_type'];

                                    }
                                    ?>
                                </li>

                                <li class="text-dark h4 pb-4 font-weight-normal">
                                    <i class="h2 fa fa-map-marker pr-3" aria-hidden="true"></i>
                                    <?php echo $row['city_name'] . ", " .$row['state_name'];?>
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
                            <div class="article-info">
                                <ul class="row">
                                    <li class="col-sm-2">Charges</li>
                                    <li class="col-sm-10 h4 font-weight-normal">: 
                                        <?php
                                            if($row['teaching_charge']){
                                                echo $row['teaching_charge'];
                                            } else {
                                                echo "Not disclosed";
                                            }
                                        ?>
                                    </li>
                                   
                                </ul>
                            </div>
                        </div>
                    </article>
                    <!-- <article class="article-profil">
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
                                    <li class="col-sm-2">City/town</li>
                                    <li class="col-sm-10 h4 font-weight-normal">
                                        <address>:
                                              <?php echo $row['city_name'];?>, 
                                              <?php echo $row['state_name'];?>
                                        </address>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </article> -->
                </section>
            <?php 
                
            ?>
            </div>
        </section>
    </main>
</div>
<?php
  include("../../private/required/public/components/agreement.php");
    require("include/footer.inc.php");
?>