<?php 
    //  session_start();
    // //back function false
    // if(!isset($_SESSION['user_name'])){
    //     header('location: ../login.php');
    // } 
    $page_title = "profile update";
    
    require_once("../../../private/config/db_connect.php");
    require("../../../private/config/config.php");


    require("../include/header.inc.php");

   // while($row = mysqli_fetch_assoc($result)){

?>


<div class="body-container">
                
    <div class="header__profile u-right-text text-sub-primary">
        <i class="fa fa-user" aria-hidden="true"></i>                        
        <?php 
           // echo $row['teacher_user_name'];
            
        //}
        ?>
    </div>

    

    <main class="wrap-container profile">
        <section class="section-profile-update">
            <div class="section-header u-center-text"  data-aos="zoom-out-up" data-aos-duration="1000">
                <heeader class="text-primary-h text-secondary"> 
                    Update profile
                </header>
                
            </div>

            <div class="section-body">
                <section class="section-update-form">
                    <form action="" method="post" class="section__form section__form-update">
                        <article class="mb-5"  data-aos="zoom-out-up" data-aos-duration="1000">
                            <header class="p-4 h3 bg-dark text-light m-0">
                                Primary information
                            </header>
                            <div class="py-4 px-5 text-dark bg-light border">
                        
                                <div class="form-row pt-3">
                                    <div class="form-group col-md-6">
                                    <label for="first_name">first name</label>
                                    <input type="text" name="first_name" class="form-control" id="first_name" placeholder="first name">
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="last_name">last name</label>
                                    <input type="text" name="last_name" class="form-control" id="last_name" placeholder="last name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="photo">upload image</label>
                                    <input type="file" name="file" class="form-control-file" id="photo">
                                </div>
                                <fieldset class="form-group">
                                    <div class="row">
                                        <label class="label col-form-label col-sm-2 pt-0">gender</label>
                                        <div class="col-sm-8 row">
                                            <div class="form-check col-sm-2">
                                                <input class="form-check-input" name="gender" type="radio" value="1" id="male">
                                            
                                                <label class="form-check-label" for="male">
                                                    male
                                                </label>
                                            </div>

                                            <div class="form-check col-sm-2">
                                                <input class="form-check-input" name="gender" type="radio" value="2" id="female">
                                            
                                                <label class="form-check-label" for="female">
                                                    female
                                                </label>
                                            </div>
                                            <div class="form-check col-sm-2">
                                                <input class="form-check-input" name="gender" type="radio" value="3" id="other">
                                            
                                                <label class="form-check-label" for="other">
                                                    other
                                                </label>
                                            </div>
                                          
                                        </div>
                                    </div>
                                </fieldset>
                                                  
                            </div>
                        </article>
                        <article  data-aos="zoom-out-up" data-aos-duration="1000">
                            <header class="p-4 h3 bg-dark text-light m-0">
                                contact details
                            </header>
                            <div class="py-4 px-5 text-dark bg-light border mb-5">
                                <!-- contact info -->
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="email">
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="phone">telephone</label>
                                    <input type="tel" class="form-control" id="phone" placeholder="telephone">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" placeholder="1234 Main St">
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" id="city" placeholder="city">
                                    </div>
                                    <div class="form-group col-md-4">
                                    <label for="state">State</label>
                                    <select id="state" class="form-control">
                                        <option selected>Choose...</option>
                                        <option>...</option>
                                    </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                    <label for="pincode">pincode</label>
                                    <input type="text" class="form-control" id="pincode">
                                    </div>
                                </div>
                                <fieldset class="form-group">
                                    <div class="row">
                                        <label class="label col-form-label col-sm-2 pt-0">teaching type</label>
                                        
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="online_one" name="online_one">
                                            
                                                <label class="form-check-label" for="online_one">
                                                    online one to one tuition
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="2" id="online_group" name="online_group">
                                            
                                                <label class="form-check-label" for="online_group">
                                                    online group tuition
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="3" id="home_tution" name="home_tution">
                                            
                                                <label class="form-check-label" for="home_tution">
                                                    home tuition
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <!-- <fieldset class="form-group">
                                    <div class="row">
                                        <label class="label col-form-label col-sm-2 pt-0">category</label>
                                        <div class="col-sm-8 row">
                                            <div class="form-check col-sm-2">
                                                <input class="form-check-input" name="category" type="radio" value="1" id="academic">
                                            
                                                <label class="form-check-label" for="academic">
                                                    academic
                                                </label>
                                            </div>

                                            <div class="form-check col-sm-4">
                                                <input class="form-check-input" name="category" type="radio" value="2" id="non-academic">
                                            
                                                <label class="form-check-label" for="non-academic">
                                                    non-academic
                                                </label>
                                            </div>
                                           
                                          
                                        </div>
                                    </div>
                                </fieldset>
                        
                                <div class="form-row pt-3 mb-3">
                                    <div class="form-group col-md-6">
                                        <label for="teaching_exp">teaching experience</label>
                                        <input type="number" class="form-control" id="teaching_exp" placeholder="0">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="sub_id">subject</label>
                                        <input type="text" class="form-control" id="sub_id" placeholder="IIT-JEE / physics / yoga">
                                    </div>
                                </div> -->
                             
                                <!-- <div class="form-group">
                                    <label for="about">about me</label>
                                    <textarea class="form-control" id="about" placeholder="Briefly explain about yourself"></textarea>
                                    
                                </div> -->

                            </div>

                            <a class="w-100 button-primary text-center" name="submit_update" href="<?php base_url();?>teacher/profile/">update</a>
                        </article>
                    </form>
                </section>
            </div>
        </section>
    </main>
</div>
<!-- 
 first name
 last name
 telephone
 email
 address
 pincode
 experience
 subject
 
 
 city
 state


 type of tuition -->





<?php 
    require("../include/footer.inc.php");
?>