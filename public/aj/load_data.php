<?php
    require_once("../../private/config/db_connect.php");
    
    if(isset($_POST["subject"])){
        $input_subject = $_POST['subject'];
        
        $output = "";
        $query = "SELECT * FROM subjects WHERE sub_name LIKE '%". $_POST['subject'] . "%'";
        $result = mysqli_query($conn, $query);

        $output = '<ul class="search_input_select">';
        if(mysqli_num_rows($result) > 0){
           
            while($row = mysqli_fetch_assoc($result)){
                $output .= '<li>' . $row['sub_name'] . '</li>';
            }
        } else {
            $output .= '<li>Subject not found in our record</li>';
        }

        $output .= '</ul>';
        echo $output;
    }

    if(isset($_POST["city"])){
        $input_subject = $_POST['city'];
        
        $output = "";
        $query = "SELECT * FROM cities WHERE city_name LIKE '%". $_POST['city'] . "%'";
        $result = mysqli_query($conn, $query);

        $output = '<ul class="search_input_select">';
        if(mysqli_num_rows($result) > 0){
           
            while($row = mysqli_fetch_assoc($result)){
                $output .= '<li data-city-id="'. $row['city_id'] .'">' . $row['city_name'] . '</li>';
            }
        } else {
            $output .= '<li>City not found in our record</li>';
        }

        $output .= '</ul>';
        echo $output;
    }