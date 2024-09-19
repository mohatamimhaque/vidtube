<?php
session_start();
include('../studio/includes/config.php');
if(isset($_POST['create'])){
    function unique_id($length = 10){
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
        $id =  mysqli_query($con, "SELECT unique_id from channel_list WHERE unique_id='$unique_id'");
        if(mysqli_num_rows($id)>0){
            continue;
        }
        else{
            break;
        }
    }


    $channel_name = $_POST['channel_name'];
    $channel_description = $_POST['channel_description'];
    $link_list = $_POST['link_list'];

    $p_extension = pathinfo($_FILES['profile_photo']['name'], PATHINFO_EXTENSION);
    $profile_photo_name = $unique_id.'.'.$p_extension;

    $c_extension = pathinfo($_FILES['cover_photo']['name'], PATHINFO_EXTENSION);
    $cover_photo_name = $unique_id.'.'.$c_extension;

    $author_id = $_SESSION['loggedOren']['unique_id'];

    $query = "INSERT INTO channel_list SET unique_id='$unique_id',author_id='$author_id',name='$channel_name',description='$channel_description',links='$link_list',profile_photo='$profile_photo_name',cover_photo='$cover_photo_name'";
    $query_run = mysqli_query($con, $query);
    if($query_run){
        move_uploaded_file($_FILES['profile_photo']['tmp_name'], '../upload/image/channel/profile_photo/'.$profile_photo_name);
        move_uploaded_file($_FILES['cover_photo']['tmp_name'], '../upload/image/channel/cover_photo/'.$cover_photo_name);
    }
}


?>