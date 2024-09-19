
<?php
session_start();
include('includes/config.php');
if(!isset($_SESSION['loggedOren'])){
    header("location:".$url);
   exit(0);
}
else{
    $unique_id = $user['unique_id'];
	if(isset($_GET['channel_id'])){
        $id = $_GET['channel_id'];
    $query = mysqli_query($con, "SELECT * FROM channel_list where unique_id = '$id' and author_id='$unique_id'");
    if(mysqli_num_rows($query) > 0){
        foreach($query as $row){
            $page_title = $row['name'];
			
			include('includes/header.php');
			?>
			<input type="text" value="<?= $id ?>" id="owner" style="display:none">
 <div id="layout-wrapper">
    <?php
        include('includes/navbar.php');
        include('includes/appmenu.php');
    
        
        ?>
<link rel="stylesheet" type="text/css" href="<?= base_url('studio/css/dataTables.jqueryui.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('studio/css/videopage.css') ?>">

<style>
    .abt-rw ul li {
    display: inline-flex;
    position: relative;
}
</style>




<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="table-responsive">
                <div class="tableHead">
                    <h4>Channel Videos</h4>
                    <button>Delete</button>
                </div>





                
                <div id="data">
                    <!------------ data add from ajax/videopage------------------->
                </div>
                
                </div>
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->
    
    

<?php
include('includes/script.php');
?>
<script src="<?= base_url('studio/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('studio/js/dataTables.jqueryui.min.js') ?>"></script>
<script src="<?= base_url('studio/js/videopage.js') ?>"></script>
<?php
include('includes/footer.php');
}}
else{
    header("location:".$url);
    exit(0);
}
}
else{
    header("location:".$url);
    exit(0);
}
}
?>