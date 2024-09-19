
<?php
session_start();
include('includes/config.php');
if(!isset($_SESSION['loggedOren'])){
    header("location:".$url);
   exit(0);
}
else{
    $unique_id = $user['unique_id'];
    $query = mysqli_query($con, "SELECT * FROM channel_list where author_id='$unique_id'");
    if(mysqli_num_rows($query) > 0){
        foreach($query as $row){
            $page_title = $row['name'];

include('includes/header.php');
?>
 <!-- Begin page -->
 <div id="layout-wrapper">
    <?php
        include('includes/navbar.php');
        include('includes/appmenu.php');
    ?>




</div>
<!-- END layout-wrapper -->



<?php
include('includes/footer.php');
}}
else{
    header("location:".$url);
    exit(0);
}}
?>