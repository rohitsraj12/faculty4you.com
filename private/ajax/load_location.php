<?php
    require_once("../config/db_connect.php");

    if($_POST['type'] == ""){
        // $sate_id = $_POST['state'];
        // $sql = "SELECT * FROM cities WHERE state_id = '$sate_id' ORDER BY city_id ASC";
        $sql = "SELECT * FROM states";
        $result = mysqli_query($conn, $sql);

        $output = "";
        while($row = mysqli_fetch_assoc($result)){
            $output .= '<option value="'. $row["state_id"] . '">' . $row['state_name'] . '</option>';
        }
    } else if($_POST['type'] == "cityName") {
        $id = $_POST['id'];
        $sql = "SELECT * FROM cities WHERE state_id = '$id' ORDER BY city_id ASC";
        // $sql = "SELECT * FROM cities";
        $result = mysqli_query($conn, $sql);

        $output = "";
        while($row = mysqli_fetch_assoc($result)){
            echo $row['city_name'];
            $output .= '<option value="'. $row["city_id"] . '">' . $row['city_name'] . '</option>';
        }
    }
    echo $output;