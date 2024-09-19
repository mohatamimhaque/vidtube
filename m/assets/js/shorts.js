$('body').addClass('mobile');
$('.video-container').css('height', `${$(window).height() - 60}px`);

function action(start, limit) {
    const $post = $('.post');

    for (let i = start; i < start + limit; i++) {
        const $postVideo = $post.eq(i).find('.post-video');

        const $item = $post.eq(i);
        const $play_control = $item.find('.play_control');
        const $video = $item.find('video');
        const $videoProgress = $item.find('.videoProgress');
        const $preview = $item.find('.preview');
        const $previewImg = $item.find('.previewImg');

        const $progress_area = $item.find('.progress_area');
        const $progress_bar = $item.find('.progress_bar');
        const $buffered_progress_bar = $item.find('.buffered_progress_bar');
        const $spinner = $item.find('.spinner');
        const $vid_id = $item.find('.vid_id').val();

        $(document).ready(function () {
            let isTabVisible = !document.hidden;
            let isVideoVisible = false;
            const video = $postVideo.get(0);

            function updateVideoPlayback() {
                if (isTabVisible && isVideoVisible) {
                    video.play();
                    let currentUrl = window.location.href;
                    let newUrl = currentUrl;
                    if (newUrl.indexOf('?') > -1) {
                        if (newUrl.indexOf('v=') > -1) {
                            newUrl = newUrl.replace(/(v=)[^\&]+/, '$1' + $vid_id);
                        } else {
                            newUrl += '&v=' + $vid_id;
                        }
                    } else {
                        newUrl += '?v=' + $vid_id;
                    }
                    window.history.pushState(null, null, newUrl);
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
                threshold: 0.5
            });

            observer.observe(video);
        });

        $video.on('waiting', () => {
            $spinner.show();
        });

        $video.on('canplay', () => {
            $spinner.hide();
        });

        $play_control.on('click', () => {
            const isVideoPaused = $item.hasClass('paused');
            isVideoPaused ? playVideo() : pauseVideo();
        });

        function playVideo() {
            $item.removeClass('paused');
            $videoProgress.removeClass('visible');
            $video.get(0).play();
            $play_control.find('i').text('play_arrow');
            $play_control.addClass('active');
            setTimeout(() => {
                $play_control.removeClass('active');
            }, 1000);
        }

        function pauseVideo() {
            $video.get(0).pause();
            $item.addClass('paused');
            $play_control.find('i').text('pause');
            $play_control.addClass('active');
            setTimeout(() => {
                $play_control.removeClass('active');
            }, 1000);
        }

        $video.on('timeupdate', (e) => {
            let currentVideoTime = e.target.currentTime;
            let videoDuration = e.target.duration;
            let progressWidth = (currentVideoTime / videoDuration) * 100;
            $progress_bar.css('width', `${progressWidth}%`);
        });

        $progress_area.on('click', (e) => {
            let videoDuration = $video.get(0).duration;
            let progresswidthval = $progress_area.width();
            let ClickOffsetX = e.offsetX;
            $video.get(0).currentTime = (ClickOffsetX / progresswidthval) * videoDuration;
        });

        let isDragging = false;

        $progress_area.on('touchstart', (e) => {
            isDragging = true;
        });

        $progress_area.on('touchmove', (e) => {
            if (!isDragging) return;
            let x = e.originalEvent.touches[0].clientX;
            $preview.show();
            let progresswidthval = $progress_area.width();
            let videoDuration = $video.get(0).duration;
            let progressTime = Math.floor((x / progresswidthval) * videoDuration);
            let y = x;

            if (x >= progresswidthval - 80) {
                x = progresswidthval - 80;
            } else if (x <= 2) {
                x = 60;
            } else {
                x = x - 40;
            }

            $preview.css('--x', `${x}px`);
            $video.get(0).currentTime = (y / progresswidthval) * videoDuration;

            const canvas = document.createElement('canvas');
            canvas.width = $video.get(0).videoWidth;
            canvas.height = $video.get(0).videoHeight;
            const ctx = canvas.getContext('2d');
            ctx.drawImage($video.get(0), 0, 0, canvas.width, canvas.height);
            $previewImg.attr('src', canvas.toDataURL('image/png'));

            let progressWidth = (progresswidthval / x) * 100;
            $progress_bar.css('width', `${progressWidth}%`);
        });

        $progress_area.on('touchend', (e) => {
            isDragging = false;
            $preview.hide();
        });

        $video.on('loadeddata', () => {
            setInterval(() => {
                let bufferedTime = $video.get(0).buffered.end(0);
                let duration = $video.get(0).duration;
                let width = (bufferedTime / duration) * 100;
                $buffered_progress_bar.css('width', `${width}%`);
            }, 500);
        });

        $item.on('touchstart', (e) => {
            $videoProgress.addClass('visible');
            $play_control.addClass('visible');
            setTimeout(() => {
                $play_control.removeClass('visible');
            }, 2000);
        });

        $item.find('.moreModal').on('click', () => {
            $item.find('.moreModal').removeClass('active');
        });

        $item.find('.phone .more').on('click', () => {
            $item.find('.moreModal').toggleClass('active');
        });

        $item.find('.phone .comment span:last-child').text(Math.floor(Math.random() * 9999) + 1);
        $item.find('.phone .like span:last-child').text(Math.floor(Math.random() * 9999) + 1);
        $item.find('.phone .dislike span:last-child').text(Math.floor(Math.random() * 9999) + 1);
    }
}
