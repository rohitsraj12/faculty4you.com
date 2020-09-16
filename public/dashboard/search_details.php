<?php 

session_start();
//back function false
if(!isset($_SESSION['user_name'])){
    header('location: ../index.php');
}


$active = "teacher";
require("../../private/config/config.php");
require("../../private/config/db_connect.php");
include("include/header.inc.php");



    if(isset($_POST["submit-search"])){
            // security
            $search = mysqli_real_escape_string($conn, $_POST["search"]);
            // $city = mysqli_real_escape_string($conn, $_POST["city"]);


            $sql = "SELECT  teachers.*, cities.*, states.*, gender.*, subjects.* FROM teachers 
            LEFT JOIN cities
                ON cities.city_id = teachers.city_id
            LEFT JOIN states
                ON states.state_id = teachers.state_id
            LEFT JOIN gender
                ON gender.gender_id = teachers.gender_id
            LEFT JOIN subjects
                ON subjects.subject_id = teachers.subject_id
            WHERE teacher_user_name LIKE '%$search%' OR teacher_id LIKE '%$search%'  OR teacher_email LIKE '%$search%'";
            $result = mysqli_query($conn, $sql);    
            $row = mysqli_fetch_assoc($result);

            $teacher_id = $row['teacher_id'];

   

        ?>

<div class="body-container-right"> 

<div class="wrap-container">
    <div class="page-header">
        <div class="container">
            <header class="header-text-1" class="py-3">
                  <a href=""></a> Teacher Records
            </header>
            <span class="header-text-2">
                <?php echo $row['teacher_first_name'] . " " . $row['teacher_last_name'] ;?>
            </span>
        </div>
    </div>
    <section class="section-record">
        <div class="container">
            
            <div class="row">
                <div class="col-md-3">
                    <article class="member-left">
                        <figure>
                            <?php 

                                if($row['teacher_photo'] == ""){
                            ?>
                                    <img class="member__img" style="max-height: 200px" src="<?php echo base_url()?>img/teacher/profile_pic/male_profile.svg" alt="">
                            <?php
                                } else {
                            ?>
                                    <img class="member__img" style="max-height: 300px" src="<?php echo base_url() . $row['teacher_photo'];?>" alt="">
                            <?php
                                }
                            ?>
                        </figure>
                        <header class="member__header header-text-2">
                            <?php echo $row['teacher_first_name'] . " " . $row['teacher_last_name'] ;?>
                        </header>
                        <p class="sub-header-text-1 pt-2">
                            <?php echo $row['sub_name'];?> Trainer
                        </p>

                        <?php
                        //  AND membership_expiry_date <= '2020-09-17'
                            $member_query = "SELECT * FROM memberships WHERE teacher_id = '$teacher_id'";
                            $member_result = mysqli_query($conn, $member_query);
                            $member_row = mysqli_fetch_assoc($member_result);

                            $start = $member_row['membership_starting_date'];
                            $exp = $member_row['membership_expiry_date'];
                            $date = date("Y-m-d");

                            $today = strtotime($date);
                            $expDate = strtotime($exp);

                            if($expDate <= $today){
                                // echo "expired";
                                echo "<a href='add_records/add_membership.php?id=". $row['teacher_id'] . "' class='member-nonactive'>Member</a>";
                            } else {
                                // echo "active";
                                echo "<span class='member-active'>Member</span>";
                            }
                            
                            // if($exp <= $date){
                            //     echo "<a href='add_records/add_membership.php?id=". $row['teacher_id'] . "' class='member-nonactive'>Member</a>";
                            // } else {
                            //     echo "<span class='member-active'>Member</span>";
                            // }
                        ?>
                        <p class="">
                            <?php echo $row['teacher_email'];?>
                        </p>
                    </article>
                </div>
                <div class="col-md-9">
                    <article class="member-right">
                            <header class="header-text-3">
                                Profile detail
                            </header>
                        <span>
                        </span>
                        <ul>
                        
                            <li class="row">
                                
                                <div class="col-3">
                                    Username
                                </div>
                             
                                <div class="col-9">
                                    <?php echo $row['teacher_user_name'];?>
                                </div>
                            </li>
                            <li class="row">
                                
                                <div class="col-3">
                                    Email
                                </div>
                                <div class="col-9">
                                    <?php echo $row['teacher_email'];?>
                                </div>
                            </li>
                            <li class="row">
                                
                                <div class="col-3">
                                    Phone number
                                </div>
                                <div class="col-9">
                                    +91 <?php echo $row['teacher_phone'];?>
                                </div>
                            </li>
                            
                            <li class="row">
                                <div class="col-3">
                                    Experience
                                </div>
                                <div class="col-9">
                                    <?php echo $row['teacher_experience'];?> Years of experience.
                                </div>
                            </li>
                            <li class="row">
                                
                                <div class="col-3">
                                Teaching Subject
                                </div>
                                <div class="col-9">
                                    <?php echo $row['sub_name'];?>
                                </div>
                            </li>
                            <li class="row">
                            
                                <div class="col-3">
                                    Gender
                                </div>
                                <div class="col-9">
                                    <?php echo $row['gender_type'];?>
                                </div>
                            </li>
                            <li class="row">
                            
                            <div class="col-2">
                                
                                </div>
                                <div class="col-8"></div>
                            </li>
                            <li class="row">
                            
                            <div class="col-2 bg-light">
                                
                                </div>
                                <div class="col-8"></div>
                            </li>

                            <li class="row border-top pt-4">
                                <div class="col-3">
                                    About me
                                </div>
                                <div class="col-9">
                                <?php echo $row['teacher_about_me'];?>
                                </div>
                            </li>
                        </ul>
                    </article>
                    
                </div>
            </div>

            
        </div>
    </section>
    <section class="section-bottom"></section>
</div>
</div>

<?php
     }
?>