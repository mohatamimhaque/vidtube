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
    <link rel="stylesheet" href="assets/css/home.css">
</head>
<body>
  <?php
    include('includes/nav.php');
    include('includes/filters.php');
    include('includes/voice.php');
    include('includes/stickySidebar.php');
    ?>
 


    




<div class="wrapper">
  <?php
    include('includes/smallSideber.php');
  ?>













     <!-- ------main------------- -->
<div class="container">
     
     <div class="list-container">
       

        

     </div>
    <div id="loading_icon">
      <div class="lds-default"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
    </div>


</div>
</div>











<?php
include('includes/link_extract.php');
?>


<!-- ---------- Script -------- -->
<div class="overlay-app"></div>
<script src="../assets/js/function.js"></script>
<script src="assets/js/common.js"></script>
<script src="assets/js/home.js"></script>
<script>
   $(document).ready(function(){
    var start = window.start = 0;
    var limit = 12;
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

    const $lastListContainer = $('.vid-list').last();
    const scrollTop = $(window).scrollTop();
    const windowHeight = $(window).height();
    const elementOffset = $lastListContainer.offset().top;
    const elementHeight = $lastListContainer.outerHeight();


    if (!isLoading && scrollTop + windowHeight >= elementOffset + elementHeight) {
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
        url:"<?= base_url('web/ajax/home') ?>",
        method:"POST",
        data:fd,
        contentType:false,
        processData:false,
        success:function(data){
          if(parseInt(start) == 0){
            $('.list-container').html(data);
          }
          else{
            $('.list-container').append(data);
          }
          $("#loading_icon").removeClass("visible");
          action(start,limit);
          start = window.start;
          isLoading = false;
        }
      })
    }
  })
</script>





<script id="rendered-js">
  
    //# sourceURL=pen.js
</script>


</body>
</html>

