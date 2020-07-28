<?php
    $page_title = "registration page";

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
        teacher registration  
    </h1>

    <form action="include/registration.teacher.inc.php" method="post">
        <table>
            <tr>
                <td><label for="user_name">user name</label></td>
                <td><input name="user_name" type="text" id="user_name" placeholder="user name"></td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td><input name="email" type="email" id="email" placeholder="email"></td>
            </tr>
            <tr>
                <td><label for="password">password</label></td>
                <td><input name="password" type="password" id="password" placeholder="password"></td>
            </tr>
            <tr>
                <td><label for="re-password">repeat password</label></td>
                <td><input name="re_password" type="password" id="re-password" placeholder="repeat password"></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit-register" value="submit">
                </td>
            </tr>
        </table>
        
    </form>
    </div>
    <!-- end body container -->

<?php
    include 'include/footer.inc.php';
?>