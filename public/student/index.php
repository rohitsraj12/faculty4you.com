<?php
    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: ../login.php');
    } 
    $page_title = "home page";
    $banner_image = "post.svg";

    include_once("../../private/config/db_connect.php");
    include_once("../../private/config/config.php");
    require("include/header.inc.php");
     
        require("include/banner.inc.php");

    ?>
    <div class="body-container">
            <main></main>
            </div>
            <!-- end body container -->



            <?php 
    require("include/footer.inc.php");
?>