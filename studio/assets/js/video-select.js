$(document).ready(function(){
  if($(".quality-auto").hasClass('active')){
    playVideoWithSize();
  }
  $(".quality-auto").click(function(){
  playVideoWithSize();
  //playVideo();


})
  
  function playVideoWithSize(){
  var qualities_size = document.querySelectorAll("source[size]");
var sizeArray = new Array();


qualities_size.forEach(event=>{
    let size = event.getAttribute('size');
    sizeArray.push(size)
})
  
  
  
var fileURL = "https://raw.githubusercontent.com/mohatamimhaque/gallary/main/assets/img/image1.jpg"; 
var downloadSize = 235837.44; //bytes

// Create an instance of the XMLHttpRequest object
var xhr = new XMLHttpRequest();

// Open a connection to the file you want to download
xhr.open('GET', fileURL, true);

// Send the request
var startTime = new Date();
xhr.send();

// Measure the time it takes for the file to download
xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
        var endTime = new Date();
        var time = (endTime - startTime) / 1000;
        var speed = (downloadSize * 8) / (time*1024*1024);
        video_preview(speed)
    }
};

function video_preview(speed){
  if(speed >= 24  && sizeArray.includes('1080')){
    playVid(1080);
  }
  else  if(speed >= 12 && sizeArray.includes('720')){
    playVid(720);
  }
  else  if(speed >= 6  && sizeArray.includes('480')){
    playVid(480);
  }
  else  if(speed >= 3  && sizeArray.includes('360')){
    playVid(360);
  }
  else if(speed >= 2 && sizeArray.includes('240')){
    playVid(240);
  }
  else{
    playVid(144);
  }
  }
  function playVid(size){
   
   //$('#captions').css('color','red');
   qualities_size.forEach(event=>{
            if (event.getAttribute('size') == size) {
             // $('#captions').html(size +'p video playing');
              let video= document.querySelector('#video_wrapper #main_video');
                let video_current_duration = video.currentTime;
                let video_source = event.getAttribute('src');
                video.src = video_source;
                video.currentTime = video_current_duration;
                playVideo();
                
            }
          })
   
   
   
   
  
  }
  }
})