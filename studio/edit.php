
<?php
session_start();
include('includes/config.php');
if(!isset($_SESSION['loggedOren'])){
    header("location:".$url);
   exit(0);
}
else{
    $unique_id = $user['unique_id'];
    include('includes/header.php');
	if(isset($_GET['channel_id'])){
        $c_id = $_GET['channel_id'];
        $v_id = $_GET['video_id'];
        $query = mysqli_query($con, "SELECT * FROM channel_list where unique_id = '$c_id' and author_id='$unique_id'");
        if(mysqli_num_rows($query) > 0){
        foreach($query as $row){
        $query = mysqli_query($con, "SELECT * FROM video where unique_id = '$v_id' and owner='$c_id' and status =0");
        if(mysqli_num_rows($query) > 0){
        foreach($query as $item){
            $page_title = $item['title'];
			
			?>
 <!-- Begin page -->
 <input type="text" value="<?= $c_id ?>" id="c_id" style="display:none">
 <input type="text" value="<?= $v_id ?>" id="v_id" style="display:none">
 <link rel="stylesheet" href="<?= base_url('studio/assets/css/control.css') ?>">
 <link rel="stylesheet" type="text/css" href="<?= base_url('studio/css/page_upload.css') ?>">
 <div id="layout-wrapper">
     <?php
        include('includes/navbar.php');
        include('includes/appmenu.php');
		
        
        ?>

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
            <div class="row">
                <div class="col-lg-9 col-md-12">
					<div class="mn-vid-sc single_video">
								<div class="vid-1">
								<div class="vid-pr" style="margin-bottom:0">
									<div id="video_wrapper">
										<div id="video_player" class="paused">
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
											<!----
												<video src="assets/video/Nature Slow Motion Video HD - 4K (ULTRA HD) - My Nature World.mp4" id="main_video"> </video>
												<video src="" id="preview_video" class=""> </video>
											-->
											<div id="video_overlay">
                                            <?php
                                                if($item['thumbnail'] != ""){
                                                    ?>
                                                    <img class="video_overlay_img" src="<?=base_url('studio/uploads/'.$v_id.'/thumbnail/'.explode('///',$item['thumbnail'])[intval($item['active_thumbnail'])-1])?>" alt="">
                                                    <?php
                                                }
                                                else{
                                                    ?>
                                                <img class="video_overlay_img" src="<?=base_url('studio/uploads/'.$v_id.'/thumbnail/thumbnail.jpeg') ?>" alt="">
                                                    <?php
                                                }
                                                ?>
												<div class="video_overlay_logo">
													<svg height="100%" version="1.1" viewBox="0 0 68 48" width="100%"><path class="ytp-large-play-button-bg" d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z" ></path><path d="M 45,24 27,14 27,34" fill="#fff"></path></svg>
												</div>
											</div>
												<div id="spinner">
													<div class="spinner">
													<svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
														<circle cx="50" cy="50" r="46" />
													</svg>
													</div>
												</div>
                                               <?php
                                               $subtile = explode("///",$item['subtitle']);
                                               foreach($subtitle as $sub){
                                               ?>
                                                <track id="track1" label="arabic" kind="subtitles" src="assets/subtitles/arabic.vtt" srclang="en"></track>
                                                <?php
                                                    }
                                                ?>
											<video id="main_video" preload="metadata"> 
												<source src="<?= base_url('studio/uploads/'.$v_id.'/video/'.$item['video']) ?>" size="720" type="video/mp4">
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
															<span class="current">0:00</span> / <span class="duration">0:00</span>
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
											<div class="end_screen">
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
														<!------
															<div class="item">
																<div class="img">
																	<img src="images/resources/br10.jpg" alt="">
																</div>
															</div>
															--->
														
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
								</div><!--vid-pr end-->
								<div class="vid-info">
									<h3>title</h3>
								</div>
							</div><!--vid-1 end-->
							<div class="abt-mk">
								<div class="info-pr-sec">
									<div class="vcp_inf cr">
										<div class="vc_hd">
											<img src="images/resources/th5.png" alt="">
										</div>
										<div class="vc_info pr">
											<h4><a href="#" title="">ScereBro</a></h4>
											<span>Published on Oct 22, 2017</span>
										</div>
									</div><!--vcp_inf end-->							
									<ul class="chan_cantrz">
										<li>
											<a href="#" title="" class="donate">Donate</a>
										</li>
										<li>
											<a href="#" title="" class="subscribe">Subscribe <strong>13M</strong></a>
										</li>
									</ul><!--chan_cantrz end-->
									<ul class="df-list">
										<li>
											<button data-toggle="tooltip" data-placement="top" title="Add to playlist">
												<i class="icon-add_to_playlist"></i>
											</button>
										</li>
										<li>
											<button data-toggle="tooltip" data-placement="top" title="Favorite">
												<i class="icon-like"></i>
											</button>
										</li>
										<li>
											<button data-toggle="tooltip" data-placement="top" title="Watch Later">
												<i class="icon-watch_later"></i>
											</button>
										</li>
										<li>
											<button data-toggle="tooltip" data-placement="top" title="Share">
												<i class="icon-share"></i>
											</button>
										</li>
										<li>
											<button data-toggle="tooltip" data-placement="top" title="Report Video">
												<i class="icon-flag"></i>
											</button>
										</li>
									</ul><!--df-list end-->
									<div class="clearfix"></div>
								</div>
								<div class="clearfix"></div>
								<div class="about-ch-sec">
									<div class="abt-rw"id="moment" >
										<ul>
											<!-----------------load by js---------->
										</ul>
									</div>
									<div class="abt-rw">
										<h4>Cast:</h4>
										<ul id="cast">
											<!-----------------load by js---------->
										</ul>
									</div>
									<div class="abt-rw">
										<h4>Category:</h4>
										<ul id="category">
											<!-----------------load by js---------->
										</ul>
									</div>
									
									<div class="abt-rw">
										<h4>About : </h4>
										<p id="about"> 
											<!-----------load by js------------------->
										</p>
									</div>
									<div class="abt-rw">
										<h4>tags:</h4>
										<ul id="tags">
											<!-----------------load by js---------->
										</ul>
									</div>
								</div><!--about-ch-sec end-->
							</div><!--abt-mk end-->
							
						</div><!--mn-vid-sc end--->
					</div><!---col-lg-9 end-->
					<div class="col-lg-3 col-md-4">
					
					<div class="sidebar mt-5">
						<div class="videoo-list-ab">
								<div class="videoo">
									
									<div class="drop-zone">
										<i class="fas fa-video"></i>
										<span class="drop-zone__prompt">Drop video here or click to upload</span>
										<input type="file" accept=".mp4" name="myFile" class="drop-zone__input">
									</div>	
									<div class="up_pro_status">
										<div class="up_wrapper">
											<div class="up_progress-bar" data-percent="0">
												<div class="up_progress">
													<div class="up_progress-fill"></div>
												</div>
												<div class="percents">
													<div class="percents-wrapper">
														<span>0%</span>
													</div>
												</div>
									</div>									
									
									
								</div>
							</div>
						</div><!--videoo end-->
						
						<div class="videoo">
							<div class="file_wrapper th_wrapper">
								<form action="#">
									<div class="th_upload">
										
										<input class="file-input" multiple accept=".png,.jpg,.jpeg" type="file" name="file" hidden>
												<i class="fas fa-images"></i>
												<p>Drop thumbnail here or click to upload</p>
												
											</div>
										  <div class="pre_wrapper">
												<div class="thum_preview">
													<div class="waiting pre_waiting"></div>
													<img src="" alt="">
													<div class="add_more">
														<svg class="svg-circleplus" viewBox="0 0 100 100">
															<circle cx="50" cy="50" r="45" fill="none" stroke-width="7.5"></circle>
															<line x1="32.5" y1="50" x2="67.5" y2="50" stroke-width="5"></line>
															<line x1="50" y1="32.5" x2="50" y2="67.5" stroke-width="5"></line>
														</svg>
													</div>
												</div>
											</div>
										</form>
										
										
									</div>
								</div>
								<div class="thum_wrapper active">
									<div class="thum_gallery"> 
										<!-----------content load by js------------>			
									</div>
								</div>
					
					
					<div class="videoo">
						<div class="user-box">
							<input type="text" id="title">
							<label for="title">Title</label>
						</div>
					</div>
							  <div class="videoo">
								  <div class="user-box moments_add">
									  <input type="text">
									  <label for="">Moments:
										  <select name="" id="min">
											  <option value="min">Min</option>
											</select>
											<select name="" id="sec">
												<option value="sec">Sec</option>
											</select>
										</label>
										<button>Add</button>
									</div>
							  </div>
							  <div class="videoo">
								  <div class="user-box cast_add">
									<input type="text">
									<label for="">Cast</label>
									<button>Add</button>
								</div>
							</div>
							<div class="videoo">
								<div class="user-box about">
									<textarea name="" id="" cols="" rows=""></textarea>
									<label for="">About</label>
									<button>Add</button>
								</div>
							</div>
							
							
							<div class="videoo">
								<div class="user-box category_add">
									<input type="text">
									<label for="">Category</label>
									<button>Add</button>
								</div>
							</div>
							<div class="videoo">
								<div class="user-box tags_add">
									<input type="text">
									<label for="">Tags</label>
									<button>Add</button>
								</div>
							</div>
							<div class="videoo">
								<div class="sb_wrapper file_wrapper">
									<form action="#">
										<div class="th_upload">
											
											<input class="file-input" multiple accept=".vtt" type="file" name="file" hidden>
											<i class="fas fa-closed-captioning"></i>
											<p>Drop subtitles here or click to upload</p>
										</div>
									</form>
								</div>
							</div>
							<div class="uploaded-area">
							</div>
							<div class="videoo specifier">
								<h4>Specifier</h4>
								<div class="">
									<input value = "2" type="radio" id="public" name="specifier">
									<label for="public">
										<p>Public</p>
										<span>Anyone can see this video</span>
									</label>
								</div>
								<div class="">
									<input value ="1" type="radio" id="protected" name="specifier">
									<label for="protected">
										<p>Protected</p>
										<span>Only subscriber can see this video</span>
									</label>
								</div>
								<div class="">
									<input value ="0" type="radio" id="private" name="specifier">
									<label for="private">
										<p>Private</p>
										<span>Only you can see this video</span>
									</label>
								</div>
							</div>
							<button id="publish">
								Publish
							</button>
							</div>
						</div><!--side-bar end-->
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
<script src="<?= base_url('studio/assets/js/video-control.js') ?>">
</script> <script src="<?= base_url('studio/js/edit.js') ?>"></script>
<?php
include('includes/footer.php');
}}}}
else{
    /*
    header("location:".$url);
    exit(0);
    */
}
}
else{
   /* header("location:".$url);
    exit(0);*/
}
}
?>