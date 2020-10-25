<?php 
    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: ../index.php');
    }


    $active = "student";
    $sub = "studentDetail";

    require("../../../private/config/config.php");
    require("../../../private/config/db_connect.php");
    include("../include/header.inc.php");

    // sending reminder email to students, update profile details
    if(isset($_POST['update_profile_detail'])){
        $email = $_POST['email'];
        $student_name = $_POST['name'];
        $admin_email = "admin@facultyforyou.com";

        //send email to students for updation of their profile details
        $to = $email;
        $subject = "hello, Your profile need to be update | facultyforyou.com";
        $message = "<p>Dear " . $student_name . ",</p></br>";
        $message .= "<p>Welcome to facultyforyou.com. A special thanks to you as you now became a new student on the most honored and credible learning network in India. Please login and create your profile; Post your requirement/s to see the details of tutors on your requirement.</p></br>";
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
                <header class="header-text-1"  class="py-3">
                    STUDENT RECORDS
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
                                        <th scope="col">Location</th>
                                        <th scope="col">Add Testimonial</th>
                                        <th scope="col">Student detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = "SELECT students.*, cities.*, states.* FROM students 
                                            LEFT JOIN cities
                                                ON cities.city_id = students.city_id
                                            LEFT JOIN states
                                                ON states.state_id = students.state_id
                                            ORDER BY student_id ASC";
                                        
                                            $result = mysqli_query($conn, $sql);
                                            while($row = mysqli_fetch_assoc($result)){
                                                $first_name = $row['student_first_name'];
                                                $city_id = $row['city_id'];
                                                if(!empty($first_name) && !empty($city_id)){


                                                    ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $row['student_id'];?></th>
                                                        <td><?php echo $row['student_first_name'] . " " . $row['student_last_name'] ;?></td>
                                                        <td><?php echo $row['city_name'] . " ," . $row['state_name'] ;?></td>
                                                        <td class="text-center"><a class="btn btn-link btn-sm" href="<?php base_url()?>dashboard/add_records/add_testimonial.php?id=<?php echo $row['student_id'];?>">Add testimonial</a></td>
                                                        <td class="text-center"><a class="btn btn-link btn-sm" href="<?php base_url()?>dashboard/student/student_detail.php?id=<?php echo $row['student_id'];?>">More detail</a></td>
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
                <div class="tab-2 tab-detail">
                    <section class="section-record">
                        <div class="container">
                            <header class="header-text-3">
                                Not updatded profile list        
                            </header>
                            <div class="wrap-table">
                                <table class="bg-light table">
                                    <thead class="thead-light">
                                        <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Update profile email</th>
                                        <th scope="col">Student detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = "SELECT students.*, cities.*, states.* FROM students 
                                            LEFT JOIN cities
                                                ON cities.city_id = students.city_id
                                            LEFT JOIN states
                                                ON states.state_id = students.state_id
                                            ORDER BY student_id ASC";
                                        
                                            $result = mysqli_query($conn, $sql);
                                            while($row = mysqli_fetch_assoc($result)){
                                                $first_name = $row['student_first_name'];
                                                $city_id = $row['city_id'];
                                                if(empty($first_name) && empty($city_id)){

                                                    ?>

                                                    <tr>
                                                        <th scope="row"><?php echo $row['student_id'];?></th>
                                                        <td><?php echo $row['student_first_name'];?></td>
                                                        <td><?php echo $row['student_email'] ;?></td>
                                                        <td>
                                                            <form action="" method="POST">
                                                                <input type="hidden" name="name" value="<?php echo $row['student_user_name'] ; ?>">
                                                                <input type="hidden" name="id" value="<?php echo $row['student_id']; ?>">
                                                                <input type="hidden" name="email" value="<?php echo $row['student_email']; ?>">
                                                                <button class="member-nonactive" name="update_profile_detail">Create Profile</button>
                                                            </form>
                                                        </td>
                                                        <!-- <td class="text-center"><a class="btn btn-link btn-sm" href="<?php base_url()?>dashboard/add_records/add_testimonial.php?id=<?php echo $row['student_id'];?>">Add testimonial</a></td> -->
                                                        <td class="text-center"><a class="btn btn-link btn-sm" href="<?php base_url()?>dashboard/student/student_detail.php?id=<?php echo $row['student_id'];?>">More detail</a></td>
                                                    </tr>

                                                    <?php 
                                                }
                                                //end conditon
                                            }
                                            // end while loop
                                        ?>
                                    </tbody>
                                </table>    
                            </div>       
                        </div>


                    </section>
                </div>
    </div>

<?php
    include("../include/footer.inc.php");
?>