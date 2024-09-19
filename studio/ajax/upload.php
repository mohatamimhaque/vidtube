<?php include('../includes/config.php'); ?>
<?php
    if($_POST["operation"] == 'createId'){
        $owner = $_POST["owner"];
        function unique_id($length = 12) {
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
        $sql = "INSERT INTO video (owner,unique_id)
                    VALUES ('$owner','$unique_id')";
                    echo $unique_id;
                if (mysqli_query($con, $sql)) {
                    mkdir("../uploads/".$unique_id);
                    mkdir("../uploads/".$unique_id."/video");
                    mkdir("../uploads/".$unique_id."/thumbnail");
                    mkdir("../uploads/".$unique_id."/scrubbing_img");
                    mkdir("../uploads/".$unique_id."/subtitle");
                }
    }
    if($_POST["operation"] == 'getTitle'){
        $unique_id = $_POST["unique_id"];
        $row = mysqli_fetch_assoc( mysqli_query($con, "SELECT title FROM video WHERE unique_id = '$unique_id'"));
        $title = $row['title'];
        echo $title;
    }
    if($_POST["operation"] == 'updateTitle'){
        $unique_id = $_POST["unique_id"];
        $title = $_POST["title"];
        if(mysqli_query($con, "UPDATE video SET title = '$title' WHERE unique_id = '$unique_id'")){
            echo 'success';
        };
    }
    if($_POST["operation"] == 'getDep'){
        $unique_id = $_POST["unique_id"];
        $row = mysqli_fetch_assoc( mysqli_query($con, "SELECT about FROM video WHERE unique_id = '$unique_id'"));
        $about = $row['about'];
        echo $about;
    }
    if ($_POST["operation"] == 'updateDep') {
        $unique_id = $_POST["unique_id"];
        $about = $_POST["about"];
        $stmt = $con->prepare("UPDATE video SET about = ? WHERE unique_id = ?");
        
        $stmt->bind_param("ss", $about, $unique_id);
                if ($stmt->execute()) {
            echo 'success';
        } else {
            echo 'Error: ' . $stmt->error;
        }
            $stmt->close();
    }
    
    if($_POST["operation"] == 'getCategory'){
        $unique_id = $_POST["unique_id"];
        $row = mysqli_fetch_assoc( mysqli_query($con, "SELECT category FROM video WHERE unique_id = '$unique_id'"));
        $category = $row['category'];
        echo $category;
    }
    if($_POST["operation"] == 'updateCategory'){
        $unique_id = $_POST["unique_id"];
        $category = $_POST["category"];
        if(mysqli_query($con, "UPDATE video SET category = '$category' WHERE unique_id = '$unique_id'")){
            echo 'success';
        };
    }
    if($_POST["operation"] == 'getTag'){
        $unique_id = $_POST["unique_id"];
        $row = mysqli_fetch_assoc( mysqli_query($con, "SELECT tags FROM video WHERE unique_id = '$unique_id'"));
        $tags = $row['tags'];
        echo $tags;
    }
    if($_POST["operation"] == 'updateTag'){
        $unique_id = $_POST["unique_id"];
        $tags = $_POST["tags"];
        if(mysqli_query($con, "UPDATE video SET tags = '$tags' WHERE unique_id = '$unique_id'")){
            echo 'success';
        };
    }
    if ($_POST["operation"] == 'autoTh') {
        $unique_id = $_POST["unique_id"];
        $imageData = $_POST["file"]; 
        $image_name = $_POST['name'] . ".jpg";
    
        $imageData = str_replace('data:image/jpeg;base64,', '', $imageData);
        $imageData = str_replace(' ', '+', $imageData);
        $imageData = base64_decode($imageData);
    
        $upload_dir = "../uploads/" . $unique_id . "/thumbnail/";
        $upload_path = $upload_dir . $image_name;
    
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
    
        if (file_put_contents($upload_path, $imageData)) {
            $stmt = $con->prepare("UPDATE video SET thumbnail = CONCAT(thumbnail, ?) WHERE unique_id = ?");
            $thumbnail_value = ',' . $image_name;
            $stmt->bind_param("ss", $thumbnail_value, $unique_id);
    
            if ($stmt->execute()) {
                echo "success";
            } else {
                echo "Error updating record: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo 'Failed to save the image file.';
        }
    }
    if ($_POST["operation"] == 'updateTh') {
        $unique_id = $_POST["unique_id"];
    
        $filename = $_FILES['file']['name'];
        $image_extension = pathinfo($filename, PATHINFO_EXTENSION);
        $image_name = $_POST['name'] .'.'.  $image_extension;
        $ext = ['jpg', 'jpeg', 'png', 'jfif', 'webp'];
    
        if (in_array($image_extension, $ext)) {
    
            $upload_dir = "../uploads/" . $unique_id . "/thumbnail/";
            $upload_path = $upload_dir . $image_name;
    
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }
    
            if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_path)) {
                $stmt = $con->prepare("UPDATE video SET thumbnail = CONCAT(thumbnail, ?) WHERE unique_id = ?");
                $thumbnail_value = ',' . $image_name;
                $stmt->bind_param("ss", $thumbnail_value, $unique_id);
    
                if ($stmt->execute()) {
                    echo "success";
                } else {
                    echo "Error updating record: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo 'Failed to move uploaded file.';
            }
        } else {
            echo 'Invalid file extension.';
        }
    }
    if($_POST["operation"] == 'getTh'){
        $unique_id = $_POST["unique_id"];
        $row = mysqli_fetch_assoc( mysqli_query($con, "SELECT thumbnail FROM video WHERE unique_id = '$unique_id'"));
        $list = $row['thumbnail'];
        if(strlen($list)){

            $array = explode(",", ltrim($list, ','));
            foreach ($array as $element) {
                ?>
                <div class="img">
                    <button value="<?= $element ?>" class="rimg">
                        <i class="material-icons">close</i>
                    </button>
                    <img src='<?= base_url("studio/uploads/" . $unique_id . "/thumbnail/".$element) ?>' alt="" style="width:100%;height:100%;margin:0;border-radius:4px">
                </div>
                <?php
         }
        }
    }
    if($_POST["operation"] == 'getActiveTh'){
        $unique_id = $_POST["unique_id"];
        $row = mysqli_fetch_assoc( mysqli_query($con, "SELECT active_thumbnail FROM video WHERE unique_id = '$unique_id'"));
        $th = $row['active_thumbnail'];
        echo $th;
    }
    if($_POST["operation"] == 'setActiveTh'){
        $unique_id = $_POST["unique_id"];
        $ac_thumbnail = $_POST["ac_thumbnail"];
        if(mysqli_query($con, "UPDATE video SET active_thumbnail = '$ac_thumbnail' WHERE unique_id = '$unique_id'")){
            echo 'success';
        };
    }
    if ($_POST["operation"] == 'rimg') {        
        $unique_id = $_POST["unique_id"];
        $img = $_POST["img"];
        

        $img_to_remove = ',' . $img;
        
        $sql = "UPDATE video SET thumbnail = REPLACE(thumbnail, ?, '') WHERE unique_id = ?";
        
        $stmt = $con->prepare($sql);
        $stmt->bind_param('ss', $img_to_remove, $unique_id);
    
        if ($stmt->execute()) {
            echo "success";
            unlink("../uploads/" . $unique_id . "/thumbnail/".$img);
           } else {
            echo "Error updating record: " . $stmt->error;
        }
    
        $stmt->close();
    }
    if ($_POST["operation"] == 'sbInput') {
        $unique_id = $_POST["unique_id"];
        $unique_id = $_POST["unique_id"];
        $upload_dir = "../uploads/" . $unique_id . "/subtitle/";
    
        if (!is_dir($upload_dir)) {
            if (!mkdir($upload_dir, 0777, true)) {
                die('Failed to create upload directory');
            }
        }
    
        $success = true; 
        $errors = [];    
    
        foreach ($_FILES['subtitle']['tmp_name'] as $key => $tmp_name) {
            $name = basename($_FILES['subtitle']['name'][$key]); 
            $upload_path = $upload_dir . $name;
    
            if (move_uploaded_file($tmp_name, $upload_path)) {
                $stmt = $con->prepare("UPDATE video SET subtitle = CONCAT(subtitle, ?) WHERE unique_id = ?");
                if ($stmt) {
                    $value = ',' . $name; 
                    $stmt->bind_param("ss", $value, $unique_id);
                    if (!$stmt->execute()) {
                        $errors[] = "Error updating record for file $name: " . $stmt->error;
                        $success = false;
                    }
                    $stmt->close();
                } else {
                    $errors[] = "Error preparing statement for file $name.";
                    $success = false;
                }
            } else {
                $errors[] = "Error uploading file $name.";
                $success = false;
            }
        }
    
        if ($success) {
            echo "success";
        } else {
            echo "Errors occurred:<br>" . implode("<br>", $errors);
        }
    }
    if($_POST["operation"] == 'getSubtitle'){
        $unique_id = $_POST["unique_id"];
        $row = mysqli_fetch_assoc( mysqli_query($con, "SELECT subtitle FROM video WHERE unique_id = '$unique_id'"));
        $list = $row['subtitle'];
       if(strlen($list)){
        $array = explode(",", ltrim($list, ','));
        $upload_dir = "../uploads/" . $unique_id . "/subtitle/";
        foreach ($array as $element) {
            $fileSize = filesize($upload_dir.$element);
            ?>
        <div class="content bg-soft-info">
            <div class="upload">
                <i class="fas fa-file-alt text-info"></i>
                <div class="details">
                    <span class="name text-info"><?= $element ?></span>
                    <span class="size"><?=  formatFileSize($fileSize) ?>  • Uploaded</span>
                </div>
            </div>
            <button value="<?= $element ?>" class="rsb">
                <i class="material-icons">close</i>
            </button>
        </div>
        <?php

        };
        }
    }
    if ($_POST["operation"] == 'rsb') {        
        $unique_id = $_POST["unique_id"];
        $img = $_POST["img"];
        

        $img_to_remove = ',' . $img;
        
        $sql = "UPDATE video SET subtitle = REPLACE(subtitle, ?, '') WHERE unique_id = ?";
        
        $stmt = $con->prepare($sql);
        $stmt->bind_param('ss', $img_to_remove, $unique_id);
    
        if ($stmt->execute()) {
            echo "success";
            unlink("../uploads/" . $unique_id . "/subtitle/".$img);
           } else {
            echo "Error updating record: " . $stmt->error;
        }
    
        $stmt->close();
    }
    if($_POST["operation"] == 'getStatus'){
        $unique_id = $_POST["unique_id"];
        $row = mysqli_fetch_assoc( mysqli_query($con, "SELECT status FROM video WHERE unique_id = '$unique_id'"));
        $th = $row['status'];
        echo $th;
    }
    if($_POST["operation"] == 'setStatus'){
        $unique_id = $_POST["unique_id"];
        $status = $_POST["status"];
        if(mysqli_query($con, "UPDATE video SET status = '$status' WHERE unique_id = '$unique_id'")){
            echo 'success';
        };
    }
    if($_POST["operation"] == 'getAudience'){
        $unique_id = $_POST["unique_id"];
        $row = mysqli_fetch_assoc( mysqli_query($con, "SELECT audience FROM video WHERE unique_id = '$unique_id'"));
        $th = $row['audience'];
        echo $th;
    }
    if($_POST["operation"] == 'setAudience'){
        $unique_id = $_POST["unique_id"];
        $audience = $_POST["audience"];
        if(mysqli_query($con, "UPDATE video SET audience = '$audience' WHERE unique_id = '$unique_id'")){
            echo 'success';
        };
    }
    if($_POST["operation"] == 'getComments_status'){
        $unique_id = $_POST["unique_id"];
        $row = mysqli_fetch_assoc( mysqli_query($con, "SELECT comments_status FROM video WHERE unique_id = '$unique_id'"));
        $th = $row['comments_status'];
        echo $th;
    }
    if($_POST["operation"] == 'setComments_status'){
        $unique_id = $_POST["unique_id"];
        $comments_status = $_POST["comments_status"];
        if(mysqli_query($con, "UPDATE video SET comments_status = '$comments_status' WHERE unique_id = '$unique_id'")){
            echo 'success';
        };
    }
    if($_POST["operation"] == 'scrubbing_img'){
        $unique_id = $_POST["unique_id"];
        $scrubbing_img = explode('///',$_POST["scrubbing_img"]);
        $x=1;
        $scrub_img = array();
        foreach($scrubbing_img as $img){
            $data =base64_decode(explode(',',$img)[1]);
            $dest = "../uploads/".$unique_id."/scrubbing_img/".$x.'.jpeg';
            $scrub_img[] = $x.'.jpeg';
            file_put_contents($dest,$data);
            $x++;
        }    
        $scrubbing_img = implode("///",$scrub_img);
        if(mysqli_query($con, "UPDATE video SET scrubbing_img = '$scrubbing_img' WHERE unique_id = '$unique_id'")){
            echo 'success';
        };

    }
    if($_POST["operation"] == 'video_upload'){
        $unique_id = $_POST["unique_id"];
        $type = $_POST["type"];
        $duration = $_POST["duration"];

        foreach ($_FILES['video']['tmp_name'] as $key => $image) {
            $imageTmpName = $_FILES['video']['tmp_name'][$key];
            $imageName = $_FILES['video']['name'][$key];
            $ext=pathinfo($imageName,PATHINFO_EXTENSION);
            $video = $unique_id.'.'.$ext;
            move_uploaded_file($imageTmpName,"../uploads/".$unique_id."/video/".$video);
        }
        if(mysqli_query($con, "UPDATE video SET video = '$video',type = '$type', duration = '$duration' WHERE unique_id = '$unique_id'")){
            echo 'success';
        };
    }
    
    

    ?>
