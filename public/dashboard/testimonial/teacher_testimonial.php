<?php 
    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: ../index.php');
    }

    $active = "testimonial";
    $sub = "tutor_testimonial";

    require("../../../private/config/config.php");
    require("../../../private/config/db_connect.php");
    include("../include/header.inc.php");

?>
    <div class="body-container-right"> 
        <div class="wrap-container">
        <div class="page-header">
            <div class="container">
                <header class="header-text-1" class="py-3">
                    Testimonials List
                </header>
            </div>
        </div>
        <section class="section-top">
            <div class="container">
                <div class="row">
                <?php
                    $sql = "SELECT teacher_testimonials.*, teachers.* FROM teacher_testimonials 
                    LEFT JOIN teachers
                        ON teachers.teacher_id = teacher_testimonials.teacher_id";
                
                    $result = mysqli_query($conn, $sql);
                    // $query_results = mysqli_num_rows($result);

                    // echo $query_results;
                    // $row = mysqli_fetch_assoc($result);
                    // if($query_results > 0){

                        while($row = mysqli_fetch_assoc($result)){
                ?>

                 
                    <div class="col-sm-4">
                        <article class="text-center member-left">
                            <figure>
                            <?php 

                                if($row['teacher_photo'] == ""){
                            ?>
                                    <img class="member__img" style="max-height: 200px" src="<?php echo base_url()?>img/teacher/profile_pic/male_profile.svg" alt="">
                            <?php
                                } else {
                            ?>
                                    <img class="member__img" style="max-height: 300px" src="<?php echo base_url() . $row['teacher_photo'];?>" alt="">
                            <?php
                                }
                            ?>
                            </figure>
                            <header class="member__header header-text-2">
                               <?php echo $row['teacher_first_name'] . ' ' . $row['teacher_last_name']; ?>
                            </header>
                            
                            <p class="sub-header-text-1 pt-2">
                                    <?php 
                                        $city = $row['city_id'];
                                        if($city == true){
                                            $sql = "SELECT * FROM cities WHERE city_id = '$city'";
                                            $result = mysqli_query($conn, $sql);
                                            $rows = mysqli_fetch_assoc($result);
                                            echo $rows['city_name'];
                                        };
                                    ?>
                            <p>
                                <?php echo $row['testimonial_quote']; ?>
                            </p>
                        </article>
                    </div>
                 <?php 
                } 
            // }else {
            //         // echo "there are no result";
            //     }
                ?>
                </div>
            </div>
        </section>
        <section class="section-middle"></section>
        <section class="section-bottom"></section>
        </div>
    </div>

<?php
    include("../include/footer.inc.php");
?>