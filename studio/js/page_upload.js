
var up_pro_status = document.querySelector('.up_pro_status');
up_pro_status.style.display="none";
var dropZoneElement = document.querySelector(".drop-zone");
var subtitle = [];
var thumbnail = [];
var cast = [];
var tags =[];
var category =[];
var moment =[]
var scrubbing_img =[];
var main_video=[];
var ac_thumbnail=1;
var backup_thumbnail;
var videoDuration;


var reader = new FileReader();
document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {

  dropZoneElement.addEventListener("click", (e) => {
    inputElement.click();
  });

  inputElement.addEventListener("change", (e) => {
    if (inputElement.files.length) {
          upload_progress(e.target.files);
          main_video.push(e.target.files[0]);

    }
  });

  dropZoneElement.addEventListener("dragover", (e) => {
    e.preventDefault();
    dropZoneElement.classList.add("drop-zone--over");
  });

  ["dragleave", "dragend"].forEach((type) => {
    dropZoneElement.addEventListener(type, (e) => {
      dropZoneElement.classList.remove("drop-zone--over");
    });
  });

  dropZoneElement.addEventListener("drop", (e) => {
    e.preventDefault();
    upload_progress(e.dataTransfer.files);

    main_video.push(e.dataTransfer.files[0]);


    if (e.dataTransfer.files.length) {
      inputElement.files = e.dataTransfer.files;
    }

    dropZoneElement.classList.remove("drop-zone--over");
  });
});


//upload_progress()

function upload_progress(files){
  up_pro_status.style.display="flex";
  dropZoneElement.style.display="none";

  reader.readAsDataURL(files[0]);
  
  reader.addEventListener('progress', (event) => {
    if (event.loaded && event.total) {
      const percent = parseInt((event.loaded / event.total) * 100);
       
      $('.percents span').html(percent+'%');
      if(percent===100){
        reader.onload = function(e) {
         /// console.log('loaded')
         generateThumbnails(e.target.result);
         moments(e.target.result);
         $('.percents').html(`<div class="waiting"></div>`);
          document.querySelector("#main_video source").src = e.target.result;

          document.querySelector("#main_video").load();
          let name = files[0].name.split('.')[0];
          $('#title').val(name);
          $('.vid-info h3').html(name);

      
        }.bind(this)
      }
    }
});

}



/*subtitle upload code*/

var sb_form = document.querySelector(".sb_wrapper form");
var sb_input = document.querySelector(".sb_wrapper input");


 
  sb_form.addEventListener("click", (e) => {
    sb_input.click();
  });

  sb_input.addEventListener("change", (e) => {
    if (sb_input.files.length) {
          sb_upload(e.target.files);
         

    }
  });

  sb_form.addEventListener("dragover", (e) => {
    e.preventDefault();
    sb_form.classList.add("drop-zone--over");
    
  });

  ["dragleave", "dragend"].forEach((type) => {
    sb_form.addEventListener(type, (e) => {
      sb_form.classList.remove("drop-zone--over");
    });
  });

  sb_form.addEventListener("drop", (e) => {
    e.preventDefault();
    sb_upload(e.dataTransfer.files)

    sb_form.classList.remove("drop-zone--over");
  });

function sb_upload(file){
  let temp=Object.values(file);
  subtitle = subtitle.concat(temp);
  sb_update(subtitle); 
}
function sb_update(file){
  let html=``;
  let sb_list=""
  for(let i=0;i<file.length;i++){
    let fileSize =file[i].size;
    let name = file[i].name;
    let ext = file[i].name.split('.')[1];
    fileSize = (fileSize>=1024*1024)?(fileSize/(1024*1024)).toFixed(2)+'MB':(fileSize>=1024)?(fileSize/1024).toFixed(2)+'KB':fileSize+'Bytes';
    if(ext === 'vtt'){
    html+=`<div class="content">
    <div class="upload">
      <i class="fas fa-file-alt"></i>
      <div class="details">
        <span class="name">${name}</span>
        <span class="size">${fileSize}  • Uploaded</span>
      </div>
    </div>
    <button value="${i}" class="close rsb">
       <div class="bar"></div>
   </button>
      </div>`;
    }
    else{
      subtitle.splice(i,1)
    }
    
  }
 // console.log(file);

  $(".uploaded-area").html(html);
  rsb();
}



function rsb(){
  $(".rsb").click(function(e){
    let val = $(e.target).val();
    subtitle.splice(val,1);

    sb_update(subtitle); 



})
}
/*    
*/


/* thumbnail upload */




var th_form = document.querySelector(".th_wrapper .th_upload");
var th_input = document.querySelector(".th_wrapper input");

document.querySelector(".add_more").addEventListener("click", (e) => {
  th_input.click();
});
  th_form.addEventListener("click", (e) => {
    th_input.click();
  });

  th_input.addEventListener("change", (e) => {
    if (th_input.files.length) {
          th_upload(e.target.files);
         

    }
  });

  th_form.addEventListener("dragover", (e) => {
    e.preventDefault();
    th_form.classList.add("drop-zone--over");
    
  });

  ["dragleave", "dragend"].forEach((type) => {
    th_form.addEventListener(type, (e) => {
      th_form.classList.remove("drop-zone--over");
    });
  });

  th_form.addEventListener("drop", (e) => {
    e.preventDefault();
    th_upload(e.dataTransfer.files)

    th_form.classList.remove("drop-zone--over");
  });

function th_upload(file){
  
  let temp=Object.values(file);
  thumbnail = thumbnail.concat(temp);
  th_update(thumbnail); 
}
function th_update(file){
 $('.thum_gallery').html('');
  for(let i=0;i<file.length;i++){
    let ext = ['jpg','jpeg','png'];
    var src='';
    if(ext.includes( file[i].name.split('.')[1])){
      const thumb_reader = new FileReader();
    thumb_reader.readAsDataURL(file[i]);
    thumb_reader.onload = () => {
      src = thumb_reader.result;
      document.querySelector('.thum_gallery').innerHTML +=` <div class="child blur">
      <img src="${src}" alt="">
     <button value="${i}" class="close rimg">
       <div class="bar"></div>
   </button>
   </div>`;
    }      
  }
    else{
      thumbnail.splice(i,1)
    
  }}
  if(thumbnail.length > 0){
    $(".pre_wrapper").css('display',"flex");
    $(".pre_waiting.waiting").css('display',"flex");
    $(".pre_wrapper img").css('display',"none");
    $(".add_more").css('display',"none");
  }
  else{
    $(".pre_wrapper").css('display',"none");
  }

  
setTimeout(function(){
  rimg();
  $(`.thum_wrapper .thum_gallery .child:nth-child(${ac_thumbnail})`).addClass('active');
  
 
let src = document.querySelector('.thum_gallery .active img').src;
document.querySelector('.thum_preview img').src = src;
document.querySelector('.video_overlay_img').src = src;
    
  $(".pre_waiting.waiting").css('display',"none");
$(".pre_wrapper img").css('display',"flex");
  $(".add_more").css('display',"flex");
  


},2000)

}

function rimg(){
  $(".rimg").click(function(e){
    let val = $(e.target).val();
    thumbnail.splice(val,1);
    th_update(thumbnail);
    ac_thumbnail =1;
})


$('.thum_gallery .child').click(function(e){
  //var thisclicked = $(this); 
  ac_thumbnail = parseInt($(this).closest('.child').find('button').val())+1;
  th_update(thumbnail); 

})


}











  $("#title").keyup(function(e){
    $('.vid-info h3').html($('#title').val());
  });


  /* cast code */
  $('.cast_add input').keyup(function(e){
    let val = $('.cast_add input').val();
    if(val === ''){
      $('.cast_add button').css('display','none');
    }
    else{
      $('.cast_add button').css('display','flex');
    }

    if(e.keyCode===13){
      cast_add();
    };
  })
  $('.cast_add button').click(function(){
    cast_add();
  })

function cast_add(){
  let temp =[$('.cast_add input').val()];
  if(temp!==""){

  $('.cast_add input').val('');
  cast = cast.concat(temp);
  cast_update(cast);}
}
function cast_update(e){
  let html='';
  $('#cast').html('');
  for(let i=0;i<e.length;i++){
    html+=`	<li>
    <a href="#">${e[i]}</a>
    <button value="${i}" class="close">
    <div class="bar"></div>
</button>
  </li>`;
  }
  $('#cast').html(html);
  cast_remove();

}
function cast_remove(){
   $("#cast button").click(function(e){
  let val = parseInt($(this).closest('li').find('button').val())

  cast.splice(val,1);
  cast_update(cast);



 });


}



  /* category code */
  $('.category_add input').keyup(function(e){
    let val = $('.category_add input').val();
    if(val === ''){
      $('.category_add button').css('display','none');
    }
    else{
      $('.category_add button').css('display','flex');
    }

    if(e.keyCode===13){
      category_add();
    };
  })
  $('.category_add button').click(function(){
    category_add();
  })

function category_add(){
  let temp =[$('.category_add input').val()];
  $('.category_add input').val('');
  category = category.concat(temp);
  category_update(category);
}
function category_update(e){
  let html='';
  $('#category').html('');
  for(let i=0;i<e.length;i++){
    html+=`	<li>
    <a href="#">${e[i]}</a>
    <button value="${i}" class="close">
    <div class="bar"></div>
</button>
  </li>`;
  }
  $('#category').html(html);
  category_remove();

}
function category_remove(){
   $("#category button").click(function(e){
  let val = parseInt($(this).closest('li').find('button').val())

  category.splice(val,1);
  category_update(category);



 });


}



  /*tags code */
  $('.tags_add input').keyup(function(e){
    let val = $('.tags_add input').val();
    if(val === ''){
      $('.tags_add button').css('display','none');
    }
    else{
      $('.tags_add button').css('display','flex');
    }

    if(e.keyCode===13){
      tags_add();
    };
  })
  $('.tags_add button').click(function(){
    tags_add();
  })

function tags_add(){
  let temp =[$('.tags_add input').val()];
  if(temp!==""){

    $('.tags_add input').val('');
    tags = tags.concat(temp);
    tags_update(tags);
  }
}
function tags_update(e){
  let html='';
  $('#tags').html('');
  for(let i=0;i<e.length;i++){
    html+=`	<li>
    <a href="#">${e[i]}</a>
    <button value="${i}" class="close">
    <div class="bar"></div>
</button>
  </li>`;
  }
  $('#tags').html(html);
  tags_remove();

}
function tags_remove(){
   $("#tags button").click(function(e){
  let val = parseInt($(this).closest('li').find('button').val())
  tags.splice(val,1);
  tags_update(tags);



 });


}


/* ---------   about code------------------ */
$('.about textarea').keyup(function(e){

  $('#about').html($(this).val())

})




function moments(src){
  let preview_video = document.createElement("video");
  preview_video.setAttribute("preload","metadata");
  preview_video.src = src;
  preview_video.addEventListener("loadedmetadata",()=>{
  let duration = preview_video.duration;
  let min = parseInt(duration/60);
  for(let i=0;i<=min;i++){
    document.querySelector('#min').innerHTML +=`<option value="${i}">${i}</option>`;

  }
  for(let i=0;i<=59;i++){
    document.querySelector('#sec').innerHTML +=`<option value="${i}">${i}</option>`;

  }
  
  
  $('.moments_add input').keyup(function(e){
    let val = $('.moments_add input').val();
    if(val === ''){
      $('.moments_add button').css('display','none');
    }
    else{
      $('.moments_add button').css('display','flex');
    }
    
    if(e.keyCode===13){
      moments_add();
    };
  })
  $('.moments_add button').click(function(){
    moments_add();
  })
  
  function moments_add(){
    let min = $('#min').val();
    let sec = $('#sec').val();
    let val = $('.moments_add input').val();
    if(min !== 'min' && sec !== 'sec' && val !==''){
      let time = parseInt(min)*60 + parseInt(sec);
      let temp = [[time,val]];
      moment = moment.concat(temp);
      moment_update(moment);
  }
  
}



function moment_update(e){
  let html='';
  for(let i=0;i<e.length;i++){
    let time = parseInt(e[i][0]);
    let min = parseInt(time/60);
    let sec = parseInt(time%60);
    min = (min < 10)?'0'+min:min;
    sec = (sec < 10)?'0'+sec:sec;
    html += `
    <li>
    <button value="${i}" class=".cross close">
       <div class="bar"></div>
   </button>
     <input type="button" class="time" value="${time}" style="display:none">
    <p><span>${min}:${sec}</span>${e[i][1]}</p>
    </li>`;
  }
  $('#moment ul').html(html);
  
  
  moments_remove();
  
}
function moments_remove(){
  $("#moment button").click(function(e){
    let val = parseInt($(this).closest('li').find('.cross').val())
    moment.splice(val,1);
    moment_update(moment);
    
    
  });
  $("#moment p").click(function(e){
    let val = parseInt($(this).closest('li').find('.time').val());
    document.querySelector('#video_wrapper #main_video').currentTime = val;
   });
  

  
  
}
})


}




function generateThumbnails(src){
  let video = document.createElement("video");
  video.setAttribute("preload","metadata");
  video.src = src;
  video.addEventListener("loadedmetadata",()=>{
  let duration = video.duration;
  videoDuration = duration;
  let time =5;
  let array = [];
  /*
  if(duration >=3600){
    time =20;
  }
  else if(duration >=300){
    time = 10;
  }
  else{
    time = 5;
  }; */
  for(let i=1;i<=duration;i+=time){
    array.push(i);
  }

  let j=0;


  var needTime = array.length*100;
const interval = setInterval(()=>{
  const canvas = document.createElement("canvas");
  canvas.width = 120;
  canvas.height = 80;
  video.currentTime = array[j];

    const context = canvas.getContext("2d");
    context.drawImage(video,0,0,canvas.width,canvas.height);
     scrubbing_img.push(canvas.toDataURL("image/jpeg"));
     
        document.querySelector(".fine_scribbing").innerHTML += `
       <div class="item">
         <div class="img">
            <img src='${canvas.toDataURL("image/jpeg")}' alt="">
             </div>
       </div>
        `;

      
      
        j++;
        $('.waiting').html(`<p>${parseInt((needTime-j*100)/1000)}s</p>`);
  },100)
  
  setTimeout(() => {
    clearInterval(interval);
    $("#publish").css("pointer-events","auto");
    $("#publish").css("cursor","pointer");
    $('.percents').html(`<span>100%<span>`);
    desktop();




    let canvas = document.createElement("canvas");
    canvas.width = 1080;
    canvas.height = 720;
    video.currentTime = video.duration * 0.2;
    let context = canvas.getContext("2d");
    context.drawImage(video,0,0,canvas.width,canvas.height);
    backup_thumbnail = canvas.toDataURL("image/jpeg");
    
  },needTime);
})
}
















$("#publish").click(function(){
  var data = new FormData();
  data.append('operation',"upload");
  data.append('title',$('#title').val());
  data.append('active_thumbnail',ac_thumbnail);
  data.append('specifier', $('input[name="specifier"]:checked').val());
  data.append('tags',tags.join("///"));
  data.append('category',category.join("///"));
  data.append('cast',cast.join("///"));
  data.append('about',$('.user-box.about textarea').val());
  data.append('moment',moment.map(interArray => interArray.join(":")).join("///"));
  data.append('owner',$("#owner").val());
  data.append('duration',videoDuration);
  data.append('backup_thumbnail',backup_thumbnail);
  for(let i=0;i<thumbnail.length;i++){
    data.append('thumbnail[]',thumbnail[i]);
  }
  for(let i=0;i<main_video.length;i++){
    data.append('video[]',main_video[i]);
  }
  for(let i=0;i<subtitle.length;i++){
    data.append('subtitle[]',subtitle[i]);
  }
  //console.log(backup_thumbnail);
  data.append('scrubbing_img',scrubbing_img.join('///'));
 upload(data);
})