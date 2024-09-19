<?php
session_start();
include('../studio/includes/config.php');
if(isset($_POST['emailcheck'])){
    $email = $_POST['email'];
    $checkmail = mysqli_query($con, "SELECT email FROM user_account WHERE email = '$email'");
    if(mysqli_num_rows($checkmail) > 0){
        echo $email.' - this email already exist!!!';
    }
    else{
        echo 'success';
    }

}
if(isset($_POST['usernamechek'])){
    $usernamechek = $_POST['usernamechek'];
    $checkmail = mysqli_query($con, "SELECT user_name FROM user_account WHERE user_name = '$usernamechek'");
    if(mysqli_num_rows($checkmail) > 0){
        echo $usernamechek.' - this username already exist!!!';
    }
    else{
        echo 'success';
    }

}

if(isset($_POST['reg_next'])){
    $usernamechek = $_POST['username'];
    $email = $_POST['email'];
    $checkmail = mysqli_query($con, "SELECT email FROM user_account WHERE email = '$email'");
    if(mysqli_num_rows($checkmail) > 0){
        echo 'eamilexist';
    }
    else{
        $checkmail = mysqli_query($con, "SELECT user_name FROM user_account WHERE user_name = '$usernamechek'");
        if(mysqli_num_rows($checkmail) > 0){
            echo 'userexist';
        }
        else{
            if(isset($_SESSION['registration'])){
                unset($_SESSION['registration']);
            }
            $_SESSION['registration'] = $_POST;
        }
    }

}
if(isset($_POST['reg_submit'])){
    function unique_id($length = 8){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    while(TRUE){
        $unique_id = unique_id();
        $id =  mysqli_query($con, "SELECT unique_id from user_account WHERE unique_id='$unique_id'");
        if(mysqli_num_rows($id)>0){
            continue;
        }
        else{
            break;
        }
    }
    $filename = $_FILES['file']['name'];
    $image_extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $image_name = $unique_id.'.'.$image_extension;
    $ext = ['jpg','jpeg','png','jfif','webp'];
    if(in_array( $image_extension,$ext)){
        $first_name = $_SESSION['registration']['first_name'];
        $last_name = $_SESSION['registration']['last_name'];
        $email = $_SESSION['registration']['email'];
        $username = $_SESSION['registration']['username'];
        $password = $_SESSION['registration']['password'];
        $birthday = $_SESSION['registration']['birthday'];
        $gender = $_SESSION['registration']['gender'];

        $checkmail = mysqli_query($con, "SELECT email FROM user_account WHERE email = '$email'");
        if(mysqli_num_rows($checkmail) > 0){
        }
        else{
            $checkmail = mysqli_query($con, "SELECT user_name FROM user_account WHERE user_name = '$username'");
            if(mysqli_num_rows($checkmail) > 0){
            }
        else{
            $query = "INSERT INTO user_account SET unique_id='$unique_id',first_name='$first_name',last_name='$last_name',email='$email',password='$password',photo='$image_name',user_name='$username',gender='$gender',birthday='$birthday'";
            $query_run = mysqli_query($con, $query);
            if($query_run){
                move_uploaded_file($_FILES['file']['tmp_name'], '../upload/image/user/profile_photo/'.$image_name);
                $_SESSION['loggedOren'] = [
                    'unique_id' => $unique_id
                ];
                echo 'success';
            }
        }
    }
}
    else{
        echo 'invalid-image-type';
    }    
}

if(isset($_POST['signin_next'])){
    $verify = $_POST['verify'];
    $checkuser = mysqli_query($con, "SELECT * FROM user_account WHERE email = '$verify' OR user_name = '$verify'");
    if(mysqli_num_rows($checkuser) > 0){
        if(isset($_SESSION['signin'])){
            unset($_SESSION['signin']);
        }
        $row = mysqli_fetch_assoc($checkuser);
        $_SESSION['signin'] = $row;
        ?>
            <div class="text-center mt-2">
                <h5 class="text-primary">Hi! <?= $row['first_name'].' '.$row['last_name'] ?></h5>
                <div class="image">
                    <div>
                        
                        <img src="<?= base_url('upload/image/user/profile_photo/'.$row['photo']) ?>" style="width: 100px;height: 100px;">
                        </div>
                </div>
                <p class="text-muted mt-2">Log in to your account</p>
            </div>
            <div class="mt-2">
                <div class="float-end">
                    <a href="#" class="text-muted">Forgot password?</a>
                </div>
                <label class="form-label" for="password-input">Password</label>
                <div class="position-relative auth-pass-inputgroup mb-3">
                    <input type="password" class="form-control pe-5" placeholder="Enter password" id="signin_pass">
                    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button" id="password-addon"><i class="ri-eye-fill align-middle lock"></i></button>
                </div>
            </div>
            <div class="mt-4">
                <button class="btn btn-success w-100 signin_submit" type="submit">Login</button>
            </div>
            <div class="float-end mt-2">
                <a onclick = 'location.reload()' class="text-danger" style='cursor:pointer'>Not your account?</a>
            </div>
        <?php

    }
    else{
        echo 'nofound';
    }
}
if(isset($_POST['signin_submit'])){
    $signin_pass = $_POST['signin_pass'];
    $verify = $_SESSION['signin']['email'];
    
    $query = mysqli_query($con, "SELECT * FROM user_account WHERE email = '$verify'");
    if(mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);
        $password = $row['password'];
        $unique_id = $row['unique_id'];
        if($signin_pass == $password){
            $_SESSION['loggedOren'] = [
                'unique_id' => $unique_id
            ];
        }
        else{
            echo 'nofound';
        }
    }
    else{
        echo 'nofound';
    }
}



if(isset($_POST['signout'])){
    //session destroy()
    unset( $_SESSION['loggedOren']);
}
?>