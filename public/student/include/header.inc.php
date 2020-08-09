<?php 

    $student_name = $_SESSION['user_name'];
    $sql = "SELECT std.*, cities.*, states.*, gender.* FROM std 
    JOIN cities
        ON cities.city_id = std.city_id
    JOIN states
        ON states.state_id = std.state_id
    JOIN gender
        ON gender.gender_id = std.gender_id
     WHERE student_user_name = '$student_name'";
    // $sql = "SELECT * FROM std WHERE student_user_name = '$student_name'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= $page_title;?> | faculty4you.com</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- stylesheet -->
        <link
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
        crossorigin="anonymous"
        />
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php base_url();?>css/owl.carousel.css">
        <link rel="stylesheet" href="<?php base_url();?>css/owl.theme.default.css">
        <link rel="stylesheet" href="<?php base_url();?>css/style.css">
    </head>
<body>
<div class="body-wrap">
            <div class="body-header" data-aos="zoom-out-down" data-aos-duration="1000">
                <div id="hamberger" class="hamberger">
                    <span class="hamberger__line"></span>
                    <span class="hamberger__line"></span>
                    <span class="hamberger__line"></span>
                </div>
                <!-- end hamberger -->
                <div class="top-header mt-0">
                    <div class="wrap-container h-5 u-right-text text-sub-primary">
                        <ul>
                            <li>
                                <i class="fa fa-user" aria-hidden="true"></i>                        

                            </li>
                            <li>
                                <?php 

                                // echo $row['teacher_user_name'];
                                echo $teacher_name;
                                ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <header class="wrap-container">
                
                    <div class="header-brand">
                        <a href="<?php base_url();?>student/index.php">
                            <img src="<?php base_url();?>img/brand/header-logo.png" alt="faculty4you">
                        </a>
                    </div>
                    <!-- end header brand -->
                    <nav class="header__nav">
                        <ul>
                            <li class="nav__list"><a href="<?php base_url();?>student/index.php" class="nav__link">home</a></li>
                            <li class="nav__list"><a href="<?php base_url();?>student/post/index.php" class="nav__link">post</a></li>
                            <li class="nav__list"><a href="<?php base_url();?>student/profile/index.php" class="nav__link">profile</a></li>
                            <li class="nav__list"><a href="<?php base_url();?>logout.php" class="nav__link">log out</a></li>
                        </ul>
                    </nav>
                    <!-- end header nav -->
                </header>
                
            </div>
            <!-- end body header -->

            <!-- 
                
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quasi sit aliquid consectetur tempora praesentium at vitae recusandae quidem mollitia, quod hic rerum explicabo facere, magnam non. Molestias maiores beatae, ullam esse expedita soluta vel voluptates eveniet unde at iusto nulla. 
            
            -->