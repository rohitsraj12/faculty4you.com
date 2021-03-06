<?php 
    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: ../index.php');
    }

    $active = "student";
    $sub = 'teacher';
    require("../../../private/config/config.php");
    require("../../../private/config/db_connect.php");
    include("../include/header.inc.php");

    $id = $_GET['id'];
    $sql = "SELECT students.*, cities.*, states.*, gender.* FROM students 
    LEFT JOIN cities
        ON cities.city_id = students.city_id
    LEFT JOIN states
        ON states.state_id = students.state_id
    LEFT JOIN gender
        ON gender.gender_id = students.gender_id
    WHERE student_id = '$id'";
    // $sql = "SELECT * FROM teachers WHERE teacher_user_name = '$teacher_name'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
                            

    
        // echo ;


?>
    <div class="body-container-right"> 

        <div class="wrap-container">
            <div class="page-header">
                <div class="container">
                    <header class="header-text-1" class="py-3">
                          <a href=""></a> Student Records
                    </header>
                    <span class="header-text-2">
                        <?php echo $row['student_first_name'] . " " . $row['student_last_name'] ;?>
                    </span>
                </div>
            </div>
            <section class="section-record">
                <div class="container">
                    
                    <div class="row">
                        <div class="col-md-4">
                            <article class="member-left">
                                <figure>
                                    <?php 

                                        if($row['student_photo'] == ""){
                                    ?>
                                            <img class="member__img" style="max-height: 200px" src="<?php echo base_url()?>img/teacher/profile_pic/male_profile.svg" alt="">
                                    <?php
                                        } else {
                                    ?>
                                            <img class="member__img" style="max-height: 300px" src="<?php echo base_url() . $row['student_photo'];?>" alt="">
                                    <?php
                                        }
                                    ?>
                                </figure>
                                <header class="member__header header-text-2">
                                    <?php echo $row['student_first_name'] . " " . $row['student_last_name'] ;?>
                                </header>
                                <p class="sub-header-text-1 pt-2">
                                    <?php echo $row['city_name'] . ", " . $row['state_name'] ;?>
                                </p>

                                <?php
                                //  AND membership_expiry_date <= '2020-09-17'
                                    // $member_query = "SELECT * FROM memberships WHERE membership_expiry_date > CURRENT_DATE() AND teacher_id = $id";
                                    // $member_result = mysqli_query($conn, $member_query);
                                    // $member_row = mysqli_fetch_assoc($member_result);

                                    // $start = $member_row['membership_starting_date'];
                                    // $exp = $member_row['membership_expiry_date'];
                                    // $date = date("Y - m - d");
                                    

                                    // $token = $member_row['member_token'];
                                    
                                    // if($token == 0){
                                    //     echo "<a href='../add_records/add_membership.php?id=". $row['teacher_id'] . "' class='member-nonactive'>Member</a>";
                                    // } else {
                                    //     echo "<span class='member-active'>Member</span>";
                                    // }
                                ?>
                                <p class="">
                                    <?php echo $row['student_email'];?>
                                </p>
                            </article>
                        </div>
                        <div class="col-md-8">
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
                                     
                                        <div class="col-9 ">
                                            <?php echo $row['student_user_name'];?>
                                        </div>
                                    </li>
                                    <li class="row">
                                        
                                        <div class="col-3">
                                            Email
                                        </div>
                                        <div class="col-9">
                                            <?php echo $row['student_email'];?>
                                        </div>
                                    </li>
                                    <li class="row">
                                        
                                        <div class="col-3">
                                            Phone number
                                        </div>
                                        <div class="col-9">
                                            +91 <?php echo $row['student_phone'];?>
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
                                    
                                        <div class="col-3">
                                            Address
                                        </div>
                                        <div class="col-9">
                                            <?php echo $row['city_name'] . ", " . $row['state_name'] ;?>
                                        </div>
                                    </li>
                                    <li class="row">
                                    
                                    <div class="col-2 bg-light">
                                        
                                        </div>
                                        <div class="col-8"></div>
                                    </li>

                                    <!-- <li class="row border-top pt-4">
                                        <div class="col-3">
                                            About me
                                        </div>
                                        <div class="col-9">
                                        <?php //echo $row['teacher_about_me'];?>
                                        </div>
                                    </li> -->
                                    <li class="row border-top pt-4">
                                        <a href="../add_records/add_testimonials.php?id=<?php echo $row['student_id'];?>" class='member-nonactive'>Add Testimonial</a>
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
    include("../include/footer.inc.php");
?>