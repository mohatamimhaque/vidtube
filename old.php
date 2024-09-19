<?php
session_start();	
include('includes/header-old.php');
include('includes/navbar-old.php');
include('includes/sidebar.php');
if(isset($_GET['category'])){
	$category = $_GET['category'];
}
else{
	$category = "";
}
echo "<input type='text' value='".$category."' id='category' style='display:none'>";
if(isset($_GET['tags'])){
	$tags = $_GET['tags'];
}
else{
	$tags = "";
}
echo "<input type='text' value='".$tags."' id='tags' style='display:none'>";
if(isset($_GET['cast'])){
	$cast = $_GET['cast'];
}
else{
	$cast = "";
}
echo "<input type='text' value='".$cast."' id='cast' style='display:none'>";
?>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/home.css') ?>">
	<div class="btm_bar">
			<div class="container-fluid"
				style="width:96%">
					<div class="btm_bar_content">
						<nav>
							<ul>
								<li><a href="#" title="">Pages</a>
									<div class="mega-menu">
										<ul>
											<li><a href="index-2.html" title="">Homepage</a></li>
											<li><a href="single_video_page.html" title="">Single Video Page</a></li>
											<li><a href="Single_Video_Simplified_Page.html" title="">Single Video Simplified Page</a></li>
											<li><a href="single_video_fullwidth_page.html" title="">Singel Video Full Width Page</a></li>
											<li><a href="single_video_playlist.html" title="">Single Video Playlist Page</a></li>
											<li><a href="Upload_Video.html" title="">Upload Video Page</a></li>
											<li><a href="Upload_Edit.html" title="">Upload Video Edit Page</a></li>
											<li><a href="Browse_Channels.html" title="">Browse channels page</a></li>
											<li><a href="Searched_Videos_Page.html" title="">Searched videos page</a></li>
										</ul>
										<ul>
											<li><a href="#" title="">Single channel <span class="icon-arrow_below"></span></a>
												<ul>
													<li><a href="Single_Channel_Home.html" title="">Single Channel Home page</a></li>
													<li><a href="Single_Channel_Videos.html" title="">Single Channel videos page</a></li>
													<li><a href="Single_Channel_Playlist.html" title="">single channel playlist page</a></li>
													<li><a href="Single_Channel_Channels.html" title="">single channel channels page</a></li>
													<li><a href="Single_Channel_About.html" title="">single channel about page</a></li>
													<li><a href="Single_Channel_Products.html" title="">single channel products page</a></li>	
												</ul>
											</li>
											<li><a href="History_Page.html" title="">History page</a></li>
											<li><a href="Browse_Categories.html" title="">Browse Categories Page</a></li>
											<li><a href="Updates_From_Subs.html" title="">Updates from subscription page</a></li>
											<li><a href="login.html" title="">login page</a></li>
											<li><a href="signup.html" title="">signup page</a></li>
											<li><a href="User_Account_Page.html" title="">User account page</a></li>
										</ul>
									</div>
									<div class="clearfix"></div>
								</li>
								<li><a href="Browse_Categories.html" title="">Categories</a></li>
								<li><a href="Browse_Channels.html" title="">Channels</a></li>
								<li><a href="#" title="">Trending</a></li>
								<li><a href="Single_Channel_Home.html" title="">LIVE</a></li>
								<li><a href="#" title="">Movies</a></li>
							</ul>
						</nav><!--navigation end-->
						<?php if(isset($_SESSION['loggedOren'])) {
?>
						<ul class="shr_links">


							<li>
								<h3>Go to : </h3>
							</li>
							<li>
								<div class="shr favourite">
									<label class="like">
										<input type="checkbox" value="like">
										<div class="hearth"></div>
									</label>
								</div>
							</li>
							<li>
								<div class="shr watch_later" title="Watch Letter">
									<label class="like">
										<input type="checkbox" value="watch_later">
										<i class="icon-watch_later"></i>
									</label>
								</div>
							</li>
							<li>
								<div class="shr purchased" title="Purchased">
									<label class="like">
										<input type="checkbox" value="purchased">
										<i class="icon-purchased"></i>
									</label>
								</div>
							</li>
							<li>
								<div class="shr history" title="History">
									<label class="like">
										<input type="checkbox" value="history">
										<i class="icon-history"></i>
									</label>
								</div>
							</li>
						</ul><!--shr_links end-->
						<?php
						}?>
						<ul class="vid_thums">
						<li class="col-lg-2 col-md-4 col-sm-4 col-6 full_wdth">
						<div class="filter" id="filter_btn">
							<h3 class=""><i class="icon-filter"></i> Filter</h3>
						</div><!--filter end-->						
					</li>
						</ul><!--vid_status end-->
						<div class="clearfix"></div>
					</div><!--btm_bar_content end-->
				</div>
	</div><!--btm_bar end-->
				<section class="filter-sec">
			<div class="container">
				<div class="row">

					<div class="col-lg-3 col-md-4 col-sm-4 col-6 full_wdth">
						<div class="filter">
							<h3 class="fl-head"><i class="icon-calender"></i> Upload Date</h3>
							<ul class="lnks">
								<li><input type="radio" name='upload-time' value='0' id="alltime" checked><label for="alltime">All</label></li>
								<li><input type="radio" name='upload-time' value='hour' id="lasthour"><label for="lasthour">Last Hour</label></li>
								<li><input type="radio" name='upload-time' value='today' id="today"><label for="today">Today</label></li>
								<li><input type="radio" name='upload-time' value='this_month' id="this_month"><label for="this_month">This Month</label></li>
								<li><input type="radio" name='upload-time' value='this_year' id="this_year"><label for="this_year">This Year</label></li>
							</ul>
						</div><!--filter end-->
					</div>
					
					<div class="col-lg-3 col-md-4 col-sm-4 col-6 full_wdth">
						<div class="filter">
							<h3 class="fl-head"><i class="icon-watch_later"></i> Duration</h3>
							<ul class="lnks">
								<li><input type="radio" name='length' value='0' id="alllength" checked><label for="alllength">All</label></li>
								<li><input type="radio" name='length' value='less4' id="less4"><label for="less4">Short ( 4 min)</label></li>
								<li><input type="radio" name='length' value='less20' id="less20"><label for="less20">Long ( << 20 min)</label></li>
								<li><input type="radio" name='length' value='great20' id="great20"><label for="great20">Long ( >> 20 min)</label></li>
								
							</ul>
						</div><!--filter end-->
					</div>
					<div class="col-lg-3 col-md-4 col-sm-4 col-6 full_wdth">
						<div class="filter">
							<h3 class="fl-head"><i class="icon-features"></i> Features</h3>
							<ul class="lnks">
								<li><a href="#" title="">Live</a></li>
								<li><a href="#" title="">4K</a></li>
								<li><a href="#" title="">HD <i class="icon-cancel"></i></a></li>
								<li><a href="#" title="">360</a></li>
								<li><a href="#" title="">3D</a></li>
							</ul>
						</div><!--filter end-->
					</div>
					<div class="col-lg-3 col-md-4 col-sm-4 col-6 full_wdth">
						<div class="filter">
							<h3 class="fl-head"><i class="icon-star"></i> Sort by</h3>
							<ul class="lnks">
								<li><a href="#" title="">Relevance </a></li>
								<li><a href="#" title="">Upload data</a></li>
								<li><a href="#" title="">View count</a></li>
								<li><a href="#" title="">Rating</a></li>
							</ul>
						</div><!--filter end-->
					</div>
				</div>
			</div>
		</section><!--filter-sec end-->


		<section class="vds-main">
			<div class="vidz-row">
				<div class="container" style="width:95%">
					<div class="vidz_sec" style="">
						<div class="vidz_list">
							<div class="videoz">
								
							</div>
						</div><!--vidz_list end-->
					</div><!--vidz_videos end-->
				</div>
			</div><!--vidz-row end-->
			
		</section><!--vds-main end-->
<?php ?>
		<section class="more_items_sec text-center">
			<div class="container">
				<a href="#" title="">
					<svg width="19" height="24" viewBox="0 0 19 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M18.1618 24.0001H0.838235C0.374412 24.0001 0 23.6261 0 23.1628V5.86052C0 5.39727 0.374412 5.02332 0.838235 5.02332H18.1618C18.6256 5.02332 19 5.39727 19 5.86052V23.1628C19 23.6261 18.6256 24.0001 18.1618 24.0001ZM1.67647 22.3256H17.3235V6.69773H1.67647V22.3256Z" fill="#9494A0"/>
						<g opacity="0.25">
						<path opacity="0.25" d="M13.1324 4.18605C12.6685 4.18605 12.2941 3.81209 12.2941 3.34884V1.67442H6.70589V3.34884C6.70589 3.81209 6.33148 4.18605 5.86765 4.18605C5.40383 4.18605 5.02942 3.81209 5.02942 3.34884V0.83721C5.02942 0.373954 5.40383 0 5.86765 0H13.1324C13.5962 0 13.9706 0.373954 13.9706 0.83721V3.34884C13.9706 3.81209 13.5962 4.18605 13.1324 4.18605Z" fill="#9494A0"/>
						</g>
						<path d="M9.50001 19.3479C9.28487 19.3479 9.06972 19.267 8.90766 19.1024L5.92634 16.1275C5.59942 15.801 5.59942 15.2707 5.92634 14.9442C6.25325 14.6177 6.78413 14.6177 7.11104 14.9442L9.50001 17.3275L11.8862 14.9442C12.2131 14.6177 12.744 14.6177 13.0709 14.9442C13.3978 15.2707 13.3978 15.801 13.0709 16.1275L10.0924 19.1024C9.93031 19.267 9.71516 19.3479 9.50001 19.3479Z" fill="#9494A0"/>
						<path d="M9.49999 18.4186C9.03617 18.4186 8.66176 18.0447 8.66176 17.5814V10.3256C8.66176 9.86236 9.03617 9.4884 9.49999 9.4884C9.96382 9.4884 10.3382 9.86236 10.3382 10.3256V17.5814C10.3382 18.0447 9.96382 18.4186 9.49999 18.4186Z" fill="#9494A0"/>
						<g opacity="0.5">
						<path opacity="0.5" d="M15.6471 6.69764C15.1832 6.69764 14.8088 6.32369 14.8088 5.86043V4.18601H4.19118V5.86043C4.19118 6.32369 3.81677 6.69764 3.35294 6.69764C2.88912 6.69764 2.51471 6.32369 2.51471 5.86043V3.34881C2.51471 2.88555 2.88912 2.5116 3.35294 2.5116H15.6471C16.1109 2.5116 16.4853 2.88555 16.4853 3.34881V5.86043C16.4853 6.32369 16.1109 6.69764 15.6471 6.69764Z" fill="#9494A0"/>
						</g>
					</svg>
				</a>
			</div>
		</section><!--more_items_sec end-->
		</div><!--wrapper end-->


<?php
include('includes/script.php');
?>
	<script src="<?= base_url('assets/js/home.js') ?>"></script>
<script>
$(document).ready(function(){


	let i=0;
let j =0;
$('.shr_links li').click(function(){
    i++;
    if(i===1){
       if($(this).find('input').prop('checked')){
        j =1;
       }
       else{
        j=0;
       }
       $('.shr_links li input').prop('checked',false);

       if(j===0){
       $(this).find('input').prop('checked',false);
       }
       else{
        $(this).find('input').prop('checked',true);
       }
    
    setTimeout(()=>{
        i = 0;
        load();
    },200)
}
    
})







$('.filter label').click(function(){
    setTimeout(()=>{
        load();
    },100)
})
$('#search').keydown(function(){
    setTimeout(()=>{
        load();
    },100)
})


load();
function load(){
    let category = $('#category').val();
    let tags = $('#tags').val();
    let cast = $('#cast').val();
    let length = $('input[name="length"]:checked').val();
    let time = $('input[name="upload-time"]:checked').val();
    let search = $('#search').val();
    let shr = $('.shr input:checked').val();


    let fd = new FormData();
    fd.append('operation','home'); 
    fd.append('category',category); 
    fd.append('tags',tags); 
    fd.append('cast',cast); 
    fd.append('length',length); 
    fd.append('time',time); 
    fd.append('search',search); 
    fd.append('shr',shr); 

	$.ajax({
  		url:"<?= base_url('ajax/home') ?>",
		method:"POST",
		data:fd,
		contentType:false,
		processData:false,
		success:function(data){
			console.log(data);
			//action();
		}
})



}

})
</script>





<?php
include('includes/footer.php');
?>
