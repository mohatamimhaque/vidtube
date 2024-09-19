$(document).ready(function() {
  $('.uploadModal .close').on('click', function() {
      $('.uploadModal').removeClass('visible');
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
              $(this).find('.bullet').addClass('active'); // Corrected line
              $(this).addClass('active')

          } else {
              $(this).find('.bullet').removeClass('active'); // Corrected line
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
  var $dropZoneElement = $(".drop-zone");
  var subtitle = [];
  var thumbnail = [];
  var cast = [];
  var tags = [];
  var category = [];
  var moment = [];
  var scrubbing_img = [];
  var main_video = [];
  var ac_thumbnail = 1;
  var backup_thumbnail;
  var videoDuration;

  var reader = new FileReader();

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
        console.log('ok')
        $('.uploadModal').addClass('visible');
          $(".firstpage").removeClass('active');
          $(".firstpage").removeClass('visible');
          $(".secondpage").addClass('visible');

      }, 1000);

      reader.readAsDataURL(files[0]);

      reader.addEventListener('progress', (event) => {
          if (event.loaded && event.total) {
              const percent = parseInt((event.loaded / event.total) * 100);

              $('.modalFooter .status').html('Uploading ' + percent + '%...');
              if (percent === 100) {
                  reader.onload = function(e) {
                      generateThumbnails(e.target.result);
                      // moments(e.target.result);
                      $('.modalFooter .status').html('Upload complete ... Processing will begin shortly');
                      $("#video_overlay").css("display", 'none');
                      controls();
                      document.querySelector("#main_video").src = e.target.result;

                      document.querySelector("#main_video").load();
                      let name = files[0].name.split('.')[0];
                      $('#video_title').val(name);

                      $('.video_name').html(name);
                      $('#filename').html(name);

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
              $('.modalFooter .status').html("all ok");
              // let canvas = document.createElement("canvas");
              // canvas.width = 1080;
              // canvas.height = 720;
              // video.currentTime = video.duration * 0.2;
              // let context = canvas.getContext("2d");
              // context.drawImage(video,0,0,canvas.width,canvas.height);
              // backup_thumbnail = canvas.toDataURL("image/jpeg");

          }, needTime);
      })
  }




  $('#video_title').keyup(function(event) {
      let name = $(this).val().replace(/^\s+/, '');
      $('.video_name').html(name);
      $('#filename').html(name);
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


      }
  });



  $('#description').blur(function() {
      let text = $(this).val().replace(/^\s+/, '');
      let l = text.length;
      if (l > 1) {


      }
  });


  $(document).ready(function() {
      $('#upload_thumbnail').on('change', function(e) {
          if (this.files.length) {
              th_upload(this.files);
          }
      });
  });




  function th_upload(file) {

      let temp = Object.values(file);
      thumbnail = thumbnail.concat(temp);
      th_update(thumbnail);
  }

  function th_update(file) {
      $('.thum_gallery').html('');
      for (let i = 0; i < file.length; i++) {
          let ext = ['jpg', 'jpeg', 'png'];
          var src = '';
          if (ext.includes(file[i].name.split('.')[1])) {
              const thumb_reader = new FileReader();
              thumb_reader.readAsDataURL(file[i]);
              thumb_reader.onload = () => {
                  src = thumb_reader.result;
                  document.querySelector('.thum_gallery').innerHTML += ` <div class="img">
                               <button value="${i}" class="rimg">
                                  <i class="material-icons">close</i>
                              </button>
                               <img src="${src}" alt="" style="width:100%;height:100%">
                             </div>`;
              }
          } else {
              thumbnail.splice(i, 1)

          }
      }



      setTimeout(function() {
          rimg();
          $(`.thum_gallery .img:nth-child(${ac_thumbnail})`).addClass('active');

          let src = document.querySelector('.thum_gallery .active img').src;
          document.querySelector('#video_overlay_img img').src = src;
          document.querySelector('#video_overlay_img').style.display = "flex";
      }, 500)

  }

  function rimg() {
      $(".rimg").click(function(e) {
          let val = $(e.target).val();
          thumbnail.splice(val, 1);
          th_update(thumbnail);
          ac_thumbnail = 1;
      })


      $('.thum_gallery .img').click(function(e) {
          //var thisclicked = $(this); 
          ac_thumbnail = parseInt($(this).closest('.img').find('button').val()) + 1;
          th_update(thumbnail);

      })

  }

  $(".autoGenrate").click(function(e) {


  })
  generateThumbnail($('#main_video')[0].src)

  function generateThumbnail(videoSrc) {
      var video = document.createElement('video');
      video.src = videoSrc;
      video.crossOrigin = 'anonymous';
      video.load();

      var canvas = document.createElement('canvas');
      var context = canvas.getContext('2d');

      $(video).on('loadedmetadata', function() {
          var randomTime = Math.random() * video.duration;
          video.currentTime = randomTime;
      });

      $(video).on('seeked', function() {
          canvas.width = video.videoWidth;
          canvas.height = video.videoHeight;

          context.drawImage(video, 0, 0, canvas.width, canvas.height);

          var thumbnailImg = canvas.toDataURL('image/png');




      });
  }




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
  }

  function tags_remove() {
      $("#tags button").click(function(e) {
          let val = parseInt($(this).val())
          tags.splice(val, 1);
          tags_update(tags);

      });
  }


  $('#tags_in').blur(function() {


  });




  var $sbInput = $("#subtitles");


  $sbInput.on("change", function(e) {
      if ($sbInput[0].files.length) {
          sb_upload(e.target.files);
      }
  });


  function sb_upload(file) {
      let temp = Object.values(file);
      subtitle = subtitle.concat(temp);
      sb_update(subtitle);
  }

  function sb_update(file) {
      let html = ``;
      for (let i = 0; i < file.length; i++) {
          let fileSize = file[i].size;
          let name = file[i].name;
          let ext = file[i].name.split('.').pop();
          fileSize = (fileSize >= 1024 * 1024) ? (fileSize / (1024 * 1024)).toFixed(2) + 'MB' :
              (fileSize >= 1024) ? (fileSize / 1024).toFixed(2) + 'KB' :
              fileSize + 'Bytes';

          if (ext === 'vtt') {
              html += `  <div class="content">
                            <div class="upload">
                              <i class="fas fa-file-alt"></i>
                              <div class="details">
                                <span class="name">${name}</span>
                                <span class="size">${fileSize}  • Uploaded</span>
                              </div>
                            </div>
                            <button value="${i}" class=" rsb">
                               <i class="material-icons">close</i>
                           </button>
                         </div>`;
          } else {
              subtitle.splice(i, 1);
          }
      }

      $(".uploaded-area").html(html);
      rsb();
  }

  function rsb() {
      $(".rsb").on("click", function(e) {
          let val = $(this).val();
          subtitle.splice(val, 1);
          sb_update(subtitle);
      });
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


createId();
function createId(){
    console.log("ok")
		$.ajax({
			url:"../studio/ajax/upload",
			method:"POST",
			contentType:false,
			processData:false,
			success:function(data){
				console.log(data);
				}
			})
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
