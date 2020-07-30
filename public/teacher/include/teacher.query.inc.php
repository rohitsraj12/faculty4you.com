<?php

require_once '../../private/config/db_connect.php';


    $sql = "SELECT * FROM teachers";
    $result = mysqli_query($conn, $sql);