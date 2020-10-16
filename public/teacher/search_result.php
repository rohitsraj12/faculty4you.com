<?php  
    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: login.php');
    }
    $page_title = "Search result";
    require_once("../../private/config/db_connect.php");
    include("../../private/config/config.php");
    include("../../private/required/public/components/social_media.php");
    include("include/header.inc.php"); 
    $member = $user_row['teacher_membership_status'];
?>
<div class="body-container">
    <main>
        <?php
            $query = "SELECT * FROM teachers 
                INNER JOIN (
                    SELECT teacher_id, max(membership_id) AS highest_membership_id FROM memberships 
                    GROUP BY teacher_id) memberships ON teacher_id = memberships.teacher_id";

            $result = mysqli_query($conn, $query);

            while($rows = mysqli_fetch_assoc($result)){
            //    echo $rows['membership_id'];
               echo "hi";
            }
            echo "hello";
        ?>
    </main>
</div>

<?php
    include("include/footer.inc.php");

?>