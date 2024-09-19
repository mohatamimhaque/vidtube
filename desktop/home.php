
<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
?>

   <div class="main-header">
      <button class='filter'>
        <i class="material-icons">tune</i>
        <span>Filter</span>
      </button>
      <div class="pop-up">
         <div class="pop-up__title">Search Filters
          <svg class="close" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle">
           <circle cx="12" cy="12" r="10" />
           <path d="M15 9l-6 6M9 9l6 6" />
          </svg>
         </div>
         <div class="popup-body">
            <div class="column">
              <div class="column-header">
                Upload Date
              </div>
              <div class="column-body">
                <div class="popup-input">
                  <input type="radio" name="time" id="last_hour" value="last_hour">
                  <label for="last_hour">Last hour</label>
                </div>
                <div class="popup-input">
                  <input type="radio" name="time" id="today" value="today">
                  <label for="today">Today</label>
                </div>
                <div class="popup-input">
                  <input type="radio" name="time" id="this_week" value="this_week">
                  <label for="this_week">This week</label>
                </div>
                <div class="popup-input">
                  <input type="radio" name="time" id="this_month" value="this_month">
                  <label for="this_month">This month</label>
                </div>
                <div class="popup-input">
                  <input type="radio" name="time" id="this_year" value="this_year">
                  <label for="this_year">This year</label>
                </div>
               
             
              </div>
            </div>
            <div class="column">
              <div class="column-header">
                Duration
              </div>
              <div class="column-body">
                <div class="popup-input">
                  <input type="radio" name="duration" id="under4" value="under4">
                  <label for="under4">Under 4 minutes</label>
                </div>
                <div class="popup-input">
                  <input type="radio" name="duration" id="between420" value="between420">
                  <label for="between420">4 - 20 minutes</label>
                </div>
                <div class="popup-input">
                  <input type="radio" name="duration" id="over20" value="over20">
                  <label for="over20">Over 20 minutes</label>
                </div>
              </div>
            </div>
            <div class="column">
              <div class="column-header">
                  short by
              </div>
              <div class="column-body">
                <div class="popup-input">
                  <input type="radio" name="shortby" id="created_at" value="created_at">
                  <label for="created_at">Upload date</label>
                </div>
                <div class="popup-input">
                  <input type="radio" name="shortby" id="views" value="views">
                  <label for="views">View count</label>
                </div>
              </div>
            </div>
         </div>
         <div class="content-button-wrapper">
          <button class="content-button status-button">Reset</button>
         </div>
      </div>
   </div>

   <div id="videos">

   </div>
  
  </div>
 </div>
 <div class="overlay-app"></div>
</div>

<?php
include('includes/link_extract.php');
?>
<!-- partial -->

<script>
  $(document).ready(function(){
    var start = window.start = 0;
    var limit = 16;
    $(".content-button-wrapper button").click(function () {
      $('.pop-up input').prop('checked',false);
      start = window.start = 0;
      load();
    })

   

    $('.header input').keydown(function(){
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
    $('#videos').on('scroll',function(){
      if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight){
        load();
      }
    })
    load();
    function load(){
      let fd = new FormData();
      fd.append('operation','home'); 
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
      let find = $('.header input').val();
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
            $('#videos').html(data);
          }
          else{
            $('#videos').append(data);
          }
          action();
          start = window.start;
        }
      })
    }


    function action(){
      $('#videos .videoo').on('mouseenter',function(){
        let video = $(this).find('video')[0];
            video.play();
            let th = $(this);
            $(video).on('timeupdate',function(){
                $(th).find('.vid-time').html(timeFormat(video.duration-video.currentTime));
            })
        })

        $('#videos .videoo').mouseleave(function(){
            let video = $(this).find('video')[0].pause();
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
</script>
<?php

include("includes/footer.php")
?>