<?php 
    
    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: login.php');
    }
    $page_title = "home page";
    $banner_image_url = "search";
    require_once("../../private/config/db_connect.php");
    include("../../private/config/config.php");

    include("include/header.inc.php");
    
       // include_once'include/search-banner.inc.php';

?>
<div class="body-container">

    
</div>

<?php
    include("include/footer.inc.php");

?>