<?php
    // require_once("../../../private/config/db_connect.php");

function states_list($conn){
    $output = "";

    $sql = "SELECT * FROM states";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
        
        $output .=  '<option value="'. $row["state_id"] . '">' . $row['state_name'] . '</option>';
    }

    return $output;
}

function city_list($conn){
    $output = "";
    $sql = "SELECT * FROM cities";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
        
        $output .=  '<option class="city_list" value="'. $row["city_id"] . '">' . $row['city_name'] . '</option>';
    }

    return $output;
}



?>