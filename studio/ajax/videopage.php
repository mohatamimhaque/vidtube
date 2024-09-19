<?php include('../includes/config.php');
function duration($time){
    $sec = floor($time % 60);
    $min = floor($time / 60);
    $hour = floor($time / 3600);
    $min = $min - $hour * 60;
        $hour < 10 ? $hour = '0' + $hour : $hour;
    $sec < 10 ? $sec = '0' + $sec : $sec;
    $min < 10 ? $min = '0' + $min : $min;
    
    if($hour >= 1){
        return $hour.':'.$min.':'.$sec;
    }
    else{
        return $min.':'.$sec;
    }
}
function shortenText($text,$length){
    if(strlen($text) > $length){
        return substr($text,0,$length-3).'...';
    }
    else{
        return $text;
    }
}
function specifier($s){
    if($s == '2'){
        return '<i class="material-icons public">visibility</i> Public';
    }
    else if($s == '1'){
        return '<i class="material-icons premium">visibility</i> Premium';
    }
    else{
        return '<i class="material-icons private">visibility</i> Private';
    }
}
?>
<?php
if($_POST["operation"] == 'showvideo'){
    $owner = $_POST['owner'];
    ?>
    <table class="table table-stripe">
        <thead>
            <tr>
                <th>
                    <input type="checkbox" id="select_all">
                    Video
                </th>
                <th>Visibility</th>
                <th>Restrictions</th>
                <th>Date</th>
                <th>Views</th>
                <th>Comment</th>
                <th>likes</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
    <?php
    $video =mysqli_query($con,"SELECT * FROM video where owner = '$owner' and status = 0");
    if(mysqli_num_rows($video) > 0){
        foreach($video as $row){
            $unique_id = $row['unique_id'];
            //print_r($row);
            ?>
            <tr>
                <th>
                    <div class="th1">
                        <input type="checkbox" value="<?=$unique_id?>">
                        <div class="thumbnail">
                            <?php
                            if($row['thumbnail'] != ""){
                                ?>
                                <img src="<?=base_url('studio/uploads/'.$unique_id.'/thumbnail/'.explode('///',$row['thumbnail'])[intval($row['active_thumbnail'])-1])?>" alt="">
                                <?php
                            }
                            else{
                                ?>
                            <img src="<?=base_url('studio/uploads/'.$unique_id.'/thumbnail/thumbnail.jpeg') ?>" alt="">
                                <?php
                            }
                            ?>
                            <div class="duration">
                                <?= duration($row['duration'])?>
                            </div>
                        </div>
                        <div class="shortDes">
                            <p class="title">
                                <?php 
                             echo shortenText($row['title'],20);
                              ?>
                             </p>
                             <p class="des">
                                 <?php 
                              echo shortenText($row['about'],50);
                               ?>
                              </p>
                        </div>
                    </div>
                </th>
                <th>
                    <div class="th2">
                        <?= specifier($row['specifier']) ?>
                    </div>

                </th>
                <th class='th3'>None</th>
                <th>
                    <div class="th4">
                        <p class="date"><?= (new DateTime($row['created_at']))->format('M d, Y') ?></p>
                        <p>uploaded</p>
                    </div>
                </th>
                <th class='th5'><?= $row['views'] ?></th>
                <th class='th5'><?= $row['comment'] ?></th>
                <th class='th5'><?= $row['likes'] ?></th>
                <th class='th6'>
                    <a href="<?= base_url('studio/'.$owner.'/edit/'.$row['unique_id']) ?>">Edit</a>
                </th>
            </tr>
            <?php
        }
    }
?>
 </tbody>
                </table>
                <?php

}



?>