<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reset password</title>
</head>
<body>

<?php

    //$selector = $_GET['selector'];
   // $validator = $_GET['validator'];

    //security
    //if(empty($selector) || empty($validator)){
       // echo "could not validate your requiest";
    //} else {
        //if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false ){
        ?>

            <form action="include/reset-password.inc.php" method="post">
                <input type="hidden" name="selector" value="<?php// echo $selector?>">
                <input type="hidden" name="validator" value="<?php// echo $validator?>">

                
                <input type="password" name="pwd" placeholder="enter password">
                <input type="password" name="pwd-repeat" placeholder="reenter password">

                
                <button type="submit" name="reset_password_submit">reset password</button>
            </form>

        <?php
       // }
    //}
?>
</body>
</html> -->



<?php
    include_once("../../private/config/config.php");
    require_once('../../private/config/db_connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create new password</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <div class="body-wrap">
        
    <div class="member-body-header">
    <div id="hamberger" class="hamberger">
                    <span class="hamberger__line"></span>
                    <span class="hamberger__line"></span>
                    <span class="hamberger__line"></span>
     </div>
                <!-- end hamberger -->
            <header class="wrap-container">
                <div class="brand">
                    <a href="<?php base_url();?>index.php">
                        <img src="<?php base_url();?>img/brand/header-logo.png" alt="">
                    </a>
                </div>
                <nav class="header__nav">
                        <ul>
                        </ul>
                    </nav>
                    <!-- end header nav -->
            </header>
        </div>

        <div class="body-container">
        <div class="section-forgotpwd section-setpwd wrap-container">

            <div class="container" id="container">
                <div class="form-container password-container">
                <?php

                    $selector = $_GET['selector'];
                    $validator = $_GET['validator'];

                    // security
                    if(empty($selector) || empty($validator)){
                    echo "could not validate your requiest";
                    } else {
                        if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false ){
                        ?>

                    <form action="include/reset-password.inc.php" method="post">
                        <h1>Create new password</h1>
                        <input type="hidden" name="selector" value="<?php echo $selector?>">
                        <input type="hidden" name="validator" value="<?php echo $validator?>">

                        
                        <input type="password" name="pwd" placeholder="enter password">
                        <input type="password" name="pwd-repeat" placeholder="reenter password">

                        
                        <button type="submit" name="reset_password_submit">reset password</button>
                    </form>
                    <?php
       }
    }
?>
                </div>
               
            </div>
            </div>
        </div>
    </div>
    

    
    <script src="<?php base_url();?>js/jquery-3.5.1.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="<?php base_url();?>js/script.js"></script>
    
    <script>
        AOS.init();
        </script>
    
</body>
</html>
