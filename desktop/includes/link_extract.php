<?php
if(isset($_GET['find'])){
    $find = $_GET['find'];
    $arr = array($find);
    ?>
    <script>
        var val = <?php echo json_encode($arr); ?>;
        $('.header input').val(val[0]);
        $('.header input').keydown();
    </script>
    <?php
}
if(isset($_GET['upload_time'])){
    $duration = $_GET['upload_time'];
    $arr = array($duration);
    ?>
    <script>
        var val = <?php echo json_encode($arr); ?>;
        var nodes = $('input[name="time"]');
        for (var i = 0; i < nodes.length; i++) {
            if(nodes[i].value == val[0]){
                nodes[i].checked = true;
            }
        }
    </script>
    <?php
}
if(isset($_GET['duration'])){
    $duration = $_GET['duration'];
    $arr = array($duration);
    ?>
    <script>
        var val = <?php echo json_encode($arr); ?>;
        var nodes = $('input[name="duration"]');
        for (var i = 0; i < nodes.length; i++) {
            if(nodes[i].value == val[0]){
                nodes[i].checked = true;
            }
        }
    </script>
    <?php
}
if(isset($_GET['shortby'])){
    $duration = $_GET['shortby'];
    $arr = array($duration);
    ?>
    <script>
        var val = <?php echo json_encode($arr); ?>;
        var nodes = $('input[name="shortby"]');
        for (var i = 0; i < nodes.length; i++) {
            if(nodes[i].value == val[0]){
                nodes[i].checked = true;
            }
        }
    </script>
    <?php
}
?>



<?php
     if(isset($_GET['category'])){
     	$category = $_GET['category']; 
    }
     else{ 	$category = ""; 
    } 
    echo "<input type='text' value='".$category."' id='category' style='display:none'>"; 
    if(isset($_GET['tags'])){
        $tags = $_GET['tags']; }
     else{ 	$tags = ""; 
    }
    echo "<input type='text' value='".$tags."' id='tags' style='display:none'>";
    if(isset($_GET['cast'])){
        $cast = $_GET['cast']; } 
    else{ 	$cast = ""; 
    } 
    echo "<input type='text' value='".$cast."' id='cast' style='display:none'>";
    if(isset($_GET['channel'])){
        $channel = $_GET['channel']; } 
    else{ 	$channel = ""; 
    } 
    echo "<input type='text' value='".$channel."' id='owner' style='display:none'>";
?>