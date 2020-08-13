<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reset password</title>
</head>
<body>

<?php

    $selector = $_GET['selector'];
    $validator = $_GET['validator'];

    //security
    if(empty($selector) || empty($validator)){
        echo "could not validate your requiest";
    } else {
        if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false ){
        ?>

            <form action="include/reset-password.inc.php" method="post">
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
</body>
</html>