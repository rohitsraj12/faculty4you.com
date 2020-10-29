<?php
    $page_title = "Contact Us";
    require("../private/config/config.php");
    require_once("../private/config/db_connect.php");
    include("../private/required/public/components/social_media.php");
    include_once("../private/required/public/header.public.php");
?>
<div class="body-container">
    <main class="wrap-container">      
        <div class="section-header u-center-text">
            <heeader class="text-primary-h-3"> 
                Contact us
            </header>
        </div>
        <div class="row">
            <div class="col-sm-8 section__form-update">  
                <form action="">
                    <article>
                        <header class="p-4 h3 article-profile__header text-light m-0">
                            Query form
                        </header>
                        <div class="row p-5">
                            <div class="form-group col-sm-6">
                                <label for="name">Full Name</label>
                                <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Please enter your name">
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="phone">Phone </label>
                                <input type="tel" class="form-control" name="phone" id="phone" aria-describedby="emailHelp" placeholder="Please enter your phone numner">
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  placeholder="Please enter your email address">
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="exampleInputEmail1">I am a</label>
                                <select class="form-control">
                                    <option value="nooption">Select type</option>
                                    <option vlaue="tutor">Tutor</option>
                                    <option value="student">Student</option>
                                </select>
                                <!-- <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> -->
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="message">Message</label>
                                <span class="error-msg"></span>
                                <textarea name="message" class="form-control" rows="5" id="message" placeholder="Please enter your query / message here"></textarea>
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                            <div class="col-sm-12">
                                <button  type="submit" class="button-primary" name="update" >Submit</button> 
                            </div>
                        </div>
                    </article>
                </form>
            </div>

            <div class="col-sm-4 ">
               
               <aside>
                    <article class="post-sections">
                        <header class="p-4 h3 post-header text-light m-0">
                            Social media
                        </header>
                        <div class="post-body social-media">
                            <ul>
                                <?php
                                foreach($social_media_follow as $follow_name => $follow_url){
                                ?>
                                <li class="social__list"><a class="social__link" href="<?php echo $follow_url ;?>" target="_blank"><img src="<?php echo base_url() . 'img/social_media/' . $follow_name ;?>" alt="<?php echo $follow_name ?>"></a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </article>

                    <article class="post-sections">
                        <header class="p-4 h3 post-header text-light m-0">
                            Contact details
                        </header>
                        <div class="post-body social-media">
                            <ul>
                                <li>email :</li>
                                <li>admin@facultyforyou.com</li>
                            </ul>
                        </div>
                    </article>
               </aside>
                
            </div>
        </div> 
    </main>
</div>
<?php
  include("../private/required/public/components/agreement.php");
  include_once("../private/required/public/footer.public.php");
?>