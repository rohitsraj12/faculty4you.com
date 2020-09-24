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


    if(isset($_POST['email'])){
        $email = $_POST['email'];
        // $email = "rohitwebco@gmail.com";
        $teacher_name = $_POST['name'];

        $admin_email = "admin@facultyforyou.com";

        //send email to teacher
        $to = $email;
        $subject = "hi " . $teacher_name . ", new tuition posted in facultyforyou.com";
        $message = "<p>Dear " . $teacher_name . ",</p></br>";
        $message .= "<p>A new tuition was posted on this platform which is related to your subject and nearby you.</p></br>";
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
                        NON ACTIVE TUTOR RECORDS 
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
                                // $row = mysqli_fetch_assoc($result);


                                // $t_id = $row['teacher_id'];

                                // $sql = "SELECT * FROM teachers WHERE teacher_id = $t_id";
                                // $result = mysqli_query($conn, $sql);

                                while($row = mysqli_fetch_array($result)){
                                    
                            ?>
                                <th scope="row"><?php echo $row['teacher_id'];?></th>
                                
                                <td><?php echo $row['teacher_first_name'] . " " . $row['teacher_last_name'] ;?></td>
                                <td>
                                    <form action="" method="POST">
                                        <input type="hidden" name="name" value="<?php echo $row['teacher_first_name'] . " " . $row['teacher_last_name'] ; ?>">
                                        <input type="hidden" name="id" value="<?php echo $row['teacher_id']; ?>">
                                        <input type="hidden" name="email" value="<?php echo $row['teacher_email']; ?>">
                                        <button class="member-nonactive" name="email">reminder email</button>
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