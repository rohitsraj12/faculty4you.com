<?php
    include_once("../../private/config/config.php");
    require_once('../../private/config/db_connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in - teacher</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <div class="body-wrap">
        <div class="body-header">

        </div>
        <div class="body-container">


        <div class="section-member wrap-container">

            <div class="container" id="container">
                <div class="form-container sign-up-container">
                    <form  action="include/registration.teacher.inc.php" method="post">
                        <h1>Create Account</h1>
                        <div class="social-container">
                            <!-- <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                            <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a> -->
                        </div>
                        <!-- <span>or use your email for registration</span> -->
                        <input type="text" name="user_name" id="user_name" placeholder="user name" />
                        <input name="email" type="email" id="email" placeholder="email" />
                        <input name="password" type="password" id="password" placeholder="password" />
                        <input name="re_password" type="password" id="re-password" placeholder="repeat password">
                        <button  name="submit-register" >Sign Up</button>
                    </form>
                </div>
                <div class="form-container sign-in-container">
                    <form action="include/login.teacher.inc.php" method="post" >
                        <h1>Teacher Sign In</h1>
                        <div class="social-container">
                            <!-- <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                            <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a> -->
                        </div>
                        <!-- <span>or use your account</span> -->
                        <input type="text" id="user_name"  placeholder="User name / Email"  name="email" />
                        <input type="password" placeholder="Password"  name="password"/>
                        <a href="#">Forgot your password?</a>
                        <button name="login-submit">Sign In</button>
                    </form>
                </div>
                <div class="overlay-container">
                    <div class="overlay">
                        <div class="overlay-panel overlay-left">
                            <h1>Welcome Back!</h1>
                            <p>To keep connected with us please login with your personal info</p>
                            <button class="ghost" id="signIn">Sign In</button>
                        </div>
                        <div class="overlay-panel overlay-right">
                            <h1>Hello, Teachers!</h1>
                            <p>Enter your personal details and start journey with us</p>
                            <button class="ghost" id="signUp">Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    

    <script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
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
