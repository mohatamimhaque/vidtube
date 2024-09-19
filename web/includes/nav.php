<nav class="flex-div">
   <div class="nav-left flex-div">
      <button class="material-icons menu-icon">menu</button>
      <div class='menu-circle'> </div>
   </div>
   <div class="nav-middle flex-div">
      <div class="search-box flex-div">
         <input type="text" placeholder="Search" id="search">
         <div class="search-icon commonBtn">
            <i class="material-icons">search</i>
            <span>Search</span>
         </div>
      </div>
      <button class="mic-icon commonBtn" id="voice_search">
      <i class="material-icons">mic</i>
      <span>Search with your voice</span>
      </button>
   </div>
   <div class="nav-right">
      <button class="create commonBtn">
         <svg xmlns="http://www.w3.org/2000/svg" height="24"  viewBox="0 0 24 24" width="24" focusable="false" aria-hidden="true">
            <path d="M14 13h-3v3H9v-3H6v-2h3V8h2v3h3v2zm3-7H3v12h14v-6.39l4 1.83V8.56l-4 1.83V6m1-1v3.83L22 7v8l-4-1.83V19H2V5h16z"></path>
         </svg>
         <span>Create</span>
      </button>
      <button class="notification commonBtn">
         <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24" focusable="false" aria-hidden="true" >
            <path d="M10 20h4c0 1.1-.9 2-2 2s-2-.9-2-2zm10-2.65V19H4v-1.65l2-1.88v-5.15C6 7.4 7.56 5.1 10 4.34v-.38c0-1.42 1.49-2.5 2.99-1.76.65.32 1.01 1.03 1.01 1.76v.39c2.44.75 4 3.06 4 5.98v5.15l2 1.87zm-1 .42-2-1.88v-5.47c0-2.47-1.19-4.36-3.13-5.1-1.26-.53-2.64-.5-3.84.03C8.15 6.11 7 7.99 7 10.42v5.47l-2 1.88V18h14v-.23z"></path>
         </svg>
         <span>Notifications</span>
      </button>
      <?php if(isset($_SESSION['loggedOren'])) : ?>
        
            <img class="profile-img" src="<?= $url."upload/image/user/profile_photo/".$user['photo'] ?>" alt="">
            <div class="account-menu">
                <div class="sd_menu">
                    <ul class="mm_menu">
                        <li>
                            <span>
                                <i class="material-icons"></i>
                            </span>
                            <a href="<?= base_url('studio')?>" title="">Studio</a>
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
</nav>
