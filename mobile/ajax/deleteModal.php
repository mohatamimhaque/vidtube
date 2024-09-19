<div id="modal" class=''>
    <div class="div">
      <div class="close">
        <div></div>
      </div>
     
      <p>You want to delete</p>
       <h6>sjjjsj ajsjj jsjs jsjs jsjsj jsjsjs jsjs</h6>
      <button value='ok'>Confirm</button>
    </div>
  </div>
  <style>
     #modal{
    position: fixed;
  width:100%;
  height:100vh;
  z-index:40;
  background:rgba(0,0,0,0.5);
  overflow: hidden;
  display:none;
  align-items:center;
  justify-content: center;
  
  }
  #modal.active{
    display:flex;
  }
  #modal .div{
    position: relative;
    background: white;
    padding:24px 20px;
    width:80%;
    border-radius:8px;
    box-shadow:0 0 12 rgba(0,0,0,0.28);
  }
  #modal .close{
    width:24px;
    height: 24px;
    
    padding: 2px;
    position:absolute;
    bottom:4px;
    left:8px;
    display:flex;
    align-items: center;
    justify-content: center;
  }
   #modal button{
     font-size: 16px;
     font-weight: 700;
     color: rgba(0,0,0,0.5);
   border: none;
    background: none;
    padding: 5px;
    position:absolute;
    bottom:4px;
    right:8px;
    display:flex;
    align-items: center;
    justify-content: center;
  }
  #modal .close div{
    position: relative;
    width:3px;
    height: 18px;
    background: rgba(0,0,0,0.5);
    border-radius: 2px;
    transform: rotate(45deg);
  }
    #modal .close div:after{
      content: '';
    position: absolute;
    width:3px;
    height: 18px;
    background: rgba(0,0,0,0.5);
    border-radius: 2px;
    transform: rotate(-90deg);
  }
  #modal p{
    
    font-size: 14px;
    color: rgba(0,0,0,0.8);
    text-align: center;
  }
  #modal h6{
    font-size: 14px;
    color: rgba(0,0,0,0.8);
    text-align: center;
    
    color:pink;
    margin-bottom:12px;
  }
   .delete{
     position: absolute;
     bottom:10px;
     right:0px;
     padding:6px 8px;
     color: rgba(0,0,0,0.7);
     background:white;
     border: none;
     border-radius: 2px;
     font-size: 18px;
     font-weight: 700;
     z-index:20;
     box-shadow: 0 0 2px rgba(0,0,0,0.2);
     display:none;
     
     
   }
   .delete.active{
     display:flex;
   }
  </style>
  <script>
        function deleteAction(){
    $(document).ready(function(){
  $('.icon.action').click(function(){
    let thisclicked = $(this);
    thisclicked.closest('.video_list').find('.delete').addClass('active');
    
  })
    $('.delete').click(function(){
      $('.delete').removeClass('active');
    let thisclicked = $(this);
    let id = thisclicked.closest('.video_list').find('.delete').val();
    let title = thisclicked.closest('.video_list').find('.video-title').text().trim();
    
    $('#modal').addClass('active');
    $('#modal button').val(id);
    
    $('#modal h6').text(title);
    
    
    
    
  })
  
   $('#modal .close').click(function(){
     $('#modal').removeClass('active');
   })
   $('#modal button').click(function(){
     let thisclicked = $(this);
     let id = thisclicked.val();
     $.ajax({
      url:"ajax/home.php",
      type:"POST",
      cache:false,
      datatype: 'JSON',
      data:{page:'delete',id:id},
      success:function(data){
       // alert(data)
        location.reload();
      
      }
        })
     //$('#modal').removeClass('active');
   })
  

 })
}
  </script>
  