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
<div class="row" style='width:96%;margin:12px auto' style='oveflow:auto'>
    <div class="col-md-3 mb-3">
        <div>
            <label for="channel_name" class="form-label mr-2">Name<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="channel_name" placeholder="Channel Name">
        </div>
        <div class='mt-3'>
            <label for="profile_photo" class="form-label" style='margin-bottom:5px'>Profile Photo<span class="text-danger">*</span></label>
            <input type="file" id="profile_photo" accept=".jpg,.jpeg,.png,.jfif,.webp" style='display:none'>
            <label for="profile_photo" class="form-control profile_photo_name_show" style='cursor:pointer;overflow:hidden'>Profile Photo</label>
        </div>
        <div class='mt-3'>
            <label for="cover_photo" class="form-label" style='margin-bottom:5px'>Cover Photo<span class="text-danger">*</span></label>
            <input type="file" id="cover_photo" accept=".jpg,.jpeg,.png,.jfif,.webp" style='display:none'>
            <label for="cover_photo" class="form-control cover_photo_name_show" style='cursor:pointer;overflow:hidden'>Cover Photo</label>
        </div>
        <div class='mt-3'>
            <label for="cover_photo" class="form-label" style='margin-bottom:5px'>Description<span class="text-danger">*</span></label>
            <textarea name="channel_description" id="channel_description" class='form-control' cols="5" rows="3"></textarea>
        </div>
        <div class='mt-3'>
            <div class="d-flex justify-content-between align-items-center">
                <span class="form-label" style='margin-bottom:5px'>Socail Media:</span>
                <button class="btn btn-success add_more" style='padding:2px 6px' type="submit">Add More</button>
            </div>
            <div class="links_add mr-1">
                <div class="d-flex justify-content-between align-items-center">
                    <small class='text-success mr-3'>Example:</small>
                    <small class='text-danger'style='width:30%'>Facebook</small>
                    <small class='text-danger'style='width:65%'>https://www.facebook.com</small>
                </div>
                <div class="d-flex justify-content-between align-items-center  mt-1">
                    <input type="text" class="form-control social_media_name" style='width:30%' placeholder='Name'>
                    <input type="text" class="form-control social_media_link" style='width:65%' placeholder='Profile link'>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <button class="btn btn-success w-100 submit" type="submit">Create</button>
        </div>
    </div>
    <div class="col-md-9">
        <section class="channel-cover" style='--i:100%'>
            <img src="<?= base_url('assets/img/cover.jpg') ?>" alt="" style='width:100%;height:100%' id='cover_photo_preview'>
        </section><!--channel-cover end-->
    
        <section class="videso_section">
            <div class="info-pr-sec">
                <div class="container">
                    <div class="vcp_inf cr">
                        <span class="vc_hd" style='margin-right:0'>
                            <img src="<?= base_url('assets/img/profile.jpg') ?>" id='profile_photo_preview' alt="" style='border:3px solid rgba(120,120,120,0.20)'>
                        </span>
                        <div class="vc_info" style='padding-left:12px'>
                            <h4 id='channel_name_preview'>Channel Name <span class="verify_ic"><i class="icon-tick"></i></span></h4>
                            <span>00 subscribers</span>
                        </div>
                    </div><!--vcp_inf end-->
                    <ul class="chan_cantrz">
                        <li>
                            <a href="#" title="" class="subscribe">Subscribe <strong>00</strong></a>
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
            
            <div class="tab-content p-0" id="myTabContent">
                
                  
                  <div class="tab-pane fade show active" id="about_tab" role="tabpanel" aria-labelledby="about-tab">
                      <div class="about_tab_content">
                          <div class="container">
                              <div class="description">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="decp_cotnet">
                                            <h2 class="ab-fd">Description </h2>
                                            <p id='description_preview'>Welcome to the official Saturday Night Live channel on YouTube!  Here you will find your favorite sketches, behind the scenes clips and web exclusives, featuring all your favorite hosts and cast members.  Check out more SNL at http://www.nbc.com/</p>
                                        </div><!--abt-founder end-->
                                        <div class="link-pr">
                                            <h2 class="ab-fd">Links </h2>
                                            <ul class="csl-link-1 link_preview">
                                                <li><a href="https://www.facebook.com" title="facebook" style='text-transform:capitalize'> facebook</a></li>
                                                <li><a href="https://www.twitter.com" title="">Twitter</a></li>
                                                <li><a href="https://www.instagram.com" title="">Instagram</a></li>
                                            </ul>
                                         
                                            <div class="clearfix"></div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="stats">
                                            <h2 class="ab-fd">Stats</h2>
                                            <ul>
                                                <li>Joined <span class="created-date"></span> </li>
                                                <li>00 views</li>
                                                <li>00 subscribers</li>
                                                <li>00 videos</li>
                                            </ul>
                                        </div><!--stats end-->
                                    </div>
                                </div>
                            </div>
                          </div>
                      </div><!--about_tab_content end-->
                  </div>
                  
            </div>
        </section><!--Featured Videos end-->
    
        
    </div>
</div>



<?php
}
include('includes/account.php');
include('includes/channelcreatescript.php');
include('includes/footer.php');
?>
