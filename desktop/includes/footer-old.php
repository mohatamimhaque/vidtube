
	
    
    

<?php
include('css.php');
?>
<script>
     $(document).ready(function(){
        $("#signout-btn").on("click", function(){
            var fd = new FormData();
                fd.append('signout','signout');

                let xhr = new XMLHttpRequest();
                xhr.open("POST","<?= base_url('ajax/account') ?>", true);
                xhr.onload = () =>{
                        if(xhr.readyState === XMLHttpRequest.DONE ){
                            if(xhr.status === 200){
                                let data = xhr.response;
                                //console.log(data);
                                location.reload();
                            }
                        }
                }
                xhr.send(fd);
        });
    })
</script>
</body>
</html>