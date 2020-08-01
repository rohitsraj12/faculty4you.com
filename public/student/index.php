<?php
    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: ../login.php');
    } 
    $page_title = "home page";

    include_once("../../private/config/db_connect.php");
    include_once("../../private/config/config.php");
    require("include/header.inc.php");
    


    ?>
    
                    
        <div class="header__profile u-right-text text-sub-primary">
            <i class="fa fa-user" aria-hidden="true"></i>                        
            <?php 
               echo $row['student_user_name'];
                
            ?>
        </div>
    <?php 
        require("include/banner.inc.php");

    ?>
    <div class="body-container">
            <main></main>
            </div>
            <!-- end body container -->



            <?php 
    require("include/footer.inc.php");
?>