<script>
    $(document).ready(function(){
        var d = new Date();
        var date = d.getDate();
        var month = d.getMonth();
        var montharr =["Jan","Feb","Mar","April","May","June","July","Aug","Sep","Oct","Nov","Dec"];
        month=montharr[month];
        var year = d.getFullYear();
        $('.created-date').html(month + ' ' + year)
    })
</script>
<script>
    $(document).ready(function(){
        $("#channel_name").on("keyup", function(){
            var name = $(this).val();
            $('#channel_name_preview').html(name);
        })
        $("#channel_description").on("keyup", function(){
            var description_preview = $(this).val();
            $('#description_preview').html(description_preview);
        })
        $('#profile_photo').change(function(e){
            var fileName = e.target.files[0].name;
            $('.profile_photo_name_show').html(fileName);
            
            let preview = document.querySelector('#profile_photo_preview');
            let file    = document.querySelector('#profile_photo').files[0];
            let reader  = new FileReader();
            reader.onloadend = function () {
            preview.src = reader.result;
            }
            if (file) {
            reader.readAsDataURL(file);
            } else {
            preview.src = "";
            }
        });
        $('#cover_photo').change(function(e){
            var fileName = e.target.files[0].name;
            $('.cover_photo_name_show').html(fileName);

            let preview = document.querySelector('#cover_photo_preview');
            let file    = document.querySelector('#cover_photo').files[0];
            let reader  = new FileReader();
            reader.onloadend = function () {
            preview.src = reader.result;
            }
            if (file) {
            reader.readAsDataURL(file);
            } else {
            preview.src = "";
            }
        });
        $(".add_more").on("click", function(){
            let item =document.querySelector('.links_add');
            let add_more= '<div class="d-flex justify-content-between align-items-center  mt-1"><input type="text" class="form-control social_media_name" style="width:30%" placeholder="Name"><input type="text" class="form-control social_media_link" style="width:65%" placeholder="Profile link"></div>';
            item.insertAdjacentHTML('beforeend',add_more);
            socail_media();
        });
        
        socail_media();
        function socail_media(){
            let item = ['.social_media_name','.social_media_link'];
            for(let k=0; k < item.length; k++){
               
            $(item[k]).on("keyup", function(){
                var name = $('.social_media_name');
                var link = $('.social_media_link');
                var link_list = '';
                for(let i=0; i < name.length; i++){
                    for(let j=0; j < link.length; j++){
                        if(i == j){
                            link_list += '<li><a href="'+link[j].value+'" title="'+name[i].value+'" style="text-transform:capitalize">'+name[i].value+'</a></li>';
                        }
                    }
                }
                $('.link_preview').html(link_list);

                
            })
        }}

        $(".submit").on("click", function(){
            var channel_name = $('#channel_name').val();
            var profile_photo = document.querySelector('#profile_photo').files[0];
            var cover_photo = document.querySelector('#cover_photo').files[0];
            var channel_description = $('#channel_description').val();
            var name = $('.social_media_name');
            var link = $('.social_media_link');
            var link_list = '';
            for(let i=0; i < name.length; i++){
                for(let j=0; j < link.length; j++){
                    if(i == j){
                        let m = name[i].value;
                        let n = link[j].value;
                        link_list += m + '@' + n + '^';
                    }
                }
            }
            if(channel_name != '' && channel_description != '' && channel_description != '' && profile_photo != 0 && cover_photo !=0){
                var fd = new FormData();
                fd.append('create','create');
                fd.append('channel_name',channel_name);
                fd.append('profile_photo',profile_photo);
                fd.append('cover_photo',cover_photo);
                fd.append('channel_description',channel_description);
                fd.append('link_list',link_list);
                $.ajax({
                    url:"<?= base_url('ajax/channel') ?>",
                      type: 'post',
                      data: fd,
                      contentType: false,
                      processData: false,
                      success: function(response){
                        location.href = "<?= base_url('my-channel') ?>";
                      },
                  });
                


            }


        })

    })
</script>