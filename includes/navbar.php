
<div class="header">
  <div class="header-logo">
    <div class="menu-circle"></div>
    <div class="humberger-menu">
      <div class="bar"></div>
    </div>
  </div>
  <div class="search-bar">
   <input type="search" placeholder="Search">
   <button id="voice_search" class='material-icons btn'>
    mic
   </button>
  </div>
  <div class="header-profile">
      <div class="notification">
          <span class="notification-number">3</span>
          <svg viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
              <path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9M13.73 21a2 2 0 01-3.46 0" />
            </svg>
        </div>
        <?php if(isset($_SESSION['loggedOren'])) : ?>
            <img class="profile-img" src="<?= $url."upload/image/user/profile_photo/".$user['photo'] ?>" alt="">
            <div class="account-menu">
                <div class="sd_menu">
                    <ul class="mm_menu">
                        <li>
                            <span>
                                <i class="material-icons"></i>
                            </span>
                            <a href="<?= base_url('my-channel')?>" title="">My Channel</a>
                        </li>
                        <li>
                            <span>
                                <i class="material-icons"></i>
                            </span>
                            <a href="#" title="">Paid subscriptions</a>
                        </li>
                        <li>
                            <span>
                                <i class="material-icons"></i>
                            </span>
                            <a href="#" title="">Settings</a>
                        </li>
                        <li>
                            <span>
                                <i class="material-icons"></i>
                            </span>
                            <a style='cursor:pointer' id='signout-btn' title="">Sign out</a>
                        </li>
                    </ul>
                </div><!--sd_menu end-->
                <div class="sd_menu scnd">
                    <ul class="mm_menu">
                        <li>
                            <span>
                                <i class="material-icons"></i>
                            </span>
                            <label class="dark-light" for="dark-light">Dark Theme</label>
                            <label class="switch">
                                <input type="checkbox" id="dark-light">
                                <b class="slider round"></b>
                            </label>
                        </li>
                        <li>
                            <span>
                                <i class="material-icons"></i>
                            </span>
                            <a href="#" title="">Send feedback</a>
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
            <?php else :?>
            <a class="signin-btn" href="<?= $url.'signin' ?>">Signin</a>
        <?php endif; ?>
    </div>
 </div>
            
            
            <div class="wrapper">
                
  <div class="left-side">
   <div class="side-wrapper">
    <div class="side-menu">
     <a href="<?= $url ?>">
      <i class="material-icons">home</i>
      <span>Home</span>
     </a>
     <a href="#">
      <i class="material-icons">local_fire_department</i>
      <span>Trending</span>
     </a>
     <a href="#">
      <i class="material-icons">subscriptions</i>
      <span>Supcriptions</span>
     </a>
    </div>
   </div>
   <div class="side-wrapper">
    <div class="side-title">Library</div>
    <div class="side-menu">
     <a href="#">
      <i class="material-icons">history</i>
      <span>History</span>
     </a>
     <a href="#">
      <i class="material-icons">timer</i>
      <span>Watch Later</span>
    </a>
     <a href="#">
      <i class="material-icons">shop_two</i>
      <span>Purchases</span>
     </a>
     <a href="#">
      <i class="material-icons">favorite</i>
      <span>Liked Videos</span>
    </a>
     <a href="#">
      <div class="playlist">
        <div></div>
        <div></div>
        <div></div>
      </div>
      <span>Playlist</span>
    </a>
   
    </div>
   </div>
  </div>
  <div class="main-container">