function action(){
  
$('.table').DataTable({
    displayLength:10
  });
}

var fd = new FormData();
fd.append('operation','showvideo');
fd.append('owner',$('#owner').val())
$.ajax({
  url:"../ajax/videopage",
  method:"POST",
  data:fd,
  contentType:false,
  processData:false,
  success:function(data){
    console.log(data);
    $('#data').html(data);
    action();
  }
})
