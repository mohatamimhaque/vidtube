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
      <link rel="stylesheet" href="<?= base_url('m/assets/css/shorts.css') ?>">
   </head>
<body class="mobile">
  <?php
    if(isset($_GET['v'])){
        $videoId = $_GET['v'];
    }else{ 	$videoId = "";} 
    echo "<input type='text' value='".$videoId."' id='videoId' style='display:none'>"; 
    ?>
  <div class="container">
    <div class="video-container">


<!-- 
      <div class="post">
        <div class="phone">
          <div class="play_control">
            <i class="material-icons">play_arrow</i>
          </div>
          <div class="spinner">
            <div>
              <div class="lds-ripple"><div></div><div></div></div>
            </div>
          </div>
          <div class="videoTop">
            <div>
              <p>Shorts</p>
            </div>
            <div class="iconGroup">
              <span class="icon">
                <i class="material-icons">search</i>
              </span>
              <span class="icon more">
                <i class="material-icons">more_vert</i>
              </span>
            </div>
          </div>
          <div class="videoBottom">
            <div class="username ">
              <div class="thumb">
                <img src="../assets/img/thumbnail.jpg" alt="">
              </div>
              <a href="#" class="username-link">JamunaTv</a>
              <button>Subscribe</button>
            </div>
            <p class="post-description">
              This is a Tik Tok Clone with working Video Player, Like button and comment. But comments dosen't store in any backend.
            </p>
          </div>
          <div class="videoSideber">
            <div class="side-icon like">
              <span class="icon">
                <i class="fa-solid fa-thumbs-up"></i>
              </span>
              <span>00</span>
            </div>
            <div class="side-icon dislike">
              <span class="icon">
                <i class="fa-solid fa-thumbs-down"></i>
              </span>
              <span>00</span>
            </div>
            <div class="side-icon comment">
              <span class="icon">
                <i class="material-icons">comment</i>
              </span>
              <span>454</span>
            </div>
            <div class="side-icon share" title="">
              <span class="icon">
                <i class="fa-solid fa-share"></i>
              </span>
              <span>Share</span>
            </div>
          </div>
          <div class="videoProgress">
            <div class="preview">
                <img src="assets/img/thumbnail.jpg" alt="" class="previewImg">
              <span class="time"></span>
            </div>
            <div class="progress_area">
              <div class="progress_bar">
                  <span></span>
              </div>
              <div class="buffered_progress_bar"></div>
            </div>
          </div>
        </div>
        <div class="moreModal">
          <button class="moreModal-item">
              <span class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" height="24"  viewBox="0 0 24 24" width="24" focusable="false" aria-hidden="true"><path d="M21 6H3V5h18v1zm-8 3-9.99.01V10L13 9.99V9zm8 4H3v1h18v-1zm-8 4H3v1h10v-1z"></path></svg>
              </span> 
              Description
          </button>
          <button class="moreModal-item">
              <span class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24" focusable="false"aria-hidden="true"><path d="M18 4v15.06l-5.42-3.87-.58-.42-.58.42L6 19.06V4h12m1-1H5v18l7-5 7 5V3z"></path></svg>
              </span> Save to playlist
          </button>
          <button class="moreModal-item">
              <span class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24" focusable="false"aria-hidden="true"><path d="M6 14v-4c0-.55.45-1 1-1h3c.55 0 1 .45 1 1v1H9.5v-.5h-2v3h2V13H11v1c0 .55-.45 1-1 1H7c-.55 0-1-.45-1-1zm8 1h3c.55 0 1-.45 1-1v-1h-1.5v.5h-2v-3h2v.5H18v-1c0-.55-.45-1-1-1h-3c-.55 0-1 .45-1 1v4c0 .55.45 1 1 1zm6-11H4v16h16V4m1-1v18H3V3.01C3 3 3 3 3.01 3H21z"></path></svg>
              </span> 
              Captions
          </button>
          <button class="moreModal-item">
              <span class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24" focusable="false"aria-hidden="true"><g><path d="M12 3c-4.96 0-9 4.04-9 9s4.04 9 9 9 9-4.04 9-9-4.04-9-9-9m0-1c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2zm7 11H5v-2h14v2z"></path></g></svg>
              </span> 
              Don't recommend this channel
          </button>
          <button class="moreModal-item">
              <span class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24" focusable="false"aria-hidden="true"><path d="m13.18 4 .24 1.2.16.8H19v7h-5.18l-.24-1.2-.16-.8H6V4h7.18M14 3H5v18h1v-9h6.6l.4 2h7V5h-5.6L14 3z"></path></svg>
              </span> 
              Report
          </button>
          <button class="moreModal-item">
              <span class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24" focusable="false"aria-hidden="true"><path d="M13 14h-2v-2h2v2zm0-9h-2v6h2V5zm6-2H5v16.59l3.29-3.29.3-.3H19V3m1-1v15H9l-5 5V2h16z"></path></svg>
              </span>
               Send feedback
          </button>
        </div>
        
        <div class="video-player">
          <video src="#" class="post-video" poster="assets/img/thumbnail.jpg"></video>  
        </div>








        

              
     
      </div> -->
    
    
      <div id="loading_icon">
            <div class="lds-default"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
         </div>
    </div>
    <?php
          include('includes/nav.php');
         ?>
    
  </div>
  <script src="<?= base_url('m/assets/js/shorts.js') ?>"></script>
  <script>
  $(document).ready(function(){
    var start = window.start = 0;
    var limit = 3;
    var isLoading = false; 
   

    $('.video-container').on('scroll', function() {
        const $lastListContainer = $('.post').last();
        const scrollTop = $(window).scrollTop();
        const windowHeight = $(window).height();
        const elementOffset = $lastListContainer.offset().top;
        const elementHeight = $lastListContainer.outerHeight();


        if (!isLoading && scrollTop + windowHeight+100 >= elementOffset + elementHeight) {
          isLoading = true;
          load();
          }
        });
   load();
   function load(){
      $("#loading_icon").addClass("visible");
        let fd = new FormData();
        fd.append('operation','home'); 
        fd.append('limit',limit); 
        fd.append('start',start);
        let videoId = $('#videoId').val();
        if(videoId !==  ''){
          fd.append('videoId',videoId);
          $('#videoId').val('');
        }
        

        $.ajax({
            url: "<?= base_url('m/ajax/shorts') ?>",
            method: "POST",
            data: fd,
            contentType: false,
            processData: false,
            success: function(data){
          //    console.log(data);
                if(parseInt(start) === 0){
                    $('.video-container').html(data);
                } else {
                    $('.video-container').append(data);
                }
                action(start, limit); 
                start += limit; 
                window.start = start;
            },
            complete: function() {
                isLoading = false; 
                $("#loading_icon").removeClass("visible");
                
            }
        });

       
    }
});

</script>
</body>
</html>