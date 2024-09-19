<script>
    $(document).ready(function(){

        $(".signin_next").on("click", function(){
            signinf1();
        })
        $(document).on('keypress',function(e){
            if(e.keyCode === 13){
                signinf1();
            }
        })
            function signinf1(){
                var verify = $("#verify").val();
                if(verify != ''){
                    var fd = new FormData();
                    fd.append('signin_next','signin_next');
                    fd.append('verify',verify);
                    let xhr = new XMLHttpRequest();
                    xhr.open("POST","<?= base_url('ajax/account') ?>", true);
                    xhr.onload = () =>{
                            if(xhr.readyState === XMLHttpRequest.DONE ){
                                if(xhr.status === 200){
                                    let data = xhr.response;
                                    //console.log(data);
                                    if(data == 'nofound'){
                                        document.querySelector('.invalid-usermail').style.display = 'block';
                                    }
                                    else{
                                        $('.replace').html(data);
                                        $(document).off('keypress');
                                        signin();
                                    }
                                }
                            }
                    }
                    xhr.send(fd);
                }
            }



        
     



   
    function signin(){
        $(document).on('keypress',function(e){
            if(e.keyCode === 13){
                signinf2();
            }
        })
            const login_lock = document.querySelector(".lock");
            const loginpassword = document.querySelector("#signin_pass");
            login_lock.addEventListener("click", function () {
                const type = loginpassword.getAttribute("type") === "password" ? "text" : "password";
                loginpassword.setAttribute("type", type);
            });



            $(".signin_submit").on("click", function(){
                signinf2();

            })
            function signinf2(){
                var signin_pass = $("#signin_pass").val();
                if(signin_pass != ''){
                    var fd = new FormData();
                    fd.append('signin_submit','signin_submit');
                    fd.append('signin_pass',signin_pass);

                    let xhr = new XMLHttpRequest();
                    xhr.open("POST","<?= base_url('ajax/account') ?>", true);
                    xhr.onload = () =>{
                            if(xhr.readyState === XMLHttpRequest.DONE ){
                                if(xhr.status === 200){
                                    let data = xhr.response;
                                    console.log(data);

                                    if(data == 'nofound'){
                                        var j = document.querySelector('#signin_pass');
                                        j.placeholder = 'Worng Password';
                                        j.style.border = '1px solid red';
                                        j.value = '';      
                                    }
                                    else{
                                        location.reload();
                                    }
                                }
                            }
                    }
                    xhr.send(fd);


            }
        }
        }


    })
</script>