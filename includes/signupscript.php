<script>
    $(document).ready(function(){
    $("#useremail").on("keyup", function(){
        var email = $(this).val();
        if(email != ''){
        var fd = new FormData();
        fd.append('email', email);
        fd.append('emailcheck', 'emailcheck');

        let xhr = new XMLHttpRequest();
            xhr.open("POST","<?= base_url('ajax/account') ?>", true);
            xhr.onload = () =>{
                    if(xhr.readyState === XMLHttpRequest.DONE ){
                        if(xhr.status === 200){
                            let data = xhr.response;
                            document.querySelector('.invalid-usermail').textContent = data;
                            if(data == 'success'){
                                document.querySelector('.invalid-usermail').style.display = 'none';
                            }
                            else{
                                //error_text.textContent = data;
                                //error_text_div.style.display = 'block';
                                document.querySelector('.invalid-usermail').style.display = 'block';

                            }
                        }
                    }
            }

            xhr.send(fd);//sending the form data to php


            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                if(email.match(mailformat)){
                    document.querySelector('.invalid-usermail2').style.display = 'none';
                }
                else{
                    document.querySelector('.invalid-usermail2').textContent = 'Email Id is invalid!!!';
                    document.querySelector('.invalid-usermail2').style.display = 'block';
                }
            }
            else{
                document.querySelector('.invalid-usermail').style.display = 'none';
                document.querySelector('.invalid-usermail2').style.display = 'none';

            }

    });


    $("#username").on("keyup", function(){
        var username = $(this).val();
        var fd = new FormData();
        fd.append('usernamechek', username);

        let xhr = new XMLHttpRequest();
            xhr.open("POST","<?= base_url('ajax/account') ?>", true);
            xhr.onload = () =>{
                    if(xhr.readyState === XMLHttpRequest.DONE ){
                        if(xhr.status === 200){
                            let data = xhr.response;
                            document.querySelector('.invalid-username').textContent = data;
                            if(data == 'success'){
                                document.querySelector('.invalid-username').style.display = 'none';
                            }
                            else{
                                //error_text.textContent = data;
                                //error_text_div.style.display = 'block';
                                document.querySelector('.invalid-username').style.display = 'block';

                            }
                        }
                    }
            }

            xhr.send(fd);//sending the form data to php


    });

       
        $("#reg_password").on("keyup", function(){
            var password = $(this).val();
            if(password != ''){
                if(password.length>=8 && password.match(/[a-z]+/) && password.match(/[A-Z]+/) && password.match(/[0-9]+/) && password.match(/[$@#&!]+/)){
                    document.querySelector('.invalid-password').style.display = 'none';
            
                }
                else{
                    let data = 'Password must contain: minimum <b>8 characters</b>, at <b>lowercase</b> letter (a-z), at least <b>uppercase</b> letter (A-Z), at least <b>number</b> (0-9) and at least <b>special character</b> ($@#&!)';
                    document.querySelector('.invalid-password').innerHTML = data;
                    document.querySelector('.invalid-password').style.display = 'block';
            
                }
            }
            else{
                document.querySelector('.invalid-password').style.display = 'none';
            }
            })
    })

    $(document).ready(function(){
        const login_lock = document.querySelector(".lock");
        const loginpassword = document.querySelector("#reg_password");
        login_lock.addEventListener("click", function () {
            const type = loginpassword.getAttribute("type") === "password" ? "text" : "password";
            loginpassword.setAttribute("type", type);
        });
    })
    $(document).ready(function(){
        $("#reg-next").on("click", function(){
           var first_name = $("#first_name").val();
           var last_name = $("#last_name").val();
           var email = $("#useremail").val();
           var username = $("#username").val();
           var password = $("#reg_password").val();
           var birthday = $("#birthday").val();
           var gender = $('input[name="gender"]:checked').val();
           if(password.length>=8 && password.match(/[a-z]+/) && password.match(/[A-Z]+/) && password.match(/[0-9]+/) && password.match(/[$@#&!]+/)){
                if(first_name !='' && last_name !='' && email !='' && gender != '' && username != '' && birthday != ''){
                  var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                  if(email.match(mailformat)){
                    var fd = new FormData();
                      fd.append('reg_next','reg_next');
                      fd.append('first_name',first_name);
                      fd.append('last_name',last_name);
                      fd.append('email',email);
                      fd.append('username',username);
                      fd.append('password',password);
                      fd.append('gender',gender);
                      fd.append('birthday',birthday);
                      let xhr = new XMLHttpRequest();
                        xhr.open("POST","<?= base_url('ajax/account') ?>", true);
                        xhr.onload = () =>{
                                if(xhr.readyState === XMLHttpRequest.DONE ){
                                    if(xhr.status === 200){
                                        let data = xhr.response;
                                        if(data == 'eamilexist'){
                                            document.querySelector('.invalid-usermail').textContent = 'this email already exist!!!';
                                            document.querySelector('.invalid-usermail').style.display = 'block';                        
                                        }
                                        else if(data == 'userexist'){
                                            document.querySelector('.invalid-username').textContent = 'this username already exist!!!';
                                            document.querySelector('.invalid-username').style.display = 'block';                       
                                        }
                                        else{
                                            document.querySelector('.sessoin_before').style.display = 'none';                       
                                            document.querySelector('.sessoin_after').style.display = 'block';                       

                                         }
                                         //console.log(data);
                                    }
                                }
                        }
                        xhr.send(fd);



                    }}}


    })
    
    
    })
    $(document).ready(function(){
        $("#profile_photo_preview").on("click", function(){
            $("#profile_photo_upload label").click();
        })
        setInterval(()=>{
            var preview = document.querySelector('#profile_photo_preview');
            var file    = document.querySelector('#photo').files[0];
            if(file != 0 ){
                var reader  = new FileReader();
                reader.onloadend = function () {
                preview.src = reader.result;
                }
                if (file) {
                reader.readAsDataURL(file);
                } else {
                preview.src = "";
                }
                preview.style.width='100%';
            }
            else{
                preview.style.width='0%';
            }
         },100);



         $("#reg-submit").on("click", function(){
            var file    = document.querySelector('#photo').files[0];
            if(file != 0 ){
                var fd = new FormData();
                fd.append('reg_submit','reg_submit');
                fd.append('file',file);
                let xhr = new XMLHttpRequest();
                xhr.open("POST","<?= base_url('ajax/account') ?>", true);
                xhr.onload = () =>{
                    if(xhr.readyState === XMLHttpRequest.DONE ){
                        if(xhr.status === 200){
                            let data = xhr.response;
                            if(data == 'invalid-image-type'){
                                document.querySelector('.invalid-image-type').style.display = 'block';
                            }
                            else if(data == 'success'){
                                location.reload()
                            }
                            else{
                                document.querySelector('.invalid-image-type').style.display = 'none';
                            }
                        }
                    }
                    
                }
                xhr.send(fd);
        }
         })

    });
   

    
</script>