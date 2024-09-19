function control(s){
  
 // alert(s)
  const contents = document.querySelectorAll('.video_list');
  const height = window.screen.height;
  for (let tt = 0; tt < contents.length; tt++) {
    const content = contents[tt];
    const main_video = content.querySelector('video');
    const video_title = content.querySelector('.video-title');
    const duration = content.querySelector('.duration');
    const thumbnail_img = content.querySelector('.video_overlay img');
    let kk = video_title.textContent.trim();
    if(kk.length > 50){
      video_title.textContent = kk.substring(0, 50) + "...";
      
    }
    
    contents[0].classList.add('active');
    contents[0].querySelector('.video_list video').play()
    contents[tt].querySelector('.video_list video').muted='false';
    content.addEventListener('touchstart', function(e) {
     document.querySelector('.video_list.active video').pause();
    document.querySelector('.video_list.active').classList.remove('active');
  
  
   for (let i=0;i<contents.length; i++){
     if(contents[i] == contents[tt]){
       contents[i].querySelector('.video_list video').play();
       contents[i].classList.add('active');

     }
   }
    
})
    main_video.addEventListener("loadeddata", () => {
            const canvas = document.createElement("canvas");
           // console.log(main_video.videoHeight);
          //  console.log(main_video.videoWidth)
          const thumbnailVideo = document.createElement("video");
                
                thumbnailVideo.src = main_video.src;
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


                

        });
    
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
            } else {
                duration.innerHTML = `${totalMin} : ${totalSec}`;
            }
        })
                //current video duration
        main_video.addEventListener('timeupdate', (e) => {
          let current = duration;
            let currentVideoTime =e.target.duration - e.target.currentTime;
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
})
    
    
  }
}
 
