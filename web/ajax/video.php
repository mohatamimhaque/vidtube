
<?php
session_start();
include('../../studio/includes/config.php');


if(isset($_POST['watchtime'])){
    $watchtime  = $_POST['watchtime'];
    $id  = $_POST['id'];
    mysqli_query($con,"UPDATE video SET watchtime = watchtime+$watchtime WHERE unique_id = '$id'");
}
if(isset($_POST['update_data']) || isset($_POST['update_remove'])){
    $vid_id = $_POST["vid_id"];
    $user_id = $_POST["user_id"];
    $column = $_POST["column"];
    $check = mysqli_query($con, "SELECT $column from user_account WHERE unique_id='$user_id'");
        if(mysqli_num_rows($check)>0){
            foreach($check as $row){
                if(isset($_POST['update_data'])){
                    if($row[$column] != ''){
                        $data = explode(',',$row[$column]);
                        if(in_array($vid_id, $data, TRUE)){
                        }
                        else{
                            $data[]=$vid_id;
                            sort($data);
                            $list = implode(',',$data);
                            mysqli_query($con, "UPDATE user_account SET $column='$list' WHERE unique_id='$user_id'");
                        }
                    }
                    else{
                        mysqli_query($con, "UPDATE user_account SET $column ='$vid_id' WHERE unique_id='$user_id'"); 
                    }
                }
                else{
                    $data = explode(',',$row[$column]);
                    if(in_array($vid_id, $data, TRUE)){
                        if (($key = array_search($vid_id, $data)) !== false) {
                            unset($data[$key]);
                        }
                        sort($data);
                        $list = implode(',',$data);
                        mysqli_query($con, "UPDATE user_account SET $column='$list' WHERE unique_id='$user_id'");
                    }
                }

            }
        }
}
if(isset($_POST['check_data'])){
    $vid_id = $_POST["vid_id"];
    $user_id = $_POST["user_id"];
    $column = $_POST["column"];
    $check = mysqli_query($con, "SELECT $column from user_account WHERE unique_id='$user_id'");
    if(mysqli_num_rows($check)>0){
        foreach($check as $row){
            $favourite = $row[$column];
            $data = explode(',',$row[$column]);
            if(in_array($vid_id, $data, TRUE)){
                echo "yes";
            }
            else{
                echo "no";
            }
        }
    }
}
if(isset($_POST['playlist_create'])){
    $user_id = $_POST["user_id"];
    $name = $_POST["name"];
    $privacy = $_POST["privacy"];

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
        $id =  mysqli_query($con, "SELECT unique_id from playlist WHERE unique_id='$unique_id'");
        if(mysqli_num_rows($id)>0){
            continue;
        }
        else{
            break;
        }
    }
    mysqli_query($con,"INSERT INTO `playlist`(`unique_id`, `author`, `name`,`privacy`) VALUES ('$unique_id','$user_id','$name','$privacy')");
}
if(isset($_POST['playlist_show'])){
    $vid_id = $_POST["vid_id"];
    $user_id = $_POST["user_id"];
    
    $query = mysqli_query($con,"SELECT * FROM playlist WHERE author = '$user_id'");
    if(mysqli_num_rows($query) > 0){
        foreach($query as $row){
            if(strpos($row['videos'],$vid_id) !== false){
                $is = "checked";
            }
            else{
                $is = '';
            }
            ?>
             <div class="column">
              <div class="column-body">
                <div class="popup-input">
                  <input type="checkbox" id="<?= $row['unique_id'] ?>" value="<?= $row['unique_id'] ?>" <?= $is ?>>
                  <label for="<?= $row['unique_id'] ?>"><?= $row['name'] ?></label>
                </div>
              </div>
              <div class="icon">
                <i class="material-icons">public</i>
              </div>
            </div>
            <?php
        }
    }
}
if(isset($_POST['video_add'])){
    $vid_id = $_POST["vid_id"];
    $playlist = $_POST["playlist"];
    $action = $_POST["action"];

    $check = mysqli_query($con, "SELECT videos from playlist WHERE unique_id='$playlist'");
        if(mysqli_num_rows($check)>0){
            foreach($check as $row){
                if($action == 'add'){
                    if($row['videos'] != ''){
                        $data = explode(',',$row['videos']);
                        if(in_array($vid_id, $data, TRUE)){
                        }
                        else{
                            $data[]=$vid_id;
                            sort($data);
                            $list = implode(',',$data);
                            mysqli_query($con, "UPDATE playlist SET videos='$list' WHERE unique_id='$playlist'");
                        }
                    }
                    else{
                        mysqli_query($con, "UPDATE playlist SET videos ='$vid_id' WHERE unique_id='$playlist'"); 
                    }
                }
                else{
                    $data = explode(',',$row['videos']);
                    if(in_array($vid_id, $data, TRUE)){
                        if (($key = array_search($vid_id, $data)) !== false) {
                            unset($data[$key]);
                        }
                        sort($data);
                        $list = implode(',',$data);
                        mysqli_query($con, "UPDATE playlist SET videos='$list' WHERE unique_id='$playlist'");
                    }
                }

            }
        }

}
if(isset($_POST['add_comment'])){
    $user_id = $_POST["user_id"];
    $vid_id = $_POST["vid_id"];
    $text = $_POST["text"];


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
        $id =  mysqli_query($con, "SELECT unique_id from comment WHERE unique_id='$unique_id'");
        if(mysqli_num_rows($id)>0){
            continue;
        }
        else{
            break;
        }
    }
    $sql = "UPDATE video SET comments = comments + 1 WHERE unique_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('s', $vid_id);
    if ($stmt->execute()) {
        echo "Comments count incremented successfully.";
    }
    $stmt->close();
     mysqli_query($con,"INSERT INTO `comment`(`unique_id`, `author`, `vid_id`,`comment`) VALUES ('$unique_id','$user_id','$vid_id','$text')");


}

if(isset($_POST['comment_show'])){
    $vid_id = $_POST["vid_id"];    
    $query = mysqli_query($con,"SELECT * FROM comment WHERE vid_id = '$vid_id' AND parent_id='0' ORDER BY created_at desc");
    if(mysqli_num_rows($query) > 0){
        foreach($query as $row){
            $a = $row['author'];
            foreach(mysqli_query($con,"SELECT * FROM user_account WHERE unique_id = '$a'") as $u);
            ?>
               <div class="comment-box ccc" id='<?= $row['unique_id'] ?>'>
               <div class="d-flex comment">
                <div>
                    <h1 class="<?= $u['first_name'][0] ?>"><?= $u['first_name'][0] ?></h1>
                </div>
               <div class="flex-grow-1 ms-3">
                     <div class="mb-1"><a href="#" class="fw-bold link-body-emphasis me-1"><?= $u['first_name'].' '.$u['last_name'] ?></a> <i class="zmdi zmdi-check me-1 fw-bold" title="verified"></i> <span class="text-body-secondary text-nowrap"><?= dateTime($row['created_at']) ?></span></div>
                     <div class="mb-1"><?= $row['comment'] ?></div>
                     <div class="hstack align-items-center mb-0" style="margin-left:-.25rem;">
                        <?php
                        if(isset($_SESSION['loggedOren'])){
                            ?>
                            <button class="btn btn-sm btn-info  small collapsed" value='<?= $_SESSION['loggedOren']['unique_id'] ?>'  data-bs-toggle="collapse" data-bs-target="#<?= $row['unique_id'] ?>r" aria-expanded="true" aria-controls="<?= $row['unique_id'] ?>r">Reply</button>
                            <?php
                            if($_SESSION['loggedOren']['unique_id'] == $row['author']){
                                ?>
                                    <button class="btn btn-sm  btn-danger small delete" style='margin-left:5px' value='<?= $row['unique_id'] ?>'>Delete</button>
                                <?php
                            } 
                        }
                            ?>
                     </div>

                        <div class="comment-box mt-2 collapse" id="<?= $row['unique_id'] ?>r">
                            <div class="d-flex comment">
                                <?php if(isset($_SESSION['loggedOren'])) : ?>
                                        <h1 class="<?= $u['first_name'][0] ?>"><div><?= $u['first_name'][0] ?></div></h1>
                                    <?php else :?>
                                    <h1 class="M"><div>M</div></h1>
                                <?php endif; ?>

                                <div class="flex-grow-1 ms-3">
                                    <div class="form-floating comment-compose">
                                        <input class="form-control w-100 reply_box text-white" placeholder="Leave a reply here" type='text'>
                                        <label for="my-comment-reply">Leave a reply here</label>
                                    </div>
                                    <div class="hstack justify-content-end gap-1">
                                        <button class="cancel btn btn-sm btn-success  collapsed" data-bs-toggle="collapse" data-bs-target="#<?= $row['unique_id'] ?>r" aria-expanded="true" aria-controls="<?= $row['unique_id'] ?>" >Cancel</button>
                                        <button class="btn btn-sm btn-info add_reply" value ="<?= $row['unique_id'] ?>" >Reply</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                     <div style="margin-left:-.769rem;">
                        <button class=" d-inline-flex align-items-center collapsed" data-bs-toggle="collapse" data-bs-target="#<?= $row['unique_id'] ?>c" aria-expanded="true" aria-controls="<?= $row['unique_id'] ?>c">
                            <span class="material-icons">
                            expand_more
                            </span>
                            <span style='font-size:15px'><span class="total_reply">5</span> replies</span>
                        </button>
                     </div>
                  </div>
               </div>

               <div class="reply_show collapse ml-8" id="<?= $row['unique_id'] ?>c" style="margin-left:72px">
                  <div class="comment-replies vstack mt-1 bg-body-tertiary  rounded-3">
                   
                  </div>
               </div>
            </div>
            <?php
        }
    }
}
if(isset($_POST['add_reply'])){
    $user_id = $_POST["user_id"];
    $vid_id = $_POST["vid_id"];
    $comment = $_POST["comment"];
    $parent_id = $_POST["parent_id"];

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
        $id =  mysqli_query($con, "SELECT unique_id from comment WHERE unique_id='$unique_id'");
        if(mysqli_num_rows($id)>0){
            continue;
        }
        else{
            break;
        }
    }
    mysqli_query($con,"INSERT INTO `comment`(`unique_id`, `author`, `vid_id`,`comment`,`parent_id`) VALUES ('$unique_id','$user_id','$vid_id','$comment','$parent_id')");
}
if(isset($_POST['reply_show'])){
    $vid_id = $_POST["vid_id"];    
    $parent_id = $_POST["parent_id"];    
    $query = mysqli_query($con,"SELECT * FROM comment WHERE vid_id = '$vid_id' AND parent_id='$parent_id' ORDER BY created_at desc");
    echo "<script>window.total_reply = ".mysqli_num_rows($query)."</script>";
    if(mysqli_num_rows($query) > 0){
        foreach($query as $row){
            $a = $row['author'];
            foreach(mysqli_query($con,"SELECT * FROM user_account WHERE unique_id = '$a'") as $u);
            ?>
               <div class="comment-box ccc" id='<?= $row['unique_id'] ?>'>
                    <div class="d-flex comment">
                        <div>
                            <h1 class="<?= $u['first_name'][0] ?>"><div><?= $u['first_name'][0] ?></div></h1>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <div class="mb-1"><a href="#" class="fw-bold link-body-emphasis me-1"><?= $u['first_name'].' '.$u['last_name'] ?></a> <i class="zmdi zmdi-check me-1 fw-bold" title="verified"></i> <span class="text-body-secondary text-nowrap"><?= dateTime($row['created_at']) ?></span></div>
                            <div class="mb-1"><?= $row['comment'] ?></div>
                            <div class="hstack align-items-center mb-0" style="margin-left:-.25rem;">
                                <?php
                                if(isset($_SESSION['loggedOren'])){
                                    ?>
                                    <button class="btn btn-sm btn-info small collapsed"  data-bs-toggle="collapse" data-bs-target="#<?= $row['parent_id'] ?>r" aria-expanded="true" aria-controls="<?= $row['parent_id'] ?>r">Reply</button>
                                    <?php
                                    if($_SESSION['loggedOren']['unique_id'] == $row['author']){
                                        ?>
                                    <button class="btn btn-sm  btn-danger  small delete" style='margin-left:5px' value='<?= $row['unique_id'] ?>'>Delete</button>
                                        <?php
                                    } 
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
    }
}
    ?>


