$(document).ready(function(){
    $('#filter_btn').click(function(){
        $('.filter-sec').toggleClass('active');
    })
    $('.vidz_sec .videoo').on('mouseenter',function(){
        let video = $(this).find('video')[0];
        video.play();
        let th = $(this);
        $(video).on('timeupdate',function(){
            $(th).find('.vid-time').html(timeFormat(video.duration-video.currentTime));
        })
    })

    $('.vidz_sec .videoo').mouseleave(function(){
        let video = $(this).find('video')[0].pause();
    })



function timeFormat(time){
    let totalSec = Math.floor(time % 60);
    let totalMin = Math.floor(time / 60);
    let totalhour = Math.floor(time / 3600);

    totalMin = totalMin - totalhour * 60;
    
    //if seconds are less than 10 then add 0 at the begning
    totalhour < 10 ? totalhour = '0' + totalhour : totalhour;
    totalSec < 10 ? totalSec = '0' + totalSec : totalSec;
    totalMin < 10 ? totalMin = '0' + totalMin : totalMin;
    
    if(totalhour >= 1){
        return `${totalhour}:${totalMin}:${totalSec}`;
    }
    else{
        return `${totalMin} : ${totalSec}`;
    }
}


})
var items = document.querySelectorAll('.vidz_sec .videoo');
/*
for(items as item){

}*
for(let i=0;i < items.length;i++){
    items[i].addEventListener('mouseenter',(e)=>{
        let video = items[i].querySelector('video');
        video.
        video.click();
        video.play();
    })
}*/

$('form').on('keyup keypress',function(e){
    var keycode = e.keyCode || e.which;
    if(keycode === 13){
        e.preventDefault();
        return false;
    }
})

