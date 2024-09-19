<?php
session_start();
include('connect.php');
if($_POST["page"]=='home'){
$query = "
		SELECT * FROM video
	";
	if(isset($_POST["category"])){
   if($_POST["category"]!='0'){
     $category = $_POST["category"];
     $query .= "WHERE category = '$category'";
     
   }
   if(isset($_POST["search"])){
     $search = $_POST["search"];
     $search = $_POST["search"];
    // echo $search;
   if($_POST["search"]!='0'){
      $query .= "
      where name LIKE '%".str_replace(" ", "%", $_POST["search"])."%'";
                                
   }
  // echo $query;
   }
   else{
    $query .= "ORDER BY RAND()";
	}}
  if(isset($_POST["limit"])){
    $limit = $_POST["limit"];
    $start = $_POST["start"];
    
  
   $filter_query = $query. " LIMIT $start,$limit";
   }
  $statement = $connect->prepare($query);
    $statement->execute();
    $total_data = $statement->rowCount();
    
    $statement = $connect->prepare($filter_query);
    $statement->execute();
    $result = $statement->fetchAll();
    $total_filter_data = $statement->rowCount();
    
    
    
    if($total_filter_data > 0){
		foreach($result as $row){
		  include('datetime.php');
		  $folder = trim($row['author'], " ").'/'.trim($row['category'], " ").'/';
         $video = "video/".$folder.trim($row['name'], " ").'.mp4';
         
       
         
       
       include('showVideo.php');
         

		}
    }
    $start = $start + $total_filter_data +1;
    $total = $total_data;
    $url = "?title=".$total_data."-".$start;
    echo("<script>history.replaceState({},'','$url');</script>");

}
if($_POST["page"]=='delete'){
  $unique_id = $_POST["id"];
  $sql = "DELETE FROM video WHERE unique_id = '$unique_id'";
  mysqli_query($con, $sql);

  
}
if($_POST["page"]=='suggest'){
  $query = "SELECT * FROM video ORDER BY RAND() LIMIT 8";
	
	$query_run = mysqli_query($con, $query);
	
	if(mysqli_num_rows($query_run) > 0){
	   foreach($query_run as $row){
     include('datetime.php');
		  $folder = trim($row['author'], " ").'/'.trim($row['category'], " ").'/';
         $video = "video/".$folder.trim($row['name'], " ").'.mp4';
         if($row['unique_id'] != $_POST["unique_id"]){
       
       include('showVideo.php');
         }
    
    
	   }}
    
    
}

if($_POST["page"]=='watchtime'){
  $unique_id = $_POST["unique_id"];
  $bt = $_POST["bt"];
  mysqli_query($con,"UPDATE video SET watch_time = watch_time+'$bt' WHERE unique_id = '$unique_id'");
  
}
if($_POST["page"]=='music'){
$query = "
		SELECT * FROM music LIMIT 10;
	";
	if(isset($_POST["category"])){
   if($_POST["category"]!='0'){
     $category = $_POST["category"];
     $query .= "WHERE category = '$category'";
   }
}
   if(isset($_POST["search"])){
     $search = $_POST["search"];
     $search = $_POST["search"];
    // echo $search;
   if($_POST["search"]!='0'){
      $query .= "
      where name LIKE '%".str_replace(" ", "%", $_POST["search"])."%'";
                                
   }
  // echo $query;
   }
  $statement = $connect->prepare($query);
    $statement->execute();
    $total_data = $statement->rowCount();
   
    $result = $statement->fetchAll();
    $total_filter_data = $statement->rowCount();

    
   
    if($total_data > 0){
		foreach($result as $row){
	$folder = trim($row['category'], " ").'/';
         $src = "audio/music/".$folder.trim($row['name'], " ").'.'.trim($row['ext'], " ");
         //echo $src;
 ?>
 <div class="audio_container">
     <audio preload="metadata" src='<?=$src?>'></audio>
  <input type="checkbox" style="display:none" class="checkbox_artist">
  <input type="checkbox" style="display:none" class="unique_id" value='<?=$row['unique_id']?>'>
    <input type="checkbox" style="display:none" class="checkbox_audio_title" value='<?=$row['name']?>'>
 
       <div class="thumbnail">
         <span class="material-icons">
music_note
</span>
       </div>
       <div class="center">
         <p class="audio_title">
          <?=$row['name']?>
         </p>
         <p class="artist">
           unknown
         </p>
          <input style="display:none" type="checkbox" class='link'>
       </div>
       <div class="icon">
         <span></span>
       </div>
    </div>
 
 
 <?php


}}
 
}

?>
