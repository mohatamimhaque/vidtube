   <script>
   // Wait for the video to load

   
   
   
   
   
   var start = 0;
   limit = 5;
   var search = '0';
   var category = '0'
   //load()
   function load(){
     
     const title = location.href.split('?title=')[1].split('%20').join(' ').split('-');
     
     let total = parseInt(title[0]);
     start = parseInt(title[1]);
     
     if(start <= total){
     filter_data(category,limit,start,search);
     
     
     }
     else{
       $('#loading_icon').css('display', 'none');
     }
     
   }
  /* setInterval(() => {
     first_filter_data('0',limit,start);
   },20000)
   */
   
   first_filter_data('0',limit,start,'0');
    function filter_data(category,limit,start,search){
     
   let categor = category;
   //alert(category);
    
    $.ajax({
  url:"ajax/home.php",
  type:"POST",
  cache:false,
  datatype: 'JSON',
  data:{page:'home',search:search,limit:limit,category:categor,start:start},
  success:function(data){
  $("#wrapper").append(data);
  control(start-1);
  deleteAction();
  $('#loading_icon').css('display', 'none');
  
  }
    })
      
      
      
    }
    
    
    function first_filter_data(category,limit,start,search){
     
   let categor = category;
    
    $.ajax({
  url:"ajax/home.php",
  type:"POST",
  cache:false,
  datatype: 'JSON',
  data:{page:'home',search:search,limit:limit,category:categor,start:start},
  success:function(data){
  $("#wrapper").html(data);
  control(0);
  deleteAction();
  $('#loading_icon').css('display', 'none');
  
  }
    })
      
      
      
    }
     
    const checkbox = document.querySelectorAll('#nav .checkbox');
for (let k = 0; k < checkbox.length; k++) {
  checkbox[k].addEventListener('click', (e) => {
    
    for(let i = 0; i < checkbox.length; i++) {
      checkbox[i].classList.remove('active');
      document.querySelector('#nav .all').classList.remove('active');
      let input = checkbox[i].querySelector('input');
      if(input.checked){
        input.click();
      }
      if(k == i){
        checkbox[k].querySelector('input').click();
        checkbox[k].classList.add('active');
        
       
      }
    }
    
    
    
  })
}
document.querySelector('#nav .all').addEventListener('click', (e) => {
    
    for(let i = 0; i < checkbox.length; i++) {
      let input = checkbox[i].querySelector('input');
      if(input.checked){
        input.click();
      }
      checkbox[i].classList.remove('active');
    }
    
    e.target.classList.add('active');
    
        //category = 0;
        //
      
  })
  var run = 0
$(".common_selector").click(function() {
  category = $(this).find("input").val();
  run++
 // alert(run);
 search =0;  
  if(run == 2){
    first_filter_data(category,limit,0,search);
  }
  
      setTimeout(function() {
       run =0
      }, 1000);
      
});
  $("#search").keyup(function() {
    search  = $(this).val();
    first_filter_data('0',limit,0,search);
  })
  setInterval(() => {
        const last = window.screen.height;
        const iii = document.querySelectorAll('.video_list');
        if(iii.length>1){
       // console.log(iii)
        const last_element = iii[iii.length - 1].getBoundingClientRect().top + 300;
        
        if (last_element < last) {
          $('#loading_icon').css('display', 'flex');
          load();
        }
        }
        
        
  },1000)

for(let i= 0; i<16; i++){
    $('#loading_icon').append(`<div class="wave ${i}"></div>`)
  }
 
  
  
  



  
   </script>