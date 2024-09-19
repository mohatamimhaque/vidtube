var video_player = document.querySelector('#video_wrapper #video_player');
var video_status= document.querySelector('#video_wrapper #video_status');
var main_video= document.querySelector('#video_wrapper #main_video');
var play_pause = document.querySelector('#video_wrapper .play_arrow .material-icons');
var progress_area = document.querySelector('#video_wrapper .progress_area');
var progress_bar = document.querySelector('#video_wrapper .progress_bar');
var buffered_progress_bar = document.querySelector('#video_wrapper .buffered_progress_bar');
var current = document.querySelector('#video_wrapper .current');
var duration = document.querySelector('#video_wrapper .duration');
var picture_in_picture = document.querySelector('#video_wrapper .picture_in_picture');
var fullscreen = document.querySelector('#video_wrapper .mobile .fullscreen');
var progressAreaTime = document.querySelector('#video_wrapper .progressAreaTime');
var thumbnail = document.querySelector('#video_wrapper #thumbnail');
var spinner = document.querySelector('#video_wrapper #spinner');
var settingsBTn = document.querySelector('#video_wrapper #settingsBTn');
var captionBTn = document.querySelector('#video_wrapper #captionBTn');
var settings = document.querySelector('#settings');
var quality = document.querySelector('#quality');
var subtitles_btn = document.querySelector('#subtitles_btn');
var loop = document.querySelector('#loop');
var playback_speed = document.querySelector('#playback_speed');
var qualities = document.querySelector('#qualities');
var playback = document.querySelector('#playback');
var playback_list = document.querySelectorAll('#playback li');
var subtitles = document.querySelector('#subtitles');
var tracks = document.querySelectorAll('#video_wrapper track');
var caption_labels = document.querySelector('#subtitles ul');
var video_overlay = document.querySelector('#video_wrapper #video_overlay');
var auto_play = document.querySelector('#video_wrapper .auto_play');




if(tracks.length !== 0){
    caption_labels.insertAdjacentHTML('afterbegin',`<li data-track="off" class='active'>OFF</li>`)
  
    for(let i = 0; i < tracks.length; i++){
        var trackli =  `<li data-track="${tracks[i].label}">${tracks[i].label}</li>`;
        caption_labels.insertAdjacentHTML('beforeend',trackli)
    }
}

var subtitles_list =  document.querySelectorAll('#subtitles ul li')



main_video.addEventListener('ended',()=>{
    if(auto_play.classList.contains('active')){
      playVideo();
    }
    else if(loop.classList.contains('active')){
        playVideo();
      }
})




auto_play.addEventListener('click',()=>{
    auto_play.classList.toggle('active');
})
loop.addEventListener('click',()=>{
    loop.classList.toggle('active');
})











function playVideo() {
    video_player.classList.remove('paused');
    play_pause.innerHTML = "pause";
    main_video.play();
    active()

}
function pauseVideo() {
    video_player.classList.add('paused');
    play_pause.innerHTML = "play_arrow";
    main_video.pause();
    setTimeout(function () {
        notActive()
    }, 2000)

}

video_overlay.addEventListener('click',()=>{
    video_overlay.style.display = 'none';
    main_video.classList.add('running');
    playVideo();;
})
play_pause.addEventListener('click',()=>{
    var isVideoPaused = video_player.classList.contains('paused');
    isVideoPaused ? playVideo() : pauseVideo();
})


video_player.addEventListener('mousemove',(e)=>{
    var isVideoPaused = video_player.classList.contains('paused');
    isVideoPaused ? notActive() : active();
})



function active() {
    $('#video_wrapper #video_player .progress_bar').addClass('active');
    $('#video_wrapper .sc-control').addClass('active');
    $('#video_wrapper .video_status').addClass('active');
    $('#video_wrapper .contorl-top').addClass('active');

    setTimeout(function () {
        $('#video_wrapper .video_status').removeClass('active');
        $('#video_wrapper #video_player .progress_bar').removeClass('active');
        $('#video_wrapper #video_player .sc-control').removeClass('active');
        $('#video_wrapper #video_player .contorl-top').removeClass('active');
    }, 2000);
}
notActive()
function notActive() {
    $('#video_wrapper .video_status').addClass('active');
    $('#video_wrapper #video_player .progress_bar').addClass('active');
    $('#video_wrapper #video_player .sc-control').addClass('active');
    $('#video_wrapper #video_player .contorl-top').addClass('active');
}
function noActive() {
    $('#video_wrapper .video_status').removeClass('active');
    $('#video_wrapper #video_player .progress_bar').removeClass('active');
    $('#video_wrapper #video_player .sc-control').removeClass('active');
    $('#video_wrapper #video_player .contorl-top').removeClass('active');
}





main_video.addEventListener('loadeddata', () => {
    setInterval(() => {
        let bufferedTime = main_video.buffered.end(0);
        let duration = main_video.duration;
        let width = (bufferedTime / duration) * 100;
        buffered_progress_bar.style.width = `${width}%`
    }, 500);
})



    //current video duration
    //load video duration
    main_video.addEventListener('loadeddata', (e) => {
        let videoDuration = e.target.duration;
        let totalSec = Math.floor(videoDuration % 60);
        let totalMin = Math.floor(videoDuration / 60);
        let totalhour = Math.floor(videoDuration / 3600);

        totalMin = totalMin - totalhour * 60;

        //if seconds are less than 10 then add 0 at the begning
        totalhour < 10 ? totalhour = '0' + totalhour : totalhour;
        totalSec < 10 ? totalSec = '0' + totalSec : totalSec;
        totalMin < 10 ? totalMin = '0' + totalMin : totalMin;

        if (totalhour >= 1) {
            duration.innerHTML = `${totalhour}:${totalMin}:${totalSec}`;
        }
        else {
            duration.innerHTML = `${totalMin} : ${totalSec}`;
        }

    })



    //current video duration
    main_video.addEventListener('timeupdate', (e) => {
        let currentVideoTime = e.target.currentTime;
        let currentSec = Math.floor(currentVideoTime % 60);
        let currentMin = Math.floor(currentVideoTime / 60);
        let currenthour = Math.floor(currentVideoTime / 3600);
        currentMin = currentMin - currenthour * 60;

        //if seconds are less than 10 then add 0 at the begning
        currenthour < 10 ? currenthour = '0' + currenthour : currenthour;
        currentSec < 10 ? currentSec = '0' + currentSec : currentSec;
        currentMin < 10 ? currentMin = '0' + currentMin : currentMin;

        if (currenthour >= 1) {
            current.innerHTML = `${currenthour}:${currentMin}:${currentSec}`;
        }
        else {
            current.innerHTML = `${currentMin} : ${currentSec}`;
        }

        //progressbar width change
        let videoDuration = e.target.duration;
        let progressWidth = (currentVideoTime / videoDuration) * 100;
        progress_bar.style.width = `${progressWidth}%`
    })






    progress_area.addEventListener('click', (e) => {
        let videoDuration = main_video.duration;
        let progresswidthval = progress_area.clientWidth;
        let ClickOffsetX = e.offsetX;
        main_video.currentTime = (ClickOffsetX / progresswidthval) * videoDuration;
        active()

    })

    let userAgent = navigator.userAgent;

    if (userAgent.match(/firefox|fxios/i)) {
        picture_in_picture.style.display = 'none'
    }


    picture_in_picture.addEventListener('click', () => {
        main_video.requestPictureInPicture();
    })
    
    main_video.addEventListener('click', () => {
        var isVideoPaused = video_player.classList.contains('paused');
        isVideoPaused ? notActive() : active();
    })

   

    document.getElementById("video_player").addEventListener("touchstart", tapHandler);
    var tapedTwice = false;
    function tapHandler(event) {
        if (!tapedTwice) {
            tapedTwice = true;
            setTimeout(function () { tapedTwice = false; }, 300);
            return false;

        }
        if(tapedTwice == true){
            noActive()
        }
        

        
        var x = 0;
        var y = 0;


            if (event.touches && event.touches[0]) {
                x = event.touches[0].clientX;
                y = event.touches[0].clientY;
            } else if (event.originalEvent && event.originalEvent.changedTouches[0]) {
                x = event.originalEvent.changedTouches[0].clientX;
                y = event.originalEvent.changedTouches[0].clientY;
            } else if (event.clientX && event.clientY) {
                x = event.clientX;
                y = event.clientY;
            }
        var z = $(window).width();


        if(z/2 > x){
            main_video.currentTime -= 10;
        }
        else{
            main_video.currentTime += 10;
        }
        window.addEventListener('touchstart', touchHandler, false);
        window.addEventListener('touchmove', touchHandler, false);
        window.addEventListener('touchend', touchHandler, false);

       
    }

    
progress_area.addEventListener("pointerdown", (e) => {
    progress_area.setPointerCapture(e.pointerId);
    setTimelinePosition(e);
    progress_area.addEventListener("pointermove",setTimelinePosition);
    progress_area.addEventListener("pointerup",()=>{
        progress_area.removeEventListener("pointermove",setTimelinePosition);
    })
  });
  
  
function setTimelinePosition(e) {
    let videoDuration = main_video.duration;
    let progressWidthval = progress_area.clientWidth + 2;
    let ClickOffsetX = e.offsetX;
    main_video.currentTime = (ClickOffsetX / progressWidthval) * videoDuration;
    
    let progressWidth = (main_video.currentTime / videoDuration) * 100 + 0.5;
    progress_bar.style.width = `${progressWidth}%`;
    
    let progressTime = main_video.currentTime;
    let currentSec = Math.floor(progressTime % 60);
    let currentMin = Math.floor(progressTime / 60);
    let currenthour = Math.floor(progressTime / 3600);
    currentMin = currentMin - currenthour * 60;

    currenthour < 10 ? currenthour = '0' + currenthour : currenthour;
    currentSec < 10 ? currentSec = '0' + currentSec : currentSec;
    currentMin < 10 ? currentMin = '0' + currentMin : currentMin;
    
    if(currenthour >= 1){
        progressAreaTime.innerHTML = `${currenthour}:${currentMin}:${currentSec}`;
    }
    else{
        progressAreaTime.innerHTML = `${currentMin} : ${currentSec}`;
    }


}



//update progress area time and display block on mouse move 
progress_area.addEventListener('mousemove',(e)=>{
    let progresswidthval = progress_area.clientWidth;
    let x = e.offsetX;
 
    let videoDuration = main_video.duration;
    let progressTime = Math.floor((x / progresswidthval) * videoDuration)

    let currentSec = Math.floor(progressTime % 60);
    let currentMin = Math.floor(progressTime / 60);
    let currenthour = Math.floor(progressTime / 3600);
    currentMin = currentMin - currenthour * 60;

    currenthour < 10 ? currenthour = '0' + currenthour : currenthour;
    currentSec < 10 ? currentSec = '0' + currentSec : currentSec;
    currentMin < 10 ? currentMin = '0' + currentMin : currentMin;
    
    if(currenthour >= 1){
        progressAreaTime.innerHTML = `${currenthour}:${currentMin}:${currentSec}`;
    }
    else{
        progressAreaTime.innerHTML = `${currentMin} : ${currentSec}`;
    }

    if(x >= progresswidthval - 80){
        x = progresswidthval -80;
    }
    else if(x <= 75){
        x = 75;
    }
    else{
        x = e.offsetX;
    }

    progressAreaTime.style.setProperty('--x',`${x}px`);
    progressAreaTime.style.display ='block';
    
})




progress_area.addEventListener('mouseleave',()=>{
    progressAreaTime.style.display ='none';
})




//If you want to show your video thumbnail on progress Bar hover then comment out the following code. Make sure that you are using video from same domain where you hosted your webpage.
// Video Preview
var thumbnails = [];
var thumbnailWidth = 158;
var thumbnailHeight = 90;
var horizontalItemCount = 5;
var verticalItemCount = 5;
let preview_video = document.createElement('video')
preview_video.preload = "metadata";
preview_video.width = "500";
preview_video.height = "300"
preview_video.controls = true;
preview_video.src = main_video.querySelector("source").src;
preview_video.addEventListener("loadeddata", async function () {
    //
    preview_video.pause();
    //
    var count = 1;
    //
    var id = 1;
    //
    var x = 0,
    y = 0;
    //
    var array = [];
    var duration = parseInt(preview_video.duration);
    //
    //
    for (var i = 1; i <= duration; i++) {
    array.push(i);
  }
  //
  var canvas;
  //
  var i, j;
  for (i = 0, j = array.length; i < j; i += horizontalItemCount) {
    //
    for (var startIndex of array.slice(i, i + horizontalItemCount)) {
      //
      var backgroundPositionX = x * thumbnailWidth;
      //
      var backgroundPositionY = y * thumbnailHeight;
      //
      var item = thumbnails.find((x) => x.id === id);
      

      if (!item) {
        //
        //
        canvas = document.createElement("canvas");
        //
        canvas.width = thumbnailWidth * horizontalItemCount;
        canvas.height = thumbnailHeight * verticalItemCount;
        //
        thumbnails.push({
          id: id,
          canvas: canvas,
          sec: [
            {
              index: startIndex,
              backgroundPositionX: -backgroundPositionX,
              backgroundPositionY: -backgroundPositionY,
            },
          ],
        });
      } else {
        //
        //
        canvas = item.canvas;
        //
        item.sec.push({
          index: startIndex,
          backgroundPositionX: -backgroundPositionX,
          backgroundPositionY: -backgroundPositionY,
        });
      }
      //
      var context = canvas.getContext("2d");
      //
      preview_video.currentTime = startIndex;
      //
      await new Promise(function (resolve) {
        var event = function () {
          //
          context.drawImage(
            preview_video,
            backgroundPositionX,
            backgroundPositionY,
            thumbnailWidth,
            thumbnailHeight
          );
          //
          x++;
          // removing duplicate events
          preview_video.removeEventListener("canplay", event);
          //
          resolve();
        };
        //
        preview_video.addEventListener("canplay", event);
      });
      // 1 thumbnail is generated completely
      count++;
    }
    // reset x coordinate
    x = 0;
    // increase y coordinate
    y++;
    // checking for overflow
    if (count > horizontalItemCount * verticalItemCount) {
      //
      count = 1;
      //
      x = 0;
      //
      y = 0;
      //
      id++;
    }
  }
  // looping through thumbnail list to update thumbnail
  thumbnails.forEach(function (item) {
    // converting canvas to blob to get short url
    item.canvas.toBlob((blob) => (item.data = URL.createObjectURL(blob)), "image/jpeg");
    // deleting unused property
    delete item.canvas;
  });
  
});

progress_area.addEventListener('mousemove',(e)=>{
    let progresswidthval = progress_area.clientWidth;
    let x = e.offsetX;
    let videoDuration = main_video.duration;
    let progressTime = Math.floor((x / progresswidthval) * videoDuration);


    if(x >= progresswidthval - 80){
        x = progresswidthval -80;
    }
    else if(x <= 75){
        x = 75;
    }
    else{
        x = e.offsetX;
    }
        
    thumbnail.style.setProperty('--x',`${x}px`);
    thumbnail.style.display ='block';



    for (var item of thumbnails) {
        
        var data = item.sec.find(x1 => x1.index === Math.floor(progressTime));
      
        if (data) {
             if (item.data != undefined) {
              thumbnail.setAttribute("style", `background-image: url(${item.data});background-position-x: ${data.backgroundPositionX}px;background-position-y: ${data.backgroundPositionY}px;--x: ${x}px;display: block;`)
            return;
             }
           }
    }



})


progress_area.addEventListener('mouseleave',()=>{
    thumbnail.style.display ='none';
})


main_video.addEventListener('waiting',()=>{
    spinner.style.display = 'block';
    video_overlay.style.display = 'block';
    $('.video_overlay_logo').css('display','none');
})

main_video.addEventListener('canplay',()=>{
  if(main_video.classList.contains('running')){
      spinner.style.display = 'none';
      video_overlay.style.display = 'none';
  }  
})




settingsBTn.addEventListener('click',()=>{
    settingsBTn.classList.toggle('active');
    settings.classList.toggle('active');
})
settings.addEventListener('click',()=>{
    settingsBTn.classList.toggle('active');
    settings.classList.toggle('active');
})

quality.addEventListener('click',()=>{
    qualities.classList.toggle('active');
})
qualities.addEventListener('click',()=>{
    qualities.classList.toggle('active');
})




function removeActiveClasses(e){
    e.forEach((event)=>{
        event.classList.remove('active')
    })

}


playback_list.forEach(event =>{
    event.addEventListener('click',()=>{
        removeActiveClasses(playback_list);
        event.classList.add('active');
        let speed = event.getAttribute('data-speed');
        main_video.playbackRate = speed;
    })
})

subtitles_list.forEach(event =>{
    event.addEventListener('click',()=>{
        removeActiveClasses(subtitles_list);
        event.classList.add('active');
        changeCaption(event) 
    })
})



playback_speed.addEventListener('click',()=>{
    playback.classList.toggle('active');
})
playback.addEventListener('click',()=>{
    playback.classList.toggle('active');
})

subtitles_btn.addEventListener('click',()=>{
    subtitles.classList.toggle('active');
})
captionBTn.addEventListener('click',()=>{
    subtitles.classList.toggle('active');
})
subtitles.addEventListener('click',()=>{
    subtitles.classList.toggle('active');
})




var ttrack = main_video.textTracks;


function changeCaption(label){
    let trackable = label.getAttribute('data-track')
    for(let i = 0; i < ttrack.length; i++){
       ttrack[i].mode = 'disabled';
       if(ttrack[i].label == trackable){
        ttrack[i].mode = 'showing';
       }
    }
}   
let caption_text = document.querySelector('#video_wrapper #video_player .caption_text');
for(let i = 0; i < ttrack.length; i++){
    ttrack[i].addEventListener('cuechange',()=>{
      
        if(ttrack[i].mode === 'showing'){
           if(ttrack[i].activeCues[0]){
            caption_text.classList.add('active');
                let span = `<span><mark>${ttrack[i].activeCues[0].text}</mark> </span>`;
                caption_text.innerHTML = span;
           }
           else{
            caption_text.classList.remove('active');
            caption_text.innerHTML = '';

           }
        }
    })
}

const quality_ul = document.querySelector('#qualities ul');
const qualities_size = document.querySelectorAll("source[size]");



qualities_size.forEach(event=>{
    let quality_html = `<li data-quality="${event.getAttribute('size')}">${event.getAttribute('size')}p</li>`;
    
    quality_ul.insertAdjacentHTML('afterbegin',quality_html);
})
const quality_li = document.querySelectorAll("#qualities ul li");
  

quality_li.forEach((event)=>{
    event.addEventListener('click',(e)=>{
        let quality = e.target.getAttribute('data-quality');
        removeActiveClasses(quality_li);
        event.classList.add('active');
        qualities_size.forEach(event=>{
            if (event.getAttribute('size') == quality) {
                let video_current_duration = main_video.currentTime;
                let video_source = event.getAttribute('src');
                main_video.src = video_source;
                main_video.currentTime = video_current_duration;
                playVideo();
            }
          })

     

    })
  })
  