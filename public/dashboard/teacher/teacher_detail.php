<?php 

    $active = "teacher";
    require("../../../private/config/config.php");
    require("../../../private/config/db_connect.php");
    include("../include/header.inc.php");

    $id = $_GET['id'];

    $sql = "SELECT teachers.*, cities.*, states.*, gender.*, subjects.* FROM teachers 
    LEFT JOIN cities
        ON cities.city_id = teachers.city_id
    LEFT JOIN states
        ON states.state_id = teachers.state_id
    LEFT JOIN gender
        ON gender.gender_id = teachers.gender_id
    LEFT JOIN subjects
        ON subjects.subject_id = teachers.subject_id
    WHERE teacher_id = '$id'";
    // $sql = "SELECT * FROM teachers WHERE teacher_user_name = '$teacher_name'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
                            

    
        // echo ;


?>
    <div class="body-container-right"> 

        <div class="wrap-container">
            <div class="page-header">
                <div class="container">
                    <header class="header-text-1" class="py-3">
                           Teacher profile
                    </header>
                    <span class="header-text-2">
                        <?php echo $row['teacher_first_name'] . " " . $row['teacher_last_name'] ;?>
                    </span>
                </div>
            </div>
            <section class="section-record">
                <div class="container">
                    
                    <div class="row">
                        <div class="col-md-3">
                            <img class="w-100" src="<?php echo base_url() . $row['teacher_photo'];?>" class="card-img" alt="...">
                        </div>
                        <div class="col-md-9">
                            <h5 class="text-center py-5 mb-5 h3 bg-danger text-light"><?php echo $row['teacher_first_name'] . " " . $row['teacher_last_name'] ;?></h5>
                            <span>
                            </span>
                            <ul>
                            
                                <li class="row mb-2">
                                    
                                    <div class="col-3">
                                        Username
                                    </div>
                                    <div class="col-9">
                                        <?php echo $row['teacher_user_name'];?>
                                    </div>
                                </li>
                                <li class="row">
                                    
                                    <div class="col-3">
                                        Email
                                    </div>
                                    <div class="col-9">
                                        <?php echo $row['teacher_email'];?>
                                    </div>
                                </li>
                                <li class="row my-3">
                                    <div class="col-3">
                                        About me
                                    </div>
                                    <div class="col-9">
                                    <?php echo $row['teacher_about_me'];?>
                                    </div>
                                </li>
                                <li class="row mb-2">
                                    <div class="col-3">
                                        Experience
                                    </div>
                                    <div class="col-9">
                                        <?php echo $row['teacher_experience'];?>
                                    </div>
                                </li>
                                <li class="row  mb-2">
                                    
                                    <div class="col-3">
                                    Teaching Subject
                                    </div>
                                    <div class="col-9">
                                        <?php echo $row['sub_name'];?>
                                    </div>
                                </li>
                                <li class="row">
                                
                                    <div class="col-3">
                                        Gender
                                    </div>
                                    <div class="col-9">
                                        <?php echo $row['gender_type'];?>
                                    </div>
                                </li>
                                <li class="row">
                                
                                <div class="col-2">
                                    
                                    </div>
                                    <div class="col-8"></div>
                                </li>
                                <li class="row">
                                
                                <div class="col-2 bg-light">
                                    
                                    </div>
                                    <div class="col-8"></div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    
                </div>
            </section>
            <section class="section-bottom"></section>
        </div>
    </div>

<?php
    include("../include/footer.inc.php");
?>