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
<style>
    ::-webkit-scrollbar {
  width: 0px;
    }
    .app{
        background-color:none
    }

</style>
<div class="auth-page-wrapper pt-5">
    <div class="auth-page-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5 mt-4">
                    <div class="card mt-5">
                        <div class="card-body p-4 replace">
                            
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Welcome Back !</h5>
                                <p class="text-muted">Sign in to continue to <?= $name ?>.</p>
                            </div>
                            <div class="p-2 mt-4">
                                <div class='signin'>
                                    <div class="invalid-feedback invalid-usermail mb-4" style='text-align:center;'>
                                        You aren't registered!!!
                                    </div>
                                    <div class="mb-3">
                                        <label for="verify" class="form-label">Email/Username:</label>
                                        <input type="text" class="form-control" id="verify" placeholder="Enter email or username">
                                    </div>

                                    <div class="mt-4">
                                        <button class="btn btn-success w-100 signin_next" type="submit">Next</button>
                                    </div>
                                </div>
                          
                            
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                    <div class="mt-4 text-center">
                        <p class="mb-0">Don't have an account ? <a href="<?= base_url('signup') ?>" class="fw-semibold text-primary text-decoration-none"> Signup </a> </p>
                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->

    


    <?php
    include('includes/signinscript.php');
    include('includes/css.php');

    }
?>
</div>

</body>
</html>
