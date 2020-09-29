<?php 

    if(isset($_POST['post_update'])){
        $id = $_GET['id'];
        $title = $_POST['title'];
        $detail = $_POST['detail'];
        $study_type = $_POST['study_type'];
        $study_category = $_POST['study_category'];
        $subject_category = $_POST['subject_category'];
        $subject = $_POST['subject'];
     
        $query = "UPDATE posts SET post_title = '$title',
        post_detail = '$detail',
        study_type_id = '$study_type',
        study_cat_id = '$study_category',
        category_id = '$subject_category',
        subject_id = $subject WHERE post_id = $id"; 
        $result = mysqli_query($conn, $query);

        
        header('location:'.$base_url.'index.php?message=$message');
        
    
    }