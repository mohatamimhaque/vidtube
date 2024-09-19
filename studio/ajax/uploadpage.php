
<?php include('../includes/config.php'); ?>
<?php
if($_POST["operation"] == 'upload'){
    $title = $_POST["title"];
    $specifier = $_POST["specifier"];
    $tags = $_POST["tags"];
    $category = $_POST["category"];
    $cast = $_POST["cast"];
    $about = $_POST["about"];
    $moment = $_POST["moment"];
    $owner = $_POST["owner"];
    $duration = $_POST["duration"];
    $active_thumbnail = $_POST["active_thumbnail"];

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
    $dir = "../uploads/".$unique_id."/";
    if(is_dir($dir)){
        echo "ok";
    }
    else{
        mkdir("../uploads/".$unique_id);
        mkdir("../uploads/".$unique_id."/video");
        mkdir("../uploads/".$unique_id."/thumbnail");
        mkdir("../uploads/".$unique_id."/scrubbing_img");
        mkdir("../uploads/".$unique_id."/subtitle");
    }

    
    foreach ($_FILES['video']['tmp_name'] as $key => $image) {
        $imageTmpName = $_FILES['video']['tmp_name'][$key];
        $imageName = $_FILES['video']['name'][$key];
        $ext=pathinfo($imageName,PATHINFO_EXTENSION);
        $video = $imageName;
        move_uploaded_file($imageTmpName,"../uploads/".$unique_id."/video/".$video);
    }
    

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

    //backup thumbnail
    file_put_contents("../uploads/".$unique_id."/thumbnail/".'thumbnail.jpeg',base64_decode(explode(',',$_POST["backup_thumbnail"])[1]));
    $backup_thumbnail = "thumbnail.jpeg";

    if(isset($_FILES["thumbnail"])){

        
        $thumbnail_list=array();
        $extension=array('jpeg','jpg','png','gif','jfif','webp');
        $x=1;
    foreach ($_FILES['thumbnail']['tmp_name'] as $key => $image) {
        $imageTmpName = $_FILES['thumbnail']['tmp_name'][$key];
		$imageName = $_FILES['thumbnail']['name'][$key];
		$ext=pathinfo($imageName,PATHINFO_EXTENSION);
		$filename = $x.'.'.$ext;
		$x++;
		if(in_array($ext,$extension)){
            move_uploaded_file($imageTmpName,"../uploads/".$unique_id."/thumbnail/".$filename);
			$thumbnail_list[] = $filename;	
		}	    
	}    
	$thumbnail = implode("///", $thumbnail_list);
}    

else{
    $thumbnail = "";

}    
if(isset($_FILES["subtitle"])){

    $sub_list=array();
	$x=1;
    foreach ($_FILES['subtitle']['tmp_name'] as $key => $image) {
		$imageTmpName = $_FILES['subtitle']['tmp_name'][$key];
		$imageName = $_FILES['subtitle']['name'][$key];
		$ext=pathinfo($imageName,PATHINFO_EXTENSION);
		$filename = $imageName;
		move_uploaded_file($imageTmpName,"../uploads/".$unique_id."/subtitle/".$filename);
		$sub_list[] = $filename;	
	}    
	$subtitle = implode("///", $sub_list);
}    
else{
    $subtitle = "";
}


$sql = "INSERT INTO video (title,duration,specifier,tags,category,cast,about,moment,owner,active_thumbnail,unique_id,video,scrubbing_img,subtitle,thumbnail)
                    VALUES ('$title','$duration','$specifier','$tags','$category','$cast','$about','$moment','$owner','$active_thumbnail','$unique_id','$video','$scrubbing_img','$subtitle','$thumbnail')";
if (mysqli_query($con, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}


    
}
?>