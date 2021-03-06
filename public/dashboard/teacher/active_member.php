<?php 
    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: ../index.php');
    }

    
    $active = "teacher";
    $sub = "activeMember";
    
    require("../../../private/config/config.php");
    require("../../../private/config/db_connect.php");
    include("../include/header.inc.php");

    if(isset($_POST['reminder_email'])){
        $email = $_POST['email'];
        $teacher_name = $_POST['name'];
        $admin_email = "admin@facultyforyou.com";

        //send email to teacher
        $to = $email;
        $subject = "Membership renewal reminder | facultyforyou.com";
        $message = "<p>Dear " . $teacher_name . ",</p></br>";
        $message .= "<p>Your tokens have been completed. We hope <a href='http://facultyforyou.com'>facultyforyou.com</a> is the best platform to grow your tutoring business. Renew your membership with any one of the plans to connect with more students.</p></br>";
        $message .= "<p>Thank you,</p>";
        $message .= "<p>admin</p>";
        $message .= "<div><img width='250px' src='http://facultyforyou.com/img/brand/faculty_for_you_brand.png'></div>";
        
        $headers = "From: facultyforyou.com <" . $admin_email . ">\r\n";
        $headers .= "Reply-To: " . $admin_email . "\r\n";
        $headers .= "Content-type: text/html\r\n";
    
        mail($to, $subject, $message, $headers);
    }

?>

<div class="body-container-right"> 
        <div class="wrap-container">
            <div class="page-header">
                <div class="container">
                    <header class="header-text-1" class="py-3">
                        ACTIVE TUTOR RECORDS 
                    </header>
                </div>
            </div>
        <!-- end page header -->
            <div class="header-tab wrap-container">
                <ul class="header-tab-wrap">
                    <li class="header-tab__button active-tab" data-header-tab="tab-1">active date</li>
                    <li class="header-tab__button" data-header-tab="tab-2">active token</li>
                    <li class="header-tab__button" data-header-tab="tab-3">active all</li>
                </ul>
                <!-- active date -->
                <div class="tab-1 tab-detail active-tab-detail">
                    <section class="section-record">
                        <div class="container">
                        
                                <header class="header-text-3">
                                    active date and expired token
                                </header>
                            <div class="wrap-table">
                            <table class="bg-light table">
                                <thead class="thead-light">
                                    <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Expire Date</th>
                                    <th scope="col">Tokens</th>
                                    <th scope="col">Renew</th>
                                    <th scope="col">Email reminder</th>
                                    <th scope="col">More Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        
                                        $sql = "SELECT memberships.*, teachers.* FROM memberships
                                        LEFT JOIN teachers
                                            ON teachers.teacher_id = memberships.teacher_id
                                        WHERE membership_expiry_date > CURRENT_DATE() AND memberships.member_token = 0
                                        ORDER BY member_token ASC 
                                        ";
                                        $results = mysqli_query($conn, $sql);
                                        while($row = mysqli_fetch_assoc($results)){
                                            
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['teacher_id'];?></th>
                                        <td><?php echo $row['teacher_first_name'] . " " . $row['teacher_last_name'] ;?></td>
                                        <td><?php echo $row['membership_expiry_date'];?></td>
                                        <td><?php echo $row['member_token'];?></td>
                                        <td>
                                            <?php 
                                                $token = $row['member_token'];
                                                if($token == 0){
                                                    echo "<a href='../edit_records/update_membership.php?id=". $row['teacher_id'] . "' class='member-nonactive'>Renew Member</a>";
                                                } else{
                                                    echo "<span class='member-active'>Member</span>";
                                                }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <form action="" method="POST">
                                                <input type="hidden" name="name" value="<?php echo $row['teacher_first_name'] . " " . $row['teacher_last_name'] ; ?>">
                                                <input type="hidden" name="id" value="<?php echo $row['teacher_id']; ?>">
                                                <input type="hidden" name="email" value="<?php echo $row['teacher_email']; ?>">
                                                <button class="member-nonactive" name="reminder_email">reminder email</button>
                                            </form>
                                        </td>
                                        <td class="text-center"><a class="btn btn-link btn-sm" href="<?php base_url()?>dashboard/teacher/teacher_detail.php?id=<?php echo $row['teacher_id'];?>">more details</a></td>
                                    </tr>
                                    <?php 
                                    }
                                    ?>
                                    <?php

                                    while($row = mysqli_fetch_assoc($results)){
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $row['teacher_id'];?></th>
                                            <td class="text-left"><?php echo $row['teacher_first_name'] . " " . $row['teacher_last_name'] ;?></td>
                                            <td><?php echo $row['membership_expiry_date'];?></td>
                                            <td><?php 

                                                $id = $row['teacher_id'];
                                                $member_query = "SELECT * FROM memberships";
                                                $member_result = mysqli_query($conn, $member_query);
                                                $member_row = mysqli_fetch_assoc($member_result);

                                                // $start = $member_row['membership_starting_date'];
                                                $exp = $member_row['membership_expiry_date'];
                                                $date = date("Y - M - d");

                                                $token = $member_row['member_token'];
                                                
                                                if($exp >= $date) {
                                                    echo "<span class='member-active'>Member</span>";
                                                }
                                            ?></td>
                                            <td class="text-center"><a class="btn btn-link btn-sm" href="<?php base_url()?>dashboard/edit_records/update_teacher_testimonials.php?id=<?php //echo $row['teacher_id'];?>">Add testimonial</a></td>
                                            <td class="text-center"><a class="btn btn-link btn-sm" href="<?php base_url()?>dashboard/teacher/teacher_detail.php?id=<?php echo $row['teacher_id'];?>">more details</a></td>
                                        </tr>
                                        <?php 
                                        }
                                        ?>
                                </tbody>
                            </table>
                            <?php 
                            ?>
                            </div>          
                        </div>


                    </section>
                </div>
                <!-- active token -->
                <div class="tab-2 tab-detail">
                    <section class="section-record">
                        <div class="container">
                                <header class="header-text-3">
                                    active token and expired Date 
                                </header>
                            <div class="wrap-table">
                            <table class="bg-light table">
                                <thead class="thead-light">
                                    <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Membership Expire Date</th>
                                    <th scope="col">Token number left</th>
                                    <th scope="col">Activate member</th>
                                    <!-- <th scope="col">Add testimonial</th> -->
                                    <th scope="col">More Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        
                                        $sql = "SELECT memberships.*, teachers.* FROM memberships
                                        LEFT JOIN teachers
                                            ON teachers.teacher_id = memberships.teacher_id
                                        WHERE membership_expiry_date < CURRENT_DATE() AND memberships.member_token = 0
                                        ORDER BY member_token ASC";
                                        $results = mysqli_query($conn, $sql);

                                // $query_results = mysqli_num_rows($result);

                                // echo $query_results;

                                        while($row = mysqli_fetch_assoc($results)){
                                            // $id =  $row['teacher_id'];
                                            // $teacher_query = "SELECT * FROM teachers 
                                            //     WHERE teacher_id = '$id' 
                                            //     ORDER BY teacher_id DESC 
                                            //     LIMIT 1";
                                            // $teacher_result = mysqli_query($conn, $teacher_query);
                                            // $teacher_row = mysqli_fetch_assoc($teacher_result);
                                            
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['teacher_id'];?></th>
                                        <td><?php echo $row['teacher_first_name'] . " " . $row['teacher_last_name'] ;?></td>
                                        <td><?php echo $row['membership_expiry_date'];?></td>
                                        <td><?php echo $row['member_token'];?></td>
                                        <td><?php 

                                            // $id = $row['teacher_id'];
                                            // $member_query = "SELECT * FROM memberships WHERE member_token = 0";
                                            // $member_result = mysqli_query($conn, $member_query);
                                            // $member_row = mysqli_fetch_assoc($member_result);

                                            // // $start = $member_row['membership_starting_date'];
                                            // $exp = $row['membership_expiry_date'];
                                            // $date = date("Y - m - d");

                                            $token = $row['member_token'];
                                            
                                            if($token > 0){
                                                echo "<a href='../edit_records/update_membership.php?id=". $row['teacher_id'] . "' class='member-nonactive'>Renew Member</a>";

                                                // if()
                                            } else{
                                                echo "<span class='member-active'>Member</span>";
                                            }
                                        ?></td>
                                        <!-- <td class="text-center"><a class="btn btn-link btn-sm" href="<?php base_url()?>dashboard/add_records/add_teacher_testimonials.php?id=<?php echo $row['teacher_id'];?>">Add testimonial</a></td> -->
                                        <td class="text-center"><a class="btn btn-link btn-sm" href="<?php base_url()?>dashboard/teacher/teacher_detail.php?id=<?php echo $row['teacher_id'];?>">more details</a></td>
                                    </tr>
                                    <?php 
                                    }
                                    ?>
                                    <?php

                                    while($row = mysqli_fetch_assoc($results)){
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $row['teacher_id'];?></th>
                                            <td class="text-left"><?php echo $row['teacher_first_name'] . " " . $row['teacher_last_name'] ;?></td>
                                            <td><?php echo $row['membership_expiry_date'];?></td>
                                            <td><?php 

                                                $id = $row['teacher_id'];
                                                $member_query = "SELECT * FROM memberships";
                                                $member_result = mysqli_query($conn, $member_query);
                                                $member_row = mysqli_fetch_assoc($member_result);

                                                // $start = $member_row['membership_starting_date'];
                                                $exp = $member_row['membership_expiry_date'];
                                                $date = date("Y - m - d");

                                                $token = $member_row['member_token'];
                                                
                                                if($exp >= $date) {
                                                    echo "<span class='member-active'>Member</span>";
                                                }
                                            ?></td>
                                            <td class="text-center"><a class="btn btn-link btn-sm" href="<?php base_url()?>dashboard/add_records/add_teacher_testimonials.php?id=<?php //echo $row['teacher_id'];?>">Add testimonial</a></td>
                                            <td class="text-center"><a class="btn btn-link btn-sm" href="<?php base_url()?>dashboard/teacher/teacher_detail.php?id=<?php echo $row['teacher_id'];?>">more details</a></td>
                                        </tr>
                                        <?php 
                                        }
                                        ?>
                                </tbody>
                            </table>
                            <?php 
                            ?>
                            </div>          
                        </div>


                    </section>
                </div>
                <!-- active all -->
                <div class="tab-3 tab-detail">
                    <section class="section-record">
                        <div class="container">
                        
                        
                                <header class="header-text-3">
                                    active members
                                </header>
                            <div class="wrap-table">
                            <table class="bg-light table">
                                <thead class="thead-light">
                                    <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Membership Expire Date</th>
                                    <th scope="col">Token number left</th>
                                    <th scope="col">Activate member</th>
                                    <!-- <th scope="col">Add testimonial</th> -->
                                    <th scope="col">More Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        
                                        
                                        $sql = "SELECT memberships.*, teachers.* FROM memberships
                                        LEFT JOIN teachers
                                            ON teachers.teacher_id = memberships.teacher_id
                                        WHERE membership_expiry_date > CURRENT_DATE() AND memberships.member_token > 0
                                        ORDER BY member_token ASC 
                                        ";
                                        $results = mysqli_query($conn, $sql);
                                        while($row = mysqli_fetch_assoc($results)){
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['teacher_id'];?></th>
                                        <td><?php echo $row['teacher_first_name'] . " " . $row['teacher_last_name'] ;?></td>
                                        <td><?php echo $row['membership_expiry_date'];?></td>
                                        <td><?php echo $row['member_token'];?></td>
                                        <td><?php 

                                            $token = $row['member_token'];
                                            
                                            if($token == 0){
                                                echo "<a href='../add_records/add_membership.php?id=". $row['teacher_id'] . "' class='member-nonactive'>Member</a>";

                                                // if()
                                            } else{
                                                echo "<span class='member-active'>Member</span>";
                                            }
                                        ?></td>
                                        <!-- <td class="text-center"><a class="btn btn-link btn-sm" href="<?php base_url()?>dashboard/add_records/add_teacher_testimonials.php?id=<?php echo $row['teacher_id'];?>">Add testimonial</a></td> -->
                                        <td class="text-center"><a class="btn btn-link btn-sm" href="<?php base_url()?>dashboard/teacher/teacher_detail.php?id=<?php echo $row['teacher_id'];?>">more details</a></td>
                                    </tr>
                                    <?php 
                                    }
                                    ?>
                                    <?php

                                    while($row = mysqli_fetch_assoc($results)){
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $row['teacher_id'];?></th>
                                            <td class="text-left"><?php echo $row['teacher_first_name'] . " " . $row['teacher_last_name'] ;?></td>
                                            <td><?php echo $row['membership_expiry_date'];?></td>
                                            <td><?php 

                                                $id = $row['teacher_id'];
                                                $member_query = "SELECT * FROM memberships";
                                                $member_result = mysqli_query($conn, $member_query);
                                                $member_row = mysqli_fetch_assoc($member_result);

                                                // $start = $member_row['membership_starting_date'];
                                                $exp = $member_row['membership_expiry_date'];
                                                $date = date("Y - m - d");

                                                $token = $member_row['member_token'];
                                                
                                                if($exp >= $date) {
                                                    echo "<span class='member-active'>Member</span>";
                                                }
                                            ?></td>
                                            <td class="text-center"><a class="btn btn-link btn-sm" href="<?php base_url()?>dashboard/add_records/add_teacher_testimonials.php?id=<?php //echo $row['teacher_id'];?>">Add testimonial</a></td>
                                            <td class="text-center"><a class="btn btn-link btn-sm" href="<?php base_url()?>dashboard/teacher/teacher_detail.php?id=<?php echo $row['teacher_id'];?>">more details</a></td>
                                        </tr>
                                        <?php 
                                        }
                                        ?>
                                </tbody>
                            </table>
                            <?php 
                            ?>
                            </div>          
                        </div>


                    </section>
                </div>
            </div>
            
            <section class="section-bottom"></section>
        </div>
    </div>

<?php
    include("../include/footer.inc.php");
?>