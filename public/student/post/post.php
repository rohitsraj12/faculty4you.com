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
        <!-- <table>
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
           
        </table> -->
        <div class="form-group">
            <label for="title">Title</label>
            <input name="post_title" class="form-control" type="text" id="title" placeholder="user name">
        </div>
        
        <div class="form-group">
            <label for="about">about me</label>
            <textarea name="post_detail" class="form-control" rows="10" id="about" placeholder="Briefly explain about yourself"></textarea>
            
        </div>
        <div class="row">
            <fieldset class="form-group col-sm-4">
                <div class="row">
                    <label class="label col-form-label col-sm-4 pt-0">Study type</label>
                    <div class="col-sm-6 row">
                        <div class="form-check col-sm-12">
                            <input class="form-check-input" name="study_type" type="radio" value="1" id="single">
                        
                            <label class="form-check-label" for="single">
                                online one to one
                            </label>
                        </div>
                        <div class="form-check col-sm-12">
                            <input class="form-check-input" name="study_type" type="radio" value="2" id="group">
                        
                            <label class="form-check-label" for="group">
                                online group
                            </label>
                        </div>
                        <div class="form-check col-sm-12">
                            <input class="form-check-input" name="study_type" type="radio" value="3" id="home">
                        
                            <label class="form-check-label" for="home">
                                home
                            </label>
                        </div>
                        
                    </div>
                </div>
            </fieldset> 
            <fieldset class="form-group col-sm-6">
                <div class="row">
                    <label class="label col-form-label col-sm-3 pt-0">Study category</label>
                    <div class="col-sm-6 row">
                        <div class="form-check col-sm-12">
                            <input class="form-check-input" name="study_category" type="radio" value="1" id="academic">
                        
                            <label class="form-check-label" for="academic">
                                academic
                            </label>
                        </div>

                        <div class="form-check col-sm-12">
                            <input class="form-check-input" name="study_category" type="radio" value="2" id="non-academic">
                        
                            <label class="form-check-label" for="non-academic">
                                non-academic
                            </label>
                        </div>
                    
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="form-row row">
            <!-- <div class="form-group col-sm-2">
                <label for="state">State</label>
                <select id="state" class="form-control" name="state">
                    <option selected>Choose...</option>
                    <?php
                        // $state_query = "SELECT * from states";
                        // $result = mysqli_query($conn, $state_query);

                        // while($row = mysqli_fetch_assoc($result)){
                            
                    ?>
                    <!-- <option value="<?php //echo $row['state_id'];?>"><?php //echo $row['state_id'];?></option>     -->
                    <?php 
                        //}
                    ?>
                </select>
            </div> -->
            <!-- <div class="form-group col-sm-6">
                <label for="date">date</label>
                <input name="post_date" class="w-25 form-control" type="date" id="date" placeholder="user name">
            </div> -->
            <div class="form-group col-sm-3">
                <!-- <label for="city">City</label> -->
                <!-- <input type="hidden" class="form-control" name="state" value="<?php $row['state_id']?>" id="city" placeholder="city">
                <input type="hidden" class="form-control" name="city" value="<?php $row['city_id']?>" id="city" placeholder="city"> -->
            </div>
        </div>
        <div class="form-row row">
        <input type="submit" class="col-3 w-100 btn-primary text-center h4" name="submit-post" value="submit">
        <input type="reset" class="col-3 w-100 btn-light text-center h4" name="submit-post" value="submit">

        </div>
        
    </form>
</main>
    </div>


<?php 
    require("../include/footer.inc.php");
?>
Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti corporis officia iusto suscipit reprehenderit rem adipisci itaque nostrum laborum alias!