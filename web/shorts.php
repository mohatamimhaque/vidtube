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
    <link rel="stylesheet" href="assets/css/shorts.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
  <?php
    include('includes/nav.php');
    include('includes/voice.php');
    include('includes/stickySidebar.php');

    ?>
 


<div class="wrapper">
  <?php
    include('includes/smallSideber.php');
  ?>



   
         <div class="container">
            <div class="video-container">
              


            </div>
         </div>
      </div>
      <script src="<?= base_url('web/assets/js/common.js') ?>"></script>
      <script src="<?= base_url('web/assets/js/shorts.js') ?>"></script>
      <script>
  $(document).ready(function(){
    var start = window.start = 0;
    var limit = 2;
    var isLoading = false; 

    $('.video-container').on('scroll', function() {
        const $lastListContainer = $('.post').last();
        const scrollTop = $(window).scrollTop();
        const windowHeight = $(window).height();
        const elementOffset = $lastListContainer.offset().top;
        const elementHeight = $lastListContainer.outerHeight();

        if (!isLoading && scrollTop + windowHeight >= elementOffset + elementHeight) {
           load()
        }
    });

    load();

    function load(){
    
        let fd = new FormData();
        fd.append('operation','home'); 
        fd.append('limit',limit); 
        fd.append('start',start); 

        $.ajax({
            url: "<?= base_url('web/ajax/shorts') ?>",
            method: "POST",
            data: fd,
            contentType: false,
            processData: false,
            success: function(data){
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
            }
        });
    }
});

</script>


   </body>
</html>