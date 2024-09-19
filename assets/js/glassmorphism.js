$(function () {
 $(".menu-link").click(function () {
  $(".menu-link").removeClass("is-active");
  $(this).addClass("is-active");
 });
});

$(function () {
 $(".main-header-link").click(function () {
  $(".main-header-link").removeClass("is-active");
  $(this).addClass("is-active");
 });
});

const dropdowns = document.querySelectorAll(".dropdown");
dropdowns.forEach((dropdown) => {
 dropdown.addEventListener("click", (e) => {
  e.stopPropagation();
  dropdowns.forEach((c) => c.classList.remove("is-active"));
  dropdown.classList.add("is-active");
 });
});

$(".search-bar input")
 .focus(function () {
  $(".header").addClass("wide");
 })
 .blur(function () {
  $(".header").removeClass("wide");
 });

$(document).click(function (e) {
 var container = $(".status-button");
 var dd = $(".dropdown");
 if (!container.is(e.target) && container.has(e.target).length === 0) {
  dd.removeClass("is-active");
 }
});

$(function () {
 $(".dropdown").on("click", function (e) {
  $(".content-wrapper").addClass("overlay");
  e.stopPropagation();
 });
 $(document).on("click", function (e) {
  if ($(e.target).is(".dropdown") === false) {
   $(".content-wrapper").removeClass("overlay");
  }
 });
});



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
/*
const toggleButton = document.querySelector('.dark-light');
    toggleButton.addEventListener('click', () => {
        document.body.classList.toggle('light-mode');
        
    });
    */

   
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
})
if(document.cookie.indexOf('lightMode') !== -1){
    if(document.cookie.split(';')[0].split('=')[1] === 'true'){
        $("#dark-light").prop('checked',true)
        $("body").toggleClass("light-mode");
    };
}
$(function () {
 $(".main-header button.filter").on("click", function (e) {
  $(".overlay-app").addClass("is-active");
 });
 $(".pop-up .close").click(function () {
  $(".overlay-app").removeClass("is-active");
 });


$(".main-header button.filter").click(function () {
 $(".pop-up").addClass("visible");
});

$(".pop-up .close").click(function () {
 $(".pop-up").removeClass("visible");
});
/**/ 

$(".pop-up label:not(.videopage label)").click(function () {
    $(".pop-up").removeClass("visible");
    $(".overlay-app").removeClass("is-active");
});

$(".content-button-wrapper button").click(function () {
    $('.pop-up input').prop('checked',false);
    $(".pop-up").removeClass("visible");
    $(".overlay-app").removeClass("is-active");

  })
 /* */


$(".humberger-menu").click(function () {
 $(".left-side").toggleClass("active");
});
});


$(function () {
    $("#playlist").on("click", function (e) {
     $(".overlay-app").addClass("is-active");
     $(".pop-up").addClass("visible");

    });
    $(".pop-up .close").click(function () {
    $(".overlay-app").removeClass("is-active");
    $(".pop-up").removeClass("visible");
    $('.pop-up.videopage .pop-footer button.add').addClass('visible');
    $('.pop-up.videopage .pop-footer .form').removeClass('visible');

    });
    $(".pop-up.videopage .pop-footer button.add").click(function () {
        $('.pop-up.videopage .pop-footer button.add').removeClass('visible');
        $('.pop-up.videopage .pop-footer .form').addClass('visible');

    });

    $(".comment_section .dropdown-item").click(function () {
        $(".comment_section .dropdown").removeClass("is-active");
    })


})