<?php 
    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: ../index.php');
    }


$active = "add record";
$sub = "add subject category";

    require("../../../private/config/config.php");
    require("../../../private/config/db_connect.php");
    include("../include/header.inc.php");

?>
    
    <div class="body-container-right"> 
     
   

    <?php
    // subjects insert
         if(isset($_REQUEST['submit_subject'])){
            //checking  for empty field
            if(($_REQUEST['subject'] == "")){
    ?>
        <div class="alert alert-danger" role="alert">
            <?php  echo "Fill all fields..";?>
        </div>
    <?php 
            } else {
                $subject = $_REQUEST['subject'];
                $study_cat = $_REQUEST['study-cat'];
    
                $query = "INSERT INTO subjects_categories (`sub_cat_name`, `category_id`)
                          VALUES('$subject', '$study_cat')";
                          
                $result = mysqli_query($conn, $query); 
                // test if there was a query error
                if($result) {

                ?>
                <div class="alert alert-primary" role="alert">
                    <?php  echo "successfully Inserted " . $subject .".!";?>
                    <!-- exit(); -->
                </div>
                <?php 
                }else{
                    die("Database query failed " . mysqli_connect_error($conn));
                }
            }
        }            
    ?>


        <div class="wrap-container">
            <div class="page-header">
                <div class="container">
                    <header class="header-text-1" class="py-3">
                        Add subject Category
                    </header>
                </div>
            </div>
            <div class="row">

                <section class="section-faq col-sm-12 mb-5">
                    <header class="text-center border-bottom mb-5">
                        <h5>Add New subject Category</h5>
                    </header>
                    <form action="" method="POST" class="row" onsubmit="return subject_validation()">
                        <div class="form-group col-sm-8">
                            <label for="q">Add subject Category</label>
                            <input type="text" class="form-control subject" name="subject" id="q" placeholder="Science / Information technology">
                            <!-- <small id="emailHelp" class="form-text text-muted">Add new subject name here.</small> -->
                        </div>

                        <div class="form-group  col-sm-4">
                            <label for="q">Select study category</label>
                            <select name="study-cat" class="form-control study-cat">
                                <option value="nooption">Select study category</option>
                                <?php 
                                    $query = "SELECT * FROM study_categories ORDER BY study_cat_type ASC";
                                    $result = mysqli_query($conn, $query);
                                
                                    while($row = mysqli_fetch_assoc($result)){;
                                ?>

                                <option value="<?php echo $row['study_cat_id'];?>"><?php echo $row['study_cat_type'];?></option>

                                <?php
                                }
                                ?>
                            </select>
                        </div> 
                        
                        <div class="form-group text-center col-sm-12  pt-4">
                            <input class="btn btn-primary mt-2" type="submit" name="submit_subject" value="Submit">
                        </div>
                    </form>
                </section>

                <section class="section-faq col-sm-12  align-self-start">
                <table class="bg-light table">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Subject Category Name</th>
                            <th scope="col">Study Category</th>
                            <th scope="col">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $study_query = "SELECT study_categories.*, subjects_categories.* FROM subjects_categories 
                                    JOIN study_categories
                                        ON study_categories.study_cat_id = subjects_categories.study_cat_id
                                ORDER BY sub_cat_name ASC";
                                $result = mysqli_query($conn, $study_query);

                        // $query_results = mysqli_num_rows($result);

                        // echo $query_results;

                                while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <th scope="row"><?php echo $row['sub_cat_id'];?></th>
                                <td><?php echo $row['sub_cat_name'];?></td>
                                <td><?php echo $row['study_cat_type'];?></td>
                                <td><a href="<?php base_url()?>dashboard/edit_records/edit_subject_category.php?id=<?php echo $row['sub_cat_id']?>">Edit</a><?php ?></td>
                            </tr>
                            <?php 
                            }
                            ?>
                            <?php
                                ?>
                        </tbody>
                    </table>
                   
                </section>
            </div>
        </div>
    </div>

<?php
    include("../include/footer.inc.php");
?>