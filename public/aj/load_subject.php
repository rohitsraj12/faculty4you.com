<?php
    require_once("../../private/config/db_connect.php");

    if($_POST['type'] == ""){

        $sql = "SELECT * FROM study_categories ORDER BY study_cat_type ASC";
        $result = mysqli_query($conn, $sql);

        $output = "";
        while($row = mysqli_fetch_assoc($result)){
            // echo "hi <br/>";
            $output .= '<option value="'. $row["study_cat_id"] . '">' . $row['study_cat_type'] . '</option>';
        }
    } else if($_POST['type'] == "subjectCat") {
        $id = $_POST['id'];
        $sql = "SELECT * FROM subjects_categories WHERE study_cat_id = '$id' ORDER BY sub_cat_name ASC";
        // $sql = "SELECT * FROM subjects WHERE sub_cat_id = '$id'";
        $result = mysqli_query($conn, $sql);

        // $output = "";
        $output = "<option value='nooption'>Select Subject Category</option>'";

        while($row = mysqli_fetch_assoc($result)){
            // echo $row['sub_cat_id'];
            $output .= '<option value="'. $row["sub_cat_id"] . '">' . $row['sub_cat_name'] . '</option>';
        }
    }else if($_POST['type'] == "subject") {
        $id = $_POST['id'];
        $sql = "SELECT * FROM subjects WHERE sub_cat_id = '$id' ORDER BY sub_name ASC";
        // $sql = "SELECT * FROM cities";
        $result = mysqli_query($conn, $sql);

        // $output = "";
        $output = "<option value='nooption'>Select Subject</option>'";

        while($row = mysqli_fetch_assoc($result)){
            // echo $row['subject_name'];
            $output .= '<option value="'. $row["subject_id"] . '">' . $row['sub_name'] . '</option>';
        }
    }
    echo $output;

