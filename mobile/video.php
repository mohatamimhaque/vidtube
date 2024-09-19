<?php
session_start();
include('studio/includes/config.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
    <title><?php if(isset($page_title)) { echo "$page_title"; } else { echo $name; } ?></title>
    <meta name="description" content="<?php if(isset($meta_description)) { echo '$meta_description'; } ?>" />
    <meta name="keyword" content="<?php if(isset($meta_keyword) ) { echo '$meta_keywords'; } ?>" />
    <link rel="icon" href="<?= base_url('assets/images/Favicon.png') ?>">
    <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('mobile/assets/js/video.js') ?>"></script>
    <link rel="stylesheet" href="<?= base_url('assets/css/google-font.css') ?> ">
    <link rel="stylesheet" href="<?= base_url('mobile/assets/css/style.css') ?>">
  </script>
    
</head>
<body>
    <?php 
    if(isset($_GET['v'])){
    $unique_id = $_GET['v'];
      if (!isset($_SESSION[$unique_id])) {
        mysqli_query($con,"UPDATE video SET views = views+1 WHERE unique_id = '$unique_id'");
        $_SESSION[$unique_id] = true;
      } 
      $query = "SELECT * FROM video where unique_id = '$unique_id'";
      $query_run = mysqli_query($con, $query);
      if(mysqli_num_rows($query_run) > 0){
        foreach($query_run as $video){
          $title = $video['title'];
            echo "<script>document.title = '".$title."';</script>";
            $thumbnail = "0";
            foreach(explode('///',$video['thumbnail']) as $t){
                if(explode('.',$t)[0] == $video['active_thumbnail']){
                    $thumbnail = $t;
                }
            }
            if(file_exists("studio/uploads/".$video['unique_id']."/thumbnail/".$thumbnail)){
              $th = "studio/uploads/".$video['unique_id']."/thumbnail/".$thumbnail;
            }
            else{
                $th = "studio/uploads/".$video['unique_id']."/thumbnail/thumbnail.jpeg";
            }
        ?>
            <div class="video_wrapper" >
              <div class="video_player first_time paused">
                <div class="contorl-top active">
                  <span class="icon" style="z-index:1">
                    <i class="material-icons auto_play"></i>
                  </span>
                  <span class="icon" id="captionBTn" style="z-index:2">
                    <i class="material-icons">closed_caption</i>
                  </span>
                  <span class="icon" id="settingsBTn" style="z-index:2">
                    <i class="material-icons">settings</i>
                  </span>
                </div>
                <div class="video_status active">
                  <a href='#'  class="play_previous">
                    <span class="material-icons">
                      skip_previous
                    </span>
                  </a>
                  <div class="play_arrow">
                    <span class="material-icons">
                      play_arrow
                    </span>
                  </div>
                  <a href='#'  class="play_next">
                    <span class="material-icons">
                      skip_next
                    </span>
                  </a>
                </div>
                <div class="mobile_progress_area">
                  <div class="progress_area">
                    <div class="progress_bar">
                      <span></span>
                    </div>
                    <canvas class="bufferedBar"></canvas>
                    
                  </div>
                  
                </div>
                <div class="scrubbing_timer ">
                    <span class="s_current">0:00</span> / <span class="s_duration">0:00</span>
                </div>
                <div class="scrubbing_wrapper">
                    <div class="s_progress_area">
                        <div class="s_progress_bar">
                            <span></span>
                        </div>
                    </div>
                    <div class="img-container">
                        <div class="scrubbing_position">
                            
                        </div>
                            <div class="scribbing_move">
                                
                                </div>
                                <div class="fine_scribbing">
                                <?php
                                foreach(explode('///',$video['scrubbing_img']) as $i){
                                    ?>
                                    <div class="item">
                                        <div class="img">
                                            <img src="<?= base_url('studio/uploads/'.$video['unique_id'].'/scrubbing_img/'.$i) ?>" alt="">
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                    
                                </div>
                                
                                
                            </div>
                </div>
                <div class="control_bottom">
                  <div style='display:flex;justify-content:space-between;align-items:center;width:88%'>
                    
                  
                  <div class="timer">
                    <span class="current">0:00</span> / <span class="duration">0:00</span>
                  </div>
                  <div class="sc-control">
                    <span class="icon" >
                      <i for="fc" class="material-icons fullscreen">fullscreen</i>
                    </span>
                    <span class="icon">
                      <i class="material-icons picture_in_picture">picture_in_picture_alt</i>
                    </span>
                  </div>
                 </div>    
                </div>
                <div class="thumbnail"></div>
                <p class="caption_text"></p>
                <div class="progressAreaTime">
                  <div>
                    <p>0.00
                      <p>
                        </div>
                      </div>
                      <div class="spinner">
                        <div class="spinner-child">
                          <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="46" />
                          </svg>
                        </div>
                      </div>
                      <div style="display:non"; class="video_overlay">
                        <img src="<?= $th ?>">             
                      </div>
                      <p class="caption_text"></p>
                      
                      <video class="main_video" preload="metadata"  src="<?= base_url('studio/uploads/'.$video['unique_id'].'/video/'.$video['video']) ?>"> 
                        
                      <source size="360" type="video/mp4">
                     
                    <track id="track1" label="arabic" kind="subtitles" src="assets/subtitles/arabic.vtt" srclang="en"></track>
                    <track id="track2" label="bangla" kind="subtitles" src="assets/subtitles/bangla.vtt" srclang="en"></track>
                    <track id="track3" label="chinese" kind="subtitles" src="assets/subtitles/chinese.vtt" srclang="en"></track>
                    <track id="track4" label="english" kind="subtitles" src="assets/subtitles/english.vtt" srclang="en"></track>
                    <track id="track5" label="hindi" kind="subtitles" src="assets/subtitles/hindi.vtt" srclang="en"></track>
                    <track id="track6" label="urdu" kind="subtitles" src="assets/subtitles/urdu.vtt" srclang="en"></track>
                    
                  </video>
                  <div class="doubleTap_rewind">
                    <div class="right rewind">
                      <div class="rewind-child">
                        <div class="icon-group">
                          <i class="material-icons"> play_arrow</i><i class="material-icons ">    play_arrow</i><i class="material-icons ">    play_arrow</i>
                        </div>
                        <p class="text">
                          10 seconds
                        </p>
                      </div>
                    </div>
                    <div class="left rewind">
                      <div class="rewind-child">
                        <div class="icon-group">
                          <i class="material-icons"> play_arrow</i><i class="material-icons ">    play_arrow</i><i class="material-icons ">    play_arrow</i>
                        </div>
                        <p class="text">
                          10 seconds
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
              <?php
        $owner = $video['owner'];
        foreach(mysqli_query($con,"SELECT * FROM channel_list WHERE unique_id = '$owner'") as $channel);
        ?>
              <div class="info main">
                <div class="channel-photo">
                  <div style="width:100%;height:100%;border-radius:50%">
                    <img src="<?= base_url('upload/image/channel/profile_photo/'.$channel['profile_photo']) ?>" alt="">
                  </div>
                </div>
                <div class="center">
                  <div class="video-title">
                    <?= $video['title']?>
                  </div>
                  <div class="information">
                    <span><?= numberFormat($video['views']) ?> views</span>
                    <hr>
                    <span><?= date('d M, y',strtotime($video['created_at'])) ?></span>
                  </div>
                </div>
                <div class='icon'>
                  <span class="material-icons">expand_less</span>
                </div>
              </div>
            <div class="bottom">
              
            </div>
  
  <input type="checkbox" id="unique_id" style='display:none' value = '<?= $video['unique_id'] ?>'>
  
  <div id="details">

    <div></div>
    <div class='top'>
      <h2>Description</h2>
      <div class="icon">
        <span></span>
      </div>
      
    </div>
     <p style='font-size:22px;color:white;font-weight:700;padding:12px 4px'><?= $video['title']?></p>
            
     <div style='display:flex;align-items:center;padding:2px 8px;'>
       <div style='width:25px;height:25px'>
         <img style='border-radius:50%;width:100%;height:100%' src="<?= base_url('upload/image/channel/profile_photo/'.$channel['profile_photo']) ?>">  
       </div>
       <p style='font-size:14px;color:rgba(255,255,255,0.75);font-weight:700;margin-left:5px'>
         <?= $channel['name']?>
       </p>

      </div>
         <div style="display:flex;align-items:center;justify-content:space-between;padding:18px 45px;background:gren">
           <div style='display:flex;align-items:center;justify-content:center;flex-direction:column'>
            <p style="font-size:16px;font-weight:700;color:white"><?= $video['views']?></p>
            <span style='color:rgba(255,255,255,0.8);font-size:11px'>views</span>
           </div>
           <?php
           $watch_time = intdiv($video['watchtime'], 60)
          ?>
            <div style='display:flex;align-items:center;justify-content:center;flex-direction:column'>
            <p style="font-size:16px;font-weight:700;color:white"><?= $watch_time?></p>
            <span style='color:rgba(255,255,255,0.8);font-size:11px'>minutes watch</span>
           </div>
           <?php 
           $date = new DateTime($video['created_at']);
          $md = $date->format('F 7');
          $year = $date->format('Y');
           
           ?>
            <div style='display:flex;align-items:center;justify-content:center;flex-direction:column'>
  
            <p style="font-size:16px;font-weight:700;color:white"><?= $md?></p>
            <span style='color:rgba(255,255,255,0.8);font-size:11px'><?= '2001' ?></span>
           </div>
         
         
       </div>
  </div>
  

  <style>
    #settings,#qualities,#playback,#subtitles{
      position: fixed;
    }
  </style>
  
          <div id="settings" class="">
            <div class="setting_menu">
                <ul>
                    <li id="quality">
                        <i class="material-icons">equalizer</i>
                        <span>quality</span>
                    </li>
                    <li id="subtitles_btn">
                        <i class="material-icons">subtitles</i>
                        <span>captions</span>
                    </li>
                    <li id="loop" class="">
                        <i class="material-icons">loop</i>
                        <span>loop video</span>
                        <hr style='width:3px;height:3px;border:none;background:rgba(255,255,255,0.6);margin:0 8px;border-radius:50%'>
                       
                        <p style='font-size:15px;color:rgba(255,255,255,0.5)'>off</p>
                    </li>
                    <li id="playback_speed">
                        <i class="material-icons">slow_motion_video</i>
                        <span>placyback speed</span>
                    </li>
                </ul>
            </div>
        </div>
        <div id="qualities" class="">
            <div class="qualities_menu">
                <span>Qualty for current video</span>
                <ul>
                  
                  <li data-quality="auto" class="active quality-auto">auto</li>
                
                </ul>
                <p>This selection only applies to the current video.For al videos got to setting</p>
            </div>
        </div>
        <div id="playback" class="">
            <div class="playback_menu">
                <ul>
                    <li data-speed="0.25">0.25x</li>
                    <li data-speed="0.5">0.5x</li>
                    <li data-speed="0.75">0.75x</li>
                    <li data-speed="1" class="active">Normal</li>
                    <li data-speed="1.25">1.25x</li>
                    <li data-speed="1.5">1.5x</li>
                    <li data-speed="1.75">1.75x</li>
                    <li data-speed="2">2x</li>        
                </ul>
            </div>
        </div>
        <div id="subtitles" class="">
            <div class="subtitles_menu">
                <ul>
                         
                </ul>
            </div>
        </div>
        <div id="captions"></div>
        
        
          <?php
}}}
?>
    

  <script>
   
   $(document).ready(function() {
 let video = $('.video_wrapper .main_video')[0];
 let videoTime, st;
 let unique_id = $('#unique_id').val();
 console.log(unique_id)
 $(video).on('timeupdate', function(e){
     let time = e.target.currentTime;
     let currentUrl = window.location.href;
    if(currentUrl.includes('&t=')){
        currentUrl = currentUrl.replace(/(&t=)[^&]*/,'$1'+parseInt(time));
    }
    else{
        currentUrl += '&t='+parseInt(time)
    }
    window.history.replaceState({},document.title,currentUrl)
     if (localStorage.getItem('videoTime')) {
         videoTime = JSON.parse(localStorage.getItem('videoTime'));
         
         if (unique_id in videoTime) {
       videoTime[unique_id] = time;
     } else {
         videoTime[unique_id] = time;
        }
        localStorage.setItem('videoTime', JSON.stringify(videoTime));
    } else {
        videoTime = {};
        videoTime[unique_id] = time;
        localStorage.setItem('videoTime', JSON.stringify(videoTime));
    }
});

if (localStorage.getItem('videoTime')) {
    videoTime = JSON.parse(localStorage.getItem('videoTime'));
    
    if (unique_id in videoTime) {
     let tt = videoTime[unique_id];
     video.currentTime = parseInt(tt);
    }
}


<?php
if(isset($_GET['t'])){
    ?>
    video.currentTime = <?= $_GET['t'] ?>;
    <?php
}
?>

$(video).on('loadeddata', function(e){
    var bt,st,arr,fd;
    bt = st = 0
    fd = new FormData();
    fd.append('id',unique_id); 
    setInterval(function() {
      let totalBufferTime = 0;
      for (let i = 0; i < video.buffered.length; i++) {
        totalBufferTime += video.buffered.end(i) - video.buffered.start(i);
      }
      
      bt = totalBufferTime - st;
      st = totalBufferTime;
      console.log(bt);
        fd.append('watchtime',bt); 
        $.ajax({
            url:"<?= base_url('ajax/video') ?>",
            method:"POST",
            data:fd,
            contentType:false,
            processData:false,
            success:function(data){
            }
            })



    },1000)

})


})
</script>


    
<script>
    video()
    if(document.cookie.indexOf('lightMode') !== -1){
    if(document.cookie.split(';')[0].split('=')[1] === 'true'){
        $("#dark-light").prop('checked',true)
        $("body").toggleClass("light-mode");
    };
    }
  


</script>
</body>
</html>
<?php
//setcookie('autoplay', 'autoplay');


?>