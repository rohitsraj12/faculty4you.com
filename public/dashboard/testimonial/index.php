<?php 
    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: ../index.php');
    }

    $active = "testimonial";

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
                    $sql = "SELECT testimonials.*, std.* FROM testimonials 
                    LEFT JOIN std
                        ON std.student_id = testimonials.student_id
                    ORDER BY testimonial_id DESC";
                
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

                                if($row['student_photo'] == ""){
                            ?>
                                    <img class="member__img" style="max-height: 200px" src="<?php echo base_url()?>img/teacher/profile_pic/male_profile.svg" alt="">
                            <?php
                                } else {
                            ?>
                                    <img class="member__img" style="max-height: 300px" src="<?php echo base_url() . $row['student_photo'];?>" alt="">
                            <?php
                                }
                            ?>
                            </figure>
                            <header class="member__header header-text-2">
                               <?php echo $row['student_first_name']; ?>
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