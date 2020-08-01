<?php
session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: ../login.php');
    } 
    $page_title = "New Post";
    require_once("../../../private/config/db_connect.php");

    require("../../../private/config/config.php");
    require("../include/header.inc.php");

?>
    
                    
<div class="header__profile u-right-text text-sub-primary">
    <i class="fa fa-user" aria-hidden="true"></i>                        
    <?php 
       echo $row['student_user_name'];
        
    ?>
</div>
<?php 
require("../include/banner.inc.php");

?>

<div class="body-container">
<main class="wrap-container">

<form action="../include/post.inc.php" method="post">
        <table>
            <tr>
                <td><label for="user_name">title</label></td>
                <td><input name="post_title" type="text" id="user_name" placeholder="user name"></td>
            </tr>
            <tr>
                <td><label for="email">detail</label></td>
                <td>
                    <textarea name="post_detail" id="" cols="30" rows="10"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                <td><label for="email">study type</label></td>

                </td>
                <td>
                    <td>
                        <input name="study_type" type="number" id="email" placeholder="email"></td>
                </td>
            </tr>
            <tr>
                <td>
                <td><label for="email">study category</label></td>

                </td>
                <td>
                    <td>
                        <input name="study_category" type="number" id="email" placeholder="email"></td>
                </td>
            </tr>
            <tr>
                <td>
                <td><label for="email">city</label></td>

                </td>
                <td>
                    <td>
                        <input name="city" type="number" id="email" placeholder="email"></td>
                </td>
            </tr>
            <tr>
                <td>
                <td><label for="email">state</label></td>

                </td>
                <td>
                    <td>
                        <input name="state" type="number" id="email" placeholder="email"></td>
                </td>
            </tr>
            <tr>
                <td>
                <td><label for="email">stating date</label></td>

                </td>
                <td>
                    <td>
                        <input name="post_date" type="date" id="email" placeholder="email"></td>
                </td>
            </tr>
            
            <tr>
                <td>
                    <input type="submit" name="submit-post" value="submit">
                </td>
            </tr>
           
        </table>
        
    </form>
</main>
    </div>


<?php 
    require("../include/footer.inc.php");
?>