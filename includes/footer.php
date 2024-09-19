<script src="<?= base_url('assets/js/glassmorphism.js') ?>"></script>
<script>

    $(function () {
        
        $('#signout-btn').click(function(){
            var fd = new FormData();
            fd.append('signout',"signout"); 
            $.ajax({
                url:"<?= base_url('ajax/account') ?>",
                method:"POST",
                data:fd,
                contentType:false,
                processData:false,
                success:function(data){
                    location.reload();
                    }
                })


        

        })
    })

</script>

<?php
include('includes/search.php');

?>
</body>
</html>
