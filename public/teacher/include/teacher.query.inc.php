<?php

require_once '../../private/config/db_connect.php';

    $sql = "SELECT posts.*, std.*, cities.city_name, states.state_name, study_types.study_type_name, study_categories.study_cat_type 
    FROM posts
        JOIN std
            ON std.student_id = posts.student_id
        JOIN cities
            ON cities.city_id = posts.city_id
        JOIN states
            ON states.state_id = posts.state_id
        JOIN study_types
            ON study_types.study_type_id = posts.study_type_id
        JOIN study_categories
            ON study_categories.study_cat_id = posts.study_cat_id
        WHERE city_id = '$city'
        ORDER BY post_id DESC ";
    $result = mysqli_query($conn, $sql);