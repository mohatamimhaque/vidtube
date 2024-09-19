
<?php
include('../studio/includes/config.php');


if(isset($_POST['operation'])){
    $u='';
	$query = "
		SELECT * FROM video WHERE status = '0'
	";
    $limit = $_POST['limit'];
    $start = $_POST['start'];

    if(isset($_POST["category"])){
        $query .= "
        AND category LIKE '%".str_replace(" ", "%", $_POST["category"])."%'
        ";
        $u .= "category=".$_POST['category']."&";
    }
    if(isset($_POST["tags"])){
        $query .= "
        AND tags LIKE '%".str_replace(" ", "%", $_POST["tags"])."%'
        ";
        $u .= "tags=".$_POST['tags']."&";
    }
    if(isset($_POST["cast"])){
        $query .= "
        AND cast LIKE '%".str_replace(" ", "%", $_POST["cast"])."%'
        ";
        $u .= "cast=".$_POST['cast']."&";
    }
    if(isset($_POST["owner"])){
        $query .= "
        AND owner LIKE '%".str_replace(" ", "%", $_POST["owner"])."%'
        ";
        $u .= "channel=".$_POST['owner']."&";
    }
    
    if(isset($_POST["duration"])){
        if($_POST["duration"] == 'under4'){
            $query .= "
            AND duration <=". 4*60;
            ;
        }
        else if($_POST["duration"] == 'between420'){
            $query .= "
            AND duration  between ". 4*60 ." AND ". 20*60;
            ;
        }
        else if($_POST["duration"] == 'over20'){
            $query .= "
            AND duration >=". 20*60;
            ;
        }
        $u .= "duration=".$_POST["duration"]."&";
    }
    if(isset($_POST["upload_time"])){
        if($_POST["upload_time"] == 'last_hour'){
            $time = date('Y-m-d H:i:s',strtotime('-60minutes'));
        }
        if($_POST["upload_time"] == 'today'){
            $time = date('Y-m-d 00:00:00');
        }
        if($_POST["upload_time"] == 'this_week'){
            $time = date('Y-m-d 00:00:00',strtotime("-".date('w')."days"));
        }
        if($_POST["upload_time"] == 'this_month'){
            $time = date('Y-m-01 00:00:00');
        }
        if($_POST["upload_time"] == 'this_year'){
            $time = date('Y-01-01 00:00:00');
        }

        $query .= "
            AND created_at>= '$time'";
        $u .= "upload_time=".$_POST["upload_time"]."&";
    }
    if(isset($_POST["find"])){
        $search = mysqli_query($con,"SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'video'");
        foreach($search as $s){
            foreach($s as $s){
                if($s == 'id'){
                    $query .= "
                    AND $s LIKE '%".str_replace(" ", "%", $_POST["find"])."%' 
                    ";
                }
               
                else{
                    $query .= "
                    OR $s LIKE '%".str_replace(" ", "%", $_POST["find"])."%' 
                    ";
                }
            }
        }
        $u .= "find=".$_POST['find']."&";
    }

    if(isset($_POST["shortby"])){
        $sort = $_POST["shortby"];
        $query .=" ORDER BY $sort";
        $u .= "shortby=".$_POST['shortby'];
    }
    

    function set_url($url){
        echo("<script>history.replaceState({},'','$url');</script>");
    }
    if(!empty($u)) {
        set_url('?'.rtrim($u,',&')); 
    }
    else{
        echo("<script>history.replaceState('','');</script>");
    }
 
/**/ 
    $statement = $connect->prepare($query);
    $statement->execute();
    $total_data = $statement->rowCount();
    if($start <= $total_data){
        $filter_query = $query. " LIMIT $start,$limit";
    


    $statement = $connect->prepare($filter_query);
    $statement->execute();
    $result = $statement->fetchAll();
    $total_filter_data = $statement->rowCount();
    
    foreach($result as $row){
        $thumbnail = "0";
        foreach(explode('///',$row['thumbnail']) as $t){
            if(explode('.',$t)[0] == $row['active_thumbnail']){
                $thumbnail = $t;
            }
        }
        if(file_exists("../studio/uploads/".$row['unique_id']."/thumbnail/".$thumbnail)){
            $th = "studio/uploads/".$row['unique_id']."/thumbnail/".$thumbnail;
        }
        else{
            $th = "studio/uploads/".$row['unique_id']."/thumbnail/thumbnail.jpeg";
        }
        $start++;
        $c = $row['owner'];
        $owner = mysqli_query($con,"SELECT * FROM channel_list WHERE status=0 AND unique_id='$c'");
        if(mysqli_num_rows($owner) > 0){
            foreach($owner as $o);
            if(!isset($_POST['device'])){
            ?>
        	<div class="videoo">
                <div class="vid_thumbainl">
                    <a href="<?= $url."video?v=".$row['unique_id'] ?>" title="">
                        <img src="<?= $th ?>" alt="">
                        <video src="<?= $url.'studio/uploads/'.$row['unique_id'].'/video/'.$row['video'] ?>" muted></video>
                        <span class="vid-time"><?= timeFormat($row['duration']) ?></span>

                    </a>	
                </div><!--vid_thumbnail end-->
                <div class="video_info">
                    <h3><a href="<?= $url."video?v=".$row['unique_id'] ?>" title=""><?= shortenString($row['title'],50) ?></a></h3>
                    <h4><a href="<?= $url.'?channel='.$o['unique_id'] ?>" title=""><?= $o['name'] ?></a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
                    <span><?= numberFormat($row['views']) ?> views . <small class="posted_dt"><?= dateTime($row['created_at']) ?></small></span>
                </div>
            </div><!--videoo end-->
            <?php
            }
            else{
                ?>
            <div class="video_list">
		   		    <a href="<?= $url."video?v=".$row['unique_id'] ?>" class="">
                       <video src="<?= $url.'studio/uploads/'.$row['unique_id'].'/video/'.$row['video'] ?>" muted></video>
                        <div style="display:nne" class="video_overlay">
                        <img class="video_overlay" src="<?= $th ?>" alt="">
                        </div>
                        <span class="duration"><?= timeFormat($row['duration']) ?></span>
                    </a>
                    <div class="info">
                        <div class="channel-photo">
                            <div style="width:100%;height:100%;border-radius:50%">
                                <img src="<?= base_url('upload/image/channel/profile_photo/'.$o['profile_photo']) ?>" alt="">
                            </div>
                        </div>
                        <div class="center">
                            <div class="video-title"><?= shortenString($row['title'],70) ?></div>
                            <div class="information">
                                <span> <?= $o['name'] ?></span>
                            <hr>
                            <span><?= numberFormat($row['views']) ?> views</span>
                            <hr>
                            <span><?= dateTime($row['created_at']) ?></span>
                        </div>
                    </div>
                    <div class="icon action">
                        <span></span>
                    </div>
                </div>
                
            </div>
        <?php
        }}
    }
    echo '<script>window.start = '.$start.' </script>';
    }/** */


    //echo $query;
    



  



}

?>