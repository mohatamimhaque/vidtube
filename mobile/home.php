
<?php 
session_start();
include('includes/header.php');
include('includes/search.php');
  
  ?>
    
    

  <div id="wrapper">
  
  </div>
  
<div id='loading_icon' style='z-index:100;'></div>




<?php include('includes/nav.php') ?>
<?php include('includes/link_extract.php') ?>
</div>
<script>
$(document).ready(function(){
    var start = window.start = 0;
    var limit = 8;
    $(".content-button-wrapper button").click(function () {
      $('.pop-up input').prop('checked',false);
      start = window.start = 0;
      load();
    })

   

    $('#search').keydown(function(){
      setTimeout(()=>{
          start = window.start = 0;
          load();
      },100)
    })

    $('.pop-up label').click(function(){
      setTimeout(()=>{
          start = window.start = 0;
          load();
      },100)
    });
/*
    $('#wrapper').on('scroll',function(){
      if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight){
        load();
        alert('Scrolled to the bottom!');
      }
    })
/**/ 
    setInterval(() => {
        const last = window.screen.height;
        const iii = document.querySelectorAll('.video_list');
        if(iii.length>1){
        const last_element = iii[iii.length - 1].getBoundingClientRect().top + 300;
        
        if (last_element < last) {
          load();
        }
        }
    },500)
    
    load();
    function load(){
      let fd = new FormData();
      fd.append('operation','home'); 
      fd.append('device','mobile'); 
      fd.append('limit',limit); 
      fd.append('start',start); 
      let upload_time = $('input[name="time"]:checked').val();
      if(upload_time !== undefined){
        fd.append('upload_time',upload_time); 
      }
      let duration = $('input[name="duration"]:checked').val();
      if(duration !== undefined){
        fd.append('duration',duration); 
      }
      let shortby = $('input[name="shortby"]:checked').val();
      if(shortby !== undefined){
        fd.append('shortby',shortby); 
      }
      let find = $('#search').val();
      if(find !== ''){
        fd.append('find',find); 
      }
      let category = $('#category').val();
      if(category !==  ''){
        fd.append('category',category); 
      }
      let owner = $('#owner').val();
      if(owner !==  ''){
        fd.append('owner',owner); 
      }
      let tags = $('#tags').val();
      if(tags !==  ''){
          fd.append('tags',tags); 
        }
      let cast = $('#cast').val();
      if(cast !==  ''){
          fd.append('cast',cast); 
        }
      $.ajax({
        url:"<?= base_url('ajax/home') ?>",
        method:"POST",
        data:fd,
        contentType:false,
        processData:false,
        success:function(data){
          if(parseInt(start) == 0){
            $('#wrapper').html(data);
          }
          else{
            $('#wrapper').append(data);
          }
          start = window.start;
          action();
        }
      })
    }

    function action(){
      $('#wrapper .video_list').on('touchstart',function(){
        let video = $(this).find('video')[0];
        $(this).find('.video_overlay').hide();
        video.play();
        let th = $(this);
        $(video).on('timeupdate',function(){
          $(th).find('.duration').html(timeFormat(video.duration-video.currentTime));
        })
        })

        $('#wrapper .video_list').on('touchend', function(){
             $(this).find('video')[0].pause();
            $(this).find('.video_overlay').show();
        })



      function timeFormat(time){
          let totalSec = Math.floor(time % 60);
          let totalMin = Math.floor(time / 60);
          let totalhour = Math.floor(time / 3600);

          totalMin = totalMin - totalhour * 60;
          
          //if seconds are less than 10 then add 0 at the begning
          totalhour < 10 ? totalhour = '0' + totalhour : totalhour;
          totalSec < 10 ? totalSec = '0' + totalSec : totalSec;
          totalMin < 10 ? totalMin = '0' + totalMin : totalMin;
          
          if(totalhour >= 1){
              return `${totalhour}:${totalMin}:${totalSec}`;
          }
          else{
              return `${totalMin} : ${totalSec}`;
          }
      }
    }

  })








      $(function () {
        $(".profile-img").on("click", function() {
            $(".account-menu").slideToggle();
        });
        $("html").on("click", function() {
            $(".account-menu").slideUp();
        });
        $(".profile-img, .account-menu").on("click", function(e) {
            e.stopPropagation();
        });
        $("#dark-light").click(function () {
       $("body").toggleClass("light-mode");

       setTimeout(()=>{

        if($("#dark-light").prop('checked')){
            document.cookie = "lightMode="+true;
        }
        else{
            document.cookie = "lightMode="+false;
        }
       },100)
   }); 
   if(document.cookie.indexOf('lightMode') !== -1){
    if(document.cookie.split(';')[0].split('=')[1] === 'true'){
        $("#dark-light").prop('checked',true)
        $("body").toggleClass("light-mode");
    };
}
      })


/***/

    </script>
</body>
</html>