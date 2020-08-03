<?php
session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: ../login.php');
    } 
    $page_title = "Update my Post";
    
    $banner_image = "post.svg";
    
    require_once("../../../private/config/db_connect.php");

    require("../../../private/config/config.php");
    require("../include/header.inc.php");

 
    require("../include/banner.inc.php");

?>

<div class="body-container">
<main class="wrap-container">
    <header class="text-primary-h pb-5 text-center">
       Update post
    </header>
    <form action="../include/post.update.inc.php" method="post">
       
        <div class="form-group">
            <label for="title">Title</label>
            <input name="post_title" class="form-control" type="text" id="title" placeholder="user name">
        </div>
        
        <div class="form-group">
            <label for="about">About me</label>
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
                                Online one to one
                            </label>
                        </div>
                        <div class="form-check col-sm-12">
                            <input class="form-check-input" name="study_type" type="radio" value="2" id="group">
                        
                            <label class="form-check-label" for="group">
                                Online group
                            </label>
                        </div>
                        <div class="form-check col-sm-12">
                            <input class="form-check-input" name="study_type" type="radio" value="3" id="home">
                        
                            <label class="form-check-label" for="home">
                                Home
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
                                Academic
                            </label>
                        </div>

                        <div class="form-check col-sm-12">
                            <input class="form-check-input" name="study_category" type="radio" value="2" id="non-academic">
                        
                            <label class="form-check-label" for="non-academic">
                                Non-academic
                            </label>
                        </div>
                    
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="form-row row">
            <div class="col-3">
                <input type="submit" class="w-100 btn btn-primary text-center" name="update_post" value="submit">

            </div>
            <div class="col-3">
                <input type="reset" class="w-100 btn btn-light text-center" value="reset">

            </div>


        </div>
     </form>
</main>
    </div>


<?php 
    require("../include/footer.inc.php");
?>