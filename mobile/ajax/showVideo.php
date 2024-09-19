 <div class="video_list">
		   		 <a href='video.php?video=<?= $row['unique_id'] ?>' class="video_player">
           
           <video src='<?= $video?>'></video>
           <div style = 'display:nne' class="video_overlay">
               <img calss='' src="assets/img/thumbnail.jpg" alt="">
           </div>
        <span class='duration'>0:00</span>
           </a>
             <div class="info">
     <div class="channel-photo">
       <div style="width:100%;height:100%;border-radius:50%">
         <img src="assets/img/thumbnail.jpg" alt="">
       </div>
       
     </div>
     <div class="center">
       <div class="video-title">
         <?= $row['name'] ?>
       </div>
       <div class="information">

         
         <span><?= $row['author']?></span>
         <hr>
         <span><?= $row['views']?> views</span>
         <hr>
         <span><?= $time ?></span>
         <style>
            .information span{
              font-size: 10px;
              white-space: nowrap;
            }
         </style>
         
       </div>
     </div>
     <div class='icon action'>
       <span></span>
     </div>
  </div>
    <button class="delete" value="<?= $row['unique_id'] ?>">
    Delete
  </button>
                        </div>