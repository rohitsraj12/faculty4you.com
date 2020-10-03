
            <div class="body-banner">

<div class="banner-wrap">
    <section class="banner-content">
        <article>
            <header class="banner-content__header">
                <h2 class="text-primary-h-3 pb-4 mb-4">Hearty welcome to <strong class="extra-b f-link">'Faculty for you'</strong></h2>
                <h5 class="text-secondary-h pb-4">
                    We provide top <strong>tutors</strong> for <strong class="highlight-primary">academic/non-academic</strong> and <strong class="highlight-primary">online/offline</strong> activities all over <strong>India</strong>.   
                </h5>
                 <p class="text-primary-h-1 mt-5"> 
                    Hurry... Register...
                </p>
                <p class="text-secondary-h-2 ">
                    It's our responsibility to shift you from ordinary to the realm of extraordinary...
                </p>
            </header>
        </article>
    </section>
    
    <section class="section-search-home">
                <div class="wrap-search-home">
                    <div class="wrap-container search-tab">
                        <ul>
                            <li class="form-tab" data-form="student-form">
                                Students for You
                            </li>
                            <li  class="form-tab not-active" data-form="teacher-form">
                                Tutors for You
                            </li>
                        </ul>
                    </div>
                    <div class="search-tab-detail wrap-container">
                        
                        <div class="search-form student-form">
                            <form action="<?php base_url();?>search_result_student_posts.php" method="POST" class="form">
                                <div class="row">
                                    <div class="col-sm-8 form-field">
                                        <input type="search" class="form-control search_subject" name="search" id="searchInput" placeholder="Search: subject (academic) / activity (non-academic)">
                                        <!-- <small class="msg">Enter your subject / pincode / study type</small> -->
                                        <div class="subject-list" id="subjectList"></div>
                                    </div>
                                    <div class="col-sm-4 form-field">
                                        <!-- <select id="inputState" name="city" class="form-control">
                                            <option selected>Choose...</option>
                                            <?php 
                                            
                                                $city_query = "SELECT * FROM cities";
                                                $result = mysqli_query($conn, $city_query);
                                                while( $row = mysqli_fetch_assoc($result)){
                                                
                                            ?>
                                            <option value="<?php echo $row['city_name'];?>"><?php echo $row['city_name'];?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>   -->
                                        <input type="city" class="form-control city_name" name="search" id="searchInput" placeholder="city name">
                                        <small class="msg">Enter city name</small>
                                        <div class="city_list" id="city_list"></div>
                                    </div>
                                    <div class="col-sm-12 text-center">
                                        <input class="button-primary py-2" style="font-size: 2rem" name="submit-search" type="submit" value="Search">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="search-form teacher-form hide">
                            <form action="<?php base_url();?>search_result_teachers.php" method="POST" class="form">
                                <div class="row">
                                    <div class="col-sm-12 mb-5">
                                        <input type="search" class=" search_subject form-control" name="search" id="teacherSearchSubject" placeholder="Search: subject (academic) / activity (non-academic)">
                                        <div class="subject-list" id="subjectList"></div>
                                        
                                    </div>
                                    
                                    <div class="col-sm-12 text-center">
                                        <input class="button-primary py-2" style="font-size: 2rem" name="search-teacher" type="submit" value="Search">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <div class="banner-image">
                <img src="<?php base_url();?>img/banner/banner-lady.png" class="banner__image" alt="<?php echo $page_title;?>">
            </div>
</div>
<!-- end banner wrap -->
</div>
<!-- end body banner -->