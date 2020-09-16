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
                $id = $_GET['id'];
                $subject = $_REQUEST['subject'];

                
    
                $query = "UPDATE `subjects_categories` SET `sub_cat_name` = '$subject' 
                WHERE sub_cat_id = '$id'";
                          
                $result = mysqli_query($conn, $query); 
                // test if there was a query error
                if($result) {

                ?>
                <div class="alert alert-primary" role="alert">
                    <?php  echo "successfully Inserted " . $subject .".!";?>
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
                        Edit subject Category
                    </header>
                </div>
            </div>
            <div class="row">

                <section class="section-faq col-sm-12 mb-5">
                    <header class="text-center border-bottom mb-5">
                        <h5>Edit Subject Category</h5>
                    </header>
                    <form action="" method="POST" class="row" onsubmit="return subject_validation()">
                        <div class="form-group col-sm-12">
                            <label for="q">Add subject Category</label>
                            <input type="text" class="form-control subject" name="subject" id="q" placeholder="Science / Information technology">
                            <!-- <small id="emailHelp" class="form-text text-muted">Add new subject name here.</small> -->
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
                            <!-- <th scope="col">Edit</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $study_query = "SELECT * FROM subjects_categories ORDER BY sub_cat_name ASC";
                                $result = mysqli_query($conn, $study_query);

                        // $query_results = mysqli_num_rows($result);

                        // echo $query_results;

                                while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <th scope="row"><?php echo $row['sub_cat_id'];?></th>
                                <td><?php echo $row['sub_cat_name'];?></td>
                                <!-- <td><a href="<?php base_url()?>dashboard/edit_records/edit_subject.php?id=<?php echo $row['sub_cat_id']?>">Edit</a><?php ?></td> -->
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