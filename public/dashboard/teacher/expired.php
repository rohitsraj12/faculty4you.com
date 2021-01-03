<?php 
    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: ../index.php');
    }

    
$active = "teacher";
$sub = "expired";
    require("../../../private/config/config.php");
    require("../../../private/config/db_connect.php");
    include("../include/header.inc.php");


?>


<div class="body-container-right"> 
        <div class="wrap-container">
            <div class="page-header">
                <div class="container">
                    <header class="header-text-1" class="py-3">
                        EXPIRED TUTOR MEMEBERSHIP RECORDS 
                    </header>
                </div>
            </div>
            <section class="section-record">
                <div class="container">
                    <div class="wrap-table">
                    <table class="bg-light table">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Membership Expire Date</th>
                            <th scope="col">Renew membership</th>
                            <th scope="col">E-mail reminder</th>
                            <th scope="col">Add testimonial</th>
                            <th scope="col">More Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // $sql = "SELECT memberships.*, teachers.* FROM memberships
                                // LEFT JOIN teachers
                                //     ON teachers.teacher_id = memberships.teacher_id
                                // WHERE member_token = 0";
                            
                                // $result = mysqli_query($conn, $sql);

                                $date = date("Y - m - d");
                                
                                $sql = "SELECT memberships.*, teachers.* FROM memberships
                                LEFT JOIN teachers
                                    ON teachers.teacher_id = memberships.teacher_id
                                WHERE membership_expiry_date < CURRENT_DATE() AND member_token = 0";
                                $results = mysqli_query($conn, $sql);
                                

                        // $query_results = mysqli_num_rows($result);

                        // echo $query_results;

                                while($row = mysqli_fetch_assoc($results)){
                            ?>
                            <tr>
                                <td><?php echo $row['teacher_first_name'] . " " . $row['teacher_last_name'] ;?></td>
                                <td><?php echo $row['membership_expiry_date'];?></td>
                                <td><?php 

                                    // $id = $row['teacher_id'];
                                    // $member_query = "SELECT * FROM memberships";
                                    // $member_result = mysqli_query($conn, $member_query);
                                    // $member_row = mysqli_fetch_assoc($member_result);


                                    // $start = $member_row['membership_starting_date'];
                                    // $exp = $member_row['membership_expiry_date'];
                                    // $date = date("Y-m-d");
                                    
                                    // $today = strtotime($date);
                                    // $expDate = strtotime($exp);
                                    // $newDate = date("d-m-Y", strtotime($originalDate));
                                    // echo $today;

                                    // if($expDate <= $today){
                                        
                                        echo "<a href='../edit_records/update_membership.php?id=". $row['teacher_id'] . "' class='member-nonactive'>Renew Member</a>";

                                    // }
                                ?>
                                </td>
                                <td>
                                    <form action="email/expired_member.php" method="POST" class="expired__member">
                                        <input type="hidden" name="name" value="<?php echo $row['teacher_first_name'] . " " . $row['teacher_last_name'] ; ?>">
                                        <input type="hidden" name="id" value="<?php echo $row['teacher_id']; ?>">
                                        <input type="hidden" name="email" value="<?php echo $row['teacher_email']; ?>">
                                        <button class="member-nonactive" name="reminder_email">reminder email</button>
                                    </form>
                                </td>
                                <td class="text-center"><a class="btn btn-link btn-sm" href="<?php base_url()?>dashboard/add_records/add_teacher_testimonials.php?id=<?php echo $row['teacher_id'];?>">add testimonial</a></td>
                                <td class="text-center"><a class="btn btn-link btn-sm" href="<?php base_url()?>dashboard/teacher/teacher_detail.php?id=<?php echo $row['teacher_id'];?>">more details</a></td>
                            </tr>
                            <?php 
                            }
                            ?>
                            <?php
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