<?php 
    
    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: login.php');
    }
    $page_title = "home page";
    require_once("../../private/config/db_connect.php");
    include("../../private/config/config.php");

    include("include/header.inc.php");
    include("include/search-banner.inc.php");
?>

<div class="body-container">

    <main>
        <section class="section-search-result wrap-container">

<?php
if(isset($_POST["submit-search"])){
    // security
    $search = mysqli_real_escape_string($conn, $_POST["search"]);

    $sql = "SELECT * FROM teachers WHERE teacher_user_name LIKE '%$search%'";
    $result = mysqli_query($conn, $sql);
    $query_results = mysqli_num_rows($result);

    ?>
        <div class="section-header u-center-text"  data-aos="zoom-out-up" data-aos-duration="1000">
            <heeader class="text-primary"> 
                search result of techer account
            </header>
        </div>
        <div class="search-result-num" data-aos="zoom-out-up" data-aos-duration="1000">
            <p>
                    <?php echo $query_results; ?> results are matching
            </p>
        </div>
        <section class="section-body"> 
    <?php 

   

    if($query_results > 0){
        while($row = mysqli_fetch_assoc($result)){

            ?>      
            
            
            <article class="article-search-result" data-aos="zoom-out-up" data-aos-duration="1000">
                    <div class="block-left">
                        <figure class="article-search__figure">
                            <img src="<?php base_url()?>img/teacher/profile_pic/rohit.jpg" alt="">
                        </figure>
                    </div>
                    <div class="block-right">
                        <header class="article-search__header">
                            <h1 class="text-secondary">
                                <?php echo $row['teacher_user_name'];?>
                            </h1>
                        </header>
                        <div class="article-search-body">
                                <ul>
                                    <li>qualification: <strong></strong></li>
                                    <li>Experience: <strong></strong></li>
                                    <li>City:<strong></strong></li>
                                    <li>available for : 
                                        <strong><?php if($row["teacher_online_one_to_one"] == 1){echo "Online one to one";} ?></strong>
                                        <strong> <?php if($row["teacher_online_group"] == 1){echo "Online group";}?></strong>
                                        <strong> <?php if($row["teacher_home_tuition"] == 1){echo "home tuition";}?> </strong>
                                    
                                    </li>
                                    
                                </ul>
                        </div>
                        
                        <footer class="article-search-footer">
                            <a class="button-text-1" href="detail.php?name=<?php echo $row['teacher_user_name']?>&batch=<?php echo $row['teacher_email']?>">more details</a>
                        </footer>
                    </div>
                </article>
            
            
            
            <?php

        }
    } else {
        //echo "there are no result";
        
        ?> 
        
        <div class="search-result-num" data-aos="zoom-out-up" data-aos-duration="1000">
            <p>
                there are no result
            </p>
        </div>

        <?php
    }
}
 
?>      
            </section>
        </section>

    </main>
</div>

<?php
    include("include/footer.inc.php");

?>