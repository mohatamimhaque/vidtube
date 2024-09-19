var video_player = document.querySelector('#video_wrapper #video_player');
var video_status = document.querySelector('#video_wrapper #video_status');
var main_video = document.querySelector('#video_wrapper #main_video');
var progressAreaTime = document.querySelector('#video_wrapper .progressAreaTime');
var controls = document.querySelector('#video_wrapper .controls');
var progress_area = document.querySelector('#video_wrapper .progress_area');
var s_progress_area = document.querySelector('#video_wrapper .s_progress_area');
var progress_bar = document.querySelector('#video_wrapper .progress_bar');
var s_progress_bar = document.querySelector('#video_wrapper .s_progress_bar');
var buffered_progress_bar = document.querySelector('#video_wrapper .buffered_progress_bar');
var fast_rewind = document.querySelector('#video_wrapper .fast_rewind');
var play_pause = document.querySelector('#video_wrapper .play_pause');
var play_pause2 = document.querySelector('#video_wrapper #video_status i');
var fast_forward = document.querySelector('#video_wrapper .fast_forward');
var volume = document.querySelector('#video_wrapper .volume');
var volume_range = document.querySelector('#video_wrapper #volume_range');
var current = document.querySelector('#video_wrapper .current');
var s_current = document.querySelector('#video_wrapper .s_current');
var duration = document.querySelector('#video_wrapper .duration');
var s_duration = document.querySelector('#video_wrapper .s_duration');
var auto_play = document.querySelector('#video_wrapper .auto_play');
var settingsBTn = document.querySelector('#video_wrapper .settingsBTn');
var captionBTn = document.querySelector('#video_wrapper .captionBTn');
var picture_in_picture = document.querySelector('#video_wrapper .picture_in_picture');
var fullscreen = document.querySelector('#video_wrapper .fullscreen');
var settingHome = document.querySelectorAll('#video_wrapper [data-label="settingHome"] > ul >li');
var settings = document.querySelector('#video_wrapper #settings');
var captions = document.querySelector('#video_wrapper #captions');
var caption_labels = document.querySelector('#video_wrapper .caption ul');
var playback = document.querySelectorAll('#video_wrapper .playback li');
var thumbnail = document.querySelector('#video_wrapper #thumbnail');
var tracks = document.querySelectorAll('#video_wrapper track');
var spinner = document.querySelector('#video_wrapper #spinner');
var img_container = document.querySelector('#video_wrapper .img-container');
var scrubbing_position = document.querySelector('#video_wrapper .scrubbing_position');
var scrubbing_move = document.querySelector('#video_wrapper .scribbing_move');
var fine_scrubbing = document.querySelector('#video_wrapper .fine_scrubbing');
var scrubbing_timer = document.querySelector('#video_wrapper .scrubbing_timer');
var scrubbing_wrapper = document.querySelector('#video_wrapper .scrubbing_wrapper');
var loop = document.querySelector('#loop');
var video_overlay_img = document.querySelector('.video_overlay_img');
var scrubbing_movePosition = scrubbing_position.getBoundingClientRect().left - scrubbing_move.getBoundingClientRect().left;
fine_scrubbing.style.marginLeft = `${scrubbing_movePosition}px`;


var item = fine_scrubbing.querySelectorAll('.item');
var y, z;
var w = 1;
var x = 0;
if (tracks.length !== 0) {
    caption_labels.insertAdjacentHTML('afterbegin', `<li data-track="off" class='active'>OFF</li>`)

    for (let i = 0; i < tracks.length; i++) {
        var trackli = `<li data-track="${tracks[i].label}">${tracks[i].label}</li>`;
        caption_labels.insertAdjacentHTML('beforeend', trackli)
    }
}

$('.timer,.scrubbing_timer').click(function() {
    $(".timer").toggleClass('reverse');
})

let duratio = main_video.duration;
const video = document.createElement('video');
video.src = main_video.src;
video.addEventListener('loadedmetadata', function() {
    const randomTime = Math.random() * 100;
    video.currentTime = 5;
});

video.addEventListener('seeked', function() {
    const canvas = document.createElement('canvas');
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;

    const context = canvas.getContext('2d');
    context.drawImage(video, 0, 0, canvas.width, canvas.height);

    const dataURL = canvas.toDataURL('image/png');
    //video_overlay_img.src = dataURL;
});




var caption = document.querySelectorAll('#video_wrapper #captions ul li')



main_video.addEventListener('loadeddata', () => {
    setInterval(() => {
        let bufferedTime = main_video.buffered.end(0);
        let duration = main_video.duration;
        let width = (bufferedTime / duration) * 100;
        buffered_progress_bar.style.width = `${width}%`

    }, 500);
})




playVideo();
//paly video function
function playVideo() {
    play_pause.innerHTML = "pause";
    play_pause2.innerHTML = "pause";
    play_pause.title = "pause(k)";
    main_video.play();
    video_player.classList.remove('paused');
    document.querySelector('#video_wrapper #video_overlay').style.display = 'none';
    $('#video_wrapper #video_status div').addClass('active');
    setTimeout(function() {
        $('#video_wrapper #video_status div').removeClass('active');
    }, 1000);

}

function pauseVideo() {
    play_pause.innerHTML = "play_arrow";
    play_pause2.innerHTML = "play_arrow";
    play_pause.title = "play(k)";
    video_player.classList.add('paused');
    main_video.pause();
    $('#video_wrapper #video_status div').addClass('active');
    setTimeout(function() {
        $('#video_wrapper #video_status div').removeClass('active');
    }, 1000);
}
play_pause.addEventListener('click', () => {
    var isVideoPaused = video_player.classList.contains('paused');
    isVideoPaused ? playVideo() : pauseVideo();
})
video_status.addEventListener('click', () => {
    var isVideoPaused = video_player.classList.contains('paused');
    isVideoPaused ? playVideo() : pauseVideo();
})
main_video.addEventListener('play', () => {
    playVideo();
})
main_video.addEventListener('pause', () => {
    pauseVideo();
})



//fast_rewind video function
fast_rewind.addEventListener('click', () => {
    main_video.currentTime -= 10;
    document.querySelector('.duration_rewind.first').classList.add('active');
    setTimeout(function() {
        document.querySelector('.duration_rewind.first').classList.remove('active');
    }, 1000);
})



//fast_forward video function
fast_forward.addEventListener('click', () => {
    main_video.currentTime += 10;
    document.querySelector('.duration_rewind.first').classList.add('active');
    setTimeout(function() {
        document.querySelector('.duration_rewind.second').classList.remove('active');
    }, 1000);
})


//load video duration
main_video.addEventListener('loadedmetadata', (e) => {
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
        s_duration.innerHTML = `${totalhour}:${totalMin}:${totalSec}`;
    } else {
        duration.innerHTML = `${totalMin} : ${totalSec}`;
        s_duration.innerHTML = `${totalMin} : ${totalSec}`;
    }

})



//current video duration
var currentVideoTime;
main_video.addEventListener('timeupdate', (e) => {
    if ($('.timer').hasClass('reverse')) {
        currentVideoTime = e.target.duration - e.target.currentTime;
    } else {
        currentVideoTime = e.target.currentTime;
    }
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
        s_current.innerHTML = `${currenthour}:${currentMin}:${currentSec}`;
    } else {
        current.innerHTML = `${currentMin} : ${currentSec}`;
        s_current.innerHTML = `${currentMin} : ${currentSec}`;
    }

    //progressbar width change
    let videoDuration = e.target.duration;
    let progressWidth = (e.target.currentTime / videoDuration);
    progress_bar.style.width = `${progressWidth * 100}%`;
    s_progress_bar.style.width = `${progressWidth * 100}%`;


    let m = item.length * item[0].clientWidth;
    let ml = scrubbing_position.getBoundingClientRect().left - scrubbing_move.getBoundingClientRect().left;

    w = progressWidth * m;
    fine_scrubbing.style.marginLeft = `${ml-w}px`;

})

//let update playing video current time on according to the progress bar width
progress_area.addEventListener('click', (e) => {
    let videoDuration = main_video.duration;
    let progresswidthval = progress_area.clientWidth;
    let ClickOffsetX = e.offsetX;
    main_video.currentTime = (ClickOffsetX / progresswidthval) * videoDuration;




})

main_video.addEventListener('waiting', () => {
    spinner.style.display = 'block';
})
main_video.addEventListener('canplay', () => {
    spinner.style.display = 'none';
})




progress_area.addEventListener("pointerdown", (e) => {
    progress_area.setPointerCapture(e.pointerId);
    setTimelinePosition(e);
    progress_area.addEventListener("pointermove", setTimelinePosition);
    progress_area.addEventListener("pointerup", () => {
        progress_area.removeEventListener("pointermove", setTimelinePosition);
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

    if (currenthour >= 1) {
        progressAreaTime.innerHTML = `${currenthour}:${currentMin}:${currentSec}`;
    } else {
        progressAreaTime.innerHTML = `${currentMin} : ${currentSec}`;
    }


}




//change_volume
volume_range.value = `${main_video.volume * 100}`;

function changeVolume() {
    let value = volume_range.value;
    main_video.volume = value / 100;
    if (value == 0) {
        volume.innerHTML = 'volume_off';
    } else if (value < 50) {
        volume.innerHTML = 'volume_down';
    } else {
        volume.innerHTML = 'volume_up';
    }

}
volume_range.addEventListener('change', () => {
    changeVolume()
})


function muteVolume() {
    let value = volume_range.value;
    if (value == 0) {
        volume_range.value = 80;
        main_video.volume = 0.8;
        volume.innerHTML = 'volume_up';
    } else {
        volume_range.value = 0;
        volume.innerHTML = 'volume_off';
        main_video.volume = 0;
    }
}

volume.addEventListener('click', () => {
    muteVolume()
})



//update progress area time and display block on mouse move 
progress_area.addEventListener('mousemove', (e) => {
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

    if (currenthour >= 1) {
        progressAreaTime.innerHTML = `${currenthour}:${currentMin}:${currentSec}`;
    } else {
        progressAreaTime.innerHTML = `${currentMin} : ${currentSec}`;
    }

    if (x >= progresswidthval - 80) {
        x = progresswidthval - 80;
    } else if (x <= 75) {
        x = 75;
    } else {
        x = e.offsetX;
    }

    progressAreaTime.style.setProperty('--x', `${x}px`);
    progressAreaTime.style.display = 'block';

})




progress_area.addEventListener('mouseleave', () => {
    progressAreaTime.style.display = 'none';
})




//autoplay



// picture in picture
let userAgent = navigator.userAgent;

if (userAgent.match(/firefox|fxios/i)) {
    picture_in_picture.style.display = 'none'
}


picture_in_picture.addEventListener('click', () => {
    main_video.requestPictureInPicture();
})

fullscreen.addEventListener('click', () => {
    fullScreen();
})

function fullScreen() {
    if (!video_player.classList.contains('openfullScreen')) {
        video_player.classList.add('openfullScreen');
        fullscreen.innerHTML = 'fullscreen_exit';
        video_player.requestFullscreen();
    } else {
        video_player.classList.remove('openfullScreen');
        fullscreen.innerHTML = 'fullscreen';
        document.exitFullscreen();
    }
}
captionBTn.addEventListener('click', () => {
    captionBTn.classList.toggle('active');
    captions.classList.toggle('active');
    if (settings.classList.contains('active')) {
        settings.classList.toggle('active');
    }
})



function removeActiveClasses(e) {
    e.forEach((event) => {
        event.classList.remove('active')
    })

}

caption.forEach(event => {
    event.addEventListener('click', () => {
        removeActiveClasses(caption);
        event.classList.add('active');
        changeCaption(event)
    })
})

var ttrack = main_video.textTracks;


function changeCaption(label) {
    let trackable = label.getAttribute('data-track')
    for (let i = 0; i < ttrack.length; i++) {
        ttrack[i].mode = 'disabled';
        if (ttrack[i].label == trackable) {
            ttrack[i].mode = 'showing';
        }
    }
}
let caption_text = document.querySelector('#video_wrapper #video_player .caption_text');
for (let i = 0; i < ttrack.length; i++) {
    ttrack[i].addEventListener('cuechange', () => {

        if (ttrack[i].mode === 'showing') {
            if (ttrack[i].activeCues[0]) {
                caption_text.classList.add('active');
                let span = `<span><mark>${ttrack[i].activeCues[0].text}</mark> </span>`;
                caption_text.innerHTML = span;
            } else {
                caption_text.classList.remove('active');
                caption_text.innerHTML = '';

            }
        }
    })
}

settingsBTn.addEventListener('click', () => {
    settingsBTn.classList.toggle('active');
    settings.classList.toggle('active');
    if (captions.classList.contains('active')) {
        captions.classList.toggle('active');
    }
})




playback.forEach(event => {
    event.addEventListener('click', () => {
        removeActiveClasses(playback);
        event.classList.add('active');
        let speed = event.getAttribute('data-speed');
        main_video.playbackRate = speed;
        settingsBTn.classList.toggle('active');
        settings.classList.toggle('active');
    })
})


const settingDivs = document.querySelectorAll('#video_wrapper #settings .parent');
const settingBack = document.querySelectorAll('#video_wrapper #settings .back_setting');
const quality_ul = document.querySelector("#video_wrapper #settings > [data-label='quality'] ul");
const qualities = document.querySelectorAll("source[size]");



qualities.forEach(event => {
    let quality_html = `<li data-quality="${event.getAttribute('size')}">${event.getAttribute('size')}p</li>`;
    quality_ul.insertAdjacentHTML('afterbegin', quality_html);
})
const quality_li = document.querySelectorAll("#video_wrapper #settings > [data-label='quality'] ul li");



quality_li.forEach((event) => {
    event.addEventListener('click', (e) => {
        let quality = e.target.getAttribute('data-quality');
        removeActiveClasses(quality_li);
        event.classList.add('active');
        qualities.forEach(event => {
            if (event.getAttribute('size') == quality) {
                let video_current_duration = main_video.currentTime;
                let video_source = event.getAttribute('src');
                main_video.src = video_source;
                main_video.currentTime = video_current_duration;
                playVideo();
            }
        })
        settingsBTn.classList.toggle('active');
        settings.classList.toggle('active');


    })
})
settingBack.forEach((event) => {
    event.addEventListener('click', (e) => {
        let setting_label = e.target.getAttribute('data-label');
        for (let i = 0; i < settingDivs.length; i++) {
            if (settingDivs[i].getAttribute('data-label') == setting_label) {
                settingDivs[i].removeAttribute('hidden');
            } else {
                settingDivs[i].setAttribute('hidden', "");
            }
        }
    })
})

settingHome.forEach((event) => {
    event.addEventListener('click', (e) => {
        let setting_label = e.target.getAttribute('data-label');
        for (let i = 0; i < settingDivs.length; i++) {
            if (settingDivs[i].getAttribute('data-label') == setting_label) {
                settingDivs[i].removeAttribute('hidden');
            } else {
                settingDivs[i].setAttribute('hidden', "");
            }
        }
    })
})


function removeActiveDiv(e) {
    e.forEach((event) => {
        event.setAttribute("hidden", '');
    });
}

//store video duration and video path in local storage
window.addEventListener('unload', () => {
    let setDuration = localStorage.setItem('duration', `${main_video.currentTime}`);
    let setSrc = localStorage.setItem('src', `${main_video.getAttribute('src')}`);
})

/*
window.addEventListener('load',()=>{
let getDuration = localStorage.getItem('duration');
let getSrc = localStorage.getItem('src');
if(getSrc){
    main_video.src = getSrc;
    main_video.currentTime = getDuration;
    
}

})
*/

main_video.addEventListener('contexmenu', (e) => {
    e.preventDefault()
})

//mousemove

video_player.addEventListener('mouseover', () => {
    controls.classList.add('active');
})
video_player.addEventListener('mouseleave', () => {
    controls.classList.remove('active');
})
/*
$(this).keypress(function(event) {
if (event.keyCode == 75) {
    var isVideoPaused = video_player.classList.contains('paused');
    isVideoPaused ? playVideo() : pauseVideo();
}
else if(event.keyCode == 107) {
    var isVideoPaused = video_player.classList.contains('paused');
    isVideoPaused ? playVideo() : pauseVideo();
}
else if (event.keyCode == 105) {
    main_video.requestPictureInPicture();
}
else if (event.keyCode == 102) {
    fullScreen();
}
else if (event.keyCode == 109) {
    muteVolume();
}
})

*/
window.addEventListener('keydown', function(e) {
    let key = e.key;
    if (key == 'm' || key == 'M') {
        muteVolume();
    } else if (key == 'f' || key == "F") {
        fullScreen();
    } else if (key == 'i' || key == "I") {
        main_video.requestPictureInPicture();
    } else if (key == 'k' || key == "K") {
        var isVideoPaused = video_player.classList.contains('paused');
        isVideoPaused ? playVideo() : pauseVideo();
    } else if (key == ' ') {
        var isVideoPaused = video_player.classList.contains('paused');
        isVideoPaused ? playVideo() : pauseVideo();
    } else if (key == 0) {
        main_video.currentTime = 0;
    } else if (key == 'ArrowRight') {
        main_video.currentTime += 10;
        //alert('ok');
        $('#video_wrapper .duration_rewind.second').addClass('active');
        setTimeout(function() {
            $('#video_wrapper .duration_rewind.second').removeClass('active');
        }, 1500);
    } else if (key == 'ArrowLeft') {
        main_video.currentTime -= 10;
        //alert('ok');

        $('#video_wrapper .duration_rewind.first').addClass('active');
        setTimeout(function() {
            $('#video_wrapper .duration_rewind.first').removeClass('active');
        }, 1500);
    } else if (key == 'ArrowDown') {
        let v = parseInt(volume_range.value);
        if (v >= 6) {
            v -= 5;
        } else if (v <= 5 && v > 0) {
            v = 0;
        } else {
            v = v;
        }
        //volume_range.value = `${main_video.volume * 100}`;
        volume_range.value = `${v}`;
        changeVolume();


        v = v < 10 ? '0' + v : v;
        $('#video_wrapper .volume_percentage').html(`${v}%`)
        $('#video_wrapper .volume_level').addClass('active');
        setTimeout(function() {
            $('#video_wrapper .volume_level').removeClass('active');
        }, 1000);


    } else if (key == 'ArrowUp') {
        let v = parseInt(volume_range.value);
        if (v < 96) {
            v += 5;
        } else if (v >= 96 && v < 100) {
            v = 100;
        } else {
            v = v;
        }
        //volume_range.value = `${main_video.volume * 100}`;
        volume_range.value = `${v}`;
        changeVolume();



        v = v < 10 ? '0' + v : v;
        $('#video_wrapper .volume_percentage').html(`${v}%`)
        $('#video_wrapper .volume_level').addClass('active');
        setTimeout(function() {
            $('#video_wrapper .volume_level').removeClass('active');
        }, 1000);
    }


    //alert(key)

}, false)




/*






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

*/
let h_first;
s_progress_area.addEventListener("mousedown", (e) => {
    h_first = e.offsetY;
    img_container.addEventListener("mousemove", scrubbing_hidder);
    img_container.addEventListener("mouseleave", () => {
        img_container.removeEventListener("mousemove", scrubbing_hidder);
    })
});

function scrubbing_hidder(e) {
    if (e.offsetY - h_first > 5) {
        scrubbing_wrapper.classList.remove("active");
        scrubbing_timer.classList.remove("active");
        img_container.removeEventListener("mousemove", scrubbing_hidder);
    }
}


let s_first;
controls.addEventListener("mousemove", (e) => {
    s_first = controls.getBoundingClientRect().bottom;
    if (s_first - e.pageY < 10) {
        controls.style.cursor = "row-resize";
    } else {
        controls.style.cursor = "auto";
    }
})




let startY = 0;
let endY = 0;
let threshold = 50;
video_player.addEventListener('mousedown', function(e) {
    startY = e.clientY;
});

video_player.addEventListener('mousemove', function(e) {
    endY = e.clientY;
});

video_player.addEventListener('mouseup', function() {
    if (startY - endY > threshold) {
        scrubbing_wrapper.classList.add("active");
        scrubbing_timer.classList.add("active");
        pauseVideo();
        startY = 0;
        endY = 0;
    }

});
startY = 0;
endY = 0;
let isDragging = false;

video_player.addEventListener('mousedown', function(e) {
    startY = e.clientY;
    isDragging = true;
}, false);

video_player.addEventListener('mousemove', function(e) {
    if (isDragging) {
        endY = e.clientY;
    }
}, false);

video_player.addEventListener('mouseup', function(e) {
    if (isDragging) {
        if (endY > startY) {
            scrubbing_wrapper.classList.remove("active");
            scrubbing_timer.classList.remove("active");
            playVideo()
        }
        startY = 0;
        endY = 0;
        isDragging = false;
    }
}, false);




/*

    controls.addEventListener("mousedown", (e) => {
    if(s_first-e.pageY < 10){
        controls.addEventListener("mousemove",scrubbing_shower);
        scrubbing_shower(e);
    }
    controls.addEventListener("mouseleave",()=>{
        controls.removeEventListener("mousemove",scrubbing_shower);
    })
    });

    function scrubbing_shower(e){
    if(s_first- e.pageY > 2){
        scrubbing_wrapper.classList.add("active");
        scrubbing_timer.classList.add("active");
        controls.removeEventListener("mousemove",scrubbing_shower);
    }
    }
//**/




scrubbing_move.addEventListener("pointerdown", (e) => {
    x = e.offsetX;
    scrubbing_move.addEventListener("pointermove", scrubbing);
    scrubbing_move.addEventListener("pointerup", () => {
        scrubbing_move.removeEventListener("pointermove", scrubbing);
    })

})

function scrubbing(e) {
    y = e.offsetX;
    z = x - y;
    x = y;
    let m = item.length * item[0].clientWidth;
    let n = z / scrubbing_move.clientWidth
    let ml = scrubbing_position.getBoundingClientRect().left - scrubbing_move.getBoundingClientRect().left;
    if (w > 0 && w < m) {
        w += m * n;
        fine_scrubbing.style.marginLeft = `${ml-w}px`;
        main_video.currentTime = (w / m) * main_video.duration;
    } else if (w < 0) {
        w = 1;
    } else if (w > m) {
        w = m - 50;
    }
}
$("#moment p").click(function(e) {
    let val = parseInt($(this).closest('li').find('.time').val());
    document.querySelector('#video_wrapper #main_video').currentTime = val;
});

/** */

$(document).ready(function() {
    $("#video_player").on('contextmenu', function(e) {
        e.preventDefault();
        $('#custom_dialog').css({
            top: e.clientY - 30,
            left: e.clientX - 50
        }).show();
    });

    $(document).on('click', function() {
        $('#custom_dialog').hide();
    });

    $('#custom_dialog').on('click', function(e) {
        e.stopPropagation();
    });

    $('.close_dialog').on('click', function() {
        $('#custom_dialog').hide();
    });
    $('#custom_dialog li').on('click', function() {
        $('#custom_dialog').hide();
    })




});





$(function() {
    $("#playlist").on("click", function(e) {
        $(".overlay-app").addClass("is-active");
        $(".pop-up").addClass("visible");

    });
    $(".pop-up .close").click(function() {
        $(".overlay-app").removeClass("is-active");
        $(".pop-up").removeClass("visible");
        $('.pop-up.videopage .pop-footer button.add').addClass('visible');
        $('.pop-up.videopage .pop-footer .form').removeClass('visible');

    });
    $(".pop-up.videopage .pop-footer button.add").click(function() {
        $('.pop-up.videopage .pop-footer button.add').removeClass('visible');
        $('.pop-up.videopage .pop-footer .form').addClass('visible');

    });



})
$(document).ready(function() {
    var videoID = $('#unique_id').val();

    function setCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }

    $(document).ready(function() {
        var video = $("#main_video")[0];
        var savedTime = getCookie(videoID + "_time");
        if (savedTime !== null) {
            video.currentTime = parseFloat(savedTime);
        }
        video.addEventListener("timeupdate", function() {
            setCookie(videoID + "_time", video.currentTime, 7);
        });
        video.addEventListener("ended", function() {
            setCookie(videoID + "_time", "", -1);
            if (getCookie("loop")) {
                playVideo();
            } else {
                if (getCookie("autoplay")) {
                    window.location.href = $(".sidebar a:first-child").attr("href");
                }
            }
        });

        var url = window.location.href;
        var timeMatch = url.match(/&t=(\d+)/);
        if (timeMatch && timeMatch[1]) {
            var timeValue = parseInt(timeMatch[1]);
            $('#main_video')[0].currentTime = timeValue;
            var newUrl = url.replace(/&t=\d+/g, '');
            window.history.replaceState({}, document.title, newUrl);
        }

        $('.auto_play').on('click', function() {
            $(this).toggleClass('active');
            if ($(this).hasClass('active')) {
                $(this).attr('title', 'Autoplay is on');
                setCookie("autoplay", 1, 7);
            } else {
                $(this).attr('title', 'Autoplay is off');
                setCookie("autoplay", 0, 7);
            }
        });
        if (getCookie("autoplay")) {
            $('.auto_play').attr('title', 'Autoplay is on');
            $('.auto_play').toggleClass('active');
        };

        $('#custom_dialog li#loop').on('click', function() {
            $(this).toggleClass('active');
            if ($(this).hasClass('active')) {
                setCookie("loop", 1, 7);
            } else {
                setCookie("loop", 0, 7);
            }
        });
        if (getCookie("loop")) {
            $('#custom_dialog li#loop').toggleClass('active');
        };
        $("#volume_range").on('input change', function() {
            const volumeValue = $(this).val();
            setCookie("volume", volumeValue, 7);
        });
        if (getCookie("volume")) {
            $("#volume_range").val(parseInt(getCookie("volume")))
             $("#main_video").prop("volume", parseInt(getCookie("volume")) / 100);
        };



       $(function() {
            var vid_id = $('#unique_id').val();
            function generateSCPN() {
                const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                let scpn = '';
                for (let i = 0; i < 16; i++) {
                    const randomIndex = Math.floor(Math.random() * characters.length);
                    scpn += characters[randomIndex];
                }
                return scpn;
            }
            function formatSCPN(scpn) {
                return scpn.match(/.{1,4}/g).join(' ');
            }
            const scpn = generateSCPN();
            const formattedSCPN = formatSCPN(scpn);
            $('#scpn').text(`${vid_id} / ${formattedSCPN}`);
 
            function updateViewportAndFrames() {
                const viewportWidth = video.videoWidth;
                const viewportHeight = video.videoHeight;
                const videoQuality = video.getVideoPlaybackQuality();
                const totalFrames = videoQuality.totalVideoFrames;
                const droppedFrames = videoQuality.droppedVideoFrames;
                $('#viewport').text(`${viewportWidth} x ${viewportHeight} / ${droppedFrames} dropped of ${totalFrames}`);
            }
            function getFrameRate(callback) {
                let lastTime = 0;
                const calculateFrameRate = (now, metadata) => {
                    if (lastTime) {
                        const frameTime = now - lastTime;
                        const frameRate = 1000 / frameTime;
                        callback(parseInt(frameRate)); 
                    }
                    lastTime = now;
                   
                    video.requestVideoFrameCallback(calculateFrameRate);
                };
                video.requestVideoFrameCallback(calculateFrameRate);
            }
            function updateResolution() {
                const optimal_res = `${video.videoWidth} x ${video.videoHeight}@25`;
                const currentWidth = video.videoWidth;
                const currentHeight = video.videoHeight;
                const currentRes = `${currentWidth} x ${currentHeight}`;
            
                getFrameRate((frameRate) => {
                    $('#currentRes').text(`${currentRes}@${frameRate} / ${optimal_res}`);
                });
            } 

            function updateVolumeInfo() {
                const audioContext = new (window.AudioContext || window.webkitAudioContext)();
                const analyser = audioContext.createAnalyser();
                const source = audioContext.createMediaElementSource(video);
                source.connect(analyser);
                analyser.connect(audioContext.destination);
    
                analyser.fftSize = 2048;
                const bufferLength = analyser.frequencyBinCount;
                const dataArray = new Uint8Array(bufferLength);
    
                function getVolumeAndLoudness() {
                    analyser.getByteFrequencyData(dataArray);
    
                    let sum = 0;
                    for (let i = 0; i < bufferLength; i++) {
                        sum += dataArray[i];
                    }
    
                    const average = sum / bufferLength;
                    const normalizedVolume = parseInt((video.volume) * 100);
                    const loudness = 20 * Math.log10(average / 128 + 0.01);
                    $('#volumeInfo').text(`Volume: ${normalizedVolume}% / (content loudness: ${-loudness.toFixed(2)} dB)`);
                }
                getVolumeAndLoudness()
                video.addEventListener('canplay', function() {
                    setInterval(getVolumeAndLoudness, 1000); 
;                });
            }
            updateVolumeInfo();

            var canvas = document.createElement('canvas');
            var context = canvas.getContext('2d');
            canvas.width = 400;
            canvas.height = 300;
            function rgbToHex(r, g, b) {
                r = Math.max(0, Math.min(255, r));
                g = Math.max(0, Math.min(255, g));
                b = Math.max(0, Math.min(255, b));
                
                var toHex = function(n) {
                  var hex = n.toString(16);
                  return hex.length === 1 ? '0' + hex : hex;
                };
      
                // Return the HEX color code
                return '#' + toHex(r) + toHex(g) + toHex(b);
              }
            function color(){
                function getColorFromVideo() {
                if (video.paused || video.ended) return;
        
                context.drawImage(video, 0, 0, canvas.width, canvas.height);
                
                var frameData = context.getImageData(0, 0, canvas.width, canvas.height);
                var data = frameData.data;
                
                var r = 0, g = 0, b = 0;
                var totalPixels = data.length / 4;
                
                for (var i = 0; i < data.length; i += 4) {
                    r += data[i];
                    g += data[i + 1];
                    b += data[i + 2];
                }
                
                r = Math.floor(r / totalPixels);
                g = Math.floor(g / totalPixels);
                b = Math.floor(b / totalPixels);
                
                $("#color").text(rgbToHex(r,g,b));
        
                setTimeout(getColorFromVideo, 1000);
                }
                getColorFromVideo();
            
            }
            function connection_speed() {
                if ('connection' in navigator) {
                  var connection = navigator.connection || navigator.mozConnection || navigator.webkitConnection;
                  var downlink = connection.downlink || 'unknown';
                  var downlinkKbps = (typeof downlink === 'number') ? (downlink * 1000).toFixed(2) : 'unknown';
                  $('#networkInfo').text(downlinkKbps + ' kbps');
                } else {
                  $('#networkInfo').text('Network Information API not supported in this browser.');
                }
              }

              
              function updateDateTime() {
                var now = new Date();
                var options = { 
                  weekday: 'short', 
                  year: 'numeric', 
                  month: 'short', 
                  day: 'numeric', 
                  hour: '2-digit', 
                  minute: '2-digit', 
                  second: '2-digit', 
                  timeZoneName: 'short' 
                };
                var formattedDate = now.toLocaleString('en-US', options);
                $('#datetime').text(formattedDate);
              }
          
              updateDateTime();
              function generateMysteryText() {
                var s = Math.floor(Math.random() * 100);
                var six = Math.random() * 100;
                var P = Math.random() * 100;
                var pbs = Math.floor(Math.random() * 1000);
                video.addEventListener("timeupdate", function() {
                    var t =video.currentTime;
                    var mysteryText = "Mystery Text s:" + s + " t:" + t.toFixed(2) +  "-" + (six + 0.001).toFixed(3) + " P pbs:" + pbs;
                    $("#mysteryBox").text(mysteryText);
                })
            }
            function getBufferHealth() {
                var buffered = video.buffered;
                var totalBufferedSeconds = 0;
          
                for (var i = 0; i < buffered.length; i++) {
                  var start = buffered.start(i);
                  var end = buffered.end(i);
                  totalBufferedSeconds += end - start;
                }
          
                 $('#buffer_health').text((totalBufferedSeconds-video.currentTime).toFixed(2)+'s');
              }
          
            
        
        

            video.addEventListener("loadedmetadata", function() {
                updateViewportAndFrames();
                updateResolution();
                color();
                connection_speed();
                updateDateTime();
                generateMysteryText();
                setInterval(()=>{
                    updateViewportAndFrames();
                    updateResolution();
                    connection_speed();
                    updateDateTime();
                    getBufferHealth()
                }, 1000);
            });

            $('.close_state').on('click', function() {
                $("#state").removeClass("visible");
            })
            $('#nerds').on('click', function() {
                $("#state").addClass("visible");
            })

            

       })
    });

})