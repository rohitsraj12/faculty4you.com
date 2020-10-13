<?php
    include_once("../../private/config/config.php");
    require_once('../../private/config/db_connect.php');
    include("../../private/required/public/components/social_media.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration - teacher | faculty4you.com | Academic - Non academic | Online - Offline Training</title>
    <link rel="icon" href="<?php base_url();?>img/brand/factulyforyou_fevicon.png" type="image/gif" sizes="32x32">
    <link
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
        crossorigin="anonymous"
        />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="body-wrap">     
    <div class="body-header">
        <div id="hamberger" class="hamberger">
            <span class="hamberger__line"></span>
            <span class="hamberger__line"></span>
            <span class="hamberger__line"></span>
        </div>
            <!-- end hamberger -->
        <header class="header-main">
            <div class="header-brand-section">
                <div class="header-top">
                    <div class="wrap-container">
                        <ul>
                            <li class="social__list pt-2">Share:</li>
                            <?php
                            foreach($social_media_share as $share_name => $share_url){
                            ?>
                            <li class="social__list"><a class="social__link" href="<?php echo $share_url ;?>" target="_blank"><img src="<?php echo base_url() . 'img/social_media/' . $share_name ;?>" alt="<?php echo $share_name ?>"></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="wrap-container">
                    <div class="header-brand header-brand-private">
                        <a href="<?php base_url();?>index.php">
                            <img src="<?php base_url();?>img/brand/faculty_for_you_brand.png" alt="faculty 4 you">
                        </a>
                    </div>
                    <!-- end header brand -->
                    <div class="header-right">
                    </div>
                </div>
            </div> 
        
            <div  class="header__nav">
                <div class="wrap-container">
                    <nav>
                        <ul>
                            <li class="nav__list"><a href="<?php base_url();?>" class="nav__link">Home</a></li>
                            <li class="nav__list"><a href="<?php base_url();?>teacher/registration.php" class="nav__link nav-active">Tutor registration</a></li>
                            <li class="nav__list"><a href="<?php base_url();?>teacher/login.php" class="nav__link">Tutor login</a></li>
                            <li class="nav__list"><a href="<?php base_url();?>student/registration.php" class="nav__link">Student registration</a></li>
                            <li class="nav__list"><a href="<?php base_url();?>student/login.php" class="nav__link">Student login</a></li>
                        </ul>
                    </nav>
                    
                    <div class="nav-social-media">
                            <ul>
                                <li class="nav-social__list text-light">Follow us: </li>
                            <?php
                            foreach($social_media_follow as $follow_name => $follow_url){
                            ?>
                            <li class="nav-social__list"><a class="nav-social__link" href="<?php echo $follow_url ;?>" target="_blank"><img src="<?php echo base_url() . 'img/social_media/' . $follow_name ;?>" alt="<?php echo $follow_name ?>"></a></li>
                            <?php
                            }
                            ?>
                            </ul>
                        </div>
                    </div>
            </div>
        </header>
    </div>    
<?php
if(!empty($_GET['error'])){
        $message = "Given username is already taken by others. Choose any other name.";
        
?>
<div class="alert alert-danger m-0" role="alert">
    <div class="wrap-container h3 py-4">
        <?php 
        echo $message;
        ?>
    </div>
</div>
<?php
    }
?>
    <div class="body-container">
        <div class="section-member wrap-container">
            <div class="container" id="container">
                <div class="form-container sign-up-container">
                    <form action="include/login.teacher.inc.php" method="post"  onsubmit="return logIn()">
                        <h1>Welcome back</h1>
                        <div class="login_row">
                            <span class="error-icon">
                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                <label class="error-message">Please enter value</label>
                            </span>
                            <input type="text" class="user_name"  placeholder="User name / Email"  name="email" />
                        </div>
                        <div class="login_row">
                            <span class="error-icon">
                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                <label class="error-message">Please enter value</label>
                            </span>
                            <input type="password" class="loginpass" placeholder="Password"  name="password"/>
                        </div>
                        <a  class="forgot_password" href="<?php base_url();?>teacher/reset_password.php">Forgot your password?</a>
                        <button name="login-submit">Login</button>
                    </form>
                </div>
                <div class="form-container sign-in-container">
                    <form  action="include/registration.teacher.inc.php" method="post" onsubmit="return registration()">
                        <h1>Create your account</h1>
                        <div class="reg_row w-100">
                          <span class="error-icon">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                            <label class="error-message">Please enter value</label>
                        </span>
                        <input type="text" name="user_name" class="reg" placeholder="user name" />
                        </div>
                        <div class="reg_row w-100">
                          <span class="error-icon">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                            <label class="error-message" id="valid-number">Please enter value</label>
                        </span>
                        <input type="tel" name="telephone" class="reg" placeholder="phone number">
                        <small for="" class="form-note">eg: 9898989898</small>

                        </div>
                        <div class="reg_row w-100">
                          <span class="error-icon">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                            <label class="error-message" id="valid-email">Please enter value</label>
                        </span>
                        <input name="email" type="text" class="reg" placeholder="email" />
                        </div>
                        <div class="reg_row w-100">
                          <span class="error-icon">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                            <label class="error-message" id="valid-password">Please enter value</label>
                        </span>
                        <input name="password" type="password" class="reg regPwd" placeholder="password" />
                        <small for="" class="form-note">Password length should be between 7 - 15 </small>

                        </div>
                        <div class="reg_row w-100">
                          <span class="error-icon">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                            <label class="error-message" id="wrong-password">Please enter value</label>
                        </span>
                        <input name="re_password" type="password" class="reg regPwd" placeholder="repeat password">
                        </div>
                        <button name="submit-register" >Sign Up</button>
                    </form>
                </div>
                <div class="overlay-container">
                    <div class="overlay">
                        <div class="overlay-panel overlay-right">
                        <h1>Hello tutor!</h1>
                            <p class="">If you are already a member..</p>
                            <button class="ghost" id="signIn">Login</button>     
                        </div>
                        <div class="overlay-panel overlay-left">
                        <h1>Hello, Tutor!</h1>
                            <p class="">If you are new to <strong>Faculty for you</strong>.</p>
                            <button class="ghost" id="signUp">Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    </div>
    
    <script src="<?php base_url();?>js/jquery-3.5.1.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="<?php base_url();?>js/script.js"></script>
    <script src="<?php base_url();?>js/regVal.js"></script>
    
    <script>
        AOS.init();
        </script>
    <script>
    const signUpButton = document.getElementById('signIn');
    const signInButton = document.getElementById('signUp');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });
    </script>
</body>
</html>
