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
                    <li class="header-tab__button" data-header-tab="tab-1">activated profiles</li>
                    <li class="header-tab__button active-tab" data-header-tab="tab-2">not activated profile</li>
                </ul>
                <!-- activated profile -->
                <div class="tab-1 tab-detail ">
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
                <div class="tab-2 tab-detail active-tab-detail">
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
                                                            <!-- email/reminder_email.php -->
                                                            <!-- <form action="" method="POST" class="form-submit">
                                                                <input type="hidden" class="user-name" name="name" value="<?php echo $row['student_user_name'] ; ?>">
                                                                <input type="hidden" class="id" name="id" value="<?php echo $row['student_id']; ?>">
                                                                <input type="hidden" class="email" name="email" value="<?php echo $row['student_email']; ?>">
                                                                <button class="member-nonactive" name="update_profile_detail">Create Profile</button>
                                                            </form> -->
                                                            <button class="member-nonactive submit-email" data-id="<?php echo "rohitwebco@gmail.com"//$row['student_email']; ?>" name="update_profile_detail" >Create Profile</button>

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