<?php
session_start();
include('../studio/includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">
   <head>
   <?php
    include('includes/head.php');
    ?>
      <link rel="stylesheet" href="<?= base_url('m/assets/css/video.css') ?>">
   </head>
   <body class="mobile">
      <?php
       if (isset($_SESSION["loggedOren"])) {
         echo "<input type='hidden' id='user_id' value='" .
                 $user["unique_id"] .
                 "' >";
       }
         if (isset($_GET["v"])) {
                  $v = $_GET["v"];
                  mysqli_query(
                     $con,
                     "UPDATE video SET views = views+1 WHERE unique_id = '$v'"
                  );
                  echo "<input type='hidden' id='unique_id' value='" . $v . "'>";
                  $query = mysqli_query(
                     $con,
                     "SELECT * FROM video WHERE unique_id = '$v'"
                  );
                  if (mysqli_num_rows($query) > 0) {
                     foreach ($query as $video) {
                           $title = $video["title"];
                           echo "<script>document.title = '" . $title . "';</script>";
                           ?>
                           <div class="video_wrapper" >
                              <div class="video_player first_time paused">
                                 <div class="contorl-top active">
                                    <div class="left">
                                       <a class="back_icon" href="<?= base_url('m') ?>">
                                          <i class="material-icons">expand_more</i>
                                       </a>
                                    </div>
                                 <div class="right">
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
                                 </div>
                                 <div class="video_status active">
                                    <div class="play_arrow">
                                       <span class="material-icons">
                                       play_arrow
                                       </span>
                                    </div>
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
                                    <span class="s_current">00:00</span> / <span class="s_duration"><?= timeFormat($video['duration']) ?></span>
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
                                       <div class="scrubbing_move">
                                       </div>
                                      
                                       <div class="fine_scrubbing">
                                       <?php foreach (
                                                explode("///", $video["scrubbing_img"])
                                                as $i
                                          ) { ?>
                                                <div class="item">
                                                   <div class="img">
                                                      <img src="<?= base_url(
                                                            "studio/uploads/" .
                                                               $video["unique_id"] .
                                                               "/scrubbing_img/" .
                                                               $i
                                                      ) ?>" alt="">
                                                   </div>
                                                </div>
                                                <?php } ?>
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
                                       <div class="lds-ripple"><div></div><div></div></div>
                                    </div>
                                 </div>
                                 <div style="display:non"; class="video_overlay">
                                    <img src="<?= base_url('studio/uploads/'.$video['unique_id'].'/thumbnail/'.explode(',',$video['thumbnail'])[$video['active_thumbnail']]) ?>">             
                                 </div>
                                 <p class="caption_text"></p>
                                 <video class="main_video" preload="metadata"  src="<?= $url.'studio/uploads/'.$video['unique_id'].'/video/'.$video['video'] ?>">
                                    <source size="360" type="">
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


                           <div class="phone">

                           <?php
                              $c = $video['owner'];
                              $owner = mysqli_query($con,"SELECT * FROM channel_list WHERE status=0 AND author_id='$c'");
                              if (mysqli_num_rows($owner) > 0) {
                                 foreach ($owner as $o){ 
                                 ?>
                              <div class="info main">
                                 <div class="channel-photo">
                                    <div style="width:100%;height:100%;border-radius:50%">
                                       <img src="<?= base_url("upload/image/channel/profile_photo/" . $o["profile_photo"]) ?>" alt="">
                                    </div>
                                 </div>
                                 <div class="center">
                                    <div class="video-title">
                                       <?= $video['title'] ?>
                                    </div>
                                    <div class="information">
                                       <span><?= numberFormat($video["views"]) ?> views views</span>
                                       <hr>
                                       <span>Published <?= dateTime($video["created_at"]) ?></span>
                                    </div>
                                 </div>
                                 <div class='icon' style="margin-right: 12px;">
                                    <span class="material-icons">expand_less</span>
                                 </div>
                              </div>
                              <?php
                                 }}
                              ?>

                              <div class="comments">
                                 <div class="top">
                                       <span>Comments</span>
                                       <span class="total_comment" style="margin-left: 2px;">45</span>
                                 </div>
                                 <div class="bottom">
                                       <img src="../assets/img/thumbnail.jpg" alt="">
                                       <p>Add a comment...</p>
                                 </div>
                              </div>
                                 <div id="wrapper" class="">
                                     <div class="video_list">
                                          <div class="video_player">
                                             <video src='#'></video>
                                             <div style = 'display:nne' class="video_overlay">
                                                <img calss='' src="../assets/img/thumbnail.jpg" alt="">
                                             </div>
                                             <span class='duration'>0:00</span>
                                          </div>
                                          <div class="info">
                                             <div class="channel-photo">
                                                <div style="width:100%;height:100%;border-radius:50%">
                                                   <img src="../assets/img/thumbnail.jpg" alt="">
                                                </div>
                                             </div>
                                             <div class="center">
                                                <div class="video-title">
                                                   name
                                                </div>
                                                <div class="information">
                                                   <span>unknown</span>
                                                   <hr>
                                                   <span class="views"> views</span>
                                                   <hr>
                                                   <span class="time">time</span>
                                                </div>
                                             </div>
                                          </div>
                                    </div>
                                 </div>
                                 <div id="loading_icon" style="margin-bottom:0px">
                                    <div class="lds-default"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                                 </div>
                           </div>
                           

                           <div id="details">
                              <div></div>
                              <div class='top'>
                                 <h2>Description</h2>
                                 <div class="icon">
                                    <span></span>
                                 </div>
                              </div>
                              <p style='font-size:22px;color:white;font-weight:700;padding:12px 4px' class="video_name">name</p>
                              <div style='display:flex;align-items:center;padding:2px 8px;'>
                                 <div style='width:25px;height:25px'>
                                    <img style='border-radius:50%;width:100%;height:100%' src="../assets/img/thumbnail.jpg">  
                                 </div>
                                 <p style='font-size:14px;color:rgba(255,255,255,0.75);font-weight:700;margin-left:5px'>
                                    unknown
                                 </p>
                              </div>
                              <div style="display:flex;align-items:center;justify-content:space-between;padding:18px 45px;background:gren">
                                 <div style='display:flex;align-items:center;justify-content:center;flex-direction:column'>
                                    <p style="font-size:16px;font-weight:700;color:white" class="views">views</p>
                                    <span style='color:rgba(255,255,255,0.8);font-size:11px'>views</span>
                                 </div>
                                 
                                 <div style='display:flex;align-items:center;justify-content:center;flex-direction:column'>
                                    <p style="font-size:16px;font-weight:700;color:white" class="minutes">45</p>
                                    <span style='color:rgba(255,255,255,0.8);font-size:11px'>minutes watch</span>
                                 </div>
                                 
                                 <div style='display:flex;align-items:center;justify-content:center;flex-direction:column'>
                                    <p style="font-size:16px;font-weight:700;color:white" class="month">June</p>
                                    <span style='color:rgba(255,255,255,0.8);font-size:11px' class="year">2022</span>
                                 </div>
                              </div>
                           </div>

                           <div id="commentSection" class="">
                              <div class='commentHeader'>
                                 <div class="hhh">
                                    <h2>Comments</h2>
                                    <button class="close">
                                       <span class="material-icons">
                                          close
                                       </span>
                                    </button>
                                 </div>
                                 <div class="bbb">
                                    <button class="active">Top</button>
                                    <button>Newest</button>
                                 </div>
                              </div>
                              <div style="position:relative;width:100%;height:100%;overflow: scroll;">


                                 <div class="commentBody">

                                 
                                    <div class="commentRow">
                                       <div class="commentAuthor">
                                       <?php if (isset($_SESSION["loggedOren"])): ?>
                                          <h1 class="<?= $user["first_name"][0] ?> d-flex"><?= $user["first_name"][0] ?></h1><?php else: ?><h1 class="M"><span>M</span></h1>
                                       <?php endif; ?>
                                       </div>
                                       <div class="commentDescript">
                                          <span>@raju_bhai</span>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
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
                                                   <?php if (isset($_SESSION["loggedOren"])): ?>
                                                      <h1 class="<?= $user["first_name"][0] ?> d-flex"><?= $user["first_name"][0] ?></h1><?php else: ?><h1 class="M"><span>M</span></h1>
                                                   <?php endif; ?>
                                                      
                                                   </div>
                                                   <div class="commentDescript">
                                                      <span>@raju_bhai</span>
                                                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                      <div class="iconGroup">
                                                         <button class="like"><i class="material-icons">thumb_up</i> <span>48</span></button>
                                                         <button class="dislike"><i class="material-icons">thumb_down</i> <span>5</span></button>
                                                      </div>
                                                      <div class="comment_replies">
                                                         <div class="replyRow">
                                                            <div class="commentAuthor">
                                                            <?php if (isset($_SESSION["loggedOren"])): ?>
                                                              <h1 class="<?= $user["first_name"][0] ?> d-flex"><?= $user["first_name"][0] ?></h1><?php else: ?><h1 class="M"><span>M</span></h1>
                                                            <?php endif; ?> 
                                                             </div>
                                                            <div class="commentDescript">
                                                               <span>@raju_bhai</span>
                                                               <p>Lorem ipsum dolor sit amet,  incididunt ut labore et dolore magna aliqua.</p>
                                                               <div class="iconGroup">
                                                                  <button class="replike"><i class="material-icons">thumb_up</i> <span>48</span></button>
                                                                  <button class="repdislike"><i class="material-icons">thumb_down</i> <span>8</span></button>
                                                                  <button class="repcomment"><i class="material-icons">comment</i></button>
                                                               </div>
                                                            </div>
                                                         </div>
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
                                             <button class=""><i class="material-icons">send</i></button>
                                          </div>
                                       </div>
                                    </div>


                                 
                                 
                                 
                                 
                                 
                                 </div>
                                 
                              </div>
                              <div class="commentFooter">
                              <?php if (isset($_SESSION["loggedOren"])): ?>
                                 <h1 class="<?= $user["first_name"][0] ?> d-flex"><?= $user["first_name"][0] ?></h1><?php else: ?><h1 class="M"><span>M</span></h1>
                                 <?php endif; ?>
                                 <input type="text" id="comment_box" placeholder="Add a Comment">
                                 <button id="add_comment"><i class="material-icons">send</i></button>
                              </div>
                           
                           </div>
                        
                           




     
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
               }
            } else {
                  ?>
            <script>location.href="<?= $url ?>"</script>
            <?php
            }
         } else {
            ?>
            <script>location.href="<?= $url ?>"</script>
            <?php
         }
         ?>






      
    

      <script src="<?= base_url('m/assets/js/video.js') ?>"></script>

      <script>
         $(document).ready(function(){
            var vid_id = $('#unique_id').val();
            var start = window.start = 0;
            var limit = 3;
            let isLoading = false;

            
            $(window).on('scroll', function() {
               const $lastListContainer = $('.video_list').last();
               const scrollTop = $(window).scrollTop();
               const windowHeight = $(window).height();
               const elementOffset = $lastListContainer.offset().top;
               const elementHeight = $lastListContainer.outerHeight();

               if (!isLoading && scrollTop + windowHeight + 100 >= elementOffset + elementHeight) {
                  isLoading = true;
                  load();  
                  }
               });

               load();
               function load(){
                  $("#loading_icon").addClass("visible");
                  let fd = new FormData();
                  fd.append('operation','suggest'); 
                  fd.append('limit',limit); 
                  fd.append('start',start);
                  $.ajax({
                     url:"<?= base_url('m/ajax/video') ?>",
                     method:"POST",
                     data:fd,
                     contentType:false,
                     processData:false,
                     success:function(data){
                        if(parseInt(start) == 0){
                           $('#wrapper').html(data);
                        }
                        else{
                           $('#wrapper').append(data);
                        }
                        $("#loading_icon").removeClass("visible");
                        start = window.start;
                        isLoading = false;
                     }
                     })

               }
       


               <?php if (isset($_SESSION["loggedOren"])) {?>
                  var user_id = $('#user_id').val();
                  $('#add_comment').click(function(){
                    var fd = new FormData();
                    fd.append('user_id',user_id); 
                    fd.append('vid_id',vid_id); 
                    let text = $('#comment_box').val();
                    fd.append('text',text); 
                    fd.append('add_comment','column');
                    if(text !== ''){
                        $.ajax({
                            url:"<?= base_url("m/ajax/video") ?>",
                            method:"POST",
                            data:fd,
                            contentType:false,
                            processData:false,
                            success:function(data){
                                $("#comment_box").val("");
                                comment_show();
                            }
                        })
                    }
                })
                  function reply_add(){
                    $('.add_reply').click(function(){
                        var click = $(this);
                        var parent_id = $(this).val();
                        var comment = $(this).closest('.commentRow').find('input[type="text"]').val();
                        var fd = new FormData();
                        fd.append('add_reply',"add_reply"); 
                        fd.append('user_id',user_id); 
                        fd.append('vid_id',vid_id); 
                        fd.append('parent_id',parent_id);
                        fd.append('comment',comment);
                        if(comment !== ''){
                        $.ajax({
                            url:"<?= base_url("m/ajax/video") ?>",
                            method:"POST",
                            data:fd,
                            contentType:false,
                            processData:false,
                            success:function(data){
                                $(click).closest('.commentRow').find('input[type="text"]').val('');  
                                 reply_show(parent_id);  
                            }
                            })
                        }
                    })
                }


                  <?php } else { ?>
                  $('#comment_box').click(function(){
                     window.location.href = '../signin';
                  })
               <?php
              }
              
            ?>
                  comment_show()
                  function comment_show(){
                    var fd = new FormData();
                    fd.append('vid_id',vid_id); 
                    fd.append('comment_show','column');
                    $.ajax({
                            url:"<?= base_url("m/ajax/video") ?>",
                            method:"POST",
                            data:fd,
                            contentType:false,
                            processData:false,
                            success:function(data){
                                $('.commentBody').html(data);
                                commentAction();
                                $(".comments .top span:last-child").text(window.total_comment);
                                $('.commentRow').each(function() {
                                    reply_show($(this).find('.add_reply').val());
                                 });

                                     <?php if (
                                         isset($_SESSION["loggedOren"])
                                     ) { ?>
                                    reply_add();
                                    <?php } ?>

                                    
                                   
                                      
                                    
                                
                            }
                    })
                }


                function reply_show(comment_id){
                    var id = $('#'+comment_id);
                    var parent_id = comment_id;
                    var fd = new FormData();
                    fd.append('parent_id',parent_id); 
                    fd.append('vid_id',vid_id); 
                    fd.append('reply_show','column');
                    $.ajax({
                            url:"<?= base_url("m/ajax/video") ?>",
                            method:"POST",
                            data:fd,
                            contentType:false,
                            processData:false,
                            success:function(data){
                                $(id).find('.comment_replies').html(data);
                                $(id).find('.viewReply i').text(window.total_reply);
                            }
                  })
               }



         })
      </script>
   </body>
</html>