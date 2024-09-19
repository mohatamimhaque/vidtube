<?php
date_default_timezone_set('Asia/Dhaka');


$host = "localhost";
$username = "root";
$password = "";
$database = "oren";
$con =mysqli_connect("$host","$username","$password","$database",);
$connect = new PDO("mysql:host=localhost;dbname=$database", "root", "");



$name ='Oren';
/*

function base_url($slug){
    echo 'http://192.168.0.101/oren/'.$slug;
  }
  $url = 'http://192.168.0.101//oren/';

  
/** */

function base_url($slug){
  echo 'http://192.168.1.101/vidtube/'.$slug;
}
$url = 'http://192.168.0.101/vidtube/';
$ur = 'http://192.168.1.101/vidtube';
/**/ 



  if(isset($_SESSION['loggedOren'])){
    $unique_id = $_SESSION['loggedOren']['unique_id'];
    $query = mysqli_query($con, "SELECT * FROM user_account where unique_id='$unique_id'");
    foreach($query as $user);
  }
function numberFormat($s){
  if($s >= 1000 && $s <= 1000000){
    $f = $s / 1000;
    $m = $s % 1000;
    $o = $m / 1000;
    return $f - $o.'K';
  }
  else if($s >= 1000000 && $s <= 1000000000){
    $f = $s / 1000000;
    $m = $s % 1000000;
    $o = $m / 1000000;
    return $f - $o.'M';
  }
  else if($s >= 1000000000){
    $f = $s / 1000000000;
    $m = $s % 1000000000;
    $o = $m / 1000000000;
    return  $f - $o.'B';
  }else{
    return $s;
  }
}


function dateTime($created_at){
  $now = date('Y-m-d H:i:s');
  $start_datetime = new DateTime($now);
  $end_datetime = new DateTime($created_at);
  $interval = $end_datetime->diff($start_datetime);
  $time = '0seconds ago';
  $a = json_decode(json_encode($interval), true);
  $y = $a['y'];
  $m = $a['m'];
  $d = $a['d'];
  $h = $a['h'];
  $i = $a['i'];
  $s = $a['s'];
  if($s>0){
    $time = $s.' seconds ago';
  }
  if($i>0){
    $time = $i.' minutes ago';
  }
  if($h>0){
    $time = $h.' hours ago';
  }
  if($d>0){
    if($d<7){
      $time = $d.' days ago';
    }
    else{
      $w = intdiv($d, 7);
      $time = $w.' weeks ago';
    }
  }
  if($m>0){
    $time = $m.' months ago';
  }
  if($y>0){
    $date = new DateTime($created_at);
    $time = $date->format('F Y');
  }
  return $time;
}
function timeFormat($time) {
  $totalSec = floor($time % 60);
  $totalMin = floor(($time / 60) % 60);
  $totalhour = floor($time / 3600);
  
  $totalSec = ($totalSec < 10) ? '0' . $totalSec : $totalSec;
  $totalMin = ($totalMin < 10) ? '0' . $totalMin : $totalMin;
  $totalhour = ($totalhour < 10) ? '0' . $totalhour : $totalhour;

  if ($totalhour > 0) {
      return $totalhour . ":" . $totalMin . ":" . $totalSec;
  } else {
      return $totalMin . ":" . $totalSec;
  }
}


function shortenString($inputString,$len) {
  if (strlen($inputString) < $len) {
      return $inputString;
  } else {
      return substr($inputString, 0, $len-3) . '...';
  }
}

function formatFileSize($fileSize) {
  if ($fileSize >= 1024 * 1024 * 1024) {
      // GB
      return number_format($fileSize / (1024 * 1024 * 1024), 2) . ' GB';
  } elseif ($fileSize >= 1024 * 1024) {
      // MB
      return number_format($fileSize / (1024 * 1024), 2) . ' MB';
  } elseif ($fileSize >= 1024) {
      // KB
      return number_format($fileSize / 1024, 2) . ' KB';
  } else {
      // Bytes
      return $fileSize . ' Bytes';
  }
}

$category = ["Autos & Vehicles", "Comedy", "Education", "Entertainment", "Film & Animation", "Gaming", "Howto & Style", "Music", "News & Politics", "Nonprofits & Activism", "People & Blogs", "Pets & Animals", "Science & Technology", "Sports", "Travel & Events"];


?>
