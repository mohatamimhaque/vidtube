   
  <div id="menuIcon" class="right" draggable="true">
    <a href='index.php' class="material-icons">home</a>
  </div>



<style>
    #menuIcon{
      position:fixed;
      top:50px;
      width:60px;
      height: 50px;
      background: #36454F;
      z-index:10000;
      border-radius: 5px;
      padding:2px;
      box-shadow:0 0 6px rgba(0,0,0,0.4);
    }
    #menuIcon.left{
      left:-52px;
      transition:0.3s;
      display: flex;
    }
    #menuIcon.left.active{
      left:-5px;
      transition:0.3s;
      display: flex;
    }
    #menuIcon.right{
      right:-52px;
      transition:0.3s;
      top:200px;
      display: flex;
    }
     #menuIcon.right.active{
      transition:0.3s;
      right:-5px;
      display: flex;
    }
   #menuIcon.left a{
      float:right;
    }
   #menuIcon.right a{
      
      float:left;
    }
    #menuIcon a{
      color: #E2DFD2;
      font-size: 35px;
      text-decoration: none;
      padding:5px 8px;
      
    }
  </style>
<script>
$(document).ready(function() {
  let isDragging = false;
  let dragX, dragY, top, left, position;
  let screenWidth = $(window).width();

  $('#menuIcon').on('touchstart', function(e) {
    isDragging = true;
    dragX = e.originalEvent.touches[0].pageX - $(this).offset().left;
    dragY = e.originalEvent.touches[0].pageY - $(this).offset().top;
  });

  $(document).on('touchstart', function(e) {
    $('#menuIcon').addClass('active');
  });

  $(document).on('touchmove', function(e) {
    $('#menuIcon').addClass('active');

    if (isDragging) {
      e.preventDefault();
      top = e.originalEvent.touches[0].pageY - dragY;
      left = e.originalEvent.touches[0].pageX - dragX;

      if (left < screenWidth/2) {
        position = 'left';
      } else {
        position = 'right';
      }

      menuPosition(position, top);
      document.cookie = "menuPosition=" + JSON.stringify({float: position, top: top});
    }
  });

  $(document).on('touchend', function(e) {
    isDragging = false;
    setTimeout(function() {
      $('#menuIcon').removeClass('active');
    }, 3000); 
  });

  function menuPosition(position, top) {
    if (position == 'left') {
      $('#menuIcon').removeClass('right').addClass('left');
    } else {
      $('#menuIcon').removeClass('left').addClass('right');
    }
    $('#menuIcon').css('top', top);
  }
  
  if (document.cookie.indexOf("menuPosition") !== -1) {
    let cookies = document.cookie.split(';');

    for (let i = 0; i < cookies.length; i++) {
      let cookie = cookies[i].trim();

      if (cookie.indexOf("menuPosition=") === 0) {
        let sub = JSON.parse(cookie.split('=')[1]);
        menuPosition(sub['float'], parseInt(sub['top']));
        break;
      }
    }
  }
});
</script>
