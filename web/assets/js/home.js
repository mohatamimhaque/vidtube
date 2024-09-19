
function muteVolume() {
    const videoList = $(".vid-list");
    videoList.each(function() {
        const volume = $(this).find('.volume');
        const video = $(this).find('video').get(0);
        const isMuted = $(this).hasClass('muted');

        if (isMuted) {
            $(this).removeClass('muted');
            video.volume = 0.8;
            volume.html('volume_up');
        } else {
            $(this).addClass('muted');
            volume.html('volume_off');
            video.volume = 0;
        }
    });
}

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

    
    function action(start,limit) {
        const wrapper = $(".list-container");
        const videoList = $(".vid-list");


        videoList.slice(start, limit+start).each(function() {
            const video_player = $(this).find(".video_player");
            const video = $(this).find("video").get(0);
            const duration = $(this).find(".duration");
            const volume = $(this).find(".volume");
            const views = $(this).find(".views");
            const time = $(this).find(".time");
            const video_title = $(this).find(".video-title");
            const spinner = $(this).find('.spinner');
            const $progressArea = $(this).find(".progress_area");
            const $progressBar = $(this).find(".progress_bar");
            const $vid_id = $(this).find(".vid_id").val();
            const $video = $(this).find("video").get(0);

            let title = getFileNameFromUrl(video.src);

            $(this).addClass('muted');
            volume.html('volume_off');
            video.volume = 0;

           

            $(video).on('timeupdate', function(e) {
                duration.html(timeFormat(e.target.duration - e.target.currentTime));
                let currentVideoTime = $(e.target).prop('currentTime');
                let videoDuration = $(e.target).prop('duration');
                let progressWidth = (currentVideoTime / videoDuration) * 100;
                $progressBar.css('width', `${progressWidth}%`);

                setCookie($vid_id, video.currentTime, 30);
            });
            if(getCookie($vid_id)){
                video.currentTime = parseInt(getCookie($vid_id));
            }


            $(video).on('waiting', function() {
                spinner.css('display', 'block');
            });

            $(video).on('canplay', function() {
             spinner.css('display', 'none');
            });

            volume.on('click', function(event) {
                event.stopPropagation();
                muteVolume();
            });




            $(this).hover(hoverVideo, hideVideo);

            function hoverVideo() {
                $(this).find('video').get(0).play(); // Play the video
                $(this).find('.overlay').css("display", "none"); // Hide the overlay
            }

            function hideVideo() {
                $(this).find('video').get(0).pause(); // Pause the video
                $(this).find('.overlay').css("display", "block"); // Show the overlay
            }


      

        let isDragging = false;

        $progressArea.on('click', function(e) {
            e.stopPropagation();
            let videoDuration = $video.duration;
            let progressWidthVal = $progressArea.width();
            let clickOffsetX = e.offsetX;
            $video.currentTime = (clickOffsetX / progressWidthVal) * videoDuration;
        });

        $progressArea.on('mousedown', function(e) {
            e.stopPropagation();
            isDragging = true;
            handleDragging(e.pageX);
        });

        $(document).on('mousemove', function(e) {
            if (!isDragging) return;
            handleDragging(e.pageX);
        });

        $(document).on('mouseup', function(e) {
            if (!isDragging) return;
            isDragging = false;
            handleDragging(e.pageX);
        });

        function handleDragging(pageX) {
            let progressWidthVal = $progressArea.width();
            let videoDuration = $video.duration;
            let offsetX = pageX - $progressArea.offset().left;

            if (offsetX < 0) offsetX = 0;
            if (offsetX > progressWidthVal) offsetX = progressWidthVal;

            $video.currentTime = (offsetX / progressWidthVal) * videoDuration;

            let progressWidth = (offsetX / progressWidthVal) * 100;
            $progressBar.css('width', `${progressWidth}%`);
        }
        });
    }
    $('#search').keyup(function(){
        if($(this).val()){
            $('.filterBTN').addClass('visible');
            $('.filters .tags').removeClass('visible');
        }else{
            $('.filters .tags').addClass('visible');
            $('.filterBTN').removeClass('visible');
        }
    })
    $('.filterBTN').click(function(e){
        $('.pop-up').addClass('visible');
        e.stopPropagation();
    })
    $('.pop-up').click(function(e){
        e.stopPropagation();
    })
    $('.pop-up .close').click(function(){
        $('.pop-up').removeClass('visible');
    })
    $('body').click(function(){
        $('.pop-up').removeClass('visible');
    })