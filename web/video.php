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
    <link rel="stylesheet" href="assets/css/video.css">
</head>
<body>
  <?php
    include('includes/nav.php');
    include('includes/voice.php');
    include('includes/stickySidebar.php');
    ?>

      <div class="wrapper">
      <?php
         include('includes/smallSideber.php');
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

                  <div class="container">
                     <div class="page_content">
                        <div class="middle_bar">
                           <div id="video_wrapper" style="display:nne">
                              <div id="video_player" class="paused">
                                 <div id="state" class="">
                                    <div style="width:100%;height:100%;position:relative">
                                       <i class="material-icons close_state">close</i>
                                       <ul>
                                          <li class="vid_id">
                                             <p class="left">
                                                Video ID / sCPN
                                             </p>
                                             <p class="right" id="scpn">
                                                
                                             </p>
                                          </li>
                                          <li class="viewport">
                                             <p class="left">
                                                Viewport / Frames
                                             </p>
                                             <p class="right" id="viewport">
                                             </p>
                                          </li>
                                          <li class="optimal_res">
                                             <p class="left">
                                                Current / Optimal Res
                                             </p>
                                             <p class="right" id="currentRes">
                                             </p>
                                          </li>
                                          <li class="volume_normalized">
                                             <p class="left">
                                                Volume / Normalized
                                             </p>
                                             <p class="right" id="volumeInfo">
                                             </p>
                                          </li>
                                          <li class="codecs">
                                             <p class="left">
                                                Codecs
                                             </p>
                                             <p class="right">
                                             </p>
                                          </li>
                                          <li class="color">
                                             <p class="left">
                                                Color
                                             </p>
                                             <p class="right" id="color">
                                             </p>
                                          </li>
                                          <li class="connection_speed">
                                             <p class="left">
                                                Connection Speed
                                             </p>
                                             <p class="right" id="networkInfo">
                                             </p>
                                          </li>
                                          <li class="network_activity">
                                             <p class="left">
                                                Network Activity
                                             </p>
                                             <p class="right">
                                             </p>
                                          </li>
                                          <li class="buffer_health">
                                             <p class="left">
                                                Buffer Health
                                             </p>
                                             <p class="right" id="buffer_health">
                                             </p>
                                          </li>
                                          <li class="mystery_text">
                                             <p class="left">
                                                Mystery Text
                                             </p>
                                             <p class="right" id="mysteryBox">
                                             </p>
                                          </li>
                                          <li class="date">
                                             <p class="left">
                                                Date
                                             </p>
                                             <p class="right" id="datetime">
                                             </p>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div class="volume_level">
                                    <div class="volume_percentage">
                                       75%
                                    </div>
                                    <div class="volume_icon">
                                       <i class="material-icons">volume_up</i>
                                    </div>
                                 </div>
                                 <div id="video_status">
                                    <div class="">
                                       <i class="material-icons">play_arrow</i>
                                    </div>
                                 </div>
                                 <div class="duration_rewind first">
                                    <div>10 seconds</div>
                                    <div>
                                       <i class="material-icons duration_rewind_icon">play_arrow</i>
                                       <i class="material-icons duration_rewind_icon">play_arrow</i>
                                       <i class="material-icons duration_rewind_icon">play_arrow</i>
                                    </div>
                                 </div>
                                 <div class="duration_rewind second">
                                    <div>10 seconds</div>
                                    <div>
                                       <i class="material-icons duration_rewind_icon">play_arrow</i>
                                       <i class="material-icons duration_rewind_icon">play_arrow</i>
                                       <i class="material-icons duration_rewind_icon">play_arrow</i>
                                    </div>
                                 </div>
                                 <div id="video_overlay">
                                    <img class="video_overlay_img" src="<?= base_url('studio/uploads/'.$video['unique_id'].'/thumbnail/'.explode(',',$video['thumbnail'])[$video['active_thumbnail']]) ?>" alt="">
                                    <div class="video_overlay_logo">
                                       <svg height="100%" version="1.1" viewBox="0 0 68 48" width="100%">
                                          <path class="ytp-large-play-button-bg" d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z" ></path>
                                          <path d="M 45,24 27,14 27,34" fill="#fff"></path>
                                       </svg>
                                    </div>
                                 </div>
                                 <div id="spinner">
                                    <div class="spinner">
                                    <div class="lds-ripple"><div></div><div></div></div>
                                    </div>
                                 </div>
                                 <video id="main_video" preload="metadata">
                                    <source size="720" type="video/mp4" src="<?= $url.'studio/uploads/'.$video['unique_id'].'/video/'.$video['video'] ?>">
                                 </video>
                                 <div id="thumbnail"></div>
                                 <p class="caption_text"></p>
                                 <div class="progressAreaTime">0.00</div>
                                 <div class="controls">
                                    <div class="progress_area">
                                       <div class="progress_bar">
                                          <span></span>
                                       </div>
                                       <div class="buffered_progress_bar"></div>
                                    </div>
                                    <div class="control_list">
                                       <div class="controls_left">
                                          <span class="icon">
                                          <i class="material-icons fast_rewind">replay_10</i>
                                          </span>
                                          <span class="icon">
                                          <i class="material-icons play_pause">play_arrow</i>
                                          </span>
                                          <span class="icon">
                                          <i class="material-icons fast_forward">forward_10</i>
                                          </span>
                                          <span class="icon">
                                          <i class="material-icons volume" title = 'mute(m)'>volume_up</i>
                                          <input type="range" min="0" max="100" id="volume_range">
                                          </span>
                                          <div class="timer">
                                             <span class="current">0:00</span> / <span class="duration"><?= timeFormat($video['duration']) ?></span>
                                          </div>
                                       </div>
                                       <div class="controls_right">
                                          <span class="icon">
                                          <i class="material-icons auto_play"></i>
                                          </span>
                                          <span class="icon">
                                          <i class="material-icons captionBTn">closed_caption</i>
                                          </span>
                                          <span class="icon">
                                          <i class="material-icons settingsBTn">settings</i>
                                          </span>
                                          <span class="icon">
                                          <i class="material-icons picture_in_picture" title="picture in picture(i)">picture_in_picture_alt</i>
                                          </span>
                                          <span class="icon">
                                          <i class="material-icons fullscreen" title="fullscreen(f)">fullscreen</i>
                                          </span>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- <div class="end_screen">
                                    <div class="end_screen_wrapper">
                                       <div class="item">
                                          <a href="#" class="img">
                                          <img src="thumbnail.jpg" alt="">
                                          </a>
                                       </div>
                                       <div class="item">
                                          <a href="#" class="img">
                                          <img src="thumbnail.jpg" alt="">
                                          </a>
                                       </div>
                                    </div>
                                 </div> -->
                                 <div class="scrubbing_timer ">
                                    <span class="s_current">0:00</span> / <span class="s_duration"><?= timeFormat($video['duration']) ?></span>
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
                                 <div id="settings" class="">
                                    <div data-label="settingHome" class="parent">
                                       <ul>
                                          <li data-label="speed" class="" style="display:flex;justify-content:space-between;cursor: pointer;">
                                             <span>Speed</span>
                                             <i class="material-icons">
                                             arrow_forward_ios
                                             </i>
                                          </li>
                                          <li data-label="quality" style="display:flex;justify-content:space-between;cursor: pointer;">
                                             <span>Quality</span>
                                             <i class="material-icons">
                                             arrow_forward_ios
                                             </i>
                                          </li>
                                       </ul>
                                    </div>
                                    <div class="playback parent" data-label="speed" hidden>
                                       <span style="cursor: pointer;">
                                       <i class="material-icons back_setting" data-label="settingHome">arrow_back</i>
                                       <span>Playback Speed</span>
                                       </span>
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
                                    <div class="quality parent" data-label="quality" hidden>
                                       <span style="cursor: pointer;">
                                       <i class="material-icons back_setting" data-label="settingHome">arrow_back</i>
                                       <span>Playback Quality</span>
                                       </span>
                                       <ul>
                                          <li data-quality="auto" class="active">auto</li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div id="captions" class="">
                                    <div class="caption">
                                       <span>Select Subtitile</span>
                                       <ul>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <h4 class="vid-title">
                              <?= $video['title'] ?>
                           </h4>
                           <div class="abt-mk"  style="display:noe">
                              <div class="info-pr-sec">
                                 <div class="vcp_inf cr">
                                    <?php
                                    $c = $video['owner'];
                                       $owner = mysqli_query(
                                          $con,
                                          "SELECT * FROM channel_list WHERE status=0 AND author_id='$c'"
                                          );
                                          if (mysqli_num_rows($owner) > 0) {
                                                foreach ($owner as $o){ 
                                             ?>
                                          <div class="vc_hd">
                                             <img src="<?= base_url("upload/image/channel/profile_photo/" . $o["profile_photo"]) ?>" alt="" style="width:32px;height:32px">
                                          </div>
                                          <div class="vc_info pr">
                                             <h4><a href="">@<?= $o["name"] ?></a></h4>
                                             <span>Published <?= dateTime($video["created_at"]) ?></span>
                                          </div>
                                       <?php
                                    }}
                                    ?>
                                    

                                 </div>
                                 <!--vcp_inf end-->							
                                 <ul class="df-list">
                                    <li>
                                       <button data-toggle="tooltip" data-action="playlist" title="Add to playlist" id="playlist">
                                          <div class="like">
                                          </div>
                                       </button>
                                    </li>
                                    <li>
                                       <button data-toggle="tooltip" data-action="favourite" title="Favorite" class="shr active" id="favourite">
                                          <div class="like">
                                          </div>
                                       </button>
                                    </li>
                                    <li>
                                       <a data-toggle="tooltip" data-action="comment" title="comment" id="comment" href="#comment_section">
                                          <div class="like">
                                          </div>
                                       </a>
                                    </li>
                                    <li>
                                       <button data-toggle="tooltip" data-action="watch_later" title="Watch Later" id="watch_later">
                                          <div class="like">
                                          </div>
                                       </button>
                                    </li>
                                    <li>
                                       <button data-toggle="tooltip" data-action="share" title="Share" id="share">
                                          <div class="like">
                                          </div>
                                       </button>
                                    </li>
                                    <li>
                                       <a href="#" title="" class="subscribe">Subscribe</a>
                                    </li>
                                 </ul>
                                 <!--chan_cantrz end-->
                                 <div class="clearfix"></div>
                              </div>
                              <div class="clearfix"></div>
                              <div class="about-ch-sec">
                                    <div class="abt-rw"id="moment" >
                                        <ul>
                                            <?php if ($video["moment"] != "") {
                                                foreach (
                                                    explode(
                                                        "///",
                                                        $video["moment"]
                                                    )
                                                    as $moment
                                                ) {
                                                    $m = explode(
                                                        ":",
                                                        $moment
                                                    ); ?>
                                            <li>
                                                <input type="button" class="time" value="<?= $m[0] ?>" style="display:none">
                                                <p><span><?= timeFormat(
                                                    $m[0]
                                                ) ?></span><?= $m[1] ?></p>
                                            </li>
                                            <?php
                                                }
                                            } ?>
                                        </ul>
									</div>
									<div class="abt-rw">
										<h4>Cast:</h4>
										<ul id="cast">
                                            <?php foreach (
                                                explode("///", $video["cast"])
                                                as $cast
                                            ) { ?>
                                                <li>
                                                    <a href="<?= base_url(
                                                        "?cast=" . $cast
                                                    ) ?>"><?= $cast ?></a>
                                                </li>
                                            <?php } ?>                            
				                        </ul>
									</div>
									<div class="abt-rw">
										<h4>Category:</h4>
										<ul id="category">
                                             <?php 
                                             if ($video["category"] !== null && $video["category"] !== '') {

                                             foreach (
                                                 explode(
                                                     "///",
                                                     $video["category"]
                                                 )
                                                 as $cat
                                             ) { ?>
                                                <li>
                                                    <a href="<?= base_url(
                                                        "web?category=" . $category[(int)$cat]
                                                    ) ?>"><?= $category[(int)$cat] ?></a>
                                                </li>
                                            <?php } }?>      										
                                        </ul>
									</div>
									
									<div class="abt-rw" id="about">
										<h4>About : </h4>
										<p> 
											<?= $video["about"] ?>
										</p>
									</div>
									<div class="abt-rw">
										<h4>tags:</h4>
										<ul id="tags">
                                          <?php foreach (
                                              explode("///", $video["tags"])
                                              as $tags
                                          ) { ?>
                                                <li>
                                                    <a href="<?= base_url(
                                                        "?tags=" . $tags
                                                    ) ?>"><?= $tags ?></a>
                                                </li>
                                            <?php } ?>     										
                                        </ul>
									</div>
								</div><!--about-ch-sec end-->
                              <!--about-ch-sec end-->
                           </div>
                           <!--abt-mk end-->
                           <div class="comment_section" id="comment_section">
                              <div class="mb-5 hstack">
                                 <div class="fs-5"><span class="total_comment"><?= $video['comments'] ?></span> Comments</div>
                                 <div class="dropdown">
                                    <button class="sort-btn" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                                       <span class="ski">
                                          <svg aria-hidden="true" class="svg-icon mdi-outlined mdi-sort" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 -960 960 960">
                                             <path d="M120-240v-60h240v60H120Zm0-210v-60h480v60H120Zm0-210v-60h720v60H120Z"></path>
                                          </svg>
                                       </span>
                                       <span>Sort by</span>
                                    </button>
                                    <div class="dropdown-menu">
                                       <div><button class="dropdown-item btn" >Top comments</button></div>
                                       <div><button class="dropdown-item btn">Newest first</button></div>
                                    </div>
                                 </div>
                              </div>
                              <div class="vstack gap-4" style="--sk-icon-btn-size:1.25em;--sk-icon-btn-padding:.25rem;">
                                 <!-- Comment #0 //-->
                                 <div class="comment-box">
                                    <div class="d-flex comment">
                                       <?php if (isset($_SESSION["loggedOren"])): ?>
                                       <h1 class="<?= $user["first_name"][0] ?> d-flex"><?= $user[
                                          "first_name"
                                          ][0] ?></h1>
                                       <?php else: ?>
                                       <h1 class="M"><span>M</span></h1>
                                       <?php endif; ?>
                                       <div class="flex-grow-1 ms-3">
                                          <div class="form-floating comment-compose">
                                             <input class="form-control w-100 text-white" placeholder="Leave a comment here" id="comment_box">
                                             <label for="my-comment-reply">Leave a comment here</label>
                                          </div>
                                          <div class="hstack justify-content-end gap-1">
                                             <button class="btn btn-sm bg-success">Cancel</button>
                                             <button class="btn btn-sm btn-info" id="add_comment">Comment</button>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="comment_show">
                                    <!-- fill form ajax //-->
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="sidebar">
                        <div class='list'>
                        <?php
                        $query = mysqli_query($con, "SELECT * FROM video ORDER BY RAND() LIMIT 12");
                        if (mysqli_num_rows($query)) {
                              foreach ($query as $vvv) {
                                 $th = "studio/uploads/" .$vvv["unique_id"] ."/thumbnail/" .explode(",", $vvv["thumbnail"])[$vvv["active_thumbnail"]];
                                 $c = $vvv["owner"];
                                 $owner = mysqli_query(
                                    $con,
                                    "SELECT * FROM channel_list WHERE status=0 AND author_id='$c'"
                                 );
                                 if (mysqli_num_rows($owner) > 0) {
                                    foreach ($owner as $o); ?>
                                    <a href="<?= $url . "web/video?v=" . $vvv["unique_id"] ?>">
                                          <div class="vid_thumb">
                                             <img src="<?= base_url($th) ?>" alt="">
                                             <span class="vid-time"><?= timeFormat(
                                                $vvv["duration"]
                                             ) ?></span>
                                          </div>
                                          <div class="vid_info">
                                             <p class='title'><?= shortenString(
                                                $vvv["title"],
                                                48
                                             ) ?></p>
                                             <p class='owner'><?= $o["name"] ?></p>
                                             <p class='vt'><?= numberFormat(
                                                $vvv["views"]
                                             ) ?> views . <small class="posted_dt"><?= dateTime($vvv["created_at"]) ?></small></p>
                                          </div>

                                    </a>

                                    <?php
                                 }
                              }
                        }
                        ?>
                        </div>
                     </div>
                     </div>
                     <div class="pop-up videopage">
                        <div class="pop-up__title">
                           Save video to..
                           <div class="close material-icons">close</div>
                        </div>
                        <div class="popup-body">
                           <!------------- fill up from ajax----------- ---->
                        </div>
                        <div class="pop-footer">
                           <button class='add visible'>Add new playlist</button>
                           <div class="form">
                              <div class="formInput">
                                 <label for="name" class="">Name</label>
                                 <input type="text" id='name' placeholder='Enter playlist name'>
                              </div>
                              <div class="formInput mt-3">
                                 <label for="name">Privacy</label>
                                 <select name="privacy" id="privacy">
                                    <option value="0">Public</option>
                                    <option value="1">Private</option>
                                 </select>
                              </div>
                              <div class="formInput mt-1">
                                 <button class='create'>Create</button>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="overlay-app"></div>
                     <div id="custom_dialog" class="visible">
                        <i class="material-icons close_dialog">close</i>
                        <ul>
                           <li id='loop'>
                              <div class="left">
                                 <i class="icon material-icons">repeat</i>
                                 <span>Loop</span>
                              </div>
                              <i class="checked material-icons">checked</i>
                           </li>
                           <li id='copylink'>
                              <div class="left">
                                 <i class="icon material-icons">link</i>
                                 <span>Copy video URL</span>
                              </div>
                           </li>
                           <li id='copylinkWithTime'>
                              <div class="left">
                                 <i class="icon material-icons">link</i>
                                 <span>Copy video URL with current time</span>
                              </div>
                           </li>
                           <li id='copyDebugInfo'>
                              <div class="left">
                                 <i class="icon material-icons">adb</i>
                                 <span>Copy debug info</span>
                              </div>
                           </li>
                           <li id='nerds'>
                              <div class="left">
                                 <i class="icon material-icons">info</i>
                                 <span>Stats for nerds </span>
                              </div>
                           </li>
                        </ul>
                     </div>
                    
                  </div>

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

      </div>
      <?php if (isset($_SESSION["loggedOren"])) {
    echo "<input type='hidden' id='user_id' value='" .
            $user["unique_id"] .
            "' >";
      } ?>
      <script src="../assets/js/function.js"></script>
      <script src="assets/js/common.js"></script>
      <script src="assets/js/video.js"></script>
      <script>
           $(document).ready(function(){
               var playlist_check = `<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M120-320v-80h320v80H120Zm0-160v-80h480v80H120Zm0-160v-80h480v80H120Zm534 440L512-342l56-56 86 84 170-170 56 58-226 226Z"/></svg>`;
               var playlist_add = `<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M120-320v-80h280v80H120Zm0-160v-80h440v80H120Zm0-160v-80h440v80H120Zm520 480v-160H480v-80h160v-160h80v160h160v80H720v160h-80Z"/></svg>`;
               var heart_fill = `<svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><path d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z"/></svg>`;
               var heart_solid = ` <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><path d="M458.4 64.3C400.6 15.7 311.3 23 256 79.3 200.7 23 111.4 15.6 53.6 64.3-21.6 127.6-10.6 230.8 43 285.5l175.4 178.7c10 10.2 23.4 15.9 37.6 15.9 14.3 0 27.6-5.6 37.6-15.8L469 285.6c53.5-54.7 64.7-157.9-10.6-221.3zm-23.6 187.5L259.4 430.5c-2.4 2.4-4.4 2.4-6.8 0L77.2 251.8c-36.5-37.2-43.9-107.6 7.3-150.7 38.9-32.7 98.9-27.8 136.5 10.5l35 35.7 35-35.7c37.8-38.5 97.8-43.2 136.5-10.6 51.1 43.1 43.5 113.9 7.3 150.8z"/></svg>`;
               var clock_fill = `<svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><path d="M256 8C119 8 8 119 8 256S119 504 256 504 504 393 504 256 393 8 256 8zm92.5 313h0l-20 25a16 16 0 0 1 -22.5 2.5h0l-67-49.7a40 40 0 0 1 -15-31.2V112a16 16 0 0 1 16-16h32a16 16 0 0 1 16 16V256l58 42.5A16 16 0 0 1 348.5 321z"/></svg>`;
               var clock_solid = `<svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z"/></svg>`
               var share_fill = `<svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><path d="M307 34.8c-11.5 5.1-19 16.6-19 29.2v64H176C78.8 128 0 206.8 0 304C0 417.3 81.5 467.9 100.2 478.1c2.5 1.4 5.3 1.9 8.1 1.9c10.9 0 19.7-8.9 19.7-19.7c0-7.5-4.3-14.4-9.8-19.5C108.8 431.9 96 414.4 96 384c0-53 43-96 96-96h96v64c0 12.6 7.4 24.1 19 29.2s25 3 34.4-5.4l160-144c6.7-6.1 10.6-14.7 10.6-23.8s-3.8-17.7-10.6-23.8l-160-144c-9.4-8.5-22.9-10.6-34.4-5.4z"/></svg>`;
               var comment = `<svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><path d="M512 240c0 114.9-114.6 208-256 208c-37.1 0-72.3-6.4-104.1-17.9c-11.9 8.7-31.3 20.6-54.3 30.6C73.6 471.1 44.7 480 16 480c-6.5 0-12.3-3.9-14.8-9.9c-2.5-6-1.1-12.8 3.4-17.4l0 0 0 0 0 0 0 0 .3-.3c.3-.3 .7-.7 1.3-1.4c1.1-1.2 2.8-3.1 4.9-5.7c4.1-5 9.6-12.4 15.2-21.6c10-16.6 19.5-38.4 21.4-62.9C17.7 326.8 0 285.1 0 240C0 125.1 114.6 32 256 32s256 93.1 256 208z"/></svg>`;
               var like_solid = `<svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><path d="M323.8 34.8c-38.2-10.9-78.1 11.2-89 49.4l-5.7 20c-3.7 13-10.4 25-19.5 35l-51.3 56.4c-8.9 9.8-8.2 25 1.6 33.9s25 8.2 33.9-1.6l51.3-56.4c14.1-15.5 24.4-34 30.1-54.1l5.7-20c3.6-12.7 16.9-20.1 29.7-16.5s20.1 16.9 16.5 29.7l-5.7 20c-5.7 19.9-14.7 38.7-26.6 55.5c-5.2 7.3-5.8 16.9-1.7 24.9s12.3 13 21.3 13L448 224c8.8 0 16 7.2 16 16c0 6.8-4.3 12.7-10.4 15c-7.4 2.8-13 9-14.9 16.7s.1 15.8 5.3 21.7c2.5 2.8 4 6.5 4 10.6c0 7.8-5.6 14.3-13 15.7c-8.2 1.6-15.1 7.3-18 15.2s-1.6 16.7 3.6 23.3c2.1 2.7 3.4 6.1 3.4 9.9c0 6.7-4.2 12.6-10.2 14.9c-11.5 4.5-17.7 16.9-14.4 28.8c.4 1.3 .6 2.8 .6 4.3c0 8.8-7.2 16-16 16H286.5c-12.6 0-25-3.7-35.5-10.7l-61.7-41.1c-11-7.4-25.9-4.4-33.3 6.7s-4.4 25.9 6.7 33.3l61.7 41.1c18.4 12.3 40 18.8 62.1 18.8H384c34.7 0 62.9-27.6 64-62c14.6-11.7 24-29.7 24-50c0-4.5-.5-8.8-1.3-13c15.4-11.7 25.3-30.2 25.3-51c0-6.5-1-12.8-2.8-18.7C504.8 273.7 512 257.7 512 240c0-35.3-28.6-64-64-64l-92.3 0c4.7-10.4 8.7-21.2 11.8-32.2l5.7-20c10.9-38.2-11.2-78.1-49.4-89zM32 192c-17.7 0-32 14.3-32 32V448c0 17.7 14.3 32 32 32H96c17.7 0 32-14.3 32-32V224c0-17.7-14.3-32-32-32H32z"/></svg>`;
               var like_fill = `<svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><path d="M313.4 32.9c26 5.2 42.9 30.5 37.7 56.5l-2.3 11.4c-5.3 26.7-15.1 52.1-28.8 75.2H464c26.5 0 48 21.5 48 48c0 18.5-10.5 34.6-25.9 42.6C497 275.4 504 288.9 504 304c0 23.4-16.8 42.9-38.9 47.1c4.4 7.3 6.9 15.8 6.9 24.9c0 21.3-13.9 39.4-33.1 45.6c.7 3.3 1.1 6.8 1.1 10.4c0 26.5-21.5 48-48 48H294.5c-19 0-37.5-5.6-53.3-16.1l-38.5-25.7C176 420.4 160 390.4 160 358.3V320 272 247.1c0-29.2 13.3-56.7 36-75l7.4-5.9c26.5-21.2 44.6-51 51.2-84.2l2.3-11.4c5.2-26 30.5-42.9 56.5-37.7zM32 192H96c17.7 0 32 14.3 32 32V448c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V224c0-17.7 14.3-32 32-32z"/></svg>`;
               $('#playlist .like').html(playlist_add);
               $('#favourite .like').html(heart_solid);
               $('#comment .like').html(comment);
               $('#watch_later .like').html(clock_solid);
               $('#share .like').html(share_fill);
               var vid_id = $('#unique_id').val();
               <?php if (isset($_SESSION["loggedOren"])) {?>
                var user_id = $('#user_id').val();
                $('#favourite,#watch_later').click(function(){
                    let column =$(this).data('action');
                    var fd = new FormData();
                    fd.append('vid_id',vid_id); 
                    fd.append('user_id',user_id); 
                    fd.append('column',column); 
                    if($(this).data('status') == '0'){
                        fd.append('update_data','favourite');
                    }
                    else if($(this).data('status') == '1'){
                        fd.append('update_remove','favourite');
                    }
                    $.ajax({
                        url:"<?= base_url("web/ajax/video") ?>",
                        method:"POST",
                        data:fd,
                        contentType:false,
                        processData:false,
                        success:function(data){
                            check_data(column);
                        }
                        })
                })

                check_data('watch_later');
                check_data('favourite');
                function check_data(column){
                    var fd = new FormData();
                    fd.append('column',column); 
                    fd.append('vid_id',vid_id); 
                    fd.append('user_id',user_id); 
                    fd.append('check_data','check_data');
                    $.ajax({
                        url:"<?= base_url("web/ajax/video") ?>",
                        method:"POST",
                        data:fd,
                        contentType:false,
                        processData:false,
                        success:function(data){
                            if(column == 'favourite'){
                                if(data.includes('yes')){
                                    $('#favourite').data('status','1')
                                    $('#favourite .like').html(heart_fill);
                                }
                                else{
                                    $('#favourite').data('status','0');
                                    $('#favourite .like').html(heart_solid);
                                }
                            }
                            else if(column == 'watch_later'){
                                if(data.includes('yes')){
                                    $('#watch_later').data('status','1')
                                    $('#watch_later .like').html(clock_fill);
                                }
                                else{
                                    $('#watch_later').data('status','0');
                                    $('#watch_later .like').html(clock_solid);
                                }
                            }
                        }
                        })
                }
                $('#share').click(function(){
                    if(navigator.share){
                        navigator.share({
                            text:document.title,
                            url:window.location.href
                        }).catch((err)=> console.error(err));
                    }
                    else{
                        alert("The current browser doesn't support the share function.Please, manually share the link");
                    }
                })
                $('.videopage button.create').click(function(){
                    var fd = new FormData();
                    fd.append('user_id',user_id); 
                    let name = $('.videopage input[type="text"]').val();
                    fd.append('name',name); 
                    fd.append('privacy',$('.videopage select').val()); 
                    fd.append('playlist_create','column');
                    if(name !== ''){
                        $.ajax({
                            url:"<?= base_url("web/ajax/video") ?>",
                            method:"POST",
                            data:fd,
                            contentType:false,
                            processData:false,
                            success:function(data){
                                $(".overlay-app").removeClass("is-active");
                                $(".pop-up").removeClass("visible");
                                $('.pop-up.videopage .pop-footer button.add').addClass('visible');
                                $('.pop-up.videopage .pop-footer .form').removeClass('visible');
                                $('.videopage input[type="text"]').val('');
                            }
                        })
                    }
                })
                function addRemove(){
                    $('.videopage input[type="checkbox"]').change(function(){
                        var action;
                        if($(this).is(':checked')){
                            action ='add';
                        }
                        else{
                            action = 'remove';
                        }
                        let playlist = $(this).val();
                        var fd = new FormData();
                        fd.append('video_add','column');
                        fd.append('action',action); 
                        fd.append('playlist',playlist); 
                        fd.append('vid_id',vid_id); 
                        $.ajax({
                            url:"<?= base_url("web/ajax/video") ?>",
                            method:"POST",
                            data:fd,
                            contentType:false,
                            processData:false,
                            success:function(data){
                            }
                        })

                    
                    })
                }
               $('#playlist').click(function(){ 
                    var fd = new FormData();
                    fd.append('user_id',user_id); 
                    fd.append('vid_id',vid_id); 
                    fd.append('playlist_show','column');
                    $.ajax({
                            url:"<?= base_url("web/ajax/video") ?>",
                            method:"POST",
                            data:fd,
                            contentType:false,
                            processData:false,
                            success:function(data){
                                $('.popup-body').html(data);
                                addRemove();
                            }
                    })
                })

                $('#add_comment').click(function(){
                    var fd = new FormData();
                    fd.append('user_id',user_id); 
                    fd.append('vid_id',vid_id); 
                    let text = $('#comment_box').val();
                    fd.append('text',text); 
                    fd.append('add_comment','column');
                    if(text !== ''){
                        $.ajax({
                            url:"<?= base_url("web/ajax/video") ?>",
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
                        var comment = $(this).closest('.comment-box').find('input[type="text"]').val();
                        var fd = new FormData();
                        fd.append('add_reply',"add_reply"); 
                        fd.append('user_id',user_id); 
                        fd.append('vid_id',vid_id); 
                        fd.append('parent_id',parent_id);
                        fd.append('comment',comment);
                        if(comment !== ''){
                        $.ajax({
                            url:"<?= base_url("web/ajax/video") ?>",
                            method:"POST",
                            data:fd,
                            contentType:false,
                            processData:false,
                            success:function(data){
                                $(click).closest('.comment-box').find('input[type="text"]').val('');  
                                $(click).closest('.comment-box').find('.cancel').click();
                               reply_show(parent_id);  
                            }
                            })
                        }
                    })
                }
                $('#comment').click(function(){
                    $('#comment_box').click();
                  })

                  <?php } else { ?>
            $('.df-list button,#comment_box,#add_comment').click(function(){
                window.location.href = 'signin';
            })

            <?php } ?>
                 comment_show();
                function comment_show(){
                    var fd = new FormData();
                    fd.append('vid_id',vid_id); 
                    fd.append('comment_show','column');
                    $.ajax({
                            url:"<?= base_url("web/ajax/video") ?>",
                            method:"POST",
                            data:fd,
                            contentType:false,
                            processData:false,
                            success:function(data){
                                $('.comment_show').html(data);
                                var cmnts = $('.comment-box.ccc');

                                for (var i = 0; i < cmnts.length; i++) {
                                    let val = $(cmnts[i]).find('.add_reply').val();
                                    reply_show(val);
                                }
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
                            url:"<?= base_url("web/ajax/video") ?>",
                            method:"POST",
                            data:fd,
                            contentType:false,
                            processData:false,
                            success:function(data){
                                $(id).find('.reply_show .comment-replies').html(data);
                                $(id).find('.total_reply').text(window.total_reply);
                            }
                    })

               }


            })

            $('#custom_dialog li#copylink').on('click', function() {
               var tempInput = $('<input>');
               $('body').append(tempInput);
               tempInput.val(window.location.href).select();
               document.execCommand('copy');
               tempInput.remove();
               alert("Link copied to clipboard!");
              
            });
            
            $('#custom_dialog li#copylinkWithTime').on('click', function() {
               var currentUrl = window.location.href;
               var tempInput = $('<input>');
               var newUrl = currentUrl + '&t=' + parseInt($('#main_video')[0].currentTime);
               $('body').append(tempInput);
               tempInput.val(newUrl).select();
               document.execCommand('copy');
               tempInput.remove();
               alert("Link copied to clipboard!");
          });

            $('#custom_dialog li#copyDebugInfo').on('click', function() {
               var videoElement = $('#main_video')[0];
               if (videoElement) {
                     // Create an object to store debug information
                     var debugInfo = {
                     currentTime: videoElement.currentTime,
                     duration: videoElement.duration,
                     paused: videoElement.paused,
                     muted: videoElement.muted,
                     volume: videoElement.volume,
                     networkState: videoElement.networkState,
                     readyState: videoElement.readyState
                     // Add more properties as needed
                     };
                     
                     var tempInput = $('<input>');
                     $('body').append(tempInput);
                     tempInput.val(JSON.stringify(debugInfo, null, 2)).select();
                     document.execCommand('copy');
                     tempInput.remove();
               }
               
            });

            $('.search-icon').on('click', function() {
               let val = $("#search").val();
               if(val.length){
                  window.location.href = `http://localhost/vidtube/web/?find=${val}`;
               }
            })
            $('#search').on('keyup', function(e) {
               let val = $("#search").val();
               if(val.length>=1 && e.keyCode ==13){
                   window.location.href = `http://localhost/vidtube/web/?find=${val}`;
                }
            })
      
      </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   </body>
</html>
