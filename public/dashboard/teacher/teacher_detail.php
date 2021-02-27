<?php 
    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: ../index.php');
    }

    $active = "teacher";
    $sub = 'teacher';
    require("../../../private/config/config.php");
    require("../../../private/config/db_connect.php");
    include("../include/header.inc.php");

    $id = $_GET['id'];
    $sql = "SELECT teachers.*, cities.*, states.*, gender.*, subjects.* FROM teachers 
    LEFT JOIN cities
        ON cities.city_id = teachers.city_id
    LEFT JOIN states
        ON states.state_id = teachers.state_id
    LEFT JOIN gender
        ON gender.gender_id = teachers.gender_id
    LEFT JOIN subjects
        ON subjects.subject_id = teachers.subject_id
    WHERE teacher_id = '$id'";
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
                        <div class="col-md-4">
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
                                    $member_query = "SELECT * FROM memberships WHERE membership_expiry_date > CURRENT_DATE() AND teacher_id = $id";
                                    $member_result = mysqli_query($conn, $member_query);
                                    $member_row = mysqli_fetch_assoc($member_result);

                                    // $start = $member_row['membership_starting_date'];
                                    // $exp = $member_row['membership_expiry_date'];
                                    // $date = date("Y - m - d");
                                    

                                    $token = $member_row['member_token'];
                                    
                                    if($token == 0 && $member_row["membership_id"]){
                                        echo "<a href='../edit_records/update_membership.php?id=". $row['teacher_id'] . "' class='member-nonactive'>Renew Member</a>";
                                    } else if(!$member_row["membership_id"]){
                                        echo "<a href='../add_records/add_membership.php?id=". $row['teacher_id'] . "' class='member-nonactive'>Activate Membership</a>";
                                    } else {
                                        echo "<span class='member-active'>Member</span>";
                                    }
                                ?>
                                <p class="">
                                    <?php echo $row['teacher_email'];?>
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
                                    <li class="row border-top pt-4">
                                        <a href="../add_records/add_teacher_testimonials.php?id=<?php echo $row['teacher_id'];?>" class='member-nonactive'>Add Testimonial</a>
                                        <a class="member-nonactive" href=""  class="btn btn-primary" data-toggle="modal" data-target="#delete">Delete profile</a>
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

    <div class="modal" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Do you want to delete <?php echo $row['teacher_first_name'];?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="crud/teacher_profile_delete.php?id=<?php echo $row['teacher_id'];?>" type="button" class="btn btn-primary">Delete Profile</a>
      </div>
    </div>
  </div>
</div>

<?php
    include("../include/footer.inc.php");
?>