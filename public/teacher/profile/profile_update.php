<?php
     session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: ../login.php');
    } 
    $page_title = "profile update";
    
    require_once("../../../private/config/db_connect.php");
    require("../../../private/config/config.php");

    require("../include/header.inc.php");
    require("../include/banner.inc.php");

    
    while($row = mysqli_fetch_assoc($result)){
?>
    <!-- <div class="profile-banner">
        <section class="profile-container wrap-container">
            <article class="row">
                <header class="h1 col-sm-7 text-center">
                    Update Profile
                </header>
                <figure class=" col-sm-5">
                    <img src="<?php base_url()?>img/search.svg" alt="">
                </figure>
            </article>
        </section>
    </div> -->

<div class="body-container">
                
    <div class="header__profile u-right-text text-sub-primary">
        <i class="fa fa-user" aria-hidden="true"></i>                        
        <?php 
            echo $row['teacher_user_name'];
            
        }
        ?>
    </div>

    

    <main class="wrap-container profile">
        <section class="section-profile-update">
            <div class="section-header u-center-text"  data-aos="zoom-out-up" data-aos-duration="1000">
                <heeader class="text-primary h1 text-secondary"> 
                    Update profile
                </header>
                
            </div>

            <div class="section-body">
                <section class="section-update-form">
                    <form action="" method="" class="section__form section__form-update">
                        <article class="mb-5"  data-aos="zoom-out-up" data-aos-duration="1000">
                            <header class="p-4 h3 bg-dark text-light m-0">
                                personal information
                            </header>
                            <div class="py-4 px-5 text-dark bg-light border">
                        
                                <div class="form-row pt-3">
                                    <div class="form-group col-md-6">
                                    <label for="inputEmail4">first name</label>
                                    <input type="email" class="form-control" id="inputEmail4">
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="inputPassword4">last name</label>
                                    <input type="password" class="form-control" id="inputPassword4">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" class="form-control" id="inputEmail4">
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="inputPassword4">telephone</label>
                                    <input type="" class="form-control" id="inputPassword4">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Address</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="inputCity">City</label>
                                    <input type="text" class="form-control" id="inputCity">
                                    </div>
                                    <div class="form-group col-md-4">
                                    <label for="inputState">State</label>
                                    <select id="inputState" class="form-control">
                                        <option selected>Choose...</option>
                                        <option>...</option>
                                    </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                    <label for="inputZip">Zip</label>
                                    <input type="text" class="form-control" id="inputZip">
                                    </div>
                                </div>
                                                  
                            </div>
                        </article>
                        <article  data-aos="zoom-out-up" data-aos-duration="1000">
                            <header class="p-4 h3 bg-dark text-light m-0">
                                professional information
                            </header>
                            <div class="py-4 px-5 text-dark bg-light border mb-5">
                                <div class="form-row pt-3 mb-3">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">teaching experience</label>
                                        <input type="email" class="form-control" id="inputEmail4">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">subject</label>
                                        <input type="text" class="form-control" id="inputPassword4">
                                    </div>
                                </div>
                                <fieldset class="form-group">
                                    <div class="row">
                                        <label class="label col-form-label col-sm-2 pt-0">teaching type</label>
                                        
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="single">
                                            
                                                <label class="form-check-label" for="single">
                                                    online one to one tuition
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="group">
                                            
                                                <label class="form-check-label" for="group">
                                                    online group tuition
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="home">
                                            
                                                <label class="form-check-label" for="home">
                                                    home tuition
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="form-group">
                                    <label for="validationTextarea">Textarea</label>
                                    <textarea class="form-control" id="validationTextarea" placeholder="Required example textarea"></textarea>
                                    
                                </div>

                            </div>

                            <a class="w-100 button-primary text-center" href="<?php base_url()?>teacher/profile/">update</a>
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












