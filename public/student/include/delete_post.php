<?php
require_once('../../../private/config/db_connect.php');

$id = $_GET['id'];
// echo $id;

$deactivate_post = "0";

$query = "UPDATE `posts` SET `post_state` = '$deactivate_post' WHERE `post_id` = '$id'";
$result = mysqli_query($conn, $query);