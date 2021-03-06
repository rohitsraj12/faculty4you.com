<?php 
    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: ../index.php');
    }

    
$active = "teacher";
    require("../../../private/config/config.php");
    require("../../../private/config/db_connect.php");
    include("../include/header.inc.php");

?>
    <div class="body-container-right"> 
        <div class="wrap-container">
            <div class="page-header">
                <div class="container">
                    <header class="header-text-1" class="py-3">
                        TRAINER RECORDS
                    </header>
                </div>
            </div>
            <section class="section-record">
                <div class="container">
                    <div class="wrap-table">
                    <table class="bg-light table">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Member expire date</th>
                            <th scope="col">Add testimonial</th>
                            <th scope="col">More Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT teachers.*, cities.*, states.* FROM teachers 
                                LEFT JOIN cities
                                    ON cities.city_id = teachers.city_id
                                LEFT JOIN states
                                    ON states.state_id = teachers.state_id
                                ORDER BY teacher_id DESC";
                            
                                $result = mysqli_query($conn, $sql);
                                

                        // $query_results = mysqli_num_rows($result);

                        // echo $query_results;

                                while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <th scope="row"><?php echo $row['teacher_id'];?></th>
                                <td><?php echo $row['teacher_first_name'] . " " . $row['teacher_last_name'] ;?></td>
                                <td><?php echo $row['teacher_email'];?></td>
                                <td><?php 
                                    $id = $row['teacher_id'];
                                    $member_query = "SELECT * FROM memberships WHERE teacher_id = $id ";
                                    $member_result = mysqli_query($conn, $member_query);
                                    $member_row = mysqli_fetch_assoc($member_result);

                                    $start = $member_row['membership_starting_date'];
                                    $exp = $member_row['membership_expiry_date'];
                                    $date = date("Y - m - d");
                                    
                                    if($exp <= $date){
                                        echo "<a href='../add_records/add_membership.php?id=". $row['teacher_id'] . "' class='member-nonactive'>Member</a>";
                                    } else {
                                        echo "<span class='member-active'>Member</span>";
                                    }
                                ?></td>
                                <td class="text-center"><a class="btn btn-link btn-sm" href="<?php base_url()?>dashboard/add_records/add_teacher_testimonials.php?id=<?php echo $row['teacher_id'];?>">Add testimonial</a></td>
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
            <section class="section-bottom"></section>
        </div>
    </div>

<?php
    include("../include/footer.inc.php");
?>