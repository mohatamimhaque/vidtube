<?php
session_start();

if(!isset($_SESSION['auth_user'])){
    header("location:".$url);
   exit(0);
  }
else{
    
	

include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');

?>
<section class="videso_section">
		<div class="info-pr-sec">
			<div class="container">
				<div class="vcp_inf cr">
					<span class="vc_hd">
						<img src="images/resources/sn.png" alt="">
					</span>
					<div class="vc_info pr">
						<h4>ScereBro <span class="verify_ic"><i class="icon-tick"></i></span></h4>
						<span>375,437 subscribers</span>
					</div>
				</div><!--vcp_inf end-->
				<ul class="chan_cantrz">
					<li>
						<a href="#" title="" class="donate">Donate</a>
					</li>
					<li>
						<a href="#" title="" class="subscribe">Subscribe <strong>12.3M</strong></a>
					</li>
				</ul><!--chan_cantrz end-->
				<div class="search_form">
					<form>
						<input type="text" name="search" placeholder="Search Videos">
						<button type="submit">
							<i class="icon-search"></i>
						</button>
					</form>
				</div>
				<div class="clearfix"></div>
			</div>
		</div><!--info-pr-sec end-->
		<div class="history-lst tbY">
			<div class="container">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
				  <li class="nav-item">
				    <a class="nav-link" id="home_tab" data-toggle="tab" href="#home_vidz" role="tab" aria-controls="home_tab" aria-selected="true">Home</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" id="videos_taab" data-toggle="tab" href="#vvideo_tabz" role="tab" aria-controls="videos_taab" aria-selected="false">Videos </a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" id="playlist-tab" data-toggle="tab" href="#playlist_tab" role="tab" aria-controls="playlist-tab" aria-selected="false">Playlist</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" id="channels-tab" data-toggle="tab" href="#channels_tab" role="tab" aria-controls="channels-tab" aria-selected="false">Channels</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link active" id="about-tab" data-toggle="tab" href="#about_tab" role="tab" aria-controls="about-tab" aria-selected="false">About</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" id="amazon-tab" data-toggle="tab" href="#amazong-tb" role="tab" aria-controls="amazon-tab" aria-selected="false">Amazon Products</a>
				  </li>
				</ul><!--nav-tabs end-->
				<div class="clearfix"></div>
			</div>
		</div><!--history-lst end-->
		<div class="tab-content p-0" id="myTabContent">
			<div class="tab-pane fade" id="home_vidz" role="tabpanel" aria-labelledby="home_tab">
				<div class="home_tb_details">
					<div class="viddz">
						<div class="container">
							<div class="ftz-vidz">
								<h3>Featured Videos</h3>
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-6 col-12">
										<div class="videoo">
											<div class="vid_thumbainl">
												<a href="#" title="">
													<img src="images/resources/vid-medium.jpg" alt="">
													<span class="vid-time">10:21</span>
													<span class="watch_later">
														<i class="icon-watch_later_fill"></i>
													</span>
												</a>	
											</div><!--vid_thumbnail end-->
											<div class="video_info">
												<h3><a href="single_video_page.html" title="">Kingdom Come: Deliverance Funny Moments and Fails</a></h3>
												<h4><a href="Single_Channel_Videos.html" title="">newfox media</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
												<span>686K views .<small class="posted_dt">1 week ago</small></span>
											</div>
										</div><!--videoo end-->
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-12">
										<div class="videoo">
											<div class="vid_thumbainl">
												<a href="#" title="">
													<img src="images/resources/vid-medium2.jpg" alt="">
													<span class="vid-time">10:21</span>
													<span class="watch_later">
														<i class="icon-watch_later_fill"></i>
													</span>
												</a>	
											</div><!--vid_thumbnail end-->
											<div class="video_info">
												<h3><a href="single_video_page.html" title="">DR DISRESPECT - Before They Were Famous - Twitch Streamer</a></h3>
												<h4><a href="Single_Channel_Videos.html" title="">newfox media</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
												<span>283K views .<small class="posted_dt">3 months ago</small></span>
											</div>
										</div><!--videoo end-->
									</div>
								</div>
							</div><!--ftz-vidz end-->
						</div>
					</div><!--viddz end-->
					<div class="viddz">
						<div class="container">
							<div class="vidz_sec">
								<h3>Recent Uploads</h3>
								<a href="#" title="">View all</a>
								<div class="clearfix"></div>
								<div class="vidz_list">
									<div class="row">
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide1.png" alt="">
														<span class="vid-time">10:21</span>
														<span class="watch_later">
														<i class="icon-watch_later_fill"></i>
													</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">Kingdom Come: Deliverance Funny Moments and Fails</a></h3>
													<h4><a href="Single_Channel_Videos.html" title="">newfox media</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
													<span>686K views .<small class="posted_dt">1 week ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide2.png" alt="">
														<span class="vid-time">13:49</span>
														<span class="watch_later">
															<i class="icon-watch_later_fill"></i>
														</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">DR DISRESPECT - Before They Were Famous - Twitch Streamer</a></h3>
													<h4><a href="Single_Channel_Videos.html" title="">Eros Now</a> </h4>
													<span>283K views .<small class="posted_dt">3 months ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide3.png" alt="">
														<span class="vid-time">2:54</span>
														<span class="watch_later">
															<i class="icon-watch_later_fill"></i>
														</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">Top Perectly Timed Twitch Moments 2017 #7</a></h3>
													<h4><a href="Single_Channel_Videos.html" title="">Animal Planet</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
													<span>2.6M views .<small class="posted_dt">2 months ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide4.png" alt="">
														<span class="vid-time">5:25</span>
														<span class="watch_later">
															<i class="icon-watch_later_fill"></i>
														</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">Top 5 Amazing Bridge Block ever in PUBG</a></h3>
													<h4><a href="Single_Channel_Videos.html" title="">Maketzi</a> </h4>
													<span>612K views .<small class="posted_dt">5 months ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
									</div>
								</div><!--vidz_list end-->
							</div><!--vidz_videos end-->
						</div>
					</div><!--viddz end-->
					<div class="viddz">
						<div class="container">
							<div class="vidz_sec">
								<h3>Popular Videos</h3>
								<a href="#" title="">View all</a>
								<div class="clearfix"></div>
								<div class="vidz_list">
									<div class="row">
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide5.png" alt="">
														<span class="vid-time">4:01</span>
														<span class="watch_later">
															<i class="icon-watch_later_fill"></i>
														</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">Trailer Park Boys Season 12 - Official Trailer</a></h3>
													<h4><a href="Single_Channel_Videos.html" title="">ScereBro</a> </h4>
													<span>45K views .<small class="posted_dt">3 days ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide6.png" alt="">
														<span class="vid-time">6:20</span>
														<span class="watch_later">
															<i class="icon-watch_later_fill"></i>
														</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">A day in the life of a Google software engineer</a></h3>
													<h4><a href="Single_Channel_Videos.html" title="">MathChief</a> </h4>
													<span>86K views .<small class="posted_dt">6 days ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide7.png" alt="">
														<span class="vid-time">8:16</span>
														<span class="watch_later">
															<i class="icon-watch_later_fill"></i>
														</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">Avengers: Infinity War - Gym Workout motivation 2019</a></h3>
													<h4><a href="Single_Channel_Videos.html" title="">RealLifeLore</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
													<span>144K views .<small class="posted_dt">6 days ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide8.png" alt="">
														<span class="vid-time">29:32</span>
														<span class="watch_later">
															<i class="icon-watch_later_fill"></i>
														</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">How the Universe Works - The Milky Way Galaxy - Space</a></h3>
													<h4><a href="Single_Channel_Videos.html" title="">Loskes</a></h4>
													<span>408K views .<small class="posted_dt">19 hours ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
									</div>
								</div><!--vidz_list end-->
							</div><!--vidz_videos end-->
						</div>
					</div><!--viddz end-->
					<div class="viddz">
						<div class="container">
							<div class="vidz_sec">
								<h3>France Tour Videos</h3>
								<a href="#" title="">View all</a>
								<div class="clearfix"></div>
								<div class="vidz_list">
									<div class="row">
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide9.png" alt="">
														<span class="vid-time">4:01</span>
														<span class="watch_later">
															<i class="icon-watch_later_fill"></i>
														</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">Trailer Park Boys Season 12 - Official Trailer</a></h3>
													<h4><a href="Single_Channel_Videos.html" title="">ScereBro</a> </h4>
													<span>45K views .<small class="posted_dt">3 days ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide10.png" alt="">
														<span class="vid-time">6:20</span>
														<span class="watch_later">
															<i class="icon-watch_later_fill"></i>
														</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">A day in the life of a Google software engineer</a></h3>
													<h4><a href="Single_Channel_Videos.html" title="">MathChief</a> </h4>
													<span>86K views .<small class="posted_dt">6 days ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide11.png" alt="">
														<span class="vid-time">8:16</span>
														<span class="watch_later">
															<i class="icon-watch_later_fill"></i>
														</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">Avengers: Infinity War - Gym Workout </a></h3>
													<h4><a href="Single_Channel_Videos.html" title="">RealLifeLore</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
													<span>144K views .<small class="posted_dt">6 days ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide12.png" alt="">
														<span class="vid-time">29:32</span>
														<span class="watch_later">
															<i class="icon-watch_later_fill"></i>
														</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">How the Universe Works - The Milky Way Galaxy - Space</a></h3>
													<h4><a href="Single_Channel_Videos.html" title="">Loskes</a> </h4>
													<span>408K views .<small class="posted_dt">19 hours ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
									</div>
								</div><!--vidz_list end-->
							</div><!--vidz_videos end-->
						</div>
					</div><!--viddz end-->
					<div class="viddz">
						<div class="container">
							<div class="vidz_sec">
								<h3>Daily Vlogs 2019</h3>
								<a href="#" title="">View all</a>
								<div class="clearfix"></div>
								<div class="vidz_list">
									<div class="row">
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide13.png" alt="">
														<span class="vid-time">10:21</span>
														<span class="watch_later">
															<i class="icon-watch_later_fill"></i>
														</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">Kingdom Come: Deliverance Funny Moments and Fails</a></h3>
													<h4><a href="Single_Channel_Videos.html" title="">newfox media</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
													<span>686K views .<small class="posted_dt">1 week ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide14.png" alt="">
														<span class="vid-time">13:49</span>
														<span class="watch_later">
															<i class="icon-watch_later_fill"></i>
														</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">DR DISRESPECT - Before They Were Famous - Twitch Streamer</a></h3>
													<h4><a href="Single_Channel_Videos.html" title="">Eros Now</a> </h4>
													<span>283K views .<small class="posted_dt">3 months ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide15.png" alt="">
														<span class="vid-time">2:54</span>
														<span class="watch_later">
															<i class="icon-watch_later_fill"></i>
														</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">Top Perectly Timed Twitch Moments 2017 #7</a></h3>
													<h4><a href="Single_Channel_Videos.html" title="">Animal Planet</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
													<span>2.6M views .<small class="posted_dt">2 months ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide16.png" alt="">
														<span class="vid-time">5:25</span>
														<span class="watch_later">
															<i class="icon-watch_later_fill"></i>
														</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">Top 5 Amazing Bridge Block ever in PUBG</a></h3>
													<h4><a href="Single_Channel_Videos.html" title="">Maketzi</a> </h4>
													<span>612K views .<small class="posted_dt">5 months ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
									</div>
								</div><!--vidz_list end-->
							</div><!--vidz_videos end-->
						</div>
					</div><!--viddz end-->
				</div><!--home_tb_details end-->
			</div>
		  	<div class="tab-pane" id="vvideo_tabz" role="tabpanel" aria-labelledby="videos_taab">
		  		<div class="videso_tb_details">
		  			<div class="container">
			  			<div class="vidz_sec">
							<h3>Uploads</h3>
							<a href="#" title=""><i class="icon-sort_by"></i>Sort By</a>
							<div class="clearfix"></div>
							<div class="vidz_list">
								<div class="row">
									<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
										<div class="videoo">
											<div class="vid_thumbainl">
												<a href="#" title="">
													<img src="images/resources/vide1.png" alt="">
													<span class="vid-time">10:21</span>
													<span class="watch_later">
														<i class="icon-watch_later_fill"></i>
													</span>
												</a>	
											</div><!--vid_thumbnail end-->
											<div class="video_info">
												<h3><a href="single_video_page.html" title="">Kingdom Come: Deliverance Funny Moments and Fails</a></h3>
												<h4><a href="#" title="">newfox media</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
												<span>686K views .<small class="posted_dt">1 week ago</small></span>
											</div>
										</div><!--videoo end-->
									</div>
									<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
										<div class="videoo">
											<div class="vid_thumbainl">
												<a href="#" title="">
													<img src="images/resources/vide2.png" alt="">
													<span class="vid-time">13:49</span>
													<span class="watch_later">
														<i class="icon-watch_later_fill"></i>
													</span>
												</a>	
											</div><!--vid_thumbnail end-->
											<div class="video_info">
												<h3><a href="single_video_page.html" title="">DR DISRESPECT - Before They Were Famous - Twitch Streamer</a></h3>
												<h4><a href="#" title="">Eros Now</a> </h4>
												<span>283K views .<small class="posted_dt">3 months ago</small></span>
											</div>
										</div><!--videoo end-->
									</div>
									<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
										<div class="videoo">
											<div class="vid_thumbainl">
												<a href="#" title="">
													<img src="images/resources/vide3.png" alt="">
													<span class="vid-time">2:54</span>
													<span class="watch_later">
														<i class="icon-watch_later_fill"></i>
													</span>
												</a>	
											</div><!--vid_thumbnail end-->
											<div class="video_info">
												<h3><a href="single_video_page.html" title="">Top Perectly Timed Twitch Moments 2017 #7</a></h3>
												<h4><a href="#" title="">Animal Planet</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
												<span>2.6M views .<small class="posted_dt">2 months ago</small></span>
											</div>
										</div><!--videoo end-->
									</div>
									<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
										<div class="videoo">
											<div class="vid_thumbainl">
												<a href="#" title="">
													<img src="images/resources/vide4.png" alt="">
													<span class="vid-time">5:25</span>
													<span class="watch_later">
														<i class="icon-watch_later_fill"></i>
													</span>
												</a>	
											</div><!--vid_thumbnail end-->
											<div class="video_info">
												<h3><a href="single_video_page.html" title="">Top 5 Amazing Bridge Block ever in PUBG</a></h3>
												<h4><a href="#" title="">Maketzi</a> </h4>
												<span>612K views .<small class="posted_dt">5 months ago</small></span>
											</div>
										</div><!--videoo end-->
									</div>
									<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
										<div class="videoo">
											<div class="vid_thumbainl">
												<a href="#" title="">
													<img src="images/resources/vide5.png" alt="">
													<span class="vid-time">4:01</span>
													<span class="watch_later">
														<i class="icon-watch_later_fill"></i>
													</span>
												</a>	
											</div><!--vid_thumbnail end-->
											<div class="video_info">
												<h3><a href="single_video_page.html" title="">Trailer Park Boys Season 12 - Official Trailer</a></h3>
												<h4><a href="#" title="">ScereBro</a> </h4>
												<span>45K views .<small class="posted_dt">3 days ago</small></span>
											</div>
										</div><!--videoo end-->
									</div>
									<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
										<div class="videoo">
											<div class="vid_thumbainl">
												<a href="#" title="">
													<img src="images/resources/vide6.png" alt="">
													<span class="vid-time">6:20</span>
													<span class="watch_later">
														<i class="icon-watch_later_fill"></i>
													</span>
												</a>	
											</div><!--vid_thumbnail end-->
											<div class="video_info">
												<h3><a href="single_video_page.html" title="">A day in the life of a Google software engineer</a></h3>
												<h4><a href="#" title="">MathChief</a> </h4>
												<span>86K views .<small class="posted_dt">6 days ago</small></span>
											</div>
										</div><!--videoo end-->
									</div>
									<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
										<div class="videoo">
											<div class="vid_thumbainl">
												<a href="#" title="">
													<img src="images/resources/vide7.png" alt="">
													<span class="vid-time">8:16</span>
													<span class="watch_later">
														<i class="icon-watch_later_fill"></i>
													</span>
												</a>	
											</div><!--vid_thumbnail end-->
											<div class="video_info">
												<h3><a href="single_video_page.html" title="">Avengers: Infinity War - Gym Workout motivation 2019</a></h3>
												<h4><a href="#" title="">RealLifeLore</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
												<span>144K views .<small class="posted_dt">6 days ago</small></span>
											</div>
										</div><!--videoo end-->
									</div>
									<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
										<div class="videoo">
											<div class="vid_thumbainl">
												<a href="#" title="">
													<img src="images/resources/vide8.png" alt="">
													<span class="vid-time">29:32</span>
													<span class="watch_later">
														<i class="icon-watch_later_fill"></i>
													</span>
												</a>	
											</div><!--vid_thumbnail end-->
											<div class="video_info">
												<h3><a href="single_video_page.html" title="">How the Universe Works - The Milky Way Galaxy - Space</a></h3>
												<h4><a href="#" title="">Loskes</a></h4>
												<span>408K views .<small class="posted_dt">19 hours ago</small></span>
											</div>
										</div><!--videoo end-->
									</div>
									<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
										<div class="videoo">
											<div class="vid_thumbainl">
												<a href="#" title="">
													<img src="images/resources/vide9.png" alt="">
													<span class="vid-time">4:01</span>
													<span class="watch_later">
														<i class="icon-watch_later_fill"></i>
													</span>
												</a>	
											</div><!--vid_thumbnail end-->
											<div class="video_info">
												<h3><a href="single_video_page.html" title="">Trailer Park Boys Season 12 - Official Trailer</a></h3>
												<h4><a href="#" title="">ScereBro</a> </h4>
												<span>45K views .<small class="posted_dt">3 days ago</small></span>
											</div>
										</div><!--videoo end-->
									</div>
									<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
										<div class="videoo">
											<div class="vid_thumbainl">
												<a href="#" title="">
													<img src="images/resources/vide10.png" alt="">
													<span class="vid-time">6:20</span>
													<span class="watch_later">
														<i class="icon-watch_later_fill"></i>
													</span>
												</a>	
											</div><!--vid_thumbnail end-->
											<div class="video_info">
												<h3><a href="single_video_page.html" title="">A day in the life of a Google software engineer</a></h3>
												<h4><a href="#" title="">MathChief</a> </h4>
												<span>86K views .<small class="posted_dt">6 days ago</small></span>
											</div>
										</div><!--videoo end-->
									</div>
									<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
										<div class="videoo">
											<div class="vid_thumbainl">
												<a href="#" title="">
													<img src="images/resources/vide11.png" alt="">
													<span class="vid-time">8:16</span>
													<span class="watch_later">
														<i class="icon-watch_later_fill"></i>
													</span>
												</a>	
											</div><!--vid_thumbnail end-->
											<div class="video_info">
												<h3><a href="single_video_page.html" title="">Avengers: Infinity War - Gym Workout </a></h3>
												<h4><a href="#" title="">RealLifeLore</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
												<span>144K views .<small class="posted_dt">6 days ago</small></span>
											</div>
										</div><!--videoo end-->
									</div>
									<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
										<div class="videoo">
											<div class="vid_thumbainl">
												<a href="#" title="">
													<img src="images/resources/vide12.png" alt="">
													<span class="vid-time">29:32</span>
													<span class="watch_later">
														<i class="icon-watch_later_fill"></i>
													</span>
												</a>	
											</div><!--vid_thumbnail end-->
											<div class="video_info">
												<h3><a href="single_video_page.html" title="">How the Universe Works - The Milky Way Galaxy - Space</a></h3>
												<h4><a href="#" title="">Loskes</a> </h4>
												<span>408K views .<small class="posted_dt">19 hours ago</small></span>
											</div>
										</div><!--videoo end-->
									</div>
									<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
										<div class="videoo">
											<div class="vid_thumbainl">
												<a href="#" title="">
													<img src="images/resources/vide13.png" alt="">
													<span class="vid-time">10:21</span>
													<span class="watch_later">
														<i class="icon-watch_later_fill"></i>
													</span>
												</a>	
											</div><!--vid_thumbnail end-->
											<div class="video_info">
												<h3><a href="single_video_page.html" title="">Kingdom Come: Deliverance Funny Moments and Fails</a></h3>
												<h4><a href="#" title="">newfox media</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
												<span>686K views .<small class="posted_dt">1 week ago</small></span>
											</div>
										</div><!--videoo end-->
									</div>
									<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
										<div class="videoo">
											<div class="vid_thumbainl">
												<a href="#" title="">
													<img src="images/resources/vide14.png" alt="">
													<span class="vid-time">13:49</span>
													<span class="watch_later">
														<i class="icon-watch_later_fill"></i>
													</span>
												</a>	
											</div><!--vid_thumbnail end-->
											<div class="video_info">
												<h3><a href="single_video_page.html" title="">DR DISRESPECT - Before They Were Famous - Twitch Streamer</a></h3>
												<h4><a href="#" title="">Eros Now</a> </h4>
												<span>283K views .<small class="posted_dt">3 months ago</small></span>
											</div>
										</div><!--videoo end-->
									</div>
									<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
										<div class="videoo">
											<div class="vid_thumbainl">
												<a href="#" title="">
													<img src="images/resources/vide15.png" alt="">
													<span class="vid-time">2:54</span>
													<span class="watch_later">
														<i class="icon-watch_later_fill"></i>
													</span>
												</a>	
											</div><!--vid_thumbnail end-->
											<div class="video_info">
												<h3><a href="single_video_page.html" title="">Top Perectly Timed Twitch Moments 2017 #7</a></h3>
												<h4><a href="#" title="">Animal Planet</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
												<span>2.6M views .<small class="posted_dt">2 months ago</small></span>
											</div>
										</div><!--videoo end-->
									</div>
									<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
										<div class="videoo">
											<div class="vid_thumbainl">
												<a href="#" title="">
													<img src="images/resources/vide16.png" alt="">
													<span class="vid-time">5:25</span>
													<span class="watch_later">
														<i class="icon-watch_later_fill"></i>
													</span>
												</a>	
											</div><!--vid_thumbnail end-->
											<div class="video_info">
												<h3><a href="single_video_page.html" title="">Top 5 Amazing Bridge Block ever in PUBG</a></h3>
												<h4><a href="#" title="">Maketzi</a> </h4>
												<span>612K views .<small class="posted_dt">5 months ago</small></span>
											</div>
										</div><!--videoo end-->
									</div>
									<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
										<div class="videoo">
											<div class="vid_thumbainl">
												<a href="#" title="">
													<img src="images/resources/vide17.png" alt="">
													<span class="vid-time">4:01</span>
													<span class="watch_later">
														<i class="icon-watch_later_fill"></i>
													</span>
												</a>	
											</div><!--vid_thumbnail end-->
											<div class="video_info">
												<h3><a href="single_video_page.html" title="">Trailer Park Boys Season 12 - Official Trailer</a></h3>
												<h4><a href="#" title="">ScereBro</a> </h4>
												<span>45K views .<small class="posted_dt">3 days ago</small></span>
											</div>
										</div><!--videoo end-->
									</div>
									<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
										<div class="videoo">
											<div class="vid_thumbainl">
												<a href="#" title="">
													<img src="images/resources/vide18.png" alt="">
													<span class="vid-time">6:20</span>
													<span class="watch_later">
														<i class="icon-watch_later_fill"></i>
													</span>
												</a>	
											</div><!--vid_thumbnail end-->
											<div class="video_info">
												<h3><a href="single_video_page.html" title="">A day in the life of a Google software engineer</a></h3>
												<h4><a href="#" title="">MathChief</a> </h4>
												<span>86K views .<small class="posted_dt">6 days ago</small></span>
											</div>
										</div><!--videoo end-->
									</div>
									<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
										<div class="videoo">
											<div class="vid_thumbainl">
												<a href="#" title="">
													<img src="images/resources/vide19.png" alt="">
													<span class="vid-time">8:16</span>
													<span class="watch_later">
														<i class="icon-watch_later_fill"></i>
													</span>
												</a>	
											</div><!--vid_thumbnail end-->
											<div class="video_info">
												<h3><a href="single_video_page.html" title="">Avengers: Infinity War - Gym Workout motivation 2019</a></h3>
												<h4><a href="#" title="">RealLifeLore</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
												<span>144K views .<small class="posted_dt">6 days ago</small></span>
											</div>
										</div><!--videoo end-->
									</div>
									<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
										<div class="videoo">
											<div class="vid_thumbainl">
												<a href="#" title="">
													<img src="images/resources/vide20.png" alt="">
													<span class="vid-time">29:32</span>
													<span class="watch_later">
														<i class="icon-watch_later_fill"></i>
													</span>
												</a>	
											</div><!--vid_thumbnail end-->
											<div class="video_info">
												<h3><a href="single_video_page.html" title="">How the Universe Works - The Milky Way Galaxy - Space</a></h3>
												<h4><a href="#" title="">Loskes</a></h4>
												<span>408K views .<small class="posted_dt">19 hours ago</small></span>
											</div>
										</div><!--videoo end-->
									</div>
									<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
										<div class="videoo">
											<div class="vid_thumbainl">
												<a href="#" title="">
													<img src="images/resources/vide8.png" alt="">
													<span class="vid-time">29:32</span>
													<span class="watch_later">
														<i class="icon-watch_later_fill"></i>
													</span>
												</a>	
											</div><!--vid_thumbnail end-->
											<div class="video_info">
												<h3><a href="single_video_page.html" title="">How the Universe Works - The Milky Way Galaxy - Space</a></h3>
												<h4><a href="#" title="">Loskes</a></h4>
												<span>408K views .<small class="posted_dt">19 hours ago</small></span>
											</div>
										</div><!--videoo end-->
									</div>
									<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
										<div class="videoo">
											<div class="vid_thumbainl">
												<a href="#" title="">
													<img src="images/resources/vide9.png" alt="">
													<span class="vid-time">4:01</span>
													<span class="watch_later">
														<i class="icon-watch_later_fill"></i>
													</span>
												</a>	
											</div><!--vid_thumbnail end-->
											<div class="video_info">
												<h3><a href="single_video_page.html" title="">Trailer Park Boys Season 12 - Official Trailer</a></h3>
												<h4><a href="#" title="">ScereBro</a> </h4>
												<span>45K views .<small class="posted_dt">3 days ago</small></span>
											</div>
										</div><!--videoo end-->
									</div>
									<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
										<div class="videoo">
											<div class="vid_thumbainl">
												<a href="#" title="">
													<img src="images/resources/vide10.png" alt="">
													<span class="vid-time">6:20</span>
													<span class="watch_later">
														<i class="icon-watch_later_fill"></i>
													</span>
												</a>	
											</div><!--vid_thumbnail end-->
											<div class="video_info">
												<h3><a href="single_video_page.html" title="">A day in the life of a Google software engineer</a></h3>
												<h4><a href="#" title="">MathChief</a> </h4>
												<span>86K views .<small class="posted_dt">6 days ago</small></span>
											</div>
										</div><!--videoo end-->
									</div>
									<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
										<div class="videoo">
											<div class="vid_thumbainl">
												<a href="#" title="">
													<img src="images/resources/vide11.png" alt="">
													<span class="vid-time">8:16</span>
													<span class="watch_later">
														<i class="icon-watch_later_fill"></i>
													</span>
												</a>	
											</div><!--vid_thumbnail end-->
											<div class="video_info">
												<h3><a href="single_video_page.html" title="">Avengers: Infinity War - Gym Workout </a></h3>
												<h4><a href="#" title="">RealLifeLore</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
												<span>144K views .<small class="posted_dt">6 days ago</small></span>
											</div>
										</div><!--videoo end-->
									</div>
								</div>
							</div><!--vidz_list end-->
						</div><!--vidz_videos end-->
					</div>
		  		</div><!--videso_tb_details end-->
		  	</div>
		  	<div class="tab-pane fade" id="playlist_tab" role="tabpanel" aria-labelledby="playlist-tab">
		  		<div class="playlist_tab">
		  			<div class="viddz">
						<div class="container">
							<div class="vidz_sec">
								<h3>SNL Season 43 Episode 15 Sterling K. Brown - 21</h3>
								<a href="#" title="">View all</a>
								<div class="clearfix"></div>
								<div class="vidz_list">
									<div class="row">
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide1.png" alt="">
														<span class="vid-time">10:21</span>
														<span class="watch_later">
															<i class="icon-watch_later_fill"></i>
														</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">Kingdom Come: Deliverance Funny Moments and Fails</a></h3>
													<h4><a href="#" title="">newfox media</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
													<span>686K views .<small class="posted_dt">1 week ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide2.png" alt="">
														<span class="vid-time">13:49</span>
														<span class="watch_later">
															<i class="icon-watch_later_fill"></i>
														</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">DR DISRESPECT - Before They Were Famous - Twitch Streamer</a></h3>
													<h4><a href="#" title="">Eros Now</a> </h4>
													<span>283K views .<small class="posted_dt">3 months ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide3.png" alt="">
														<span class="vid-time">2:54</span>
														<span class="watch_later">
															<i class="icon-watch_later_fill"></i>
														</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">Top Perectly Timed Twitch Moments 2017 #7</a></h3>
													<h4><a href="#" title="">Animal Planet</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
													<span>2.6M views .<small class="posted_dt">2 months ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide4.png" alt="">
														<span class="vid-time">5:25</span>
														<span class="watch_later">
															<i class="icon-watch_later_fill"></i>
														</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">Top 5 Amazing Bridge Block ever in PUBG</a></h3>
													<h4><a href="#" title="">Maketzi</a> </h4>
													<span>612K views .<small class="posted_dt">5 months ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
									</div>
								</div><!--vidz_list end-->
							</div><!--vidz_videos end-->
						</div>
					</div><!--viddz end-->
					<div class="viddz">
						<div class="container">
							<div class="vidz_sec">
								<h3>Cut for Time: Star Warriors - SNL - 30</h3>
								<a href="#" title="">View all</a>
								<div class="clearfix"></div>
								<div class="vidz_list">
									<div class="row">
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide5.png" alt="">
														<span class="vid-time">4:01</span>
														<span class="watch_later">
															<i class="icon-watch_later_fill"></i>
														</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">Trailer Park Boys Season 12 - Official Trailer</a></h3>
													<h4><a href="#" title="">ScereBro</a> </h4>
													<span>45K views .<small class="posted_dt">3 days ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide6.png" alt="">
														<span class="vid-time">6:20</span>
														<span class="watch_later">
															<i class="icon-watch_later_fill"></i>
														</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">A day in the life of a Google software engineer</a></h3>
													<h4><a href="#" title="">MathChief</a> </h4>
													<span>86K views .<small class="posted_dt">6 days ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide7.png" alt="">
														<span class="vid-time">8:16</span>
														<span class="watch_later">
															<i class="icon-watch_later_fill"></i>
														</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">Avengers: Infinity War - Gym Workout motivation 2019</a></h3>
													<h4><a href="#" title="">RealLifeLore</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
													<span>144K views .<small class="posted_dt">6 days ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide8.png" alt="">
														<span class="vid-time">29:32</span>
														<span class="watch_later">
															<i class="icon-watch_later_fill"></i>
														</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">How the Universe Works - The Milky Way Galaxy - Space</a></h3>
													<h4><a href="#" title="">Loskes</a></h4>
													<span>408K views .<small class="posted_dt">19 hours ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
									</div>
								</div><!--vidz_list end-->
							</div><!--vidz_videos end-->
						</div>
					</div><!--viddz end-->
					<div class="viddz">
						<div class="container">
							<div class="vidz_sec">
								<h3>Natalie Portman is Back - 6</h3>
								<a href="#" title="">View all</a>
								<div class="clearfix"></div>
								<div class="vidz_list">
									<div class="row">
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide9.png" alt="">
														<span class="vid-time">4:01</span>
														<span class="watch_later">
															<i class="icon-watch_later_fill"></i>
														</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">Trailer Park Boys Season 12 - Official Trailer</a></h3>
													<h4><a href="#" title="">ScereBro</a> </h4>
													<span>45K views .<small class="posted_dt">3 days ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide10.png" alt="">
														<span class="vid-time">6:20</span>
														<span class="watch_later">
															<i class="icon-watch_later_fill"></i>
														</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">A day in the life of a Google software engineer</a></h3>
													<h4><a href="#" title="">MathChief</a> </h4>
													<span>86K views .<small class="posted_dt">6 days ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide11.png" alt="">
														<span class="vid-time">8:16</span>
														<span class="watch_later">
															<i class="icon-watch_later_fill"></i>
														</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">Avengers: Infinity War - Gym Workout </a></h3>
													<h4><a href="#" title="">RealLifeLore</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
													<span>144K views .<small class="posted_dt">6 days ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide12.png" alt="">
														<span class="vid-time">29:32</span>
														<span class="watch_later">
															<i class="icon-watch_later_fill"></i>
														</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">How the Universe Works - The Milky Way Galaxy - Space</a></h3>
													<h4><a href="#" title="">Loskes</a> </h4>
													<span>408K views .<small class="posted_dt">19 hours ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
									</div>
								</div><!--vidz_list end-->
							</div><!--vidz_videos end-->
						</div>
					</div><!--viddz end-->
					<div class="viddz">
						<div class="container">
							<div class="vidz_sec">
								<h3>SNL Season 43 Episode 12 Will Ferrell - 37</h3>
								<a href="#" title="">View all</a>
								<div class="clearfix"></div>
								<div class="vidz_list">
									<div class="row">
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide1.png" alt="">
														<span class="vid-time">10:21</span>
														<span class="watch_later">
															<i class="icon-watch_later_fill"></i>
														</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">Kingdom Come: Deliverance Funny Moments and Fails</a></h3>
													<h4><a href="#" title="">newfox media</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
													<span>686K views .<small class="posted_dt">1 week ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide2.png" alt="">
														<span class="vid-time">13:49</span>
														<span class="watch_later">
															<i class="icon-watch_later_fill"></i>
														</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">DR DISRESPECT - Before They Were Famous - Twitch Streamer</a></h3>
													<h4><a href="#" title="">Eros Now</a> </h4>
													<span>283K views .<small class="posted_dt">3 months ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide3.png" alt="">
														<span class="vid-time">2:54</span>
														<span class="watch_later">
															<i class="icon-watch_later_fill"></i>
														</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">Top Perectly Timed Twitch Moments 2017 #7</a></h3>
													<h4><a href="#" title="">Animal Planet</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
													<span>2.6M views .<small class="posted_dt">2 months ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide4.png" alt="">
														<span class="vid-time">5:25</span>
														<span class="watch_later">
															<i class="icon-watch_later_fill"></i>
														</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">Top 5 Amazing Bridge Block ever in PUBG</a></h3>
													<h4><a href="#" title="">Maketzi</a> </h4>
													<span>612K views .<small class="posted_dt">5 months ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
									</div>
								</div><!--vidz_list end-->
							</div><!--vidz_videos end-->
						</div>
					</div><!--viddz end-->
					<div class="viddz">
						<div class="container">
							<div class="vidz_sec">
								<h3>SNL Season 43 Episode 11 Jessica Chastain - 23</h3>
								<a href="#" title="">View all</a>
								<div class="clearfix"></div>
								<div class="vidz_list">
									<div class="row">
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide1.png" alt="">
														<span class="vid-time">10:21</span>
														<span class="watch_later">
															<i class="icon-watch_later_fill"></i>
														</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">Kingdom Come: Deliverance Funny Moments and Fails</a></h3>
													<h4><a href="#" title="">newfox media</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
													<span>686K views .<small class="posted_dt">1 week ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide2.png" alt="">
														<span class="vid-time">13:49</span>
														<span class="watch_later">
															<i class="icon-watch_later_fill"></i>
														</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">DR DISRESPECT - Before They Were Famous - Twitch Streamer</a></h3>
													<h4><a href="#" title="">Eros Now</a> </h4>
													<span>283K views .<small class="posted_dt">3 months ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide3.png" alt="">
														<span class="vid-time">2:54</span>
														<span class="watch_later">
															<i class="icon-watch_later_fill"></i>
														</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">Top Perectly Timed Twitch Moments 2017 #7</a></h3>
													<h4><a href="#" title="">Animal Planet</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
													<span>2.6M views .<small class="posted_dt">2 months ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide4.png" alt="">
														<span class="vid-time">5:25</span>
														<span class="watch_later">
															<i class="icon-watch_later_fill"></i>
														</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">Top 5 Amazing Bridge Block ever in PUBG</a></h3>
													<h4><a href="#" title="">Maketzi</a> </h4>
													<span>612K views .<small class="posted_dt">5 months ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
									</div>
								</div><!--vidz_list end-->
							</div><!--vidz_videos end-->
						</div>
					</div><!--viddz end-->
					<div class="viddz">
						<div class="container">
							<div class="vidz_sec">
								<h3>Kevin Hart is Back - 6</h3>
								<a href="#" title="">View all</a>
								<div class="clearfix"></div>
								<div class="vidz_list">
									<div class="row">
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide5.png" alt="">
														<span class="vid-time">4:01</span>
														<span class="watch_later">
															<i class="icon-watch_later_fill"></i>
														</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">Trailer Park Boys Season 12 - Official Trailer</a></h3>
													<h4><a href="#" title="">ScereBro</a> </h4>
													<span>45K views .<small class="posted_dt">3 days ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide6.png" alt="">
														<span class="vid-time">6:20</span>
														<span class="watch_later">
															<i class="icon-watch_later_fill"></i>
														</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">A day in the life of a Google software engineer</a></h3>
													<h4><a href="#" title="">MathChief</a> </h4>
													<span>86K views .<small class="posted_dt">6 days ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide7.png" alt="">
														<span class="vid-time">8:16</span>
														<span class="watch_later">
															<i class="icon-watch_later_fill"></i>
														</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">Avengers: Infinity War - Gym Workout motivation 2019</a></h3>
													<h4><a href="#" title="">RealLifeLore</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
													<span>144K views .<small class="posted_dt">6 days ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
											<div class="videoo">
												<div class="vid_thumbainl">
													<a href="#" title="">
														<img src="images/resources/vide8.png" alt="">
														<span class="vid-time">29:32</span>
														<span class="watch_later">
															<i class="icon-watch_later_fill"></i>
														</span>
													</a>	
												</div><!--vid_thumbnail end-->
												<div class="video_info">
													<h3><a href="single_video_page.html" title="">How the Universe Works - The Milky Way Galaxy - Space</a></h3>
													<h4><a href="#" title="">Loskes</a></h4>
													<span>408K views .<small class="posted_dt">19 hours ago</small></span>
												</div>
											</div><!--videoo end-->
										</div>
									</div>
								</div><!--vidz_list end-->
							</div><!--vidz_videos end-->
						</div>
					</div><!--viddz end-->
				</div><!--home_tb_details end-->
		  	</div>
		  	<div class="tab-pane fade" id="channels_tab" role="tabpanel" aria-labelledby="channels-tab">
		  		<div class="container">
		  			<div class="browse_catgs">
						<div class="brws-head">
							<h3>Featured Channels</h3>
							<div class="clearfix"></div>
							<div class="row">
								<div class="col-lg-3 col-md-3 col-sm-6 col-12">
									<div class="videoo">
										<div class="vid_thumbainl">
											<a href="single_video_page.html" title="">
												<img src="images/resources/cl1.jpg" alt="">
											</a>	
										</div><!--vid_thumbnail end-->
										<div class="video_info">
											<div class="vid_thumb">
												<img src="images/resources/vid-thumb1.png" alt="">
											</div>
											<h4><a href="#" title="">Newfox Media</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
											<span>13M Subscribers . 72 Videos 374M views</span>
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-12">
									<div class="videoo">
										<div class="vid_thumbainl">
											<a href="single_video_page.html" title="">
												<img src="images/resources/cl2.jpg" alt="">
											</a>	
										</div><!--vid_thumbnail end-->
										<div class="video_info">
											<div class="vid_thumb">
												<img src="images/resources/vid-thumb2.png" alt="">
											</div>
											<h4><a href="#" title="">Adaptable</a> </h4>
											<span>6M Subscribers . 106 Videos 218M views</span>
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-12">
									<div class="videoo">
										<div class="vid_thumbainl">
											<a href="single_video_page.html" title="">
												<img src="images/resources/cl3.jpg" alt="">
											</a>	
										</div><!--vid_thumbnail end-->
										<div class="video_info">
											<div class="vid_thumb">
												<img src="images/resources/vid-thumb3.png" alt="">
											</div>
											<h4><a href="#" title="">Immense </a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
											<span>28K Subscribers . 32 Videos 3M views</span>
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-12">
									<div class="videoo">
										<div class="vid_thumbainl">
											<a href="single_video_page.html" title="">
												<img src="images/resources/cl4.jpg" alt="">
											</a>	
										</div><!--vid_thumbnail end-->
										<div class="video_info">
											<div class="vid_thumb">
												<img src="images/resources/vid-thumb4.png" alt="">
											</div>
											<h4><a href="#" title="">Kittens</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
											<span>8M Subscribers . 340 Videos 637M views</span>
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-12">
									<div class="videoo">
										<div class="vid_thumbainl">
											<a href="single_video_page.html" title="">
												<img src="images/resources/cl5.jpg" alt="">
											</a>	
										</div><!--vid_thumbnail end-->
										<div class="video_info">
											<div class="vid_thumb">
												<img src="images/resources/vid-thumb5.png" alt="">
											</div>
											<h4><a href="#" title="">Shoe</a> </h4>
											<span>2M Subscribers . 62 Videos 4M views</span>
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-12">
									<div class="videoo">
										<div class="vid_thumbainl">
											<a href="single_video_page.html" title="">
												<img src="images/resources/cl6.jpg" alt="">
											</a>	
										</div><!--vid_thumbnail end-->
										<div class="video_info">
											<div class="vid_thumb">
												<img src="images/resources/vid-thumb6.png" alt="">
											</div>
											<h4><a href="#" title="">Pink</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
											<span>49K Subscribers . 13 Videos 890K views</span>
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-12">
									<div class="videoo">
										<div class="vid_thumbainl">
											<a href="single_video_page.html" title="">
												<img src="images/resources/cl7.jpg" alt="">
											</a>	
										</div><!--vid_thumbnail end-->
										<div class="video_info">
											<div class="vid_thumb">
												<img src="images/resources/vid-thumb7.png" alt="">
											</div>
											<h4><a href="#" title="">Teeny-tiny</a></h4>
											<span>98K Subscribers . 45 Videos 6M views</span>
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-12">
									<div class="videoo">
										<div class="vid_thumbainl">
											<a href="single_video_page.html" title="">
												<img src="images/resources/cl8.jpg" alt="">
											</a>	
										</div><!--vid_thumbnail end-->
										<div class="video_info">
											<div class="vid_thumb">
												<img src="images/resources/vid-thumb8.png" alt="">
											</div>
											<h4><a href="#" title="">Intelligent </a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
											<span>74K Subscribers . 49 Videos 3M views</span>
										</div>
									</div>
								</div>
							</div>
						</div><!--brws-head end-->
						<div class="brws-head">
							<h3>Recomended Channels</h3>
							<div class="clearfix"></div>
							<div class="row">
								<div class="col-lg-3 col-md-3 col-sm-6 col-12">
									<div class="videoo">
										<div class="vid_thumbainl">
											<a href="single_video_page.html" title="">
												<img src="images/resources/cl9.jpg" alt="">
											</a>	
										</div><!--vid_thumbnail end-->
										<div class="video_info">
											<div class="vid_thumb">
												<img src="images/resources/vid-thumb9.png" alt="">
											</div>
											<h4><a href="#" title="">Woozy</a> </h4>
											<span>19M Subscribers . 117 Videos 43M views</span>
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-12">
									<div class="videoo">
										<div class="vid_thumbainl">
											<a href="single_video_page.html" title="">
												<img src="images/resources/cl10.jpg" alt="">
											</a>	
										</div><!--vid_thumbnail end-->
										<div class="video_info">
											<div class="vid_thumb">
												<img src="images/resources/vid-thumb10.png" alt="">
											</div>
											<h4><a href="#" title="">Laugh </a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
											<span>53K Subscribers . 76 Videos 24M views</span>
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-12">
									<div class="videoo">
										<div class="vid_thumbainl">
											<a href="single_video_page.html" title="">
												<img src="images/resources/cl11.jpg" alt="">
											</a>	
										</div><!--vid_thumbnail end-->
										<div class="video_info">
											<div class="vid_thumb">
												<img src="images/resources/vid-thumb11.png" alt="">
											</div>
											<h4><a href="#" title="">Breakable </a> </h4>
											<span>2M Subscribers . 40 Videos 13M views</span>
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-12">
									<div class="videoo">
										<div class="vid_thumbainl">
											<a href="single_video_page.html" title="">
												<img src="images/resources/cl12.jpg" alt="">
											</a>	
										</div><!--vid_thumbnail end-->
										<div class="video_info">
											<div class="vid_thumb">
												<img src="images/resources/vid-thumb12.png" alt="">
											</div>
											<h4><a href="#" title="">Morning</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
											<span>54K Subscribers . 35 Videos 6M views</span>
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-12">
									<div class="videoo">
										<div class="vid_thumbainl">
											<a href="single_video_page.html" title="">
												<img src="images/resources/cl13.jpg" alt="">
											</a>	
										</div><!--vid_thumbnail end-->
										<div class="video_info">
											<div class="vid_thumb">
												<img src="images/resources/vid-thumb13.png" alt="">
											</div>
											<h4><a href="#" title="">Fire</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
											<span>52M Subscribers . 266 Videos 2340M views</span>
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-12">
									<div class="videoo">
										<div class="vid_thumbainl">
											<a href="single_video_page.html" title="">
												<img src="images/resources/cl14.jpg" alt="">
											</a>	
										</div><!--vid_thumbnail end-->
										<div class="video_info">
											<div class="vid_thumb">
												<img src="images/resources/vid-thumb14.png" alt="">
											</div>
											<h4><a href="#" title="">Swanky</a> </h4>
											<span>55K Subscribers . 36 Videos 16M views</span>
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-12">
									<div class="videoo">
										<div class="vid_thumbainl">
											<a href="single_video_page.html" title="">
												<img src="images/resources/cl15.jpg" alt="">
											</a>	
										</div><!--vid_thumbnail end-->
										<div class="video_info">
											<div class="vid_thumb">
												<img src="images/resources/vid-thumb15.png" alt="">
											</div>
											<h4><a href="#" title="">Miscreant</a> </h4>
											<span>80K Subscribers . 71 Videos 32M views</span>
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-12">
									<div class="videoo">
										<div class="vid_thumbainl">
											<a href="single_video_page.html" title="">
												<img src="images/resources/cl16.jpg" alt="">
											</a>	
										</div><!--vid_thumbnail end-->
										<div class="video_info">
											<div class="vid_thumb">
												<img src="images/resources/vid-thumb16.png" alt="">
											</div>
											<h4><a href="#" title="">Woebegone </a> </h4>
											<span>47K Subscribers . 380 Videos 182M views</span>
										</div>
									</div>
								</div>
							</div>
						</div><!--brws-head end-->
						<div class="brws-head">
							<h3>Subscribed Channels</h3>
							<div class="clearfix"></div>
							<div class="row">
								<div class="col-lg-3 col-md-3 col-sm-6 col-12">
									<div class="videoo">
										<div class="vid_thumbainl">
											<a href="single_video_page.html" title="">
												<img src="images/resources/cl17.jpg" alt="">
											</a>	
										</div><!--vid_thumbnail end-->
										<div class="video_info">
											<div class="vid_thumb">
												<img src="images/resources/vid-thumb17.png" alt="">
											</div>
											<h4><a href="#" title="">Develop</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
											<span>2K Subscribers . 7 Videos 7K views</span>
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-12">
									<div class="videoo">
										<div class="vid_thumbainl">
											<a href="single_video_page.html" title="">
												<img src="images/resources/cl18.jpg" alt="">
											</a>	
										</div><!--vid_thumbnail end-->
										<div class="video_info">
											<div class="vid_thumb">
												<img src="images/resources/vid-thumb18.png" alt="">
											</div>
											<h4><a href="#" title="">Picture</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
											<span>253 Subscribers . 6 Videos 24K views</span>
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-12">
									<div class="videoo">
										<div class="vid_thumbainl">
											<a href="single_video_page.html" title="">
												<img src="images/resources/cl19.jpg" alt="">
											</a>	
										</div><!--vid_thumbnail end-->
										<div class="video_info">
											<div class="vid_thumb">
												<img src="images/resources/vid-thumb19.png" alt="">
											</div>
											<h4><a href="#" title="">Weather </a> </h4>
											<span>282 Subscribers . 3 Videos 18K views</span>
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-12">
									<div class="videoo">
										<div class="vid_thumbainl">
											<a href="single_video_page.html" title="">
												<img src="images/resources/cl20.jpg" alt="">
											</a>	
										</div><!--vid_thumbnail end-->
										<div class="video_info">
											<div class="vid_thumb">
												<img src="images/resources/vid-thumb20.png" alt="">
											</div>
											<h4><a href="#" title="">Word</a> </h4>
											<span>2K Subscribers . 16 Videos 28K views</span>
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-12">
									<div class="videoo">
										<div class="vid_thumbainl">
											<a href="single_video_page.html" title="">
												<img src="images/resources/cl21.jpg" alt="">
											</a>	
										</div><!--vid_thumbnail end-->
										<div class="video_info">
											<div class="vid_thumb">
												<img src="images/resources/vid-thumb21.png" alt="">
											</div>
											<h4><a href="#" title="">Maximum</a> </h4>
											<span>3K Subscribers . 9 Videos 12K views</span>
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-12">
									<div class="videoo">
										<div class="vid_thumbainl">
											<a href="single_video_page.html" title="">
												<img src="images/resources/cl22.jpg" alt="">
											</a>	
										</div><!--vid_thumbnail end-->
										<div class="video_info">
											<div class="vid_thumb">
												<img src="images/resources/vid-thumb22.png" alt="">
											</div>
											<h4><a href="#" title="">Media Laws</a> </h4>
											<span>23 Subscribers . 2 Videos 3K views</span>
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-12">
									<div class="videoo">
										<div class="vid_thumbainl">
											<a href="single_video_page.html" title="">
												<img src="images/resources/cl23.jpg" alt="">
											</a>	
										</div><!--vid_thumbnail end-->
										<div class="video_info">
											<div class="vid_thumb">
												<img src="images/resources/vid-thumb23.png" alt="">
											</div>
											<h4><a href="#" title="">Light</a> </h4>
											<span>380 Subscribers . 3 Videos 6K views</span>
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-12">
									<div class="videoo">
										<div class="vid_thumbainl">
											<a href="single_video_page.html" title="">
												<img src="images/resources/cl24.jpg" alt="">
											</a>	
										</div><!--vid_thumbnail end-->
										<div class="video_info">
											<div class="vid_thumb">
												<img src="images/resources/vid-thumb24.png" alt="">
											</div>
											<h4><a href="#" title="">New Trailers </a> </h4>
											<span>2K Subscribers . 6 Videos 28K views</span>
										</div>
									</div>
								</div>
							</div>
						</div><!--brws-head end-->
					</div><!--browse_catgs end-->
				</div>
		  	</div>
		  	<div class="tab-pane fade show active" id="about_tab" role="tabpanel" aria-labelledby="about-tab">
		  		<div class="about_tab_content">
		  			<div class="container">
		  				<div class="description">
							<div class="row">
								<div class="col-lg-8">
									<div class="decp_cotnet">
										<h2 class="ab-fd">Description </h2>
										<p>Welcome to the official Saturday Night Live channel on YouTube!  Here you will find your favorite sketches, behind the scenes clips and web exclusives, featuring all your favorite hosts and cast members.  Check out more SNL at http://www.nbc.com/</p>
									</div><!--abt-founder end-->
									<div class="link-pr">
										<h2 class="ab-fd">Links </h2>
										<ul class="csl-link-1">
											<li><a href="#" title="">SNL on NBC</a></li>
											<li><a href="#" title=""> Facebook</a></li>
											<li><a href="#" title="">Twitter</a></li>
										</ul>
										<ul class="csl-link-2">
											<li><a href="#" title="">Instagram</a></li>
											<li><a href="#" title="">Subscribe to SNL on Oren</a></li>
											<li><a href="#" title="">Google+</a></li>
										</ul>
										<div class="clearfix"></div>
									</div>
									<div class="link-pr">
										<h2 class="ab-fd">Business enquiries </h2>
										<ul>
											<li><a href="mailto:example@example.com" title="">sample@sample.com</a></li>
											<li><a href="#" title="">scerebro@gmail.com</a></li>
										</ul>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="stats">
										<h2 class="ab-fd">Stats</h2>
										<ul>
											<li>Joined Jul 2019 </li>
											<li>3,741,400,119 views</li>
											<li>25,345,348 subscribers</li>
											<li>729 videos</li>
										</ul>
									</div><!--stats end-->
									<div class="flagg">
										<ul>
											<li>
												<a href="#" title="">
													<i class="icon-flag"></i>
												</a>		
											</li>
											<li>
												<a href="#" title="">
													<i class="icon-message"></i>
												</a>		
											</li>
										</ul>
									</div><!--flagg end-->
								</div>
							</div>
						</div>
		  			</div>
		  		</div><!--about_tab_content end-->
		  	</div>
		  	<div class="tab-pane fade" id="amazong-tb" role="tabpanel" aria-labelledby="amazon-tab">
		  		<div class="container">
			  		<div class="amz_products_content">
			  			<div class="amazon">
							<div class="abt-amz">
								<div class="amz-hd">
									<h2>Get my merchandise </h2>
									<h3>Use CODE:<span> ScereBro26</span> 10% Discount</h3>
								</div><!--amz-hd end-->
								<div class="amz-lg">
									<img src="images/resources/cp-logo.png" alt="">
								</div><!--amz-lg end-->
								<div class="clearfix"></div>
							</div><!--abt-amz end-->
							<div class="amz-img-inf">
								<div class="row">
									<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
										<div class="mg-inf">
											<div class="img-sr">
												<a href="#" title="">
													<img src="images/resources/pro1.png" alt="">
												</a>
											</div>
											<div class="info-sr">
												<h3><a href="#" title="">HEMOON Men’s casual sportswear..</a></h3>
												<span>$32.99</span>
											</div>
										</div><!--mg-inf end-->
									</div>
									<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
										<div class="mg-inf">
											<div class="img-sr">
												<a href="#" title="">
													<img src="images/resources/pro2.png" alt="">
												</a>
											</div>
											<div class="info-sr">
												<h3><a href="#" title=""> Men's Insulated Front-Zip Jacket </a></h3>
												<span class="pr-d">$34.90</span>
											</div>
										</div><!--mg-inf end-->
									</div>
									<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
										<div class="mg-inf">
											<div class="img-sr">
												<a href="#" title="">
													<img src="images/resources/pro3.png" alt="">
												</a>
											</div>
											<div class="info-sr">
												<h3> <a href="#" title="">Dickies Men's Sanded Duck Jacket </a></h3>
												<span class="pr-d">$17.49</span>
											</div>
										</div><!--mg-inf end-->
									</div>
									<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
										<div class="mg-inf">
											<div class="img-sr">
												<a href="#" title="">
													<img src="images/resources/pro4.png" alt="">
												</a>
											</div>
											<div class="info-sr">
												<h3> <a href="#" title="">Men's Big-Tall Lined Eisenhower Jacket </a></h3>
												<span class="pr-d">$39.00</span>
											</div>
										</div><!--mg-inf end-->
									</div>
									<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
										<div class="mg-inf">
											<div class="img-sr">
												<a href="#" title="">
													<img src="images/resources/pro5.png" alt="">
												</a>
											</div>
											<div class="info-sr">
												<h3> <a href="#" title="">Dickies Men's Sanded Duck Jacket </a></h3>
												<span class="pr-d">$17.49</span>
											</div>
										</div><!--mg-inf end-->
									</div>
									<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
										<div class="mg-inf">
											<div class="img-sr">
												<a href="#" title="">
													<img src="images/resources/pro6.png" alt="">
												</a>
											</div>
											<div class="info-sr">
												<h3> <a href="#" title="">Men's Big-Tall Lined Eisenhower Jacket </a></h3>
												<span class="pr-d">$39.00</span>
											</div>
										</div><!--mg-inf end-->
									</div>
								</div>
							</div><!--amz-img-in-->
						</div><!--amazon end-->
						<div class="amazon">
							<div class="abt-amz">
								<div class="amz-hd">
									<h2>Get my merchandise </h2>
									<h3>Use CODE:<span> ScereBro26</span> 10% Discount</h3>
								</div><!--amz-hd end-->
								<div class="amz-lg">
									<img src="images/resources/cp-logo.png" alt="">
								</div><!--amz-lg end-->
								<div class="clearfix"></div>
							</div><!--abt-amz end-->
							<div class="amz-img-inf">
								<div class="row">
									<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
										<div class="mg-inf">
											<div class="img-sr">
												<a href="#" title="">
													<img src="images/resources/pro7.png" alt="">
												</a>
											</div>
											<div class="info-sr">
												<h3><a href="#" title="">HEMOON Men’s casual sportswear..</a></h3>
												<span>$32.99</span>
											</div>
										</div><!--mg-inf end-->
									</div>
									<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
										<div class="mg-inf">
											<div class="img-sr">
												<a href="#" title="">
													<img src="images/resources/pro8.png" alt="">
												</a>
											</div>
											<div class="info-sr">
												<h3><a href="#" title=""> Men's Insulated Front-Zip Jacket </a></h3>
												<span class="pr-d">$34.90</span>
											</div>
										</div><!--mg-inf end-->
									</div>
									<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
										<div class="mg-inf">
											<div class="img-sr">
												<a href="#" title="">
													<img src="images/resources/pro9.png" alt="">
												</a>
											</div>
											<div class="info-sr">
												<h3> <a href="#" title="">Dickies Men's Sanded Duck Jacket </a></h3>
												<span class="pr-d">$17.49</span>
											</div>
										</div><!--mg-inf end-->
									</div>
									<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
										<div class="mg-inf">
											<div class="img-sr">
												<a href="#" title="">
													<img src="images/resources/pro10.png" alt="">
												</a>
											</div>
											<div class="info-sr">
												<h3> <a href="#" title="">Men's Big-Tall Lined Eisenhower Jacket </a></h3>
												<span class="pr-d">$39.00</span>
											</div>
										</div><!--mg-inf end-->
									</div>
									<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
										<div class="mg-inf">
											<div class="img-sr">
												<a href="#" title="">
													<img src="images/resources/pro11.png" alt="">
												</a>
											</div>
											<div class="info-sr">
												<h3> <a href="#" title="">Dickies Men's Sanded Duck Jacket </a></h3>
												<span class="pr-d">$17.49</span>
											</div>
										</div><!--mg-inf end-->
									</div>
									<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
										<div class="mg-inf">
											<div class="img-sr">
												<a href="#" title="">
													<img src="images/resources/pro12.png" alt="">
												</a>
											</div>
											<div class="info-sr">
												<h3> <a href="#" title="">Men's Big-Tall Lined Eisenhower Jacket </a></h3>
												<span class="pr-d">$39.00</span>
											</div>
										</div><!--mg-inf end-->
									</div>
								</div>
							</div><!--amz-img-in-->
						</div><!--amazon end-->
						<div class="amazon">
							<div class="abt-amz">
								<div class="amz-hd">
									<h2>Get my merchandise </h2>
									<h3>Use CODE:<span> ScereBro26</span> 10% Discount</h3>
								</div><!--amz-hd end-->
								<div class="amz-lg">
									<img src="images/resources/cp-logo.png" alt="">
								</div><!--amz-lg end-->
								<div class="clearfix"></div>
							</div><!--abt-amz end-->
							<div class="amz-img-inf">
								<div class="row">
									<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
										<div class="mg-inf">
											<div class="img-sr">
												<a href="#" title="">
													<img src="images/resources/pro13.png" alt="">
												</a>
											</div>
											<div class="info-sr">
												<h3><a href="#" title="">HEMOON Men’s casual sportswear..</a></h3>
												<span>$32.99</span>
											</div>
										</div><!--mg-inf end-->
									</div>
									<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
										<div class="mg-inf">
											<div class="img-sr">
												<a href="#" title="">
													<img src="images/resources/pro14.png" alt="">
												</a>
											</div>
											<div class="info-sr">
												<h3><a href="#" title=""> Men's Insulated Front-Zip Jacket </a></h3>
												<span class="pr-d">$34.90</span>
											</div>
										</div><!--mg-inf end-->
									</div>
									<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
										<div class="mg-inf">
											<div class="img-sr">
												<a href="#" title="">
													<img src="images/resources/pro15.png" alt="">
												</a>
											</div>
											<div class="info-sr">
												<h3> <a href="#" title="">Dickies Men's Sanded Duck Jacket </a></h3>
												<span class="pr-d">$17.49</span>
											</div>
										</div><!--mg-inf end-->
									</div>
									<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
										<div class="mg-inf">
											<div class="img-sr">
												<a href="#" title="">
													<img src="images/resources/pro16.png" alt="">
												</a>
											</div>
											<div class="info-sr">
												<h3> <a href="#" title="">Men's Big-Tall Lined Eisenhower Jacket </a></h3>
												<span class="pr-d">$39.00</span>
											</div>
										</div><!--mg-inf end-->
									</div>
									<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
										<div class="mg-inf">
											<div class="img-sr">
												<a href="#" title="">
													<img src="images/resources/pro17.png" alt="">
												</a>
											</div>
											<div class="info-sr">
												<h3> <a href="#" title="">Dickies Men's Sanded Duck Jacket </a></h3>
												<span class="pr-d">$17.49</span>
											</div>
										</div><!--mg-inf end-->
									</div>
									<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
										<div class="mg-inf">
											<div class="img-sr">
												<a href="#" title="">
													<img src="images/resources/pro18.png" alt="">
												</a>
											</div>
											<div class="info-sr">
												<h3> <a href="#" title="">Men's Big-Tall Lined Eisenhower Jacket </a></h3>
												<span class="pr-d">$39.00</span>
											</div>
										</div><!--mg-inf end-->
									</div>
								</div>
							</div><!--amz-img-in-->
						</div><!--amazon end-->
						<div class="amazon">
							<div class="abt-amz">
								<div class="amz-hd">
									<h2>Get my merchandise </h2>
									<h3>Use CODE:<span> ScereBro26</span> 10% Discount</h3>
								</div><!--amz-hd end-->
								<div class="amz-lg">
									<img src="images/resources/cp-logo.png" alt="">
								</div><!--amz-lg end-->
								<div class="clearfix"></div>
							</div><!--abt-amz end-->
							<div class="amz-img-inf">
								<div class="row">
									<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
										<div class="mg-inf">
											<div class="img-sr">
												<a href="#" title="">
													<img src="images/resources/pro19.png" alt="">
												</a>
											</div>
											<div class="info-sr">
												<h3><a href="#" title="">HEMOON Men’s casual sportswear..</a></h3>
												<span>$32.99</span>
											</div>
										</div><!--mg-inf end-->
									</div>
									<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
										<div class="mg-inf">
											<div class="img-sr">
												<a href="#" title="">
													<img src="images/resources/pro20.png" alt="">
												</a>
											</div>
											<div class="info-sr">
												<h3><a href="#" title=""> Men's Insulated Front-Zip Jacket </a></h3>
												<span class="pr-d">$34.90</span>
											</div>
										</div><!--mg-inf end-->
									</div>
									<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
										<div class="mg-inf">
											<div class="img-sr">
												<a href="#" title="">
													<img src="images/resources/pro21.png" alt="">
												</a>
											</div>
											<div class="info-sr">
												<h3> <a href="#" title="">Dickies Men's Sanded Duck Jacket </a></h3>
												<span class="pr-d">$17.49</span>
											</div>
										</div><!--mg-inf end-->
									</div>
									<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
										<div class="mg-inf">
											<div class="img-sr">
												<a href="#" title="">
													<img src="images/resources/pro22.png" alt="">
												</a>
											</div>
											<div class="info-sr">
												<h3> <a href="#" title="">Men's Big-Tall Lined Eisenhower Jacket </a></h3>
												<span class="pr-d">$39.00</span>
											</div>
										</div><!--mg-inf end-->
									</div>
									<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
										<div class="mg-inf">
											<div class="img-sr">
												<a href="#" title="">
													<img src="images/resources/pro23.png" alt="">
												</a>
											</div>
											<div class="info-sr">
												<h3> <a href="#" title="">Dickies Men's Sanded Duck Jacket </a></h3>
												<span class="pr-d">$17.49</span>
											</div>
										</div><!--mg-inf end-->
									</div>
									<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
										<div class="mg-inf">
											<div class="img-sr">
												<a href="#" title="">
													<img src="images/resources/pro24.png" alt="">
												</a>
											</div>
											<div class="info-sr">
												<h3> <a href="#" title="">Men's Big-Tall Lined Eisenhower Jacket </a></h3>
												<span class="pr-d">$39.00</span>
											</div>
										</div><!--mg-inf end-->
									</div>
								</div>
							</div><!--amz-img-in-->
						</div><!--amazon end-->
			  		</div><!--amz_products_content end-->
		  		</div>
		  	</div>
		</div>
	</section><!--Featured Videos end-->

<?php
}
include('includes/footer.php');
?>
