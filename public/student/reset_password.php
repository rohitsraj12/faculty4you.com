<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student reset password</title>
</head>
<body>
    
    <form action="include/reset-request.inc.php" method="post">
        <label for="">reset password</label>
        <input type="text" name="email">
        <button type="submit" name="reset-request-submit" >receive new password by mail</button>

    </form>
    <?php
        if(isset($_GET['reset'])){
            if($_GET['reset'] == "success"){
                echo "<p>please check your email..</p>";
            }
        }
    
    ?>
</body>
</html>