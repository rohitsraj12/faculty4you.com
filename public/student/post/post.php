<?php
session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: ../login.php');
    } 
    $page_title = "New Post";
    $banner_image = "post.svg";
    
    require_once("../../../private/config/db_connect.php");

    require("../../../private/config/config.php");
    include("../../../private/required/public/components/social_media.php");
    require("../include/header.inc.php");


    require("../include/banner.inc.php");

?>

<div class="body-container">
    <main class="wrap-container">
        <section class="section-profile-update">
            <header class="text-primary-h-3 text-center pb-5">
            Student's Post
            </header>
            <form action="../include/post.inc.php" method="post" class="section-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input name="post_title" class="form-control title" type="text" id="title" placeholder="user name">
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
                                    <input class="form-check-input category" name="study_category" type="radio" value="1" id="academic">
                                
                                    <label class="form-check-label" for="academic">
                                        Academic
                                    </label>
                                </div>

                                <div class="form-check col-sm-12">
                                    <input class="form-check-input category" name="study_category" type="radio" value="2" id="non-academic">
                                
                                    <label class="form-check-label" for="non-academic">
                                        Non-academic
                                    </label>
                                </div>
                            
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="sub_id">Academic subjects</label>
                            <span class="error-msg"></span>
                            <select id="state" name="subject" class="form-control subject">
                                <option selected value="nooption">Choose your subject</option>
                                <?php 
                                    $city_query = "SELECT * FROM subjects ORDER BY sub_name ASC";
                                    $city_result = mysqli_query($conn, $city_query);

                                    while($row = mysqli_fetch_assoc($city_result)){
                                ?>
                                <option value="<?php echo $row["subject_id"];?>"><?php echo $row["sub_name"];?></option>
                                <?php }?>
                            </select>
                        </div>

                    
                    
                    </fieldset>
                    

                </div>
                <div class="form-row row">
                <input type="submit" class="btn col-3 btn-primary text-center h4" name="submit-post" value="submit">
                <input type="reset" class="btn col-3 btn-light text-center h4" value="reset">

                </div>
                
            </form>
        </section>
    </main>
</div>


<?php 
    require("../include/footer.inc.php");
?>