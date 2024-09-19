<?php
session_start();
$page_title = 'Signin';
include('includes/header.php');
//unset($_SESSION['loggedOren']);
if(isset($_SESSION['loggedOren'])){
    header("location:".$url);
   exit(0);
  }
else{
?>

    <div class="auth-page-wrapper pt-5">
     
        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
               
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Create New Account</h5>
                                    <p class="text-muted">Get your free <?= $name ?> account now</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <div class="sessoin_before">
                                            <div class="d-flex justify-content-between mb-3">
                                                <div class=""style='width:48%'>
                                                    <label for="first_name" class="form-label"> First Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name='first_name' id="first_name" placeholder="First Name" required>
                                                    <div class="invalid-feedback">
                                                        Please enter first name
                                                    </div>
                                                </div>
                                                <div class=""style='width:48%'>
                                                    <label for="last_name" class="form-label"> Last Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name='last_name' id="last_name" placeholder="Last Name" required>
                                                    <div class="invalid-feedback">
                                                        Please enter last name
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="useremail" class="form-label"> Email <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" name='useremail' id="useremail" placeholder="Enter email address" required>
                                                <div class="invalid-feedback invalid-usermail">
                                                    Please enter email
                                                </div>
                                                <div class="invalid-feedback invalid-usermail2">
                                                    Please enter email
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Username<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="username" name='username' placeholder="Enter username" required>
                                                <div class="invalid-feedback invalid-username">
                                                    Please enter username
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="reg_password">Password<span class="text-danger">*</span></label>
                                                <div class="position-relative auth-pass-inputgroup">
                                                    <input type="password" name='password' class="form-control pe-5 password-input" id='reg_password' placeholder='Please Enter Password' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                                    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle lock"></i></button>
                                                    <div class="invalid-feedback invalid-password">
                                                        Please enter password
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="male" class="form-label">Gender<span class="text-danger">*</span></label>
                                                <div class="d-flex justify-content-between">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender" value='male' id="male">
                                                        <label class="form-check-label" for="male">
                                                        Male
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender" value='female' id="female">
                                                        <label class="form-check-label" for="female">
                                                        Female
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender" value='other' id="other">
                                                        <label class="form-check-label" for="other">
                                                        Other
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="birthday" class="form-label">Birthday<span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" id="birthday" name='birthday'>
                                            </div>

                                            <div class="mb-4">
                                                <p class="mb-0 fs-12 text-muted fst-italic">By registering you agree to the <?= $name ?> <a href="#" class="text-primary text-decoration-none fst-normal fw-medium">Terms of Use</a></p>
                                            </div>

                                        

                                            <div class="mt-4">
                                                <button class="btn btn-success w-100" id='reg-next' type="submit">Next</button>
                                            </div>


                                    </div>
                                    <div class="sessoin_after" style='display:none'>
                                        <div class="invalid-feedback invalid-image-type" style='text-align:center'>
                                            image allowed type only jpg, jpeg, png, jfif, webp!!!
                                        </div>
                                        <div id="profile_photo_upload">
                                            <label for="photo">Click here to upload image</label>
                                            <input type="file" accept=".jpg,.jpeg,.png,.jfif,.webp" name='photo' id="photo">
                                            <img src="" id='profile_photo_preview' alt="">
                                        </div>


                                        <div class="mt-4">
                                                <button class="btn btn-success w-100" id='reg-submit' type="submit">SignUp</button>
                                            </div>




                    
                    
                                </div>
                            </div>

                        
                        </div>

                    </div>
                    </div>
                    <div class="mt-2 text-center">
                        <p class="mb-0">Already have an account ? <a href="<?= base_url('signin') ?>" class="fw-semibold text-primary text-decoration-none"> Signup </a> </p>
                    </div>

                    </div>
                    </div>
                    </div>
</div>


   
   
<?php
    include('includes/signinscript.php');
    include('includes/signupscript.php');
    include('includes/css.php');


    }
?>
</div>
<style>
::-webkit-scrollbar {
width: 0px;
}
.app{
    background-color:none
}

</style>

</body>
</html>
