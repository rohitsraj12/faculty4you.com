<?php
    include_once("../../private/config/config.php");
    require_once('../../private/config/db_connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in - student</title>
</head>
<body>
    <h1>
        student Log in 
    </h1>

    <form action="include/login.student.inc.php" method="post">
        <table>
            <tr>
                <td><label for="user_name">email/user name</label></td>
                <td><input type="text" id="user_name" placeholder="user name" name="email"></td>
            </tr>
            <tr>
                <td><label for="password">password</label></td>
                <td><input type="password" id="password" placeholder="password" name="password"></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="login-submit" value="submit"> | <a href="reset_password.php">forgot password</a>
                </td>
            </tr>
        </table>
        
    </form>
</body>
</html>
