<?php 
    
    $page_title = "home page";
    require_once("../../private/config/db_connect.php");
    include("../../private/config/config.php");

    include("include/header.php");
?>

<div class="body-container">

    <main>
        <section class="section-result wrap-container">

<?php
if(isset($_POST["submit-search"])){
    // security
    $search = mysqli_real_escape_string($conn, $_POST["search"]);

    $sql = "SELECT * FROM teachers WHERE teacher_user_name LIKE '%$search%'";
    $result = mysqli_query($conn, $sql);
    $query_results = mysqli_num_rows($result);

    ?>
        <div class="section-header u-center-text"  data-aos="zoom-out-up" data-aos-duration="1000">
            <heeader class="text-primary-h"> 
                search result
            </header>
            <p class="u-padding-top-big u-left-text">
                <?php 
                        echo "there are ". $query_results . " results are matching";
                ?>
            </p>
        </div>
    <?php 

   

    if($query_results > 0){
        while($row = mysqli_fetch_assoc($result)){

            ?>      
            
            
          <article>
            <div class="left__block">
                <figure>
                    <img src="" alt="">
                </figure>
            </div>
            <div class="right__block">
                <header>
                    <h1>
                        <?php echo $row['teacher_user_name'];?>
                    </h1>
                </header>
                <div class="body">
                    <p>
                        <?php echo $row['teacher_about_me'];?>
                    </p>
                    <ul>
                        <li>qualification: </li>
                        <li>Experience: </li>
                        <li>City:</li>
                        <li><?php if($row["teacher_online_one_to_one"] == 1){echo "Online one to one";} ?> / <?php if($row["teacher_online_group"] == 1){echo "Online group";}?>/ <?php if($row["teacher_home_tuition"] == 1){echo "home tuition";}?> </li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                
                <footer>
                <a href="detail.php?name=<?php echo $row['teacher_user_name']?>&batch=<?php echo $row['teacher_email']?>">more details</a>
                </footer>
            </div>
          </article>
            
            
            
            <?php

        }
    } else {
        echo "there are no result";
    }
}
 
?>       </section>
    </main>
</div>

<?php
    include("include/footer.php");

?>