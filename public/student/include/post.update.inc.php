<?php 

    if(isset($_POST['post_update'])){
        $id = $_GET['id'];
        $title = $_POST['title'];
        $detail = $_POST['detail'];
        $stype = $_POST['std'];
        $cat =  $_POST['cat'];
     
        $query = "UPDATE posts SET post_title = '$title',
        post_detail = '$detail',
        study_type_id = $stype,
        category_id = $cat WHERE post_id = $id"; 
        $result = mysqli_query($conn, $query);

        
        header('location:'.$base_url.'index.php');
    
    }