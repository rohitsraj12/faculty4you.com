<?php
 session_start();
 //back function false
 if(!isset($_SESSION['user_name'])){
     header('location: ../index.php');
 }


$active = "faq";
$sub = "faq_view";

   require("../../../private/config/db_connect.php");
   require("../../../private/config/config.php");
   include("../include/header.inc.php");

?>
   <div class="body-container-right"> 
       <div class="wrap-container">
       <div class="page-header">
           <div class="container">
               <header class="header-text-1" class="py-3">
                   Students Posts
               </header>
           </div>
       </div>
       <section class="section-faq">
<?php
   
   $post_query = "SELECT * FROM posts";
   $post_result = mysqli_query($conn, $post_query);

    while($row = mysqli_fetch_assoc($post_result)){ 
?>
        <article class="mb-4 border">
            <header class="bg-light text-dark border-bottom faq__header">
                <?php echo $row['post_id'];?> - <?php echo $row['post_title'];?>
                <span class="toggle__btn"><i class="fa fa-angle-down" aria-hidden="true"></i>
                </span>
            </header>
            <footer class="faq__footer h3 text-dark">
                <p>
                <?php echo $row['post_detail'];?>
                </p>
            </footer>
        </article>

<?php
    }

?>
</section>

<?php
    include("../include/footer.inc.php");
?>