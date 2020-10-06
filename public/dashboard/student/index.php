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
        <!-- <section class="section-top">
            <div class="container">
                <div class="dashboard-top">
                    <article class="border bg-light">
                        <h2 class="text-center primary-text">
                            registered students
                        </h2>
                        <p>
                            3123213
                        </p>
                    </article>
                    <article class="border bg-light">
                        <h2 class="text-center primary-text">
                            registered teachers
                        </h2>
                        <p>
                            12321
                        </p>
                    </article>
                    <article class="border bg-light">
                        <h2 class="text-center primary-text">
                            student's post
                        </h2>
                        <p>
                            12312
                        </p>
                    </article>
                </div>
            </div>
        </section> -->
        <section class="section-record">
            <div class="container">
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
                            $sql = "SELECT std.*, cities.*, states.* FROM std 
                            LEFT JOIN cities
                                ON cities.city_id = std.city_id
                            LEFT JOIN states
                                ON states.state_id = std.state_id
                            ORDER BY student_id ASC";
                        
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($result)){
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
                        ?>
                    </tbody>
                </table>    
                </div>       
            </div>


        </section>
        <section class="section-bottom"></section>
        </div>
    </div>

<?php
    include("../include/footer.inc.php");
?>