<?php
$now = date('Y-m-d H:i:s');
         $created_at = $row['created_at'];
         $end_time = '2003-03-31 04:30:00';

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
         
        //echo $video;
?>