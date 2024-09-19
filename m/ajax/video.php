<?php
include "../../studio/includes/config.php";

if (isset($_POST["operation"]) == "suggest") {
    $u = "";
    $query = "
   		SELECT * FROM video WHERE status = '0'
   	";
    $limit = $_POST["limit"];
    $start = $_POST["start"];

   
    /**/

    $statement = $connect->prepare($query);
    $statement->execute();
    $total_data = $statement->rowCount();
    if ($start <= $total_data) {
        $filter_query = $query . "order by rand() LIMIT $start,$limit";

        $statement = $connect->prepare($filter_query);
        $statement->execute();
        $result = $statement->fetchAll();
        $total_filter_data = $statement->rowCount();

        foreach ($result as $row) {
            $th = "studio/uploads/" .$row["unique_id"] ."/thumbnail/" .explode(",", $row["thumbnail"])[$row["active_thumbnail"]];
            $start++;
            $c = $row["owner"];
            $owner = mysqli_query(
                $con,
                "SELECT * FROM channel_list WHERE status=0 AND author_id='$c'"
            );
            if (mysqli_num_rows($owner) > 0) {
                foreach ($owner as $o); 
            
        ?>

                                    <a class="video_list" href="<?= $url ."m/video?v=" .$row["unique_id"] ?>">
                                          <div class="video_player">
                                             <div style = 'display:nne' class="video_overlay">
                                                <img src="<?= base_url($th) ?>" alt="">
                                             </div>
                                             <span class='duration'><?= timeFormat($row["duration"]) ?></span>
                                          </div>
                                          <div class="info">

                                             <div class="channel-photo">
                                                <div style="width:100%;height:100%;border-radius:50%">
                                                   <img src="<?= base_url("upload/image/channel/profile_photo/" . $o["profile_photo"]) ?>" alt="">
                                                </div>
                                             </div>
                                             <div class="center">
                                                <div class="video-title">
                                                <?= shortenString($row["title"],60) ?>
                                                </div>
                                                <div class="information">
                                                   <span>@<?= $o["name"] ?></span>
                                                   <hr>
                                                   <span class="views"> <?= numberFormat($row["views"]) ?> views</span>
                                                   <hr>
                                                   <span class="time"><?= dateTime($row["created_at"]) ?></span>
                                                </div>
                                             </div>
                                          </div>
                                    </a>



<?php
        }}
        echo "<script>window.start = " . $start . " </script>";
    }
}
if(isset($_POST['add_comment'])){
   $user_id = $_POST["user_id"];
   $vid_id = $_POST["vid_id"];
   $text = $_POST["text"];


   function unique_id($length = 8){
       $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
       $charactersLength = strlen($characters);
       $randomString = '';
       for ($i = 0; $i < $length; $i++) {
           $randomString .= $characters[rand(0, $charactersLength - 1)];
       }
       return $randomString;
   }
   while(TRUE){
       $unique_id = unique_id();
       $id =  mysqli_query($con, "SELECT unique_id from comment WHERE unique_id='$unique_id'");
       if(mysqli_num_rows($id)>0){
           continue;
       }
       else{
           break;
       }
   }
   $sql = "UPDATE video SET comments = comments + 1 WHERE unique_id = ?";
   $stmt = $con->prepare($sql);
   $stmt->bind_param('s', $vid_id);
   if ($stmt->execute()) {
       echo "Comments count incremented successfully.";
   }
   $stmt->close();
    mysqli_query($con,"INSERT INTO `comment`(`unique_id`, `author`, `vid_id`,`comment`) VALUES ('$unique_id','$user_id','$vid_id','$text')");


}
if(isset($_POST['comment_show'])){
   $vid_id = $_POST["vid_id"];    
   $query = mysqli_query($con,"SELECT * FROM comment WHERE vid_id = '$vid_id' AND parent_id='0' ORDER BY created_at desc");
   echo "<script>window.total_comment = ".mysqli_num_rows($query)."</script>";
   if(mysqli_num_rows($query) > 0){
       foreach($query as $row){
           $a = $row['author'];
           foreach(mysqli_query($con,"SELECT * FROM user_account WHERE unique_id = '$a'") as $u);
           ?>
                                <div class="commentRow" id="<?= $row['unique_id'] ?>">
                                       <div class="commentAuthor">
                                       <h1 class="<?= $u['first_name'][0] ?>"><?= $u['first_name'][0] ?></h1>
                                       </div>
                                       <div class="commentDescript">
                                          <span><?= $u['first_name'].' '.$u['last_name'] ?></span>
                                          <p><?= $row['comment'] ?></p>
                                          <div class="iconGroup">
                                             <button class="like"><i class="material-icons">thumb_up</i> <span>48</span></button>
                                             <button class="dislike"><i class="material-icons">thumb_down</i> <span>42</span></button>
                                             <button class="comment"><i class="material-icons">comment</i></button>
                                          </div>
                                          <button class="viewReply">
                                             <i style="margin-right: 2px;">5</i> repilies
                                          </button>
                                       </div>
                                       <div class="replySection">
                                          <div class='commentHeader'>
                                             <div class="hhh">
                                                <div style="display:flex;align-items:center;">
                                                   <span class="material-icons replyBack">
                                                      arrow_back
                                                   </span>
                                                   <h2>Replies</h2>
                                                </div>
                                                <button class="close">
                                                   <span class="material-icons">
                                                      close
                                                   </span>
                                                </button>
                                             </div>
                                          </div>
                                          <div style="position:relative;width:100%;height:100%;overflow: scroll;">
                                             <div class="comBody">
                                                <div class="comRow">
                                                   
                                                   <div class="commentAuthor">
                                                   <h1 class="<?= $u['first_name'][0] ?>"><?= $u['first_name'][0] ?></h1>

                                                      
                                                   </div>
                                                   <div class="commentDescript">
                                                         <span><?= $u['first_name'].' '.$u['last_name'] ?></span>
                                                         <p><?= $row['comment'] ?></p>
                                                         <div class="iconGroup">
                                                         <button class="like"><i class="material-icons">thumb_up</i> <span>48</span></button>
                                                         <button class="dislike"><i class="material-icons">thumb_down</i> <span>5</span></button>
                                                      </div>
                                                      <div class="comment_replies">




                                                      
                                                       








                                                      </div>
                                                   </div>
                                                </div>
                                 
                                 
                        
                                                
                        
                        
                        
                        
                        
                        
                                             </div>
                                             
                                          </div>
                                          <div class="commentFooter">
                                          <?php if (isset($_SESSION["loggedOren"])): ?>
                                             <h1 class="<?= $user["first_name"][0] ?> d-flex"><?= $user["first_name"][0] ?></h1><?php else: ?><h1 class="M"><span>M</span></h1>
                                          <?php endif; ?>
                                             <input type="text" class="addReply" placeholder="Add a Reply">
                                             <button value="<?= $row['unique_id'] ?>" class="add_reply"><i class="material-icons">send</i></button>
                                          </div>
                                       </div>
                                 </div>
           <?php
       }
   }
}
if(isset($_POST['reply_show'])){
   $vid_id = $_POST["vid_id"];    
   $parent_id = $_POST["parent_id"];    
   $query = mysqli_query($con,"SELECT * FROM comment WHERE vid_id = '$vid_id' AND parent_id='$parent_id' ORDER BY created_at desc");
   echo "<script>window.total_reply = ".mysqli_num_rows($query)."</script>";
   if(mysqli_num_rows($query) > 0){
       foreach($query as $row){
           $a = $row['author'];
           foreach(mysqli_query($con,"SELECT * FROM user_account WHERE unique_id = '$a'") as $u);
           ?>


                                                         <div class="replyRow">
                                                            <div class="commentAuthor">
                                                            <h1 class="<?= $u['first_name'][0] ?>"><div><?= $u['first_name'][0] ?></div></h1>
                                                             </div>
                                                            <div class="commentDescript">
                                                               <span><?= $u['first_name'].' '.$u['last_name'] ?></a> </span>
                                                                  <p><?= $row['comment'] ?></p>                                                               
                                                                  <div class="iconGroup">
                                                                  <button class="replike"><i class="material-icons">thumb_up</i> <span>48</span></button>
                                                                  <button class="repdislike"><i class="material-icons">thumb_down</i> <span>8</span></button>
                                                                  <button class="repcomment"><i class="material-icons">comment</i></button>
                                                               </div>
                                                            </div>
                                                         </div>
              
           <?php
       }
   }
}

if(isset($_POST['add_reply'])){
   $user_id = $_POST["user_id"];
   $vid_id = $_POST["vid_id"];
   $comment = $_POST["comment"];
   $parent_id = $_POST["parent_id"];

   function unique_id($length = 8){
       $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
       $charactersLength = strlen($characters);
       $randomString = '';
       for ($i = 0; $i < $length; $i++) {
           $randomString .= $characters[rand(0, $charactersLength - 1)];
       }
       return $randomString;
   }
   while(TRUE){
       $unique_id = unique_id();
       $id =  mysqli_query($con, "SELECT unique_id from comment WHERE unique_id='$unique_id'");
       if(mysqli_num_rows($id)>0){
           continue;
       }
       else{
           break;
       }
   }
   mysqli_query($con,"INSERT INTO `comment`(`unique_id`, `author`, `vid_id`,`comment`,`parent_id`) VALUES ('$unique_id','$user_id','$vid_id','$comment','$parent_id')");
}
?>
