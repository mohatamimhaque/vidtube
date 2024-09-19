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
      <link rel="stylesheet" href="<?= base_url('m/assets/css/home.css') ?>">
   </head>
   <body class="mobile">
      <div class="phone">
         <div class="mobile_search_container">
            <i class="arrow-left material-icons">arrow_back</i>
            <input type="text" id='search' placeholder = 'Search Here...'>
            <div id="voice_search" class='visible'>
               <i class="material-icons">mic</i>
            </div>
            <button class="filterBTN">
            <i class="material-icons">tune</i>
            <span>Filters</span>
            </button>
         </div>
         <div class="pop-up">
            <div class="pop-up__title">
               Search Filters
               <div class="close">
                  <i class="material-icons">close</i>
               </div>
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
         <div class="overlay-app"></div>
         <header class="mobile_header">
            <div class='menu-circle'> </div>
            <div class="iconGroup">
               <i id='search_icon' class="material-icons">search</i>
               <i id='videocam' class="material-icons">videocam</i>
            </div>
         </header>
         <div id='microphone' class=''>
            <div class="recoder">
               <div class="close">
                  <span></span>
               </div>
               <select name="lang" id="lang">
                  <option value="en-US" id="en-US "selected="selected">English - US</option>
                  <option value="bn-BD" id="bn-BD" >বাংলা</option>
                  <option value="hi-IN" id="hi-IN" >हिंदी</option>
                  <option value="ur-PK" id="ur-pk">اردو</option>
                  <option value="fr-FR" id="fr-FR">French - FR</option>
                  <option value="pt-PT" id="pt-PT">Português - PT</option>
               </select>
               <p id="recoredText"></p>
               <button id="speakBtn" class="">
                  <div class="anim"></div>
                  <i class="material-icons">mic</i>
               </button>
            </div>
         </div>
         <div id="wrapper">




       



         </div>

         <div id="loading_icon">
            <div class="lds-default"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
         </div>


         <?php
          include('includes/nav.php');
         ?>

      </div>




      
      
    
   <script src="<?= base_url('m/assets/js/home.js') ?>"></script>
      <script>
 $(document).ready(function(){
    var start = window.start = 0;
    var limit = 3;
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
    let isLoading = false;

  $(window).on('scroll', function() {

    const $lastListContainer = $('.video_list').last();
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
     

      $.ajax({
        url:"<?= base_url('m/ajax/home') ?>",
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
          action(start,limit);
          $("#loading_icon").removeClass("visible");
          start = window.start;
          isLoading = false;
        }
      })
    }
  })
</script>

   </body>
</html>