<?php
require_once("../config/db_connect.php");

    if($_POST['type'] == ""){

        $sql = "SELECT * FROM subjects_categories";
        $result = mysqli_query($conn, $sql);

        $output = "";
        while($row = mysqli_fetch_assoc($result)){
            // echo "hi <br/>";
            $output .= '<option value="'. $row["sub_cat_id"] . '">' . $row['sub_cat_name'] . '</option>';
        }
    } else if($_POST['type'] == "subjectName") {
        $id = $_POST['id'];
        $sql = "SELECT * FROM subjects WHERE sub_cat_id = '$id' ORDER BY subject_id ASC";
        // $sql = "SELECT * FROM cities";
        $result = mysqli_query($conn, $sql);

        $output = "";
        while($row = mysqli_fetch_assoc($result)){
            echo $row['subject_name'];
            $output .= '<option value="'. $row["subject_id"] . '">' . $row['sub_name'] . '</option>';
        }
    }
    echo $output;