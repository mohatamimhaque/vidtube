<?php 
date_default_timezone_set('Asia/Dhaka');
$connect = new PDO("mysql:host=localhost;dbname=oren", "root", "");

$host = "localhost";
$username = "root";
$password = "";
$database = "oren";

$con =mysqli_connect("$host","$username","$password","$database",);
if(!$con){
    header("location: ../errors/dberror.php");
    die();
}
?>