

    const element = document.querySelector('.video_wrapper');
    const height = window.screen.height;
    const thumbnail_img = element.querySelector('.video_overlay img');
    const main_video = element.querySelector('.main_video');
    const sc_control = element.querySelector('.sc-control');
    const thumbnail = element.querySelector('.thumbnail');
    const play_pause = element.querySelector('.play_arrow .material-icons');
    const mobile_progress_area = element.querySelector('.mobile_progress_area');
    const video_title = document.querySelector('.info.main .video-title');


    const video_player = element.querySelector('.video_player');
    const timer = element.querySelector('.timer');
    const control_bottom = element.querySelector('.control_bottom');
    const controls = control_bottom;
    const control_top = element.querySelector('.contorl-top');
    const video_overlay = element.querySelector('.video_overlay');
    const bufferedBar = element.querySelector('.bufferedBar');
    const progress_bar = element.querySelector('.progress_bar');
    const video_status = element.querySelector('.video_status');

    const doubleTap_rewind = element.querySelector('.doubleTap_rewind');
    const right = element.querySelector('.rewind.right');
    const left = element.querySelector('.rewind.left');
    const spinner = element.querySelector('.spinner');

    const current = element.querySelector('.current');
    const duration = element.querySelector('.duration');
    const progress_area = element.querySelector('.progress_area');
    const progressAreaTime = element.querySelector('.progressAreaTime');
    const progressAreaText = element.querySelector('.progressAreaTime p');
    const picture_in_picture = element.querySelector('.picture_in_picture');
    const fullscreen = element.querySelector('.fullscreen');
    var settingsBTn = document.querySelector('.video_wrapper #settingsBTn');
    var captionBTn = document.querySelector('.video_wrapper #captionBTn');
    var settings = document.querySelector('#settings');
    var quality = document.querySelector('#quality');
    var subtitles_btn = document.querySelector('#subtitles_btn');
    var playback_speed = document.querySelector('#playback_speed');
    var qualities = document.querySelector('#qualities');
    var playback = document.querySelector('#playback');
    var playback_list = document.querySelectorAll('#playback li');
    var subtitles = document.querySelector('#subtitles');
    var tracks = document.querySelectorAll('.video_wrapper track');
    var caption_labels = document.querySelector('#subtitles ul');

    var s_progress_area = document.querySelector('.video_wrapper .s_progress_area');
    var s_current = document.querySelector('.video_wrapper .s_current');
    var s_duration = document.querySelector('.video_wrapper .s_duration');
    var s_progress_bar = document.querySelector('.video_wrapper .s_progress_bar');
    var img_container = document.querySelector('.video_wrapper .img-container');
    var scrubbing_position = document.querySelector('.video_wrapper .scrubbing_position');
    var scrubbing_move = document.querySelector('.video_wrapper .scrubbing_move');
    var fine_scrubbing = document.querySelector('.video_wrapper .fine_scrubbing');
    var scrubbing_timer = document.querySelector('.video_wrapper .scrubbing_timer');
    var scrubbing_wrapper = document.querySelector('.video_wrapper .scrubbing_wrapper');
    var item = fine_scrubbing.querySelectorAll('.item');
    var scrubbing_movePosition = scrubbing_position.getBoundingClientRect().left - scrubbing_move.getBoundingClientRect().left;
    fine_scrubbing.style.marginLeft = `${scrubbing_movePosition}px`;
    var y, z;
    var w = 1;
    var x = 0;



    $('.timer,.scrubbing_timer').click(function() {
        $(".timer").toggleClass('reverse');
    })



    if (tracks.length !== 0) {
        caption_labels.insertAdjacentHTML('afterbegin', `<li data-track="off" class='active'>OFF</li>`)

        for (let i = 0; i < tracks.length; i++) {
            var trackli = `<li data-track="${tracks[i].label}">${tracks[i].label}</li>`;
            caption_labels.insertAdjacentHTML('beforeend', trackli)
        }
    }

    var subtitles_list = document.querySelectorAll('#subtitles ul li')
    playVideo();
    video_overlay.style.display = 'none';
    main_video.classList.add('running');

    function playVideo() {

        video_player.classList.remove('paused');
        play_pause.innerHTML = "pause";
        main_video.play();
        active();

    }
    function pauseVideo() {
        video_player.classList.add('paused');
        play_pause.innerHTML = "play_arrow";
        main_video.pause();
        setTimeout(function() {
            notActive()
        }, 3000)
    }
    //screen orientation lock landscape
    function landscape() {
        screen.orientation.lock('landscape');
    }
    let kk = video_title.textContent.trim();
    if (kk.length > 60) {
        video_title.textContent = kk.substring(0, 60) + "...";

    }


    //screen orientation lock portrait
    function portrait() {
        screen.orientation.lock('portrait')
    }

    //html specific tag fullscreen
    //goFullscreen(which tag need to fullscreen)
    function goFullscreen(elem) {
        if (elem.requestFullscreen) {
            elem.requestFullscreen();
        } else if (elem.mozRequestFullScreen) {
            elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullscreen) {
            elem.webkitRequestFullscreen();
        } else if (elem.msRequestFullscreen) {
            elem.msRequestFullscreen();
        }
    }



    let userAgent = navigator.userAgent;

    if (userAgent.match(/firefox|fxios/i)) {
        picture_in_picture.style.display = 'none'
    }
    picture_in_picture.addEventListener('click', () => {
        main_video.requestPictureInPicture();
        fullscreen.innerHTML = 'fullscreen';
        portrait();

        document.exitFullscreen();
    })
    fullscreen.addEventListener('click', () => {
        //window.orientation = 180

        fullScreen();
        document.exitPictureInPicture()

        //alert('')
    })

    function fullScreen() {
        if (!video_player.classList.contains('openfullScreen')) {
            video_player.classList.add('openfullScreen');
            fullscreen.innerHTML = 'fullscreen_exit';
            goFullscreen(video_player);
            landscape()

            // $('html').css('transform','rotate(90deg)')
        } else {
            video_player.classList.remove('openfullScreen');
            fullscreen.innerHTML = 'fullscreen';
            document.exitFullscreen();
            portrait();
            // Lock screen orientation to portrait mode


        }
    }


    function orientationChange() {
        window.addEventListener('orientationchange', () => {
            if (Math.abs(window.orientation) === 90) {
                goFullscreen(video_player)
            } else {
                document.exitFullscreen();
            }
        });
    }

    function autoOrientationChange(event) {
        if (Math.abs(window.orientation) === 90) {
            //console.log('jsjs')
            goFullscreen(video_player)
        } else {
            document.exitFullscreen();
        };
    }

/*

    main_video.addEventListener('play', () => {
        document.addEventListener("visibilitychange", function() {
            if (document.visibilityState === 'visible') {
                if (document.pictureInPictureEnabled) {
                    document.exitPictureInPicture();
                }
            } else {
                main_video.requestPictureInPicture();

            }
        })

        window.addEventListener('beforeunload', function(event) {
            event.preventDefault();

            main_video.requestPictureInPicture();
        });
        window.addEventListener('blur', () => {
            main_video.requestPictureInPicture();

        });

        window.addEventListener('orientationchange', autoOrientationChange);
        video_player.classList.add('played');
        video_overlay.style.display = 'none';

    })
        /**/ 


    main_video.addEventListener("pause", function() {
        window.removeEventListener('orientationchange', autoOrientationChange);

    });

    main_video.addEventListener('ended', () => {
        $('html, body').animate({
            scrollTop: '+=280px'
        }, 'slow');
    })
    video_overlay.addEventListener('click', () => {
        video_overlay.style.display = 'none';
        main_video.classList.add('running');
        playVideo();
    })
    play_pause.addEventListener('click', () => {
        let isVideoPaused = video_player.classList.contains('paused');
        isVideoPaused ? playVideo() : pauseVideo();
        main_video.classList.add('running');
        // console.log('play')
    })
    video_title.addEventListener('click', () => {
        playVideo();
        video_overlay.style.display = 'none';
    })
    video_player.addEventListener('mousemove', (e) => {
        const isVideoPaused = video_player.classList.contains('paused');
        isVideoPaused ? notActive() : active();
    })

    function active() {
        // alert()
        mobile_progress_area.classList.add('active');
        video_status.classList.add('active');
        sc_control.classList.add('active');
        control_top.classList.add('active');
        timer.classList.add('active');
        setTimeout(function() {
            mobile_progress_area.classList.remove('active');
            video_status.classList.remove('active');
            timer.classList.remove('active');
            sc_control.classList.remove('active');
            control_top.classList.remove('active');
        }, 4000);
    }
    notActive()

    function notActive() {
        mobile_progress_area.classList.add('active');
        video_status.classList.add('active');
        sc_control.classList.add('active');
        control_top.classList.add('active');
        timer.classList.add('active');
    }

    function noActive() {
        mobile_progress_area.classList.remove('active');
        video_status.classList.remove('active');
        sc_control.classList.remove('active');
        control_top.classList.remove('active');
        timer.classList.remove('active');
    }
    /**/




    main_video.addEventListener('waiting', () => {
        spinner.style.display = 'block';
        video_overlay.style.display = 'block';

    })
    main_video.addEventListener('canplay', () => {
        if (main_video.classList.contains('running')) {

            video_overlay.style.display = 'none';
        }
        spinner.style.display = 'none';
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
      
        current.innerHTML = timeFormat(currentVideoTime);
        s_current.innerHTML = timeFormat(currentVideoTime);

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

    progress_area.addEventListener('click', (e) => {
        let videoDuration = main_video.duration;
        let progresswidthval = progress_area.clientWidth;
        let ClickOffsetX = e.offsetX;
        main_video.currentTime = (ClickOffsetX / progresswidthval) * videoDuration;
        active()

    })


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
            progressAreaText.innerHTML = `${currenthour}:${currentMin}:${currentSec}`;
        } else {
            progressAreaText.innerHTML = `${currentMin} : ${currentSec}`;
        }
    }
    let isDragging = false;
    progress_area.addEventListener('touchstart', (e) => {
        e.stopPropagation();
        isDragging = true;
    });
    progress_area.addEventListener('touchmove', (e) => {
        e.stopPropagation();
        if (!isDragging) return;
        let x = e.touches[0].clientX;
        let progresswidthval = progress_area.clientWidth;
        let videoDuration = main_video.duration;
        let progressTime = Math.floor((x / progresswidthval) * videoDuration)

        let progressWidth = (x/progresswidthval );
        progress_bar.style.width = `${progressWidth * 100}%`;
        s_progress_bar.style.width = `${progressWidth * 100}%`;

        main_video.currentTime = progressTime;





        let currentSec = Math.floor(progressTime % 60);
        let currentMin = Math.floor(progressTime / 60);
        let currenthour = Math.floor(progressTime / 3600);
        currentMin = currentMin - currenthour * 60;

        currenthour < 10 ? currenthour = '0' + currenthour : currenthour;
        currentSec < 10 ? currentSec = '0' + currentSec : currentSec;
        currentMin < 10 ? currentMin = '0' + currentMin : currentMin;

        if (currenthour >= 1) {
            progressAreaText.innerHTML = `${currenthour}:${currentMin}:${currentSec}`;
        } else {
            progressAreaText.innerHTML = `${currentMin} : ${currentSec}`;
        }
        if (x >= progresswidthval - 50) {
            x = progresswidthval - 50;
        } else if (x <= 50) {
            x = 50;
        } else {
            x = x;
        }

        progressAreaTime.style.setProperty('--x', `${x+10}px`);
        thumbnail.style.setProperty('--x', `${x}px`);
        progressAreaTime.style.display = 'flex';
        /// thumbnail.style.display = 'flex';
        thumbnail.style.background = 'none';
        

    })
    progress_area.addEventListener('touchend', () => {
        isDragging = false;
        progressAreaTime.style.display = 'none';
        thumbnail.style.display = 'none';
    })

    function drawProgress(canvas, buffered, duration) {
        let context = canvas.getContext('2d', {
            antialias: false
        });
        context.fillStyle = "#fff";

        let height = canvas.height;
        let width = canvas.width;
        if (!height || !width) throw "Canva's width or height or not set.";
        context.clearRect(0, 0, width, height);
        for (let i = 0; i < buffered.length; i++) {
            let leadingEdge = buffered.start(i) / duration * width;
            let trailingEdge = buffered.end(i) / duration * width;
            context.fillRect(leadingEdge, 0, trailingEdge - leadingEdge, height)
        }
    }

    main_video.addEventListener('progress', () => {
        drawProgress(bufferedBar, main_video.buffered, main_video.duration);
    })

    video_player.addEventListener("touchstart", tapHandler);
    let tapedTwice = false;
    let tapToSeekLeft = 0;
    let tapToSeekRight = 0;

    function tapHandler(event) {
        if (!tapedTwice) {
            tapedTwice = true;
            setTimeout(function() {
                tapedTwice = false;
            }, 300);
            return false;

        }
        if (tapedTwice == true) {
            noActive()
        }
        // let tapToSeek = parseInt($('.doubleTapSeek button').val());
        let tapToSeek = 10
        let x = 0;
        let y = 0;
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
        let z = video_player.clientWidth;

        let isplayed = video_player.classList.contains('played');
        if (isplayed === true) {
            doubleTap_rewind.classList.add('active');
            if (z / 2 > x) {
                tapToSeekLeft += tapToSeek;
                main_video.currentTime -= tapToSeek;
                left.style.display = 'block';
                $('.rewind.left p').html(tapToSeekLeft + ' seconds')
                setTimeout(function() {
                    left.style.display = 'none';
                    tapToSeekLeft = 0;
                }, 900)
            } else {
                tapToSeekRight += tapToSeek;
                main_video.currentTime += tapToSeek;
                $('.rewind.right p').html(tapToSeekRight + ' seconds')
                right.style.display = 'block';
                setTimeout(function() {
                    right.style.display = 'none';
                    tapToSeekRight = 0;
                }, 900)
            }
            setTimeout(function() {

                doubleTap_rewind.classList.remove('active');

            }, 900)

        }
        // video_player.addEventListener('touchstart', touchHandler, false);
        //  video_player.addEventListener('touchmove', touchHandler, false);
        //  video_player.addEventListener('touchend', touchHandler, false);
    }
    //auto playpasue
    main_video.addEventListener('play', () => {
        video_player.classList.add('played');
        video_overlay.style.display = 'none';
    })

    //thumbnail genrator
    main_video.addEventListener("loadeddata", () => {

        const canvas = document.createElement("canvas");
        // console.log(main_video.videoHeight);
        //  console.log(main_video.videoWidth)
        const thumbnailVideo = document.createElement("video");

        thumbnailVideo.src = main_video.src;
        // alert(thumbnailVideo.src)
        thumbnailVideo.currentTime = main_video.duration * 0.7;
        canvas.width = main_video.videoWidth;
        canvas.height = main_video.videoHeight;

        function thumbnailGenerator() {

            const ctx = canvas.getContext("2d");
            ctx.drawImage(thumbnailVideo, 0, 0, canvas.width, canvas.height);
            const dataURL = canvas.toDataURL();
            thumbnail_img.src = dataURL;
        }
        thumbnailVideo.addEventListener('timeupdate', thumbnailGenerator);


        control_bottom.style.display = 'flex';

        progress_area.style.display = 'flex';

    });
    settingsBTn.addEventListener('click', () => {
        settingsBTn.classList.toggle('active');
        settings.classList.toggle('active');
    })
    settings.addEventListener('click', () => {
        settingsBTn.classList.toggle('active');
        settings.classList.toggle('active');
    })

    quality.addEventListener('click', () => {
        qualities.classList.toggle('active');
    })
    qualities.addEventListener('click', () => {
        qualities.classList.toggle('active');
    })




    function removeActiveClasses(e) {
        e.forEach((event) => {
            event.classList.remove('active')
        })

    }


    playback_list.forEach(event => {
        event.addEventListener('click', () => {
            removeActiveClasses(playback_list);
            event.classList.add('active');
            let speed = event.getAttribute('data-speed');
            main_video.playbackRate = speed;
        })
    })

    subtitles_list.forEach(event => {
        event.addEventListener('click', () => {
            removeActiveClasses(subtitles_list);
            event.classList.add('active');
            changeCaption(event)
        })
    })



    playback_speed.addEventListener('click', () => {
        playback.classList.toggle('active');
    })
    playback.addEventListener('click', () => {
        playback.classList.toggle('active');
    })

    subtitles_btn.addEventListener('click', () => {
        subtitles.classList.toggle('active');
    })
    captionBTn.addEventListener('click', () => {
        subtitles.classList.toggle('active');
    })
    subtitles.addEventListener('click', () => {
        subtitles.classList.toggle('active');
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
    let caption_text = document.querySelector('.video_player .caption_text');
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

    const quality_ul = document.querySelector('#qualities ul');
    const qualities_size = document.querySelectorAll("source[size]");



    qualities_size.forEach(event => {
        let quality_html = `<li data-quality="${event.getAttribute('size')}">${event.getAttribute('size')}p</li>`;

        quality_ul.insertAdjacentHTML('afterbegin', quality_html);
    })
    const quality_li = document.querySelectorAll("#qualities ul li");


    quality_li.forEach((event) => {
        event.addEventListener('click', (e) => {
            let quality = e.target.getAttribute('data-quality');
            removeActiveClasses(quality_li);
            event.classList.add('active');
            qualities_size.forEach(event => {
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
  

    document.querySelector('.info.main span.material-icons').addEventListener('click', () => {
        document.querySelector('#details').classList.add('active');
    })
    document.querySelector('#details .top .icon').addEventListener('click', () => {
        document.querySelector('#details').classList.remove('active');
    })




 

   
    let startY = 0;
    let endY = 0;

    video_player.addEventListener('touchstart', function(e) {
        startY = e.touches[0].clientY;
    }, false);

    video_player.addEventListener('touchmove', function(e) {
        endY = e.touches[0].clientY; 
    }, false);

    video_player.addEventListener('touchend', function(e) {
        let distanceY = startY - endY;

        if (distanceY > 150) { 
            endY = 0;
            scrubbing_wrapper.classList.add("active");
            scrubbing_timer.classList.add("active");
        }
        startY = 0;
        endY = 0;
    }, false);


    scrubbing_wrapper.addEventListener('touchstart', function(e) {
            startY = e.touches[0].clientY; 
        }, false);

        scrubbing_wrapper.addEventListener('touchmove', function(e) {
            endY = e.touches[0].clientY;
        }, false);

        scrubbing_wrapper.addEventListener('touchend', function(e) {
            let distance = endY - startY;

            if (distance > 20) {
                scrubbing_wrapper.classList.remove("active");
                scrubbing_timer.classList.remove("active");
            }
            startY = 0;
            endY = 0;
        }, false);

   

/**/ 



    let isDragging0 = false;
    scrubbing_move.addEventListener('touchstart', (e) => {
        isDragging0 = true;
    });
    scrubbing_move.addEventListener('touchmove', (e) => {
        if (!isDragging0) return;
        scrubbing(e);
        
    })
    scrubbing_move.addEventListener('touchend', () => {
        isDragging0 = false;
        progressAreaTime.style.display = 'none';
        thumbnail.style.display = 'none';
    })

    function scrubbing(e) {
       let videoDuration =  main_video.duration;
        y =  e.touches[0].clientX;
        z = x - y;
        x = y;
        let m = item.length * item[0].clientWidth;
        let n = z / scrubbing_move.clientWidth
        let ml = scrubbing_position.getBoundingClientRect().left - scrubbing_move.getBoundingClientRect().left;
        if (w > 0 && w < m) {
            w += m * n;
            fine_scrubbing.style.marginLeft = `${ml-w}px`;
            main_video.currentTime = (w / m) * videoDuration;
            s_current.innerHTML = timeFormat((w / m) * videoDuration);
            let progressWidth = (((w / m) * videoDuration) / videoDuration);
            s_progress_bar.style.width = `${progressWidth * 100}%`;
        } else if (w < 0) {
            w = 1;
        } else if (w > m) {
            w = m - 50;
        }
    }





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
    var video = $(".main_video")[0];

    var savedTime = getCookie(videoID + "_time");
    if (savedTime !== null) {
        video.currentTime = parseInt(savedTime);
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
                window.location.href = $("#wrapper a:first-child").attr("href");
            }
        }
    });

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

    $('#loop').on('click', function() {
        $(this).toggleClass('active');
        if ($(this).hasClass('active')) {
            setCookie("loop", 1, 7);
            $("#loop p").text("on");
        } else {
            setCookie("loop", 0, 7);
            $("#loop p").text("off");
        }
    });
    if (getCookie("loop")) {
        $('#loop').toggleClass('active');
        $("#loop p").text("on");

    };





})


















    $(".comments").click(function() {
        $("#commentSection").addClass("visible");
        $(".replySection").removeClass("visible");
    });
    $("#commentSection .close").click(function() {
        $("#commentSection").removeClass("visible");
        $(".replySection").removeClass("visible");
    });


function commentAction(){
    var commentSecton = document.querySelector("#commentSection");
    var commentRow = document.querySelectorAll(".commentRow");
    for(let i=0;i<commentRow.length;i++){
        const item = commentRow[i];
        const replyShow = item.querySelector(".viewReply");
        const replyShowByIcon = item.querySelectorAll(".commentDescript .comment")[0];

        const replySection = item.querySelector(".replySection");
        const replyBack = item.querySelector(".replySection .replyBack");
        const replyClose = item.querySelector(".replySection .close");
        
        replyShowByIcon.addEventListener('click',()=>{
            replySection.classList.add("visible");
        })
        replyShow.addEventListener('click',()=>{
            replySection.classList.add("visible");
        })
        replyBack.addEventListener('click',()=>{
            replySection.classList.remove("visible");
        })
        replyClose.addEventListener('click',()=>{
            replySection.classList.remove("visible");
            commentSecton.classList.remove("visible");
        })


        
        $(item).find('.like span').html(Math.floor(Math.random() * 10000) + 1);
        $(item).find('.dislike span').html(Math.floor(Math.random() * 10000) + 1);
        
      
    }
}








