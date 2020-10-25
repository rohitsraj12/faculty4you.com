<?php 
    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: ../index.php');
    }

    
$active = "teacher";
$sub = "registered";
    require("../../../private/config/config.php");
    require("../../../private/config/db_connect.php");
    include("../include/header.inc.php");



    // sending reminder email to tutor to get membership 
    if(isset($_POST['email'])){
        $email = $_POST['email'];
        $teacher_name = $_POST['name'];
        $admin_email = "admin@facultyforyou.com";

        //send email to teacher to promote membership(if tutor is not taken membership then just to send notification)
        $to = $email;
        $subject = "hi " . $teacher_name . ", new tuition posted in facultyforyou.com";
        $message = "<p>Dear " . $teacher_name . ",</p></br>";
        $message .= "<p>A new tuition was posted on this platform which is related to your subject and nearby you.</p></br>";
        $message .= "<p>Thank you,</p>";
        $message .= "<p>admin</p>";
        $message .= "<div><img width='250px' src='http://facultyforyou.com/img/brand/faculty_for_you_brand.png'></div>";
        
        // from faculty details
        $headers = "From: facultyforyou.com <" . $admin_email . ">\r\n";
        $headers .= "Reply-To: " . $admin_email . "\r\n";
        $headers .= "Content-type: text/html\r\n";
    
        mail($to, $subject, $message, $headers);
    }

    // sending reminder email to tutor, update profile details
    if(isset($_POST['Update_profile_detail'])){
        $email = $_POST['email'];
        $teacher_name = $_POST['name'];
        $admin_email = "admin@facultyforyou.com";

        //send email to teacher for updation of their profile details
        $to = $email;
        $subject = "hello, Your profile need to be update | facultyforyou.com";
        $message = "<p>Dear " . $teacher_name . ",</p></br>";
        $message .= "<p>Welcome to facultyforyou.com. A special thanks to you as you now became a new tutor on the most honored and credible learning network in India. Please login and create your profile to see the details of students who are searching for tutors in your subject.</p></br>";
        $message .= "<p>We will provide you the students and hope we will help you in growing your tutoring business. </p></br>";
        $message .= "<p>Thank you,</p>";
        $message .= "<p>admin</p>";
        $message .= "<div><img width='250px' src='http://facultyforyou.com/img/brand/faculty_for_you_brand.png'></div>";
        
        // from faculty details
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
                        NON ACTIVE TUTOR RECORDS 
                    </header>
                </div>
            </div>
            <!-- end page header -->
            <div class="header-tab wrap-container">
                <ul class="header-tab-wrap">
                    <li class="header-tab__button active-tab" data-header-tab="tab-1">activated profiles</li>
                    <li class="header-tab__button" data-header-tab="tab-2">not activated profile</li>
                </ul>
                <!-- activated profile -->
                <div class="tab-1 tab-detail active-tab-detail">
                    <section class="section-record">
                        <div class="container">
                        
                            <header class="header-text-3">
                                Updated profile list        
                            </header>
                            <div class="wrap-table">
                            <table class="bg-light table">
                                <thead class="thead-light">
                                    <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Remind </th>
                                    <th scope="col">membership active</th>
                                    <th scope="col"></th>
                                    <th scope="col">More Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql = "SELECT * FROM teachers WHERE teacher_id  NOT IN (
                                            SELECT teacher_id 
                                            FROM memberships
                                        )";
                                        $result = mysqli_query($conn, $sql);

                                        while($row = mysqli_fetch_array($result)){
                                            $city_id = $row['city_id'];
                                            if(!empty($city_id)){
                                            
                                    ?>
                                        <th scope="row"><?php echo $row['teacher_id'];?></th>
                                        
                                        <td><?php echo $row['teacher_first_name'] . " " . $row['teacher_last_name'] ;?></td>
                                        <td>
                                            <form action="" method="POST">
                                                <input type="hidden" name="name" value="<?php echo $row['teacher_first_name'] . " " . $row['teacher_last_name'] ; ?>">
                                                <input type="hidden" name="id" value="<?php echo $row['teacher_id']; ?>">
                                                <input type="hidden" name="email" value="<?php echo $row['teacher_email']; ?>">
                                                <button class="member-nonactive" name="email">Reminder Email</button>
                                            </form>
                                        </td>
                                        <td>

                                        <?php 

                                            

                                                $id = $row['teacher_id'];


                                                if($id){
                                                    // echo "non member";
                                                    echo "<a href='../add_records/add_membership.php?id=". $row['teacher_id'] . "' class='member-nonactive'>Member</a>";
                                                
                                                    
                                                } else {
                                                    //echo "<span class='member-active'>Member</span>";
                                                }
                                        ?>
                                        </td>
                                        <td class="text-center"><a class="btn btn-link btn-sm" href="<?php base_url()?>dashboard/add_records/add_teacher_testimonials.php?id=<?php //echo $row['teacher_id'];?>"></a></td>
                                        <td class="text-center"><a class="btn btn-link btn-sm" href="<?php base_url()?>dashboard/teacher/teacher_detail.php?id=<?php echo $row['teacher_id'];?>">more details</a></td>
                                    </tr>
                                    <?php 
                                    }}
                                    ?>
                                </tbody>
                            </table>
                            <?php 
                            ?>
                            </div>          
                        </div>


                    </section>
                </div>

                <div class="tab-2 tab-detail">
                    <section class="section-record">
                        <div class="container">
                            <header class="header-text-3">
                                Not updated profile list        
                            </header>
                            <div class="wrap-table">
                                <table class="bg-light table">
                                    <thead class="thead-light">
                                        <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">email id</th>
                                        <th scope="col">update profile email</th>
                                        <th scope="col">More Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = "SELECT * FROM teachers WHERE teacher_id  NOT IN (
                                                SELECT teacher_id 
                                                FROM memberships
                                            )";
                                            $result = mysqli_query($conn, $sql);

                                            while($row = mysqli_fetch_array($result)){
                                                $city_id = $row['city_id'];
                                                if($city_id == ""){
                                                
                                        ?>
                                            <th scope="row"><?php echo $row['teacher_id'];?></th>
                                            
                                            <td><?php echo $row['teacher_user_name'] ;?></td>
                                            <td><?php echo $row['teacher_email'] ;?></td>
                                            <td>
                                                <form action="" method="POST">
                                                    <input type="hidden" name="name" value="<?php echo $row['teacher_user_name'] ; ?>">
                                                    <input type="hidden" name="id" value="<?php echo $row['teacher_id']; ?>">
                                                    <input type="hidden" name="email" value="<?php echo $row['teacher_email']; ?>">
                                                    <button class="member-nonactive" name="Update_profile_detail">Create Profile</button>
                                                </form>
                                            </td>
                                        
                                            <!-- <td class="text-center"><a class="btn btn-link btn-sm" href="<?php base_url()?>dashboard/add_records/add_teacher_testimonials.php?id=<?php //echo $row['teacher_id'];?>"></a></td> -->
                                            <td class="text-center"><a class="btn btn-link btn-sm" href="<?php base_url()?>dashboard/teacher/teacher_detail.php?id=<?php echo $row['teacher_id'];?>">more details</a></td>
                                        </tr>
                                        <?php 
                                        }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>          
                        </div>


                    </section>
                </div>
            </div>
        </div>
    </div>

<?php
    include("../include/footer.inc.php");
?>