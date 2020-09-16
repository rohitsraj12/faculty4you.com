<?php 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" href="<?php base_url();?>img/brand/factulyforyou_fevicon.png" type="image/gif" sizes="32x32">
        
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
        crossorigin="anonymous"
     />
     <link rel="stylesheet" href="<?php base_url();?>css/dashboard.css">

      
</head>
<body>
        <div class="body-wrap">
            <div class="body-header">
              <header class="wrap-header">
                    <div class="header-brand">
                        <a href="<?php base_url();?>index.php">
                            <!-- <img src="<?php base_url();?>img/brand/header-logo.png" alt="faculty 4 you"> -->
                            faculty for you
                        </a>
                    </div>
                    <!-- end header brand -->
                    <nav class="header__nav">
                        <ul>
                            <li class="nav__list"> 
                                <form action="<?php base_url();?>dashboard/search_details.php" method="POST" class="header-search">
                                    <div class="">
                                        <input type="search" placeholder="search"  name="search" class="search__input">
                                        <button class="header-search-btn" name="submit-search">
                                            <i class="fa fa-search pr-3" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </form>
                                
                            </li>
                            <li class="nav__list">
                                 <a href="#" class="nav__link">
                                    <i class="fa fa-bell nav__link-i" aria-hidden="true"></i>
                                </a>
                                    <!-- <ul  class="sub__nav">
                                        <li class="sub__nav-list">sdcxc</li>
                                        <li class="sub__nav-list">werftgy</li>
                                    </ul> -->
                            </li>
                           
                            <li class="nav__list">
                                <a href="#" class="nav__link">
                                    <?php 

                                        $admin = 0;

                                        if( $admin == 0){
                                        ?>
                                            <img class="profile__image" style="max-height: 200px" src="<?php echo base_url()?>img/teacher/profile_pic/male_profile.svg" alt="">
                                        <?php
                                        } else {
                                        ?>
                                            <img class="profile__image" style="max-height: 300px" src="<?php echo base_url() . $row['teacher_photo'];?>" alt="">
                                        <?php
                                        }
                                    ?>
                                    <?php
                                    $user_name = $_SESSION['user_name'];

                                    if($user_name == true){echo $user_name; }
                    ?>  <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                                <ul class="sub__nav">
                                        <li class="sub__nav-list"> <a class="sub__nav-link" href="">Profile</a></li>
                                        <li class="sub__nav-list"> <a class="sub__nav-link" href="">Update</a></li>
                                        <li class="sub__nav-list"> <a class="sub__nav-link" href="<?php base_url();?>logout.php">Logout</a></li>
                                    
                                </ul>
                            </li>

                        </ul>
                    </nav>
                    <!-- end header nav -->
                </header>
            </div>
            <!-- end body header -->
            <div class="body-container">
                <main class="body-container__main">

                    <div class="body-container-left">
                        <nav class="side-main__nav">
                            <ul>
                                <li class="side-nav__list"><a class="side-nav__link <?php if($active == "home"){ echo "active";}?>" href="<?php base_url();?>dashboard/"> Dashboard </a></li>
                                <!-- <li class="side-nav__list"><a class="side-nav__link <?php if($active == "page content"){ echo "active";}?>" href="<?php base_url();?>dashboard/"> page content </a></li> -->
                                <li class="side-nav__list"><a class="side-nav__link  side-nav-toggle <?php if($active == "teacher"){ echo "active";}?>" href="#"> Tutors <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <ul class="side-sub-nav">
                                        <li>
                                            <a class="side-sub-nav__link <?php if($active == "teacher" && $sub == "activeMember"){ echo "active sub_active";}?>" href="<?php base_url();?>dashboard/teacher/active_member.php">Active Members</a> 
                                        </li> 
                                        <li>
                                            <a class="side-sub-nav__link <?php if($active == "teacher" && $sub == "expired"){ echo "active expired";}?>" href="<?php base_url();?>dashboard/teacher/expired.php">Expired Members</a> 
                                        </li>
                                        <li>
                                            <a class="side-sub-nav__link <?php if($active == "teacher" && $sub == "registered"){ echo "active registered";}?>" href="<?php base_url();?>dashboard/teacher/registered_member.php">Registered Members</a> 
                                        </li>
                                    </ul>
                                </li>
                                <li class="side-nav__list"><a class="side-nav__link <?php if($active == "student"){ echo "active";}?>" href="<?php base_url();?>dashboard/student/"> Students </a></li>
                            </ul>
                            <ul> 
                                <li class="side-nav__list"><a class="side-nav__link side-nav-toggle <?php if($active == "testimonial"){ echo "active";}?>" href="#"> Testimonial <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <ul class="side-sub-nav">
                                        <li>
                                            <a class="side-sub-nav__link <?php if($active == "testimonial" && $sub == "tutor_testimonial"){ echo "active sub_active";}?>" href="<?php base_url();?>dashboard/testimonial/teacher_testimonial.php">Tutors</a> 
                                        </li>
                                        <li>
                                            <a class="side-sub-nav__link  <?php if($active == "testimonial" && $sub == "student_testimonial"){ echo "active";}?>" href="<?php base_url();?>dashboard/testimonial/student_testimonial.php">Students</a> 
                                        </li>
                                    </ul>
                                </li>

                                <li class="side-nav__list">
                                    <a class="side-nav__link side-nav-toggle <?php if($active == "faq"){ echo "active";}?>" href="#" > FAQs <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <ul class="side-sub-nav">
                                        <li>
                                            <a class="side-sub-nav__link <?php if($active == "faq" && $sub == "faq_view"){ echo "active sub_active";}?>" href="<?php base_url();?>dashboard/faq/">View faqs</a> 
                                        </li>
                                        <li>
                                            <a class="side-sub-nav__link  <?php if($active == "faq" && $sub == "faq_compose"){ echo "active";}?>" href="<?php base_url();?>dashboard/faq/compose.php">Compose new faq</a> 
                                        </li>
                                    </ul>
                                </li>
                            
                                <li class="side-nav__list">
                                    <a class="side-nav__link side-nav-toggle <?php if($active == "add record"){ echo "active";}?>" href="<?php base_url();?>dashboard/testimonial/">Add records <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <ul class="side-sub-nav">
                                        <li>
                                            <a class="side-sub-nav__link <?php if($active == "add record" && $sub == "add location"){ echo "active sub_active";}?>" href="<?php base_url();?>dashboard/add_records/add_location.php">Add Locations</a> 
                                        </li>
                                        <li>
                                            <a class="side-sub-nav__link  <?php if($active == "add record" && $sub == "add subject"){ echo "active sub_active";}?>" href="<?php base_url();?>dashboard/add_records/add_subject.php">Add Sew Subjects</a> 
                                        </li>
                                        <li>
                                            <a class="side-sub-nav__link  <?php if($active == "add record" && $sub == "add sub category"){ echo "active sub_active";}?>" href="<?php base_url();?>dashboard/add_records/add_subject_category.php">Add new Subject Category</a> 
                                        </li>
                                        <li>
                                            <a class="side-sub-nav__link  <?php if($active == "add record" && $sub == "add study category"){ echo "active sub_active";}?>" href="<?php base_url();?>dashboard/add_records/add_study_category.php">Add new Study Category</a> 
                                        </li>
                                    </ul>
                                </li>
                                <!-- <li class="side-nav__list"><a class="side-nav__link" href="<?php base_url();?>dashboard/testimonial/"> study </a></li> -->
                            </ul>
                        </nav>
                    </div>
                    <!-- end  left -->
                  