<script>
    $(document).ready(function() {
        $('.uploadModal .close').on('click', function() {
            $('.uploadModal').removeClass('visible');
            location.reload();
        });


        const $prevBtn = $('#prevBtn');
        const $nextBtn = $('#nextBtn');
        const $saveBtn = $('#saveBtn');
        const $steppers = $('.stepper');
        const page = $('.page .left');

        let currentstepper = 1;
        $nextBtn.on('click', function() {
            currentstepper++;
            updateProgress();
        });
        $('.stepper').on('click', function() {
            currentstepper = $('.stepper').index(this) + 1;
            updateProgress();
        });

        $prevBtn.on('click', function() {
            currentstepper--;
            updateProgress();
        });

        function updateProgress() {
            $steppers.each(function(index) {
                if (index < currentstepper) {
                    $(this).find('.bullet').addClass('active'); 
                    $(this).addClass('active')

                } else {
                    $(this).find('.bullet').removeClass('active'); 
                    $(this).removeClass('active')
                }
                $(page[index]).removeClass('visible');

            });
            $(page[currentstepper - 1]).addClass('visible');



            if (currentstepper > 3) {
                $saveBtn.addClass('visible');
                $nextBtn.removeClass('visible');
            } else {
                $saveBtn.removeClass('visible');
                $nextBtn.addClass('visible');
            }

            if (currentstepper > 1) {
                $prevBtn.addClass('visible');
            } else {
                $prevBtn.removeClass('visible');
            }
        }
        updateProgress();
    });




$(document).ready(function() {
    checkURL();
    function checkURL() {
    var currentURL = window.location.href;
    if (currentURL.includes("create")) {
        uploadPage();
    } else {
        modify();
    }
}

function modify(){
    const $tabLinks = $('.tab-link');
    const $tabContents = $('.tab-content');

    $tabLinks.on('click', function() {
        const tabId = $(this).data('tab');
        $tabLinks.removeClass('active');
        $tabContents.removeClass('active');
        $(this).addClass('active');
        $('#' + tabId).addClass('active');
    });

    $('.modalActive').on('click', function() {
        $("#unique_id").val($(this).val());
        let src = $(this).data('src');
        $("#main_video").attr("src",src);
        

        setTimeout(()=>{
            $('.uploadModal').addClass('visible');
            controls();
            action();
        },100)
    })   



}

   
   
    function uploadPage(){
    var $dropZoneElement = $(".drop-zone");
    var scrubbing_img = [];
    var main_video = [];

    $(".drop-zone__input").each(function() {
        var $inputElement = $(this);

        $inputElement.on("change", function(e) {
            if ($inputElement[0].files.length) {
                upload_progress(e.target.files);
                main_video.push($inputElement[0].files[0]);
            }
        });

        $dropZoneElement.on("dragover", function(e) {
            e.preventDefault();
        });


        $dropZoneElement.on("drop", function(e) {
            e.preventDefault();
            upload_progress(e.originalEvent.dataTransfer.files);
            main_video.push(e.originalEvent.dataTransfer.files[0]);

            if (e.originalEvent.dataTransfer.files.length) {
                $inputElement[0].files = e.originalEvent.dataTransfer.files;
            }
        });
    });

    function upload_progress(files) {
        $(".firstpage").addClass('active');
        $("#video_overlay").css("display", 'flex');
        createId();
        setTimeout(function() {
            $('.uploadModal').addClass('visible');
            $(".firstpage").removeClass('active');
            $(".firstpage").removeClass('visible');
            $(".secondpage").addClass('visible');

            action();
        }, 1000);

        reader.readAsDataURL(files[0]);

        reader.addEventListener('progress', (event) => {
            if (event.loaded && event.total) {
                const percent = parseInt((event.loaded / event.total) * 100);

                $('.modalFooter .status').html('Uploading ' + percent + '%...');
                if (percent === 100) {
                    reader.onload = function(e) {
                        document.querySelector("#main_video").src = e.target.result;
                        document.querySelector("#main_video").load();
                        let name = files[0].name.split('.')[0];
                        setTimeout(function() {
                            video_upload(e.target.result);
                            $('#video_title').val(name);
                            $('.video_name').html(shortenText(name),60);
                            $('#filename').html(shortenText(name),75);
                        }, 2000);
                        generateThumbnails(e.target.result);
                        // moments(e.target.result);
                        $('.modalFooter .status').html('Upload complete ... Processing will begin shortly');
                        $("#video_overlay").css("display", 'none');
                        controls();
                       

                    }.bind(this)
                }
            }
        });

    }

    function generateThumbnails(src) {
        let video = document.createElement("video");
        video.setAttribute("preload", "metadata");
        video.src = src;
        video.addEventListener("loadedmetadata", () => {
            let duration = video.duration;
            videoDuration = duration;
            let time = 5;
            let array = [];

            if (duration >= 3600) {
                time = 20;
            } else if (duration >= 300) {
                time = 10;
            } else {
                time = 5;
            };
            for (let i = 1; i <= duration; i += time) {
                array.push(i);
            }

            let j = 0;


            var needTime = array.length * 180;
            const interval = setInterval(() => {
                const canvas = document.createElement("canvas");
                canvas.width = 120;
                canvas.height = 80;
                video.currentTime = array[j];

                const context = canvas.getContext("2d");
                context.drawImage(video, 0, 0, canvas.width, canvas.height);
                scrubbing_img.push(canvas.toDataURL("image/jpeg"));
                j++;
                $('.modalFooter .status').html(`Processing up to SD ... ${parseInt((needTime-j*100)/1000)} seconds left`);
            }, 180)

            setTimeout(() => {
                clearInterval(interval);
                $('.modalFooter .status').html("Checks complete. No issues found");
                scrubbing_img_upload();

            }, needTime);
        })
    }



    function createId() {
        var data = new FormData();
        data.append('operation', "createId");
        data.append('owner', $("#owner").val());
        $.ajax({
            url: "<?= base_url('studio/ajax/upload') ?>",
            method: "POST",
            data: data,
            contentType: false,
            processData: false,
            success: function(data) {
                $("#unique_id").val(data);
                let currentText = $("#video_link").text();
                let uniqueId = $("#unique_id").val();
                let newText = `${currentText}video/${uniqueId}`;
                $("#video_link").text(newText);
                $("#video_link").attr('href', newText);
            }
        })
    }

    function video_upload(src) {
        var data = new FormData();
        data.append('operation', "video_upload");
        data.append('unique_id', $("#unique_id").val());
        const videoElement = $('<video>', {});
        videoElement.attr('src', src);
        videoElement.on('loadedmetadata', function() {
            const videoWidth = this.videoWidth;
            const videoHeight = this.videoHeight;
            const videoDuration = this.duration;

            for (let i = 0; i < main_video.length; i++) {
                data.append('video[]', main_video[i]);
            }
            if(videoWidth<videoHeight){
                data.append('type', 'short');
            }else{
                data.append('type', 'long');
            }
            data.append('duration', videoDuration);
            data.append('unique_id', $("#unique_id").val());
            $.ajax({
                url: "<?= base_url('studio/ajax/upload') ?>",
                method: "POST",
                data: data,
                contentType: false,
                processData: false,
                success: function(status) {
                    if (status === 'success') {
                        $('#save_status').text(savedAs());
                    } else {
                        $('#save_status').text("Save Failed");
                    }
                }
            })
        })
    }

    function scrubbing_img_upload() {
        var data = new FormData();
        data.append('operation', "scrubbing_img");
        data.append('scrubbing_img', scrubbing_img.join('///'));
        data.append('unique_id', $("#unique_id").val());
        $.ajax({
            url: "<?= base_url('studio/ajax/upload') ?>",
            method: "POST",
            data: data,
            contentType: false,
            processData: false,
            success: function(status) {
                if (status === 'success') {
                    $('#save_status').text(savedAs());
                } else {
                    $('#save_status').text("Save Failed");
                }
            }
        })
    }



}






    var subtitle = [];
    var thumbnail = [];
    var cast = [];
    var tags = [];
    var category = [];
    var moment = [];
  
    var ac_thumbnail = 1;
    var status;
    var backup_thumbnail;
    var videoDuration;
    var reader = new FileReader();

    function savedAs() {
        if (status == 0) {
            return "Saved as private";
        } else if (status == 1) {
            return "Saved as unlisted";
        } else if (status == 2) {
            return "Saved as public";
        }
    }


    function controls() {
        var video_player = document.querySelector('#video_wrapper #video_player');
        var main_video = document.querySelector('#video_wrapper #main_video');
        var video_overlay_img = document.querySelector('#video_wrapper #video_overlay_img');
        var controls = document.querySelector('#video_wrapper .controls');
        var progress_bar = document.querySelector('#video_wrapper .progress_bar');
        var progress_area = document.querySelector('#video_wrapper .progress_area');
        var play_pause = document.querySelector('#video_wrapper .play_pause');
        var volume = document.querySelector('#video_wrapper .volume');
        var volume_range = document.querySelector('#video_wrapper #volume_range');
        var current = document.querySelector('#video_wrapper .current');
        var duration = document.querySelector('#video_wrapper .duration');
        var timer = document.querySelector('#video_wrapper .timer');
        var fullscreen = document.querySelector('#video_wrapper .fullscreen');
        var settingsBTn = document.querySelector('#video_wrapper .settingsBTn');
        var settings = document.querySelector('#video_wrapper .settings');


        function playVideo() {
            play_pause.innerHTML = "pause";
            play_pause.title = "pause(k)";
            video_overlay_img.style.display = "none";
            main_video.play();
            video_player.classList.remove('paused');
        }

        function pauseVideo() {
            play_pause.innerHTML = "play_arrow";
            play_pause.title = "play(k)";
            video_player.classList.add('paused');
            main_video.pause();
        }
        play_pause.addEventListener('click', () => {
            var isVideoPaused = video_player.classList.contains('paused');
            isVideoPaused ? playVideo() : pauseVideo();
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
            } else {
                duration.innerHTML = `${totalMin} : ${totalSec}`;
            }

        })



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
            } else {
                current.innerHTML = `${currentMin} : ${currentSec}`;
            }

            let videoDuration = e.target.duration;
            let progressWidth = (e.target.currentTime / videoDuration);
            progress_bar.style.width = `${progressWidth * 100}%`;



        })

        //let update playing video current time on according to the progress bar width


        progress_area.addEventListener('click', (e) => {
            let videoDuration = main_video.duration;
            let progresswidthval = progress_area.clientWidth;
            let ClickOffsetX = e.offsetX;
            main_video.currentTime = (ClickOffsetX / progresswidthval) * videoDuration;


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
        window.addEventListener('keydown', function(e) {
            let key = e.key;
            if (key == 'm' || key == 'M') {
                muteVolume();
            } else if (key == 'f' || key == "F") {
                fullScreen();
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
            } else if (key == 'ArrowLeft') {
                main_video.currentTime -= 10;
            } else if (key == 'ArrowDown') {
                let v = parseInt(volume_range.value);
                if (v >= 6) {
                    v -= 5;
                } else if (v <= 5 && v > 0) {
                    v = 0;
                } else {
                    v = v;
                }
                volume_range.value = `${v}`;
                changeVolume();

                v = v < 10 ? '0' + v : v;


            } else if (key == 'ArrowUp') {
                let v = parseInt(volume_range.value);
                if (v < 96) {
                    v += 5;
                } else if (v >= 96 && v < 100) {
                    v = 100;
                } else {
                    v = v;
                }

                volume_range.value = `${v}`;
                changeVolume();


            }



        }, false)



    }




    function action() {

        $('#video_title').keyup(function(event) {
            let name = $(this).val().replace(/^\s+/, '');
            $('.video_name').html(shortenText(name),60);
            $('#filename').html(shortenText(name),75);
            let l = name.length;
            $(".length small:first-child").html(l);

            if (l > 100 || l < 1) {
                $('.video_title').addClass('danger');
            } else {
                $('.video_title').removeClass('danger');
            }
        });
        $('#video_title').blur(function() {
            let name = $(this).val().replace(/^\s+/, '');
            let l = name.length;
            if (l <= 100 || l >= 1) {
                updateTitle(name);
            }
        });
        $('#description').blur(function() {
            let text = $(this).val().replace(/^\s+/, '');
            let l = text.length;
            if (l > 1) {
                updateDep(text);

            }
        });
        $('#tags_in').keyup(function(event) {


            if (event.key == "Enter" || event.key == ",") {
                let val = $(this).val().replace(/^\s+/, '').replace(/,/g, '');
                let l = val.length;
                if (l > 0) {
                    tags_add(val);
                    $(this).val('');
                }
            }

        })

        function tags_add(data) {
            let temp = data;
            tags = tags.concat(temp);
            tags_update(tags);
        }

        function tags_update(e) {
            let html = '';
            $('#tags').html('');
            for (let i = 0; i < e.length; i++) {
                html += `<button value="${i}" class="btn-soft-success">${e[i]} <i class="material-icons">close</i></button>`;
            }
            $('#tags').html(html);
            tags_remove();
            updateTag();
        }

        function tags_remove() {
            $("#tags button").click(function(e) {
                let val = parseInt($(this).val())
                tags.splice(val, 1);
                tags_update(tags);
            });
        }

        $(".link_copy").click(function() {
            let href = $("#video_link").attr("href");
            let $temp = $("<input>");
            $("body").append($temp);
            $temp.val(href).select();
            document.execCommand("copy");
            $temp.remove();
            alert("Link copied to clipboard!");
        });

        getTitle();

        function getTitle() {
            var data = new FormData();
            data.append('operation', "getTitle");
            data.append('unique_id', $("#unique_id").val());
            $.ajax({
                url: "<?= base_url('studio/ajax/upload') ?>",
                method: "POST",
                data: data,
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#video_title').val(data);
                    $('.video_name').html(shortenText(data),60);
                    $('#filename').html(shortenText(name),75);
                }
            })
        }

        function updateTitle(name) {
            $('#save_status').text("Saving. . .");
            var data = new FormData();
            data.append('operation', "updateTitle");
            data.append('unique_id', $("#unique_id").val());
            data.append('title', name);
            $.ajax({
                url: "<?= base_url('studio/ajax/upload') ?>",
                method: "POST",
                data: data,
                contentType: false,
                processData: false,
                success: function(status) {
                    if (status == 'success') {
                        $('#save_status').text(savedAs());
                    } else {
                        $('#save_status').text("Save failed");
                    }
                }
            })
        }


        getDep();

        function getDep() {
            var data = new FormData();
            data.append('operation', "getDep");
            data.append('unique_id', $("#unique_id").val());
            $.ajax({
                url: "<?= base_url('studio/ajax/upload') ?>",
                method: "POST",
                data: data,
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#description').val(data);
                }
            })
        }

        function updateDep(text) {
            $('#save_status').text("Saving. . .");
            var data = new FormData();
            data.append('operation', "updateDep");
            data.append('unique_id', $("#unique_id").val());
            data.append('about', text);
            $.ajax({
                url: "<?= base_url('studio/ajax/upload') ?>",
                method: "POST",
                data: data,
                contentType: false,
                processData: false,
                success: function(status) {
                    if (status == 'success') {
                        $('#save_status').text(savedAs());
                    } 
                }
            })
        }

        getCategory()

        function getCategory() {
            var data = new FormData();
            data.append('operation', "getCategory");
            data.append('unique_id', $("#unique_id").val());
            $.ajax({
                url: "<?= base_url('studio/ajax/upload') ?>",
                method: "POST",
                data: data,
                contentType: false,
                processData: false,
                success: function(data) {
                    data = parseInt(data)+1;
                    $('.custom-select .select-trigger').text($(`.custom-select .option:nth-child(${data})`).text());
                    $(`.custom-select .option:nth-child(${data})`).addClass('selected');

                     

                }
            })
        }
        $('.custom-select .option').click(function() {
            var index = $(this).index('.custom-select .option');
            updateCategory(index)
        });

        function updateCategory(category) {
            $('#save_status').text("Saving. . .");
            var data = new FormData();
            data.append('operation', "updateCategory");
            data.append('unique_id', $("#unique_id").val());
            data.append('category', category);
            $.ajax({
                url: "<?= base_url('studio/ajax/upload') ?>",
                method: "POST",
                data: data,
                contentType: false,
                processData: false,
                success: function(status) {
                    if (status == 'success') {
                        $('#save_status').text(savedAs());
                    } else {
                        $('#save_status').text("Save Failed");
                    }
                }
            })
        }



        getTag()

        function getTag() {
            var data = new FormData();
            data.append('operation', "getTag");
            data.append('unique_id', $("#unique_id").val());
            $.ajax({
                url: "<?= base_url('studio/ajax/upload') ?>",
                method: "POST",
                data: data,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.length > 0) {
                        tags.push(...(data.split(',')));
                        tags_update(tags);
                    }
                }
            })
        }

        function updateTag() {
            $('#save_status').text("Saving. . .");
            var data = new FormData();
            data.append('operation', "updateTag");
            data.append('unique_id', $("#unique_id").val());
            data.append('tags', tags.join(','));
            $.ajax({
                url: "<?= base_url('studio/ajax/upload') ?>",
                method: "POST",
                data: data,
                contentType: false,
                processData: false,
                success: function(status) {
                    if (status == 'success') {
                        $('#save_status').text(savedAs());
                    } else {
                        $('#save_status').text("Save Failed");
                    }
                }
            })
        }




        $('#upload_thumbnail').on('change', function(e) {
            var file = document.querySelector('#upload_thumbnail').files[0];
            if (file != 0) {
                $('#save_status').text("Saving. . .");
                var data = new FormData();
                data.append('operation', "updateTh");
                data.append('unique_id', $("#unique_id").val());
                data.append('name', Date.now());
                data.append('file', file);
                $.ajax({
                    url: "<?= base_url('studio/ajax/upload') ?>",
                    method: "POST",
                    data: data,
                    contentType: false,
                    processData: false,
                    success: function(status) {
                        if (status == 'success') {
                            getTh();
                            $('#save_status').text(savedAs());
                        } else {
                            $('#save_status').text("Save Failed");
                        }
                    }
                })

            }

        });

        $(".autoGenrate").click(function(e) {
            $('#save_status').text("Saving. . .");
            let video = document.createElement("video");
            video.setAttribute("preload", "metadata");
            video.src = $('#main_video').attr('src');

            video.addEventListener("loadedmetadata", () => {
                let canvas = document.createElement("canvas");
                canvas.width = 1080;
                canvas.height = 720;

                video.currentTime = video.duration * Math.random();
                video.addEventListener("seeked", () => {
                    let context = canvas.getContext("2d");
                    context.drawImage(video, 0, 0, canvas.width, canvas.height);
                    let imgData = canvas.toDataURL("image/jpeg");

                    var data = new FormData();
                    data.append('operation', "autoTh");
                    data.append('unique_id', $("#unique_id").val());
                    data.append('name', Date.now());
                    data.append('file', imgData);
                    $.ajax({
                        url: "<?= base_url('studio/ajax/upload') ?>",
                        method: "POST",
                        data: data,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response == 'success') {
                                getTh();
                                $('#save_status').text(savedAs());
                            } else {
                                $('#save_status').text("Save Failed");
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error("Upload failed: ", textStatus, errorThrown);
                        }
                    });
                });
            });
        });

        getTh();

        function getTh() {
            var data = new FormData();
            data.append('operation', "getTh");
            data.append('unique_id', $("#unique_id").val());
            $.ajax({
                url: "<?= base_url('studio/ajax/upload') ?>",
                method: "POST",
                data: data,
                contentType: false,
                processData: false,
                success: function(data) {
                    $('.thum_gallery').html(data);
                    getActiveTh();
                    th_action();
                }
            })
        }



        function getActiveTh() {
            var data = new FormData();
            data.append('operation', "getActiveTh");
            data.append('unique_id', $("#unique_id").val());
            $.ajax({
                url: "<?= base_url('studio/ajax/upload') ?>",
                method: "POST",
                data: data,
                contentType: false,
                processData: false,
                success: function(data) {
                    ac_thumbnail = data;
                    if ($('.thum_gallery .img').length) {
                        $(`.thum_gallery .img:nth-child(${ac_thumbnail})`).addClass('active');
                        var sourceSrc = $(`.thum_gallery .img:nth-child(${ac_thumbnail}) img`).attr('src');
                        if($('#video_player').hasClass('paused')){
                            $('#video_overlay_img').css('display', 'flex');
                        }
                        $('#video_overlay_img img').attr('src', sourceSrc);
                    }
                }
            })
        }

        function setActiveTh() {
            var data = new FormData();
            data.append('operation', "setActiveTh");
            data.append('ac_thumbnail', ac_thumbnail);
            data.append('unique_id', $("#unique_id").val());
            $.ajax({
                url: "<?= base_url('studio/ajax/upload') ?>",
                method: "POST",
                data: data,
                contentType: false,
                processData: false,
                success: function(status) {
                    if (status == 'success') {
                        $('#save_status').text(savedAs());
                        if ($('.thum_gallery .img').length) {
                            $(`.thum_gallery .img,active`).removeClass('active');
                            $(`.thum_gallery .img:nth-child(${ac_thumbnail})`).addClass('active');
                            var sourceSrc = $(`.thum_gallery .img:nth-child(${ac_thumbnail}) img`).attr('src');
                            $('#video_overlay_img img').attr('src', sourceSrc);
                            if($('#video_player').hasClass('paused')){
                                $('#video_overlay_img').css('display', 'flex');
                            }
                        }
                    } else {
                        $('#save_status').text("Save Failed");
                    }

                }
            })
        }

        function th_action() {
            $('.thum_gallery .img').click(function(e) {

                ac_thumbnail = $('.thum_gallery .img').index(this) + 1;
                setActiveTh();
            })
            $(".rimg").click(function(e) {
                e.stopPropagation();
                let val = $(this).val();
                $('#save_status').text("Saving. . .");
                var data = new FormData();
                data.append('operation', "rimg");
                data.append('unique_id', $("#unique_id").val());
                data.append('img', val);
                $.ajax({
                    url: "<?= base_url('studio/ajax/upload') ?>",
                    method: "POST",
                    data: data,
                    contentType: false,
                    processData: false,
                    success: function(status) {
                        if (status == 'success') {
                            ac_thumbnail = 1;
                            setActiveTh();
                            getTh();
                            $('#save_status').text(savedAs());
                        } else {
                            $('#save_status').text("Save Failed");
                        }
                    }
                })



            })

        }

        var $sbInput = $("#subtitles");

        $sbInput.on("change", function(e) {
            if ($sbInput[0].files.length) {
                var files = $sbInput[0].files;
                if (files.length > 0) {
                    $('#save_status').text("Saving. . .");
                    var data = new FormData();
                    data.append('operation', "sbInput");
                    data.append('unique_id', $("#unique_id").val());
                    for (var i = 0; i < files.length; i++) {
                        data.append('subtitle[]', files[i]);
                    }
                    $.ajax({
                        url: "<?= base_url('studio/ajax/upload') ?>",
                        method: "POST",
                        data: data,
                        contentType: false,
                        processData: false,
                        success: function(status) {
                            if (status === 'success') {
                                getSubtitle();
                                $('#save_status').text(savedAs());
                            } else {
                                $('#save_status').text("Save Failed");
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            $('#save_status').text("An error occurred: " + textStatus);
                        }
                    });
                }
            }
        });

        getSubtitle();

        function getSubtitle() {
            var data = new FormData();
            data.append('operation', "getSubtitle");
            data.append('unique_id', $("#unique_id").val());
            $.ajax({
                url: "<?= base_url('studio/ajax/upload') ?>",
                method: "POST",
                data: data,
                contentType: false,
                processData: false,
                success: function(data) {
                    $('.uploaded-area').html(data);
                    sb_action();
                }
            })
        }

        function sb_action() {
            $(".rsb").click(function(e) {
                e.stopPropagation();
                let val = $(this).val();
                $('#save_status').text("Saving. . .");
                var data = new FormData();
                data.append('operation', "rsb");
                data.append('unique_id', $("#unique_id").val());
                data.append('img', val);
                $.ajax({
                    url: "<?= base_url('studio/ajax/upload') ?>",
                    method: "POST",
                    data: data,
                    contentType: false,
                    processData: false,
                    success: function(status) {
                        if (status == 'success') {
                            getSubtitle();
                            $('#save_status').text(savedAs());
                        } else {
                            $('#save_status').text("Save Failed");
                        }
                    }
                })
            })

        }


        getStatus();

        function getStatus() {
            var data = new FormData();
            data.append('operation', "getStatus");
            data.append('unique_id', $("#unique_id").val());
            $.ajax({
                url: "<?= base_url('studio/ajax/upload') ?>",
                method: "POST",
                data: data,
                contentType: false,
                processData: false,
                success: function(data) {
                    status = data;
                    $(`input[name='visibility'][value='${data}']`).prop('checked', true);

                }
            })
        }
        getAudience();
        function getAudience() {
            var data = new FormData();
            data.append('operation', "getAudience");
            data.append('unique_id', $("#unique_id").val());
            $.ajax({
                url: "<?= base_url('studio/ajax/upload') ?>",
                method: "POST",
                data: data,
                contentType: false,
                processData: false,
                success: function(data) {
                    $(`input[name='audience'][value='${data}']`).prop('checked', true);

                }
            })
        }
        comments_status();
        function comments_status() {
            var data = new FormData();
            data.append('operation', "getComments_status");
            data.append('unique_id', $("#unique_id").val());
            $.ajax({
                url: "<?= base_url('studio/ajax/upload') ?>",
                method: "POST",
                data: data,
                contentType: false,
                processData: false,
                success: function(data) {
                    $(`input[name='comments_status'][value='${data}']`).prop('checked', true);

                }
            })
        }


        $(".radio-mark").click(function() {
            let parentDiv = $(this).closest('.inputs');
            parentDiv.find('input[type="radio"]').prop('checked', true);
        });

        
        $('input[name="visibility"]').change(function() {
            let selectedValue = $(this).val();
            var data = new FormData();
            data.append('operation', "setStatus");
            data.append('status', selectedValue);
            data.append('unique_id', $("#unique_id").val());
            $.ajax({
                url: "<?= base_url('studio/ajax/upload') ?>",
                method: "POST",
                data: data,
                contentType: false,
                processData: false,
                success: function(status) {
                    if (status === 'success') {
                        getStatus();
                        setTimeout(() => {
                            $('#save_status').text(savedAs());
                        }, 400);

                    } else {
                        $('#save_status').text("Save Failed");
                    }
                }
            })

        });
        $('input[name="audience"]').change(function() {
            let selectedValue = $(this).val();
            var data = new FormData();
            data.append('operation', "setAudience");
            data.append('audience', selectedValue);
            data.append('unique_id', $("#unique_id").val());
            $.ajax({
                url: "<?= base_url('studio/ajax/upload') ?>",
                method: "POST",
                data: data,
                contentType: false,
                processData: false,
                success: function(status) {
                    if (status === 'success') {
                        getStatus();
                        setTimeout(() => {
                            $('#save_status').text(savedAs());
                        }, 400);

                    } else {
                        $('#save_status').text("Save Failed");
                    }
                }
            })

        });

        $('input[name="comments_status"]').change(function() {
            let selectedValue = $(this).val();
            var data = new FormData();
            data.append('operation', "setComments_status");
            data.append('comments_status', selectedValue);
            data.append('unique_id', $("#unique_id").val());
            $.ajax({
                url: "<?= base_url('studio/ajax/upload') ?>",
                method: "POST",
                data: data,
                contentType: false,
                processData: false,
                success: function(status) {
                    if (status === 'success') {
                        getStatus();
                        setTimeout(() => {
                            $('#save_status').text(savedAs());
                        }, 400);

                    } else {
                        $('#save_status').text("Save Failed");
                    }
                }
            })

        });


    }



});



$(document).ready(function() {
    $('.custom-select').on('click', function() {
        $(this).toggleClass('open');
    });

    $('.option').on('click', function() {
        var selectedText = $(this).text();
        $('.select-trigger').text(selectedText);
        $('.option').removeClass('selected');
        $(this).addClass('selected');
    });

    $(document).on('click', function(e) {
        if (!$('.custom-select').is(e.target) && $('.custom-select').has(e.target).length === 0) {
            $('.custom-select').removeClass('open');
        }
    });
}); 
</script>