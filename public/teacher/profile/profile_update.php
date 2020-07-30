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

    
    while($row = mysqli_fetch_assoc($result)){
?>

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
                <heeader class="text-primary"> 
                    update profile
                </header>
                
            </div>

            <div class="section-body">
                <section class="section-detail-info">
                    <form>
                        <article>
                            <header class="article__header bg-light pl-3">
                                personal information
                            </header>
                            <div class="article-body">
                        
                                <div class="form-row">
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
                        <article>
                            <header class="article__header bg-light pl-3">
                                professional information
                            </header>
                            <div class="article-body">
                                <div class="form-row">
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
                                    <legend class="col-form-label col-sm-2 pt-0">teaching type</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        
                                        <label class="form-check-label" for="gridRadios1">
                                            one to one online
                                        </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        
                                        <label class="form-check-label" for="gridRadios1">
                                            one to one online
                                        </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        
                                        <label class="form-check-label" for="gridRadios1">
                                            one to one online
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











