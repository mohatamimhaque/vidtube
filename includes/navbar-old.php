<body>



	<div class="wrapper hp_1">




<header>
			<div class="top_bar">
				<div class="container">
					<div class="top_header_content">
						<div class="menu_logo">
							<a href="#" title="" class="menu">
								<i class="icon-menu"></i>
							</a>
						</div><!--menu_logo end-->
						<div class="search_form">
							<form>
								<input type="text" id='search' name="search" placeholder="Search Videos">
							</form>
						</div><!--search_form end-->
						<?php if(isset($_SESSION['loggedOren'])) {
						$unique_id = $_SESSION['loggedOren']['unique_id'];
						$q = mysqli_query($con, "SELECT * FROM user_account where unique_id='$unique_id'");
						if(mysqli_num_rows($q) > 0){
							foreach($q as $row){
								?>
					
						<ul class="controls-lv">
							<li>
								<a href="#" title=""><i class="icon-message"></i></a>
							</li>
							<li>
								<a href="#" title=""><i class="icon-notification"></i></a>
							</li>
							<li class="user-log">
								<div class="user-ac-img" style='width:45px;height:45px'>
									<img src="<?= base_url('upload/image/user/profile_photo/'.$row['photo'])  ?>" alt="" style='width:100%;height:100%'>
								</div>
								<div class="account-menu">
									<h4>AZYRUSMAX <span class="usr-status">PRO</span></h4>
									<div class="sd_menu">
										<ul class="mm_menu">
											<li>
												<span>
													<i class="icon-user"></i>
												</span>
												<a href="<?= base_url('my-channel')?>" title="">My Channel</a>
											</li>
											<li>
												<span>
													<i class="icon-paid_sub"></i>
												</span>
												<a href="#" title="">Paid subscriptions</a>
											</li>
											<li>
												<span>
													<i class="icon-settings"></i>
												</span>
												<a href="#" title="">Settings</a>
											</li>
											<li>
												<span>
													<i class="icon-logout"></i>
												</span>
												<a style='cursor:pointer' id='signout-btn' title="">Sign out</a>
											</li>
										</ul>
									</div><!--sd_menu end-->
									<div class="sd_menu scnd">
										<ul class="mm_menu">
											<li>
												<span>
													<i class="icon-light"></i>
												</span>
												<a href="#" title="">Dark Theme</a>
												<label class="switch">
													<input type="checkbox">
												  	<b class="slider round"></b>
												</label>
											</li>
											<li>
												<span>
													<i class="icon-language"></i>
												</span>
												<a href="#" title="">Language</a>
											</li>
											<li>
												<span>
													<i class="icon-feedback"></i>
												</span>
												<a href="#" title="">Send feedback</a>
											</li>
											<li>
												<span>
													<i class="icon-location"></i>
												</span>
												<a href="#" title="">India</a>
												<i class="icon-arrow_below"></i>
											</li>
										</ul>
									</div><!--sd_menu end-->
									<div class="restricted-mode">
										<h4>Restricted Mode</h4>
										<label class="switch">
											<input type="checkbox" checked>
										  	<span class="slider round"></span>
										</label>
										<div class="clearfix"></div>
									</div><!--restricted-more end-->
								</div>
							</li>
							
						</ul><!--controls-lv end-->
						<?php }}} else{ ?>
						<ul class="controls-lv">
							<li class='user-log'>
								<a href="<?= base_url('signin') ?>" title="" class="btn-default">Signin</a>
							</li>
						</ul>
						<?php } ?>

						<div class="clearfix"></div>
					</div><!--top_header_content end-->
				</div>
			</div><!--header_content end-->
			
		</header><!--header end-->