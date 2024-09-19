function action(start, limit) {
    const $videoContainer = $(".video-container");
    const $post = $(".post");

    $post.each(function (i) {
        const $videoPlayer = $(this).find(".video-player");
        const $postVideo = $(this).find(".post-video");
        const $title = $(this).find(".title").val();
        const $thisPost = $(this);

        $(document).ready(function () {
            let isTabVisible = !document.hidden;
            let isVideoVisible = false;
            let video = $postVideo[0];

            function updateVideoPlayback() {
                if (isTabVisible && isVideoVisible) {
                    video.play();
                } else {
                    video.pause();
                }
            }

            $(document).on('visibilitychange', function () {
                isTabVisible = !document.hidden;
                updateVideoPlayback();
            });

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    isVideoVisible = entry.isIntersecting;
                    updateVideoPlayback();
                });
            }, {
                threshold: 0.5 // Trigger when 50% of the video is visible
            });

            observer.observe(video);
        });

        $('body').addClass('pc');
        $videoContainer.css({
            'height': `${$(window).height()}px`,
            'width': `${($(window).height() / 16 * 9) + 75}px`
        });

        $post.each(function () {
            const $volume = $(this).find('.volume');
            const $volumeRange = $(this).find('.volume_range');
            const $video = $(this).find('video');
            const $playPause = $(this).find('.play_pause');
            const $item = $(this);

            const videoSrc = $video.attr('src');
            const videoFileName = getFileNameFromUrl(videoSrc);

            $(this).attr('id', replaceSpacesWithUnderscores(videoFileName));

            $videoPlayer.on('click', function () {
                let isVideoPaused = $item.hasClass('paused');
                if (isVideoPaused) {
                    playVideo($playPause, $video[0], $item);
                } else {
                    pauseVideo($playPause, $video[0], $item);
                }
                $thisPost.find('.desktop .overlay').addClass('active');
                setTimeout(function () {
                    $thisPost.find('.desktop .overlay').removeClass('active');
                }, 1000);
            });

            $playPause.on('click', function () {
                let isVideoPaused = $item.hasClass('paused');
                isVideoPaused ? playVideo($playPause, $video[0], $item) : pauseVideo($playPause, $video[0], $item);
            });

            $video.on('play', function () {
                playVideo($playPause, $video[0], $item);
                document.title = $title;
                
            });

            $video.on('pause', function () {
                pauseVideo($playPause, $video[0], $item);
            });

            $(document).on('keydown', function (e) {
                if (e.key === 'k') {
                    let isVideoPaused = $item.hasClass('paused');
                    isVideoPaused ? playVideo($playPause, $video[0], $item) : pauseVideo($playPause, $video[0], $item);
                } else if (e.key === 'm') {
                    muteVolume();
                }
            });

            $volumeRange.val(`${$video[0].volume * 100}`);
            $volume.on('click', function () {
                muteVolume();
            });
            $volumeRange.on('input', function () {
                changeVolume();
            });

            function changeVolume() {
                let value = $volumeRange.val();
                $post.each(function () {
                    const $volume = $(this).find('.volume');
                    const $video = $(this).find('video');
                    $(this).find('.volume_range').val(value);
                    $video[0].volume = value / 100;
                    if (value == 0) {
                        $volume.html('volume_off');
                    } else if (value < 50) {
                        $volume.html('volume_down');
                    } else {
                        $volume.html('volume_up');
                    }
                });
            }

            function muteVolume() {
                $post.each(function () {
                    const $volume = $(this).find('.volume');
                    const $volumeRange = $(this).find('.volume_range');
                    const $video = $(this).find('video');
                    let value = $volumeRange.val();
                    if (value == 0) {
                        $volumeRange.val(80);
                        $video[0].volume = 0.8;
                        $volume.html('volume_up');
                    } else {
                        $volumeRange.val(0);
                        $volume.html('volume_off');
                        $video[0].volume = 0;
                    }
                });
            }

            const $postDescription = $(this).find('.post-description');
            let originalText = $postDescription.html();
            $postDescription.html(shortenText(originalText, 100));

            function moreModal() {
                $(this).find(".desktop-sideber .moreModal").removeClass('active');
            }

            $(this).find(".desktop-sideber .more").on("click", function () {
                $(this).find(".moreModal").toggleClass('active');
            });
        });
    });
}

function playVideo($playPause, video, $post) {
    $playPause.html("pause");
    $post.find(".desktop .overlay i").html("play_arrow");
    $playPause.attr('title', "pause(k)");
    $post.removeClass('paused');
    video.play();
}

function pauseVideo($playPause, video, $post) {
    $playPause.html("play_arrow");
    $post.find(".desktop .overlay i").html("pause");
    $playPause.attr('title', "play(k)");
    video.pause();
    $post.addClass('paused');
}
