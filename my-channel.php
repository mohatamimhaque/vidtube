<?php
session_start();
include('includes/header.php');
if(!isset($_SESSION['loggedOren'])){
	header("location:".$url);
	exit(0);
}
else{
	include('includes/navbar.php');
?>
<section class="videso_section">
		<div class="tab-content p-0">
		  	<div class="tab-pane mt-4" style='display:block'>
		  		<div class="container">
		  			<div class="browse_catgs">
						<div class="brws-head">
							<?php
							$unique_id =$user['unique_id'];
							$q = mysqli_query($con, "SELECT * FROM channel_list where author_id='$unique_id'");
							if(mysqli_num_rows($q) > 0){
								foreach($q as $row){
									?>
								<div class="videoo">
									<div class="vid_thumbainl">
											<a href="<?= base_url('studio/channel/'.$row['unique_id']) ?>" title="">
												<img src="<?= base_url('upload/image/channel/cover_photo/'.$row['cover_photo']) ?>" alt="" style='width:100%;height:100%'>
											</a>	
											<div class="vid_thumb">
												<img src="<?= base_url('upload/image/channel/profile_photo/'.$row['cover_photo']) ?>" alt="">
											</div>
										</div><!--vid_thumbnail end-->
										<div class="video_info">
											<h4><a href="<?= base_url('studio/channel/'.$row['unique_id']) ?>" title=""><?= $row['name'] ?></a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
											<?php
											
											$v = $row['videos'];
											$t = explode(',',$v);
											?>
											<p><?= numberFormat($row['subscriber']) ?> Subscribers . <?= count($t) ?> Videos . 374M views</p>
										</div>
									</div>
								<div class="videoo">
									<div class="vid_thumbainl">
											<a href="<?= base_url('studio/channel/'.$row['unique_id']) ?>" title="" style='width:100%;height:100px'>
												<img src="<?= base_url('upload/image/channel/cover_photo/'.$row['cover_photo']) ?>" alt="" style='width:100%;height:100%'>
											</a>	
											<div class="vid_thumb">
												<img src="<?= base_url('upload/image/channel/profile_photo/'.$row['cover_photo']) ?>" alt="">
											</div>
										</div><!--vid_thumbnail end-->
										<div class="video_info">
											<h4><a href="<?= base_url('studio/channel/'.$row['unique_id']) ?>" title=""><?= $row['name'] ?></a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
											<?php
											
											$v = $row['videos'];
											$t = explode(',',$v);
											?>
											<p><?= numberFormat($row['subscriber']) ?> Subscribers . <?= count($t) ?> Videos . 374M views</p>
										</div>
									</div>
									<div class="videoo">
									<div class="vid_thumbainl">
											<a href="<?= base_url('studio/channel/'.$row['unique_id']) ?>" title="" style='width:100%;height:100px'>
												<img src="<?= base_url('upload/image/channel/cover_photo/'.$row['cover_photo']) ?>" alt="" style='width:100%;height:100%'>
											</a>	
											<div class="vid_thumb">
												<img src="<?= base_url('upload/image/channel/profile_photo/'.$row['cover_photo']) ?>" alt="">
											</div>
										</div><!--vid_thumbnail end-->
										<div class="video_info">
											<h4><a href="<?= base_url('studio/channel/'.$row['unique_id']) ?>" title=""><?= $row['name'] ?></a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
											<?php
											
											$v = $row['videos'];
											$t = explode(',',$v);
											?>
											<p><?= numberFormat($row['subscriber']) ?> Subscribers . <?= count($t) ?> Videos . 374M views</p>
										</div>
									</div>
								
									<?php }} ?>
				
						</div><!--brws-head end-->
			
					</div><!--browse_catgs end-->
				</div>
		  	</div>
			  <a href="<?= $url.'create-channel' ?>"> create</a>
		</div>
	</section><!--Featured Videos end-->

<?php
}
include('includes/footer.php');
?>
